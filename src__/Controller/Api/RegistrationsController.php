<?php
namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Http\Exception\NotFoundException;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\I18n\Date;
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
		if(!empty($username) and !empty($password)){
			
			$Registrationcount=$this->Registrations->find()->where(['roll_no'=>$username,'dob'=>$password])->count(); 
			if($Registrationcount>0){
				$Registrations=$this->Registrations->find()->where(['Registrations.roll_no'=>$username,'Registrations.dob'=>$password,'Registrations.is_deleted'=>0])->contain(['MasterClasses','MasterSections']); 
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
    	$subject_id=$this->request->data['subject_id']; 
    	
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
				$arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
				
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
						$image['profile_pic'] = '/registration/student/' . $file['name'];
						
						if ($this->Registrations->save($image)) {
							$success = true;   $message = 'data save';
							
						} else {
							$success = false;   $message = 'The image could not be saved. Please, try again.';
						}
					}
				}
				  
			}else{
				$success = false;   $message = 'profile pic empty'; 
			}
			
		}else{
			$success = false;   $message = 'data not correct';  
		}
		
		$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
	}
	
	public function updateDeviceTokens(){
		$this->loadModel('Registrations');
	    
    	 $device_token = @$this->request->data['device_token'];
    	 $id = @$this->request->data['id'];
		
		$registrationData = $this->Registrations->get($id);
		//pr($registrationData);exit;
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
			
		$getTimeTables=$this->TimeTables->find()
		->order(['TimeTables.id' => 'ASC'])->contain(['Registrations','MasterClasses','MasterSections','MasterSubjects'])->where(['TimeTables.master_role_id'=>$master_role_id])->toArray();
		
		$timeTablesData=[];
		
		foreach($getTimeTables as $data){
			$timeTablesData[$data->week_name][]=$data;
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
		
		$y=0;$result_c=[];
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
					$result_c=[];
					if(sizeOf($AcademicCalenders)>0)
					{$result_c=[];
						foreach($AcademicCalenders as $academiccalender)
						{
							$result_c[$academiccalender->master_category->category_name][] = array(
								'id' => $academiccalender->id,
								'name' => $academiccalender->title,
								'type' => $academiccalender->master_category->category_name,
								'date' => date('d-m-Y',strtotime($academiccalender->calender_date)),
							);
						}
					}
					
					$result[] =array('date' => $ed,
						'day' => $edd,
						'month' => $em,
						'year' => $ey,
						'event'=>$result_c);
					//unset($result_c);
				}
				
				unset($timestamp);
				$result1[] = array('month_id' => $monthss, 'year'=>$ey,
				'data' => $result_c);
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
		
		$AttendancesDatas = $this->Attendances->find()->where(['master_class_id'=>$master_class_id,'master_section_id'=>$master_section_id,'attendance_date'=>$attendance_date])->contain(['AttendanceRows'=>['Registrations']]);
		foreach($AttendancesDatas as $attendancesdata){
			foreach($attendancesdata->attendance_rows as $attendance_row){
				$fetchAttendancesDatas[]=['student_id'=>$attendance_row->student_id,'marks'=>$attendance_row->attendance_mark,'editable'=>$editable,'student_name'=>$attendance_row->registration->name];
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
	
	public function getAttendenceView(){
		$this->loadModel('Attendances');
		$this->loadModel('AttendanceRows');
		$this->loadModel('AcademicCalenders');
		
		$student_id= $this->request->data('student_id');
		
		$AttendancesData = $this->Attendances->AttendanceRows->find()->where(['student_id'=>$student_id])->toArray();
		
		if(!empty($AttendancesData)){
				$total_month=12;
				$currnt_year=date('Y');
				for($x=1;$x<=$total_month;$x++)
				{
					$total_month_leave=0;
					$total_month_absent=0;
					$total_month_prsent=0;
					$total_month_working=0;
					$total_month_holiday=0;
					
					$first_date='01-'.$x.'-'.$currnt_year;
					$first_date=date('Y-m-d',strtotime($first_date));
					$last_date=date('Y-m-t',strtotime($first_date));
					$currentTime = strtotime($first_date);
					$endTime = strtotime($last_date);
					$k=0; 
					$result = array();
					while ($currentTime <= $endTime) 
					{
					  if (date('N', $currentTime) < 8) 
					  {
						$result[] = date('Y-m-d', $currentTime);
					  }
					  $currentTime = strtotime('+1 day', $currentTime);
					}
					$all_result=array();
					foreach($result as $date)
					{
						$AttendancesDatas = $this->Attendances->find()->contain(['AttendanceRows'=>function($q) use($student_id){
							return $q->where(['AttendanceRows.student_id'=>$student_id])->contain(['Registrations']);
						
						}])->toArray();
						pr($AttendancesDatas);
						$results=array();
						
						$holiday = $this->AcademicCalenders->find()->where(['calender_date'=>$date,'master_category_id'=>'2']);
						$total_holedayofdate=$holiday->count();
						
						foreach($AttendancesDatas as $attendancesdata){
							foreach($attendancesdata->attendance_rows as $attendances)
							{ 
							$y=0;
 							
							$user_name = $attendances->name;
							$attendance_mark=$attendances->attendance_mark;
							$attendance_date=$cal_sql11['attendance_date'];
							$dat=date('d',strtotime($attendance_date));
							$day=date('D',strtotime($attendance_date));
							$month=date('M',strtotime($attendance_date));
							$Year=date('Y',strtotime($attendance_date));
							$attendance_mark=$cal_sql11['attendance_mark'];
							if($attendance_mark==1){$attend='Present';}
							else if($attendance_mark==2){$attend='Absent';}
							else if($attendance_mark==3){$attend='Leave';}
							else { }
							
							$results = array(
								'date' => $dat,
								'day' => $day,
								'month' => $month,
								'year' => $Year,
								'attendance_date' => $attendance_date,
								'attendance_mark' => $attend
 							);
							//-- Present absend and leave
								if($attendance_mark==1){
									$total_month_prsent++;
								}
								if($attendance_mark==2){
									$total_month_absent++;
								}
								if($attendance_mark==3){
									$total_month_leave++;
								}
 							$y++;
							$all_result[]=$results;
						}
					}
						//-- Holiday of same date
						$total_month_holiday+=$total_holedayofdate;
					
					 
					}
					$response[]=array(
						'month'=> $x,
						'total_present'=> $total_month_prsent,
						'total_absent'=> $total_month_absent,
						'total_leave'=> $total_month_leave,
						'total_working'=> '',
						'total_holiday'=> $total_month_holiday,
						'result'=>$all_result,
 					);
 				}
			}
		
		
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
	
	public function assignment(){
		
		 $Assignments = $this->Registrations->Assignments->newEntity();
			if($this->request->is('post')) {
			    $student_ids= 	@$this->request->data['student_id'];
				$this->request->data['assignment_date']=date("Y-m-d",strtotime($this->request->data['assignment_date']));
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
						
					}
					if(sizeOf($student_ids) > 0){
						foreach($student_ids as $student_id){
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->newEntity();
							$AssignmentsRows->assignment_id = $Assignments->id;
							$AssignmentsRows->registration_id = $student_id;
						
							$AssignmentsRows = $this->Registrations->Assignments->AssignmentRows->save($AssignmentsRows);
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
	
}
