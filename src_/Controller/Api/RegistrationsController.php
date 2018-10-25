<?php
namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\Event\Event;
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
		
		pr($this->request->data); exit;
		$success = true;
		$message = 'Data Found Successfully';
		$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
		
	}
	
	public function getAcademicCalender(){
		$this->loadModel('AcademicCalenders');
		$AcademicCalenders = $this->AcademicCalenders->find()->contain(['MasterCategory'])->toArray();
		pr($AcademicCalenders);exit;
		$success = true;
		$message = 'Data Found Successfully';
		$this->set(['success' => $success,'message'=>$message,'_serialize' => ['success','message']]);
	}
}
