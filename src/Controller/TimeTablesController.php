<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeTables Controller
 *
 * @property \App\Model\Table\TimeTablesTable $TimeTables
 *
 * @method \App\Model\Entity\TimeTable[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimeTablesController extends AppController
{
	 public function initialize()
		{
			parent::initialize();
			$this->Auth->allow(['logout','login']);
			
		}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
	 
	 public function getTimeTable($class_id=null,$section_id=null){
		 $this->viewBuilder()->layout('');
		  $ClassSectionMappings=$this->TimeTables->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$class_id,'ClassSectionMappings.master_section_id'=>$section_id])->contain(['MasterSubjects'])->toArray();
		  
		  $ClassSectionMappingTeacher=$this->TimeTables->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$class_id,'ClassSectionMappings.master_section_id'=>$section_id])->contain(['Registrations'])->toArray();
		  
		  //pr($ClassSectionMappingTeacher);exit;
		  
		  $optionsSubject=[];
		  foreach($ClassSectionMappings as $classections){
			   if(!empty($classections->master_subject)){
					$optionsSubject[]=['text'=>$classections->master_subject->subject_name,'value'=>$classections->master_subject->id];
			   }
		  }
		  
		  $optionsTeacher=[];
		  foreach($ClassSectionMappingTeacher as $teacherMapping){
			  if(!empty($teacherMapping->registration)){
				 $optionsTeacher[]=['text'=>$teacherMapping->registration->name,'value'=>$teacherMapping->registration->id]; 
			  }
			  
		  }
		 // pr($optionsTeacher);exit;
		 $this->set(compact('optionsSubject','optionsTeacher')); 
	 }
	 public function classsubject($class_id=null,$section_id=null){
		 
		$this->viewBuilder()->layout('');
		 $ClassSectionMappings=$this->TimeTables->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$class_id,'ClassSectionMappings.master_section_id'=>$section_id])->contain(['MasterSubjects'])->toArray();
		 $options=[];
		 $registrations = $this->TimeTables->Registrations->find('list')->where(['master_role_id'=>2]);
		 $this->set(compact('ClassSectionMappings','registrations'));
		 
	 }
	 
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
	   $this->paginate = [
            'contain' => ['MasterRoles', 'MasterClasses', 'MasterSections', 'MasterSubjects', 'Registrations']
        ];
        $timeTables = $this->paginate($this->TimeTables);

        $this->set(compact('timeTables'));
    }

    /**
     * View method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeTable = $this->TimeTables->get($id, [
            'contain' => ['MasterRoles', 'MasterClasses', 'MasterSections', 'MasterSubjects', 'Registrations']
        ]);

        $this->set('timeTable', $timeTable);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
        $timeTable = $this->TimeTables->newEntity();
		$user_id=$this->Auth->User('id');
		
			// Notifications Code Start	
					
						/* 	date_default_timezone_set("Asia/Calcutta");
						
							$id=1;
							$reg_id=5;
							$device_token='fNR2W2P9lfc:APA91bEzTifKy_Wtd0nz9q8YwPMwgK3W9hdv0w6xnU8AkntJd4iVbMLZK6YLm2xP4fShFx8lx8THnJ7sqY6TuxIpmfwXacQkf8qy9pBpaU_H0te3ZWx4mViGQ3SoShbkZSg2vsJKdy9l';
							$master_class_id=1;
							$master_section_id=1;
							$tokens = array($device_token);
							$random=(string)mt_rand(1000,9999);
							$header = [
							'Content-Type:application/json',
							'Authorization: Key=AAAAMDhcGSU:APA91bGGXZ2FClcRw5lmRvE76x5OHKrm2wqk8Xy5hBBYu0OYPjXrP5c7NJlR8yeYZxWBmC5DwFILj3Tzw7pqZ_zzPrSmI4E2_2j22QVrm4jnUgY6c6SLldZH7eSjaD0CHqryqJqz_oFR'
							];
								
								$msg = [
							'title'=> 'Leave Application',
							'message' => 'Your Leave Application Approved',
							'image' => '',
							'link' => 'mkjain://Leaves?id='.$id,
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
							 */
							
						/* 	$msg = [
							'title'=> 'Time Table',
							'message' => 'New time table upload',
							'image' => '',
							'link' => 'mkjain://timetable?id='.$reg_id.'&class_id='.$master_class_id.'&section_id='.$master_section_id,
							'notification_id'    => $random,
							];
							
						
						 $msg = [
							'title'=> 'Student Fees',
							'message' => 'Student Fees added',
							'image' => '',
							'link' => 'mkjain://fees?id='.$reg_id,
							'notification_id'    => $random,
							];
						 */	
						 
							
							//pr($final_result);

						/* 	if($sms_flag==1){
								$Notifications=$this->TimeTables->Registrations->Notifications->newEntity();
								$Notifications->title='Time Table';
								$Notifications->message='New time table upload';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://timetable?id='.$reg_id.'&class_id='.$master_class_id.'&section_id='.$master_section_id; 
								$this->TimeTables->Registrations->Notifications->save($Notifications);
							}	
 */
						
					//End Notification Code	
		
		
        if ($this->request->is('post')) {
			
			$timetables = $this->request->getData('time_table');
			$week_names=$this->request->getData('week_name');
			$starts=$this->request->getData('start');
			$ends=$this->request->getData('end');
			$number_of_minutes=$this->request->getData('number_of_minute');
			$master_class_id=$this->request->getData('master_class_id');
			$master_section_id=$this->request->getData('master_section_id');
			$master_role_id=$this->request->getData('master_role_id');
			$registration_ids=$this->request->getData('registration_id');
			
			$ClassSectionMappings=$this->TimeTables->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$master_class_id,'ClassSectionMappings.master_section_id'=>$master_section_id])->contain(['MasterSubjects'])->toArray();
			
			$this->TimeTables->deleteAll(['TimeTables.master_class_id'=>$master_class_id,'TimeTables.master_section_id' => $master_section_id,'TimeTables.master_role_id'=>$master_role_id]);
			
			foreach($timetables as $timetable){ 
			
				$timeTable = $this->TimeTables->newEntity();
				
					 $timeTable->week_name=$timetable['week_name'];
					 $timeTable->start_time=$timetable['start_time'].''.$timetable['ampm'];
					 $timeTable->end_time=$timetable['end_time'].''.@$timetable['ampms'];
					 $timeTable->number_of_minute=$timetable['noofminute'];
					 $timeTable->master_role_id=$master_role_id;
					 $timeTable->master_class_id=$master_class_id;
					 $timeTable->master_section_id=$master_section_id;
					 $timeTable->master_subject_id=$timetable['subject_id'];
					 $timeTable->registration_id=$timetable['teacher_id'];
					 
					$timeTables= $this->TimeTables->save($timeTable);
			}
			
			// Notifications Code Start	
					$Registrationsnews=$this->TimeTables->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$master_class_id,'Registrations.master_section_id'=>$master_section_id,'Registrations.device_token !='=>'']);
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
							'title'=> 'Time Table',
							'message' => 'New time table upload',
							'image' => '',
							'link' => 'mkjain://timetable?id='.$reg_id.'&class_id='.$master_class_id.'&section_id='.$master_section_id,
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
								$Notifications=$this->TimeTables->Registrations->Notifications->newEntity();
								$Notifications->title='Time Table';
								$Notifications->message='New time table upload';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://timetable?id='.$reg_id.'&class_id='.$master_class_id.'&section_id='.$master_section_id; 
								$this->TimeTables->Registrations->Notifications->save($Notifications);
							}	
						}
					//End Notification Code	
			
			$this->Flash->success(__('The time table has been saved.'));
			return $this->redirect(['action' => 'add']);
       
        }
        $masterRoles = $this->TimeTables->MasterRoles->find('list', ['limit' => 200])->where(['id NOT IN'=>['1','4']]);
        $masterClasses = $this->TimeTables->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->TimeTables->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->TimeTables->MasterSubjects->find('list', ['limit' => 200]);
        $registrations = $this->TimeTables->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('timeTable', 'masterRoles', 'masterClasses', 'masterSections', 'masterSubjects', 'registrations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeTable = $this->TimeTables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeTable = $this->TimeTables->patchEntity($timeTable, $this->request->getData());
            if ($this->TimeTables->save($timeTable)) {
                $this->Flash->success(__('The time table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time table could not be saved. Please, try again.'));
        }
        $masterRoles = $this->TimeTables->MasterRoles->find('list', ['limit' => 200]);
        $masterClasses = $this->TimeTables->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->TimeTables->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->TimeTables->MasterSubjects->find('list', ['limit' => 200]);
        $registrations = $this->TimeTables->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('timeTable', 'masterRoles', 'masterClasses', 'masterSections', 'masterSubjects', 'registrations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeTable = $this->TimeTables->get($id);
        if ($this->TimeTables->delete($timeTable)) {
            $this->Flash->success(__('The time table has been deleted.'));
        } else {
            $this->Flash->error(__('The time table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
