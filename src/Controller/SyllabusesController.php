<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
class SyllabusesController extends AppController
{

    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		 $this->paginate = [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects']
        ];
        $Syllabuses = $this->paginate($this->Syllabuses->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$syllabus = $this->Syllabuses->newEntity();
			$message = 'The Syllabuses has been saved.';
			$syllabus->created_by = $master_role_id;
		}else{
			$syllabus = $this->Syllabuses->get($id);
			$message = 'The Syllabuses has been updated.';
			$syllabus->edited_by = $master_role_id;
			$syllabus_url_old=$syllabus->syllabus_file;
		}
		
        if ($this->request->is(['post','put','patch'])) {
			$syllabus_file=$this->request->getData('syllabus_file');
			
			if(!empty($syllabus_file['tmp_name'])){
				$extt=explode('/',$syllabus_file['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."syllabus";
				$news_url_data = "/img/syllabus/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['syllabus_file']=$news_url_data;
					
			}else{
				@$this->request->data['syllabus_file']=@$syllabus_url_old;
			}
			$master_class_id=$this->request->getData('master_class_id');
            $master_section_id=$this->request->getData('master_section_id');
            $syllabus = $this->Syllabuses->patchEntity($syllabus, $this->request->getData());
		
			if ($this->Syllabuses->save($syllabus)) {
				
				// Notifications Code Start	
						$Registrationsnews=$this->Syllabuses->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$master_class_id,'Registrations.master_section_id'=>$master_section_id,'Registrations.device_token !='=>0]);
						date_default_timezone_set("Asia/Calcutta");
						foreach($Registrationsnews as $Registrationsnew){
							
							$reg_id=$Registrationsnew->id;
							$device_token=$Registrationsnew->device_token;
							
							$tokens = array($device_token);
							$random=(string)mt_rand(1000,9999);
							$header = [
							'Content-Type:application/json',
							'Authorization: Key=AAAAMDhcGSU:APA91bGGXZ2FClcRw5lmRvE76x5OHKrm2wqk8Xy5hBBYu0OYPjXrP5c7NJlR8yeYZxWBmC5DwFILj3Tzw7pqZ_zzPrSmI4E2_2j22QVrm4jnUgY6c6SLldZH7eSjaD0CHqryqJqz_oFR'
							];

							$msg = [
							'title'=> 'Syllabus',
							'message' => 'Your Class Syllabus Added',
							'image' => '',
							'link' => 'mkjain://Syllabus?id='.$syllabus->id.'&student_id='.$reg_id.'&class_id='.$syllabus->master_class_id.'&section_id='.$syllabus->master_section_id,
							'notification_id'    => $random,
							];
							
							$payload = array(
							'registration_ids' => $tokens,
							'data' => $msg
							);

							$curl = curl_init();
							curl_setopt_array($curl, array(
							CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS => json_encode($payload),
							CURLOPT_HTTPHEADER => $header
							));
							$response = curl_exec($curl);
							$err = curl_error($curl);
							curl_close($curl);
							$final_result=json_decode($response);
							$sms_flag=$final_result->success; 	
							if ($err) {
							//echo "cURL Error #:" . $err;
							} else {
							//$response;
							}	
							if($sms_flag==1){
								$Notifications=$this->Syllabuses->Registrations->Notifications->newEntity();
								$Notifications->title='Syllabus';
								$Notifications->message='Your Class Syllabus Added';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://Syllabus?id='.$syllabus->id.'&student_id='.$reg_id.'&class_id='.$syllabus->master_class_id.'&section_id='.$syllabus->master_section_id; 
								$this->Syllabuses->Registrations->Notifications->save($Notifications);
							
							}
						}
					//End Notification Code	
				
				if(!empty($syllabus_file['tmp_name'])){
					@unlink(WWW_ROOT .$syllabus_url_old);
					move_uploaded_file($syllabus_file['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
				}	
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Syllabuses could not be saved. Please, try again.'));
        }
		
		$masterclasses = $this->Syllabuses->MasterClasses->find('list')->where(['flag'=>0]);
		$mastersections = $this->Syllabuses->ClassSectionMappings->find()->where(['is_deleted'=>0])->contain(['MasterSections']);
		$mastersubjects = $this->Syllabuses->ClassSectionMappings->find()->where(['is_deleted'=>0])->contain(['MasterSections','MasterSubjects']);
		//$mastersubjects = $this->Syllabuses->MasterSubjects->find()->where(['flag'=>0]);
        $this->set(compact('Syllabuses','syllabus','masterclasses','mastersections','mastersubjects'));
		
    }


    
    public function delete($id = null)
    {
		$query2 = $this->Syllabuses->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The syllabus has been deleted.'));
		return $this->redirect(['action' => 'index']);
       
    }
}
