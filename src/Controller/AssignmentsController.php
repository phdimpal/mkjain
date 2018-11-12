<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 *
 * @method \App\Model\Entity\Assignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['MasterRoles', 'Registrations', 'MasterClasses', 'MasterSections', 'MasterSubjects']
        ];
        $assignments = $this->paginate($this->Assignments);

        $this->set(compact('assignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => ['MasterRoles', 'Registrations', 'MasterClasses', 'MasterSections', 'MasterSubjects', 'AssignmentRows']
        ]);

        $this->set('assignment', $assignment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
	 
	 public function classsectionall($class_id=null,$section_id=null,$assignment_type=null){

		$ClassSectionMappings=$this->Assignments->Registrations->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$class_id,'ClassSectionMappings.master_section_id'=>$section_id])->contain(['MasterSubjects'])->toArray();
		
		$Registrations=$this->Assignments->Registrations->find()->where(['Registrations.master_class_id'=>$class_id,'Registrations.master_section_id'=>$section_id])->toArray();
		//pr($ClassSectionMappings); exit;
		
		$this->set('ClassSectionMappings', $ClassSectionMappings);
		$this->set('assignment_type', $assignment_type);
		$this->set('Registrations', $Registrations);
	}	
	 
	 
	 
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
		$user_id=$this->Auth->User('id');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
			
				$student_ids= 	@$this->request->data['students'];
				$this->request->data['assignment_date']=date("Y-m-d",strtotime($this->request->data['assignment_date']));
				$this->request->data['registration_id']=$user_id;
				$this->request->data['master_role_id']=$master_role_id;
				$doc_financial_statement_year=@$this->request->data['assignment_file'];

				if(!empty($doc_financial_statement_year['tmp_name'])){
					$extt=explode('/',$doc_financial_statement_year['type']);
					$ext=$extt[1];
					$setNewFileName = rand(1, 100000);
					$fullpath= WWW_ROOT."img".DS."assignment";
					$statement_year = "/img/assignment/".$setNewFileName .'.'.$ext;
					$res1 = is_dir($fullpath);
					if($res1 != 1) {
							new Folder($fullpath, true, 0777);
						}
					$this->request->data['assignment_file']	=$statement_year;
						
				}
				
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
			
            if ($this->Assignments->save($assignment)) {
				
					if($assignment->assignment_type == 'Class'){
						$RegistrationsDatas =  $this->Assignments->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$assignment->master_class_id,'Registrations.master_section_id'=>$assignment->master_section_id]);
						foreach($RegistrationsDatas as $registrationsdata){
							$AssignmentsRows = $this->Assignments->AssignmentRows->newEntity();
							$AssignmentsRows->assignment_id = $assignment->id;
							$AssignmentsRows->registration_id = $registrationsdata->id;
						
							$AssignmentsRows = $this->Assignments->AssignmentRows->save($AssignmentsRows);
						}
					// Notifications Code Start	
						$Registrationsnews=$this->Assignments->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$assignment->master_class_id,'Registrations.master_section_id'=>$assignment->master_section_id,'Registrations.device_token !='=>0]);
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
							'title'=> 'Assignment',
							'message' => 'New Assignment Submitted',
							'image' => '',
							'link' => 'mkjain://Assignment?id='.$assignment->id.'&student_id='.$reg_id.'&class_id='.$assignment->master_class_id.'&section_id='.$assignment->master_section_id,
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
							
							$Notifications=$this->Assignments->Registrations->Notifications->newEntity();
							$Notifications->title='Assignment';
							$Notifications->message='New Assignment Submitted';
							$Notifications->notify_date=date("Y-m-d");
							$Notifications->notify_time=date("h:i A"); 
							$Notifications->created_by=0; 
							$Notifications->registration_id=$reg_id; 
							$Notifications->notify_link='mkjain://Assignment?id='.$assignment->id.'&student_id='.$reg_id.'&class_id='.$assignment->master_class_id.'&section_id='.$assignment->master_section_id; 
							$this->Assignments->Registrations->Notifications->save($Notifications);
						}
					//End Notification Code	
						
					}
					
					
					
					if(sizeOf($student_ids) > 0){
						foreach($student_ids as $student_id){
							$AssignmentsRows = $this->Assignments->AssignmentRows->newEntity();
							$AssignmentsRows->assignment_id = $assignment->id;
							$AssignmentsRows->registration_id = $student_id;
						
							$AssignmentsRows = $this->Assignments->AssignmentRows->save($AssignmentsRows);
							
							
							// Notifications Code Start	
							$Registrationsnews=$this->Assignments->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$assignment->master_class_id,'Registrations.master_section_id'=>$assignment->master_section_id,'Registrations.device_token !='=>0,'Registrations.id'=>$student_id]);
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
								'title'=> 'Assignment',
								'message' => 'New Assignment Submitted',
								'image' => '',
								'link' => 'mkjain://Assignment?id='.$assignment->id.'&student_id='.$reg_id.'&class_id='.$assignment->master_class_id.'&section_id='.$assignment->master_section_id,
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
								
								$Notifications=$this->Assignments->Registrations->Notifications->newEntity();
								$Notifications->title='Assignment';
								$Notifications->message='New Assignment Submitted';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://Assignment?id='.$assignment->id.'&student_id='.$reg_id.'&class_id='.$assignment->master_class_id.'&section_id='.$assignment->master_section_id; 
								$this->Assignments->Registrations->Notifications->save($Notifications);
							}
						  //End Notification Code	
							
								
							
						}
					}	
				    
				       
					if(!empty($doc_financial_statement_year['tmp_name'])){
							move_uploaded_file($doc_financial_statement_year['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
						
					}	
				
				
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Assignments->MasterRoles->find('list', ['limit' => 200]);
        $registrations = $this->Assignments->Registrations->find('list', ['limit' => 200]);
        $masterClasses = $this->Assignments->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Assignments->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Assignments->MasterSubjects->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'masterRoles', 'registrations', 'masterClasses', 'masterSections', 'masterSubjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Assignments->MasterRoles->find('list', ['limit' => 200]);
        $registrations = $this->Assignments->Registrations->find('list', ['limit' => 200]);
        $masterClasses = $this->Assignments->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Assignments->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Assignments->MasterSubjects->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'masterRoles', 'registrations', 'masterClasses', 'masterSections', 'masterSubjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
		$assignment_file=$assignment->assignment_file;
		
        if ($this->Assignments->delete($assignment)) {
			@unlink(WWW_ROOT .$assignment_file);
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
