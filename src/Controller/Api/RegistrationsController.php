<?php
namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Http\Exception\NotFoundException;
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
				$Registrations=$this->Registrations->find()->where(['roll_no'=>$username,'dob'=>$password])->contain(['MasterClasses','MasterSections']); 
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
	
	public function getAcademicCalender(){
		$this->loadModel('AcademicCalenders');
		$years = date('01-01-Y');
		$nextYear = date('Y');
		$nextYear = $nextYear+1;
		$nextYearDate = '01-01-'.$nextYear;
		echo $nextYearDate;exit;
		$AcademicCalenders = $this->AcademicCalenders->find()->contain(['MasterCategories']);
		
	    foreach($AcademicCalenders as $academicCalender){
	         
	    }
	     
		$success = true;
		$message = 'Data Found Successfully';
		$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
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
	
}
