<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Http\Exception\NotFoundException;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Controller\Component;
/**
 * Registrations Controller
 *
 * @property \App\Model\Table\RegistrationsTable $Registrations
 *
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistrationsController extends AppController
{
	 public function initialize()
    {
        parent::initialize();
       
    }
    
	 public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		   
		}
	
	
public function login(){
		$Registrations=[];
		 $username=$this->request->data['username']; 
		 $password=$this->request->data['password']; 
		$master_role_id=$this->request->data['role_id']; 
		if(!empty($username) and !empty($password)){
			
			$Registrationcount=$this->Registrations->find()
			->where(['student_mobile_no'=>$username,'roll_no'=>$password,'master_role_id'=>$master_role_id])
			->orwhere(['teacher_mobile_no'=>$username,'roll_no'=>$password,'master_role_id'=>$master_role_id])->count(); 
			if($Registrationcount>0){
				$Registrations=$this->Registrations->find()->where(['student_mobile_no'=>$username,'roll_no'=>$password,'master_role_id'=>$master_role_id])->orwhere(['teacher_mobile_no'=>$username,'roll_no'=>$password,'master_role_id'=>$master_role_id])->contain(['MasterClasses','MasterSections']); 
				$success = true;
				$message = 'Data Found Successfully';	
			}else{
				$success = false;
				$message = 'username or password is invaild';
			}
			
		}else{
			$success = false;
			$message = 'empty username or password';
		}
			
		
		$this->set(['success' => $success,'message'=>$message,'Registrations'=>$Registrations,'_serialize' => ['success','message','Registrations']]);
		
	}
	
	
	public function syllabus(){ 
	    $this->loadModel('Syllabuses');
	    
    	$syllabus=[]; 
    	
    	$class_id=$this->request->data['class_id']; 
    	$section_id=$this->request->data['section_id'];   
    	$subject_id=@$this->request->data['subject_id']; 
    	
    	$Syllabuses=$this->Syllabuses->find()->contain(['MasterSubjects']);  
    	
    	if(!empty($class_id)){   
    		$Syllabuses->where(['master_class_id'=>$class_id]);  
    	} 
    	if(!empty($section_id)){   
    		$Syllabuses->where(['master_section_id'=>$section_id]);  
    	}
    	if(!empty($subject_id)){  
    		$Syllabuses->where(['master_subject_id'=>$subject_id]);  
    	}
        if($Syllabuses->toArray()){     
    		$success = true;   $message = 'Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'Syllabus'=>$Syllabuses,'_serialize' => ['success','message','Syllabus']]);    
    }
    
    public function getDirectorMessages(){
		$this->loadModel('DirectorMessages');
	    
    	
    	$DirectorMessages=$this->DirectorMessages->find()->where(['DirectorMessages.is_deleted'=>0,'DirectorMessages.is_status'=>0])->first();  
    	
        if($DirectorMessages){     
    		$success = true;   $message = 'Data Found Successfully';   
    	}else{    
    		$success = false;   $message = 'No data';  
    	}
    	
    	$this->set(['success' => $success,'message'=>$message,'DirectorMessages'=>$DirectorMessages,'_serialize' => ['success','message','DirectorMessages']]);    
	}
	
	public function getProfiles(){
		$this->loadModel('Registrations');
	    
    	$master_role_id = @$this->request->data['master_role_id'];
    	$id = @$this->request->data['id'];
		
		$userProfiles = $this->Registrations->exists(['Registrations.id' => $id,'Registrations.master_role_id'=>$master_role_id,'Registrations.is_deleted'=>0]);
		
		if($userProfiles){
			
			$userProfiles=$this->Registrations->get($id,['contain'=>['MasterClasses','MasterSections','MasterMediums','MasterRoles']]);  
    	
			if($userProfiles){     
				$success = true;   $message = 'Data Found Successfully';   
			}else{    
				$success = false;   $message = 'No data';  
			}
		}else{
			$success = false;   $message = 'data not correct';  
		}
    	
    	
    	$this->set(['success' => $success,'message'=>$message,'userProfiles'=>$userProfiles,'_serialize' => ['success','message','userProfiles']]);    
	}
	
	public function updateProfileImages(){ 
		$this->loadModel('Registrations');
	    
    	$master_role_id = @$this->request->data['master_role_id'];
    	$id = @$this->request->data['id'];
    	
    	$profile_pic = @$this->request->data['profile_pic'];
		
		$userProfilesImages = $this->Registrations->exists(['Registrations.id' => $id,'Registrations.master_role_id'=>$master_role_id,'Registrations.is_deleted'=>0]);
		$image = $this->Registrations->get($id);
		
		$old_profile_pic = $image['profile_pic'];
		if($userProfilesImages){
			if(!empty($this->request->data['profile_pic']['name']))
			{
				$file = $this->request->data['profile_pic']; //put the data into a var for easy use

				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
				
				$setNewFileName = time();
				$extt=explode('/',$file['type']);
				$ext=$extt[1];
				
				if(in_array($ext, $arr_ext))
				{
					if($master_role_id == 2){
						move_uploaded_file($file['tmp_name'], WWW_ROOT . '/registration/teacher/' .$id.'-'.$setNewFileName.'.'.$ext);
					}else if($master_role_id == 3){
						move_uploaded_file($file['tmp_name'], WWW_ROOT . '/registration/student/'  .$id.'-'.$setNewFileName.'.'.$ext);
					}
					
					if ($this->request->is(['post','put'])) {
						$image = $this->Registrations->patchEntity($image, $this->request->data);
							if($master_role_id == 2){
					        	$image['profile_pic'] = '/registration/teacher/' .$id.'-'.$setNewFileName.'.'.$ext;
							}else if($master_role_id == 3){
							    $image['profile_pic'] = '/registration/student/' .$id.'-'.$setNewFileName.'.'.$ext;
							}    
						if ($this->Registrations->save($image)) {
							$success = true;   $message = 'data save';
							$userProfiles = $this->Registrations->find()->where(['is_deleted'=>0,'Registrations.id' => $id,'Registrations.master_role_id'=>$master_role_id])->contain(['MasterClasses','MasterSections']);
						} else {
							$success = false;   $message = 'The image could not be saved. Please, try again.';
							$userProfiles=[];
						}
					}
				}
				  
			}else{
				$success = false;   $message = 'profile pic empty'; 	$userProfiles=[];
			}
			
		}else{
			$success = false;   $message = 'data not correct';  	$userProfiles=[];
		}
		
		$this->set(['success' => $success,'message'=>$message,'Registrations'=>$userProfiles,'_serialize' => ['success','message','Registrations']]);
	}
	
	
	
	public function updateDeviceTokens(){
		$this->loadModel('Registrations');
	    
    	$device_token = @$this->request->data['device_token'];
    	$id = @$this->request->data['id'];
		
		$registrationData = $this->Registrations->get($id);
			if($this->request->is(['post','put'])) {
				
				$registrationData = $this->Registrations->patchEntity($registrationData, $this->request->getData());
				
				if($this->Registrations->save($registrationData)) {
					$success = true;
					$message = 'Data Save Successfully';
					
				}else{
					$success = false;
					$message = 'No data save';
				}
				  $this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
			}
	}
	
	public function getTimeTables(){
	    
		$this->loadModel('TimeTables');
		
		$master_role_id = $this->request->data('master_role_id');
		$master_class_id = $this->request->data('master_class_id');
		$master_section_id = $this->request->data('master_section_id');
		$registration_id = $this->request->data('registration_id');
			
		$where=[];
		if(!empty($master_class_id)){
		    $where['TimeTables.master_class_id']=$master_class_id;
		}
		if(!empty($master_section_id)){
		    $where['TimeTables.master_section_id']=$master_section_id;
		}
		if($master_role_id == 2){
			if(!empty($registration_id)){
		      $where['TimeTables.registration_id']=$registration_id;
	    	}
		}
	    $WeekArrays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];		
			
		$timeTablesData=[];
	    foreach ($WeekArrays as $week){
	        if($master_role_id == 2){
	           $getTimeTables=$this->TimeTables->find()
		        ->order(['TimeTables.id' => 'ASC'])->contain(['MasterClasses','MasterSections','MasterSubjects'])->where(['TimeTables.master_role_id'=>$master_role_id,'week_name'=>$week])->where($where)->toArray();
		        	$timeTablesData[]=['week_name'=>$week,'time_tables'=>$getTimeTables];
	        }else{
	            $getTimeTables=$this->TimeTables->find()
		        ->order(['TimeTables.id' => 'ASC'])->contain(['Registrations','MasterClasses','MasterSections','MasterSubjects'])->where(['TimeTables.master_role_id'=>$master_role_id,'week_name'=>$week])->where($where)->toArray();
		        	$timeTablesData[]=['week_name'=>$week,'time_tables'=>$getTimeTables];
	        }      	
	    }
		
	    if($timeTablesData){
	    	$success = true;
	    	$message = 'Data Found';
        }else{
           	$success = false;
			$message = 'No data Found'; 
            $timeTablesData=[];
        }
		 $this->set(['success' => $success,'message'=>$message,'timeTablesData'=>$timeTablesData,'_serialize' => ['success','message','timeTablesData']]);	
	}
	
	public function updateStudentAttendances(){
		$this->loadModel('Attendances');
		$this->loadModel('AttendanceRows');
		
		$master_role_id = $this->request->data('master_role_id');
		$registration_id = $this->request->data('registration_id');
		$master_class_id = $this->request->data('master_class_id');
		$master_section_id = $this->request->data('master_section_id');
		$attendance_date = $this->request->data('attendance_date');
		$student_ids = $this->request->data('student_id');
		$attendance_marks = $this->request->data('attendance_mark');
		
		$student_idss = sizeOf($student_ids);
		$attendance_dates = date('Y-m-d',strtotime($attendance_date));
		$AttendancesData = $this->Attendances->find()->where(['attendance_date'=>$attendance_dates])->first();
		
		if($AttendancesData){
	    	$this->Attendances->AttendanceRows->deleteAll(['AttendanceRows.attendance_id'=>$AttendancesData->id]);
	    	$this->Attendances->deleteAll(['Attendances.id'=>$AttendancesData->id]);
		}		
		
		$studentAttendances = $this->Attendances->newEntity();
		//pr($registrationData);exit;
			if($this->request->is(['post','put'])) {
				
				$studentAttendances = $this->Attendances->patchEntity($studentAttendances, $this->request->getData());
				
				$studentAttendances->attendance_date = date('Y-m-d',strtotime($attendance_date));
				$studentAttendances->created_by = $registration_id;
				$studentAttendances->created_on = date('Y-m-d');
				
				if($this->Attendances->save($studentAttendances)) {
					$stud_id=0;
					$mark_id=0;
					for($i=0; $i<$student_idss; $i++)
					{ 
						$stud_id=$student_ids[$i];
						$mark_id=$attendance_marks[$i];
						$query = $this->Attendances->AttendanceRows->query();
										$query->insert(['attendance_id', 'student_id', 'attendance_mark'])
										->values([
										'attendance_id' => $studentAttendances->id,
										'student_id' => $stud_id,
										'attendance_mark' => $mark_id
										]);
									$query->execute(); 
					}
					$success = true;
					$message = 'Data Save Successfully';
					
				}else{
					$success = false;
					$message = 'No data save';
				}
				  $this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
			}
	}
	
public function getAcademicCalender(){
		
		$this->loadModel('AcademicCalenders');
		
		$currnt=date('Y');
		$nextyear=$currnt+1;
		$yearArray=array();
		
		$y=0;
		for($x=$currnt;$x<=$nextyear; $x++)
		{	
			$y++;
			for($c=1;$c<=12; $c++)
			{
				$first_date=date('Y-m-d', strtotime($x.'-'.$c.'-01'));
			    $last_date=date('Y-m-t', strtotime($x.'-'.$c.'-01'));  
				$monthss=	$c-1;	
				$currentTime=strtotime($first_date);
				$endTime=strtotime($last_date);
				//---
				$k=0;
				$results = array();
				while ($currentTime <= $endTime) {
					if (date('N', $currentTime) < 8) {
						$results[] = date('Y-m-d', $currentTime);
					}
					$currentTime = strtotime('+1 day', $currentTime);
				}
				unset($timestamp);
				foreach($results as $value)
				{
					$timestamp[]=$value;
				}
				
				$fff=array_unique($timestamp);
				unset($timestamp);
				$result=array();$d=array();$db=array();
				foreach($fff as $cal_ex11)
				{
					$dt=str_replace('-', '', $cal_ex11);
					$exact_trim=$dt;
					$datetime =\DateTime::createFromFormat('Ymd', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');

					$AcademicCalenders = $this->AcademicCalenders->find()->contain(['MasterCategories'])->where(['calender_date'=>$cal_ex11]);
					$AcademicCalendersDatas = $this->AcademicCalenders->find()->contain(['MasterCategories'])->where(['calender_date'=>$cal_ex11]);
					
					$result_c=array();
					if(sizeOf($AcademicCalenders)>0)
					{
						foreach($AcademicCalenders as $academiccalender)
						{
							$result_c[] = array(
								'id' => $academiccalender->id,
								'name' => $academiccalender->title,
								'type' => $academiccalender->master_category->category_name,
								'date' => date('d-m-Y',strtotime($academiccalender->calender_date)),
							);
							
						
						}
					}
					else
					{
						$fullday='';
						if($edd=='Sun'){$fullday='Sunday';} 
							$result_c[] = array(
								'id' => 0,
								'name' => '',
								'type' => $fullday,
								'date' => $cal_ex11,
								'time' =>''
							); 
					}
					
			
				    foreach($AcademicCalendersDatas as $abc){
				        	if($abc->master_category->id == "1"){
								$d[$abc->master_category->category_name][] = ['title'=>$abc->title,'event_Date'=>date('d-m-Y',strtotime($abc->calender_date))];
							}else if($abc->master_category->id == "2"){
								$d[$abc->master_category->category_name][] = ['title'=>$abc->title,'event_Date'=>date('d-m-Y',strtotime($abc->calender_date))];
							}else if($abc->master_category->id == "3"){
								$d[$abc->master_category->category_name][] =['title'=>$abc->title,'event_Date'=>date('d-m-Y',strtotime($abc->calender_date))];
							}
								
				    }
				    
					$result[] =array('date' => $ed,
						'day' => $edd,
						'month' => $em,
						'year' => $ey,
						'event'=>$result_c);
					unset($result_c);
				}
			
				unset($timestamp);
				if(sizeof($d)>0){
				    $db[]=$d;
				}
				
				$result1[] = array('month_id' => $monthss, 'year'=>$ey,
				'data' => $result,'eventData'=>$db);
				unset($result);
				unset($d);
				unset($db);
			}
			
 			$yearArray[]=array('year'=> $x,'monthdata'=> $result1);
			unset($result1);
		}	
	    
		if($yearArray){
	    	$success = true;
	    	$message = 'Data Found';
        }else{
           	$success = false;
			$message = 'No data Found'; 
            $yearArray=[];
        }
		 $this->set(['success' => $success,'message'=>$message,'calenderDatas'=>$yearArray,'_serialize' => ['success','message','calenderDatas']]);	
	}	
	
	public function getAcademicCalenderr(){
		
		$this->loadModel('AcademicCalenders');
		
		$currnt=date('Y');
		$nextyear=$currnt+1;
		$yearArray=array();
		
		$y=0;
		for($x=$currnt;$x<=$nextyear; $x++)
		{	
			$y++;
			for($c=1;$c<=12; $c++)
			{
				$first_date=date('Y-m-d', strtotime($x.'-'.$c.'-01'));
			    $last_date=date('Y-m-t', strtotime($x.'-'.$c.'-01'));  
				$monthss=	$c-1;	
				$currentTime=strtotime($first_date);
				$endTime=strtotime($last_date);
				//---
				$k=0;
				$results = array();
				while ($currentTime <= $endTime) {
					if (date('N', $currentTime) < 8) {
						$results[] = date('Y-m-d', $currentTime);
					}
					$currentTime = strtotime('+1 day', $currentTime);
				}
				unset($timestamp);
				foreach($results as $value)
				{
					$timestamp[]=$value;
				}
				
				$fff=array_unique($timestamp);
				unset($timestamp);
				$result=array();
				foreach($fff as $cal_ex11)
				{
					$dt=str_replace('-', '', $cal_ex11);
					$exact_trim=$dt;
					$datetime =\DateTime::createFromFormat('Ymd', $exact_trim);
					$ed=$datetime->format('d');
					$edd=$datetime->format('D');
					$em=$datetime->format('M');
					$ey=$datetime->format('Y');

					$AcademicCalenders = $this->AcademicCalenders->find()->contain(['MasterCategories'])->where(['calender_date'=>$cal_ex11]);
					
					$result_c=array();
					if(sizeOf($AcademicCalenders)>0)
					{
						foreach($AcademicCalenders as $academiccalender)
						{
							$result_c[] = array(
								'id' => $academiccalender->id,
								'name' => $academiccalender->title,
								'type' => $academiccalender->master_category->category_name,
								'date' => date('d-m-Y',strtotime($academiccalender->calender_date)),
							);
						}
					}
					else
					{
						$fullday='';
						if($edd=='Sun'){$fullday='Sunday';} 
							$result_c[] = array(
								'id' => 0,
								'name' => '',
								'type' => $fullday,
								'date' => $cal_ex11,
								'time' =>''
							); 
					}
					$result[] =array('date' => $ed,
						'day' => $edd,
						'month' => $em,
						'year' => $ey,
						'event'=>$result_c);
					unset($result_c);
				}
				
				unset($timestamp);
				$result1[] = array('month_id' => $monthss, 'year'=>$ey,
				'data' => $result);
				unset($result);
			}
			
 			$yearArray[]=array('year'=> $x,'monthdata'=> $result1);
			unset($result1);
		}	
	     
		if($yearArray){
	    	$success = true;
	    	$message = 'Data Found';
        }else{
           	$success = false;
			$message = 'No data Found'; 
            $yearArray=[];
        }
		 $this->set(['success' => $success,'message'=>$message,'calenderDatas'=>$yearArray,'_serialize' => ['success','message','calenderDatas']]);	
	}
	
public function fecthAttendenceView(){
		$this->loadModel('Attendances');
		$master_role_id = $this->request->data('master_role_id');
		$attendance_date = $this->request->data('attendance_date');
		$master_class_id = $this->request->data('master_class_id');
		$master_section_id = $this->request->data('master_section_id');
		
		$attendance_date=date('Y-m-d',strtotime($attendance_date));
		$editable=false;
		if($attendance_date==date('Y-m-d'))
		{
			$editable=true;
		}
		$fetchAttendancesDatas=[];
	$AttendancesDatas = $this->Attendances->find()->where(['master_class_id'=>$master_class_id,'master_section_id'=>$master_section_id])->contain(['AttendanceRows'=>['Registrations']]);	foreach($AttendancesDatas as $attendancesdata){
			foreach($attendancesdata->attendance_rows as $attendance_row){
				$fetchAttendancesDatas[]=['student_id'=>$attendance_row->student_id,'marks'=>(int)$attendance_row->attendance_mark,'editable'=>$editable,'student_name'=>$attendance_row->registration->name];
			}
		}
		
		 if($fetchAttendancesDatas){
	    	$success = true;
	    	$message = 'Data Found';
        }else{
           	$success = false;
			$message = 'No data Found'; 
            $fetchAttendancesDatas=[];
        }
		 $this->set(['success' => $success,'message'=>$message,'fetchAttendancesDatas'=>$fetchAttendancesDatas,'_serialize' => ['success','message','fetchAttendancesDatas']]);
		
	}	
	
  public function gallery(){
		
		  $page_no = @$this->request->query['page_no'];
		  $this->paginate = [
					'limit'=>10,
					'page'=>$page_no
					
					];
					
			try {
				$Galleries = $this->paginate($this->Registrations->Galleries->find()->contain(['GalleryRows']));
				
				if($Galleries){
					$success = true;
					$message = 'Data Found Successfully';
				}else{
					$success = false;
					$message = 'Data not found';
				}
				
			} catch (NotFoundException $e) {
				$Galleries=[];
				$success = false;
				$message = 'Data not found';
			}
				
		  $this->set(['success' => $success,'message'=>$message,'Galleries'=>$Galleries,'_serialize' => ['success','message','Galleries']]);	
	
	}
	
	public function leave(){
		
		  $Leaves = $this->Registrations->Leaves->newEntity();
			if($this->request->is('post')) {
				$date1=date("Y-m-d",strtotime($this->request->data['from_date']));
				$date2=date("Y-m-d",strtotime($this->request->data['to_date']));
				$datediff=strtotime($date2)-strtotime($date1);
				$no_of_days=round($datediff / (60 * 60 * 24)+1);
				$this->request->data['no_of_days']=$no_of_days;
				$this->request->data['from_date']=$date1;
				$this->request->data['to_date']=$date2;
				$this->request->data['status']='Pending';
				$Leaves = $this->Registrations->Leaves->patchEntity($Leaves, $this->request->getData());
				
				if($this->Registrations->Leaves->save($Leaves)) {
					
					 $success = true;
					$message = 'Data Save Successfully';
					
				}else{
					$success = false;
					$message = 'No data save';
				}
				  $this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
			}
	}
	
	public function leaveview(){
	    
	    $registration_id = @$this->request->query['registration_id'];
	    $Leaves=[];
	    if(!empty($registration_id)){
	       $Leaves= $this->Registrations->Leaves->find()->where(['Leaves.registration_id'=>$registration_id])->contain(['Registrations']);
	       if($Leaves->toArray()){
	            $success = true;
				$message = 'Data Found';
	       }else{
	          	$success = false;
				$message = 'No data Found'; 
	       }
	       
	        
	    }else{
	        	$success = false;
				$message = 'empty registration id';
	    }
	    
	     $this->set(['success' => $success,'message'=>$message,'Leaves'=>$Leaves,'_serialize' => ['success','message','Leaves']]);
	}
	
	public function news(){
		
		 $page_no = @$this->request->query['page_no'];
		  $this->paginate = [
					'limit'=>10,
					'page'=>$page_no
					
					];
				$count=$this->Registrations->News->find()->count();	
				if($count>0){
					try {
						$News = $this->paginate($this->Registrations->News->find());
						$success = true;
						$message = 'Data Found Successfully';
						
					} catch (NotFoundException $e) {
						$News=[];
						$success = false;
						$message = 'Data not found';
					}
				}else{
					$News=[];
					$success = false;
					$message = 'Data not found';
				}
				
		  $this->set(['success' => $success,'message'=>$message,'News'=>$News,'_serialize' => ['success','message','News']]);	
		
	}
	
	public function video(){
		
		 $page_no = @$this->request->query['page_no'];
		  $this->paginate = [
					'limit'=>10,
					'page'=>$page_no
					
					];
				$count=$this->Registrations->Videoes->find()->count();	
				if($count>0){
					try {
						$Videoes = $this->paginate($this->Registrations->Videoes->find());
						$success = true;
						$message = 'Data Found Successfully';
						
					} catch (NotFoundException $e) {
						$Videoes=[];
						$success = false;
						$message = 'Data not found';
					}
				}else{
					$Videoes=[];
					$success = false;
					$message = 'Data not found';
				}
				
		  $this->set(['success' => $success,'message'=>$message,'Videoes'=>$Videoes,'_serialize' => ['success','message','Videoes']]);	
		
	}
	
	
	public function compalainttype(){
		
		 $ComplainTypes=$this->Registrations->ComplainTypes->find()->toArray();
		 $MasterClasses=$this->Registrations->MasterClasses->find()->contain(['ClassSectionMappings'=>['MasterSections']])->toArray();
		
		 $success = true;
		 $message = 'Data Found';
		 $this->set(['success' => $success,'message'=>$message,'ComplainTypes'=>$ComplainTypes,'MasterClasses'=>$MasterClasses,'_serialize' => ['success','message','ComplainTypes','MasterClasses']]);	
	}
	
	
	public function complaint(){
		
		   $Complains = $this->Registrations->Complains->newEntity();
			if($this->request->is('post')) {
				
			 $Complains = $this->Registrations->Complains->patchEntity($Complains, $this->request->getData());
				
				if($this->Registrations->Complains->save($Complains)) {
					
					 $success = true;
					$message = 'Data Save Successfully';
					
				}else{
					$success = false;
					$message = 'No data save';
				}
				
				$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
				
			}
	}
	
	public function mapping(){
		
	
		 $MasterClasses=$this->Registrations->MasterClasses->find()->contain(['ClassSectionMappings'=>function($q){
			 return $q->select(['master_class_id','master_section_id'])->contain(['MasterSections'=>['Registrations']])
			 ->group(['ClassSectionMappings.master_section_id','ClassSectionMappings.master_class_id'])
			 ->enableAutoFields(true);
		 }])->toArray();
		// pr($MasterClasses); exit;
		 $success = true;
		 $message = 'Data Found';
			foreach($MasterClasses as $classdata){
				$class_section_mappingsda=$classdata->class_section_mappings;
				foreach($class_section_mappingsda as $data){
					
					$master_class_id= $data->master_class_id;
					$master_section_id= $data->master_section_id;
					
					$ClassSectionMappings=$this->Registrations->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$master_class_id,'ClassSectionMappings.master_section_id'=>$master_section_id])->contain(['MasterSubjects'])->toArray();
					
					foreach($ClassSectionMappings as $classmap){
						$master_subject[]=$classmap->master_subject;
					}
					$Registrationsdata=$this->Registrations->find()->where(['Registrations.master_class_id'=>$master_class_id,'Registrations.master_section_id'=>$master_section_id]);
					$data->master_section->registrations=$Registrationsdata;
					$data->master_section->master_subject=$master_subject;
					unset($master_subject);
				}
			}
		 $this->set(['success' => $success,'message'=>$message,'MasterClasses'=>$MasterClasses,'_serialize' => ['success','message','MasterClasses']]);		
	}
	
	
    public function achivement(){
		
			$MasterYears=$this->Registrations->MasterYears->find();
			foreach($MasterYears as $data){
				$Achievementdata=$this->Registrations->Achievements->find()
				->where(['Achievements.achivement_year' => $data->year_name])->contain(['AchievementRows'])->toArray();
				$Achievements[]=['year_name'=>$data->year_name,'year'=>$Achievementdata];
			}
		
        if($Achievements){
			
	    	$success = true;
	    	$message = 'Data Found';
        }else{
           	$success = false;
			$message = 'No data Found'; 
            $achivementdata=[];
        }
		 $this->set(['success' => $success,'message'=>$message,'Achievements'=>$Achievements,'_serialize' => ['success','message','Achievements']]);	
	}
	
	public function notification(){
		
		$Notifications=$this->Registrations->Notifications->find()->toArray();
		 if($Notifications){
			 $success = true;
	    	 $message = 'Data Found';
		 }else{
			 $Notifications=[];
			 $success = false;
			 $message = 'No data Found'; 
		 }
		 
		$this->set(['success' => $success,'message'=>$message,'Notifications'=>$Notifications,'_serialize' => ['success','message','Notifications']]);	
	}
	
	
	
	
public function assignment(){
		
		 $Assignments = $this->Registrations->Assignments->newEntity();
		 $Notifications=$this->Registrations->Notifications->newEntity();
			if($this->request->is('post')) {
			    $student_ids= 	@$this->request->data['student_id'];
				$this->request->data['assignment_date']=date("Y-m-d",strtotime($this->request->data['assignment_date']));
					$doc_financial_statement_year=@$this->request->data['assignment_file'];
					
					if(!empty($doc_financial_statement_year['tmp_name'])){
						$extt=explode('/',$doc_financial_statement_year['type']);
						$ext=$extt[1];
						$setNewFileName = rand(1, 100000);
						$fullpath= WWW_ROOT."img".DS."assignment";
						$statement_year = "/mkjainn/img/assignment/".$setNewFileName .'.'.$ext;
						$res1 = is_dir($fullpath);
						if($res1 != 1) {
								new Folder($fullpath, true, 0777);
							}
						$this->request->data['assignment_file']	=$statement_year;
							
					}
					$Assignments = $this->Registrations->Assignments->patchEntity($Assignments, $this->request->getData());
					
				if($this->Registrations->Assignments->save($Assignments)) {
					
					if($Assignments->assignment_type == 'Class'){
						$RegistrationsDatas =  $this->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$Assignments->master_class_id,'Registrations.master_section_id'=>$Assignments->master_section_id]);
						foreach($RegistrationsDatas as $registrationsdata){
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->newEntity();
							$AssignmentsRows->assignment_id = $Assignments->id;
							$AssignmentsRows->registration_id = $registrationsdata->id;
						
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->save($AssignmentsRows);
						}
					// Notifications Code Start	
						$Registrationsnews=$this->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$Assignments->master_class_id,'Registrations.master_section_id'=>$Assignments->master_section_id,'Registrations.device_token !='=>0]);
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
							'link' => 'mkjain://Assignment?id='.$Assignments->id.'&student_id='.$reg_id.'&class_id='.$Assignments->master_class_id.'&section_id='.$Assignments->master_section_id,
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
							
							$Notifications=$this->Registrations->Notifications->newEntity();
							$Notifications->title='Assignment';
							$Notifications->message='New Assignment Submitted';
							$Notifications->notify_date=date("Y-m-d");
							$Notifications->notify_time=date("h:i A"); 
							$Notifications->created_by=0; 
							$Notifications->registration_id=$reg_id; 
							$Notifications->notify_link='mkjain://Assignment?id='.$Assignments->id.'&student_id='.$reg_id.'&class_id='.$Assignments->master_class_id.'&section_id='.$Assignments->master_section_id; 
							$this->Registrations->Notifications->save($Notifications);
						}
					//End Notification Code	
						
					}
					
					
					
					if(sizeOf($student_ids) > 0){
						foreach($student_ids as $student_id){
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->newEntity();
							$AssignmentsRows->assignment_id = $Assignments->id;
							$AssignmentsRows->registration_id = $student_id;
						
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->save($AssignmentsRows);
							
							
							// Notifications Code Start	
							$Registrationsnews=$this->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.master_class_id'=>$Assignments->master_class_id,'Registrations.master_section_id'=>$Assignments->master_section_id,'Registrations.device_token !='=>0,'Registrations.id'=>$student_id]);
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
								'link' => 'mkjain://Assignment?id='.$Assignments->id.'&student_id='.$reg_id.'&class_id='.$Assignments->master_class_id.'&section_id='.$Assignments->master_section_id,
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
								
								$Notifications=$this->Registrations->Notifications->newEntity();
								$Notifications->title='Assignment';
								$Notifications->message='New Assignment Submitted';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://Assignment?id='.$Assignments->id.'&student_id='.$reg_id.'&class_id='.$Assignments->master_class_id.'&section_id='.$Assignments->master_section_id; 
								$this->Registrations->Notifications->save($Notifications);
							}
						  //End Notification Code	
							
								
							
						}
					}	
				    
				       
					if(!empty($doc_financial_statement_year['tmp_name'])){
							move_uploaded_file($doc_financial_statement_year['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
						
					}	
					 $success = true;
					 $message = 'Data Save Successfully';
					
				}else{ 
					$success = false;
					$message = 'No data save';
				}
				  $this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
				
			}
		
	}
	
	
	public function assignmentview(){
		
		$role_id = @$this->request->query['master_role_id'];
		$master_class_id = @$this->request->query['master_class_id'];
		$master_section_id = @$this->request->query['master_section_id'];
		$registration_id = @$this->request->query['registration_id'];
		if($role_id==2){
			
			$Assignments=$this->Registrations->Assignments->find()
			->where(['Assignments.registration_id'=>$registration_id,'Assignments.is_deleted'=>0])
			->contain(['MasterClasses','MasterSections','MasterSubjects','Registrations']);
			
		}else{
			
			$Assignments=$this->Registrations->Assignments->find()
			->where(['Assignments.is_deleted'=>0,'master_class_id'=>$master_class_id,'master_section_id'=>$master_section_id])
			->contain(['MasterClasses','MasterSections','MasterSubjects','AssignmentRows'=>['Registrations']])
			->innerJoinWith('AssignmentRows',function ($q) use($registration_id) {
				return $q->where(['AssignmentRows.registration_id' => $registration_id]);
			});
		}
		
		if($Assignments->toArray()){
			
			 $success = true;
			 $message = 'Data Found Successfully';
		}else{
			
			 $success = false;
		     $message = 'Data Not Found';
		}
		
		
		$this->set(['success' => $success,'message'=>$message,'Assignments'=>$Assignments,'_serialize' => ['success','message','Assignments']]);
				
		
	}
	
	public function attendanceview(){
		
		$registration_id = @$this->request->query['registration_id'];
		$attendance_date = @$this->request->query['attendance_date']; 
		
		if(!empty($registration_id) and !empty($attendance_date)){
			
			for($i=1;$i<=12;$i++){
			
			 $first_date= date('Y-'.$i.'-01', strtotime($attendance_date));
			 $last_date= date('Y-'.$i.'-t', strtotime($first_date));
			 $last_date_day=explode('-',$last_date);
			
			 $AcademicCalendercount=$this->Registrations->AcademicCalenders->find()->where(['calender_date >='=>$first_date,'calender_date <='=>$last_date,'master_category_id'=>2])->count();
			
			$Attendances=$this->Registrations->Attendances->find()->where(['attendance_date >='=>$first_date,'attendance_date <='=>$last_date])
			->contain(['AttendanceRows'])
			->innerJoinWith('AttendanceRows',function ($query) use($registration_id) {
				
				return $query->where(['AttendanceRows.student_id' => $registration_id]);
				
			})->toArray();
			
			
			$total_present=0;$total_absent=0;$total_leave=0;$attendance_mark='';$total_working=0;
			$result=[];
			 foreach($Attendances as $data){
				
				$A_date=$data->attendance_date;
				$attendance_mark=$data->attendance_rows[0]->attendance_mark;
				if($attendance_mark==1){
					
					++$total_present;
					$attendance_mark='Present';
				}elseif($attendance_mark==2){
					
					++$total_absent;
					$attendance_mark='Absent';
				}elseif($attendance_mark==3){
					
					++$total_leave;
					$attendance_mark='Leave';
				}
				$result[]=['attendance_date'=>$A_date,'attendance_mark'=>$attendance_mark];
				
			} 
				$total_working=$last_date_day[2]-$AcademicCalendercount;
				$new_data[]=['month'=>$i,'total_present'=>$total_present,'total_absent'=>$total_absent,'total_leave'=>$total_leave,'total_holiday'=>$AcademicCalendercount,'total_working'=>$total_working,'result'=>@$result];
			
			} 
			
			 $success = true;
		     $message = 'Found data';
			
		}else{
			
			 $success = false;
		     $message = 'empty id or attendance_date';
			
		}
			
		$this->set(['success' => $success,'message'=>$message,'Attendances'=>$new_data,'_serialize' => ['success','message','Attendances']]);
	}
	
	
}
