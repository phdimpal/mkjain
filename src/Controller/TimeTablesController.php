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
			  $optionsSubject[]=['text'=>$classections->master_subject->subject_name,'value'=>$classections->master_subject->id];
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
        if ($this->request->is('post')) {
			pr($this->request->getData());exit;
			$week_names=$this->request->getData('week_name');
			$starts=$this->request->getData('start');
			$ends=$this->request->getData('end');
			$number_of_minutes=$this->request->getData('number_of_minute');
			$master_class_id=$this->request->getData('master_class_id');
			$master_section_id=$this->request->getData('master_section_id');
			$master_role_id=$this->request->getData('master_role_id');
			$registration_ids=$this->request->getData('registration_id');
			
			$ClassSectionMappings=$this->TimeTables->ClassSectionMappings->find()->where(['ClassSectionMappings.master_class_id'=>$master_class_id,'ClassSectionMappings.master_section_id'=>$master_section_id])->contain(['MasterSubjects'])->toArray();
			
			foreach($ClassSectionMappings as $data){
				$id=$data->master_subject->id;
				$registration_id= $registration_ids[$id]; 
				for($i=0;$i<7;$i++){
					
					$week_name=$week_names[$id][$i];
					$start=$starts[$id][$i];
					$end=$ends[$id][$i];
					$number_of_minute=$number_of_minutes[$id][$i];
					
					 $timeTable = $this->TimeTables->newEntity();
					 $timeTable->week_name=$week_name;
					 $timeTable->start_time=$start;
					 $timeTable->end_time=$end;
					 $timeTable->number_of_minute=$number_of_minute;
					 $timeTable->master_role_id=$master_role_id;
					 $timeTable->master_class_id=$master_class_id;
					 $timeTable->master_section_id=$master_section_id;
					 $timeTable->master_subject_id=$id;
					 $timeTable->registration_id=$registration_id;
					 
					 $this->TimeTables->save($timeTable);
					
				}
				
			}
			
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
