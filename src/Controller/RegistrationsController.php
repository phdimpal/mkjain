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
 * Registrations Controller
 *
 * @property \App\Model\Table\RegistrationsTable $Registrations
 *
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistrationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
	 
	 public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout','login']);
		
	}
	 
	public function login(){
		$this->viewBuilder()->layout('login_layout');
		if ($this->request->is('post')) {
			
			$user = $this->Auth->identify();
			if($user){
				$this->Auth->setUser($user);
				return $this->redirect(['action' => 'dashboard']);
				
			}
			$this->Flash->error('Your username or password is incorrect.');
			
		}
	} 
	
	public function logout()
	{
		
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
	
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['MasterRoles', 'MasterClasses', 'MasterSections', 'MasterMediums']
        ];
        $registrations = $this->paginate($this->Registrations->find()->where(['is_deleted'=>0]));

        $this->set(compact('registrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registration = $this->Registrations->get($id, [
            'contain' => ['MasterRoles', 'MasterClasses', 'MasterSections', 'MasterMedia']
        ]);

        $this->set('registration', $registration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
	 
	public function classsection($id=null){

		$ClassSectionMappings=$this->Registrations->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$id])->contain(['MasterSections'])->toArray();
		//pr($ClassSectionMappings); exit;
		$this->set('ClassSectionMappings', $ClassSectionMappings);
	}	
	 
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
		$user_id=$this->Auth->User('id');
        $registration = $this->Registrations->newEntity();
        if ($this->request->is('post')) {
			
			$profile_pic=$this->request->getData('profile_pic');
			$dob=$this->request->getData('dob');
			
			$password= str_replace("-", "", $dob);
			$this->request->data['password']=$password;
			$this->request->data['created_by']=$user_id;
			
			if(!empty($profile_pic['tmp_name'])){
				$extt=explode('/',$profile_pic['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."profile";
				$statement_year = "/img/profile/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['profile_pic']	=$statement_year;
					
			}

            $registration = $this->Registrations->patchEntity($registration, $this->request->getData());
            if ($this->Registrations->save($registration)) {
				
					if(!empty($profile_pic['tmp_name'])){
							move_uploaded_file($profile_pic['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
						
					}

                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Registrations->MasterRoles->find('list', ['limit' => 200]);
        $masterClasses = $this->Registrations->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Registrations->MasterSections->find('list', ['limit' => 200]);
        $masterMedia = $this->Registrations->MasterMediums->find('list', ['limit' => 200]);
        $this->set(compact('registration', 'masterRoles', 'masterClasses', 'masterSections', 'MasterMediums'));
    }

	public function dashboard(){
		$this->viewBuilder()->layout('index_layout');
	}	
    /**
     * Edit method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$user_id=$this->Auth->User('id');
        $registration = $this->Registrations->get($id, [
            'contain' => ['MasterRoles']
        ]);
		$old_pic=$registration->profile_pic;
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$profile_pic=$this->request->getData('profile_pic');
			
			if(!empty($profile_pic['tmp_name'])){
				$extt=explode('/',$profile_pic['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."profile";
				$statement_year = "/img/profile/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['profile_pic']	=$statement_year;
					
			}else{
				$this->request->data['profile_pic']	=$old_pic;
			}

            $registration = $this->Registrations->patchEntity($registration, $this->request->getData());
            if ($this->Registrations->save($registration)) {
				if(!empty($profile_pic['tmp_name'])){
						unlink(WWW_ROOT .$old_pic);
						move_uploaded_file($profile_pic['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
					
					}
				
                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Registrations->MasterRoles->find('list', ['limit' => 200]);
        $masterClasses = $this->Registrations->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Registrations->MasterSections->find('list', ['limit' => 200]);
        $MasterMediums = $this->Registrations->MasterMediums->find('list', ['limit' => 200]);
        $this->set(compact('registration', 'masterRoles', 'masterClasses', 'masterSections', 'MasterMediums'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registration = $this->Registrations->get($id);
		$registration->is_deleted=1;
        if ($this->Registrations->save($registration)) {
            $this->Flash->success(__('The registration has been deleted.'));
        } else {
            $this->Flash->error(__('The registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
