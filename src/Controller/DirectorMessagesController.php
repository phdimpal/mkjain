<?php
namespace App\Controller;
use Cake\View\View;
use Cake\View\ViewBuilder;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * DirectorMessages Controller
 *
 * @property \App\Model\Table\DirectorMessagesTable $DirectorMessages
 *
 * @method \App\Model\Entity\DirectorMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DirectorMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $directorMessages = $this->paginate($this->DirectorMessages);

        $this->set(compact('directorMessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);

        $this->set('directorMessage', $directorMessage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $directorMessage = $this->DirectorMessages->newEntity();
        if ($this->request->is('post')) {
            $directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
                $this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);
		$old_image=$directorMessage->image;
		
				$reg_id=1;
				//$device_token=$Registrationsnew->device_token;
				$device_token='fNR2W2P9lfc:APA91bEzTifKy_Wtd0nz9q8YwPMwgK3W9hdv0w6xnU8AkntJd4iVbMLZK6YLm2xP4fShFx8lx8THnJ7sqY6TuxIpmfwXacQkf8qy9pBpaU_H0te3ZWx4mViGQ3SoShbkZSg2vsJKdy9l';
				$tokens = array($device_token);
				$random=(string)mt_rand(1000,9999);
				$header = [
				'Content-Type:application/json',
				'Authorization: Key=AAAAMDhcGSU:APA91bGGXZ2FClcRw5lmRvE76x5OHKrm2wqk8Xy5hBBYu0OYPjXrP5c7NJlR8yeYZxWBmC5DwFILj3Tzw7pqZ_zzPrSmI4E2_2j22QVrm4jnUgY6c6SLldZH7eSjaD0CHqryqJqz_oFR'
				];

				$msg = [
				'title'=> 'Director Message',
				'message' => 'New director message upload',
				'image' => '',
				'link' => 'mkjain://directormessage',
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

				pr($final_result);
				exit;
	
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$profile_pic=$this->request->getData('profile_pic');
			
			if(!empty($profile_pic['tmp_name'])){
				$extt=explode('/',$profile_pic['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."director";
				$statement_year = "/img/director/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['image']=$statement_year;
					
			}else{
				$this->request->data['image']=$old_image;
			}
				$directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
				
				// Notifications Code Start	
					$Registrationsnews=$this->DirectorMessages->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_role_id !='=>4,'Registrations.device_token !='=>'']);
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
							'title'=> 'Director Message',
							'message' => 'New director message upload',
							'image' => '',
							'link' => 'mkjain://directormessage',
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
								$Notifications=$this->DirectorMessages->Registrations->Notifications->newEntity();
								$Notifications->title='Director Message';
								$Notifications->message='New director message upload';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://directormessage?id='.$reg_id; 
								$this->DirectorMessages->Registrations->Notifications->save($Notifications);
							}	
						}
					//End Notification Code	
				
				
				
				
				if(!empty($profile_pic['tmp_name'])){
						@unlink(WWW_ROOT .$old_image);
						move_uploaded_file($profile_pic['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
					
					}
				$this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'edit',$id]);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directorMessage = $this->DirectorMessages->get($id);
        if ($this->DirectorMessages->delete($directorMessage)) {
            $this->Flash->success(__('The director message has been deleted.'));
        } else {
            $this->Flash->error(__('The director message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
