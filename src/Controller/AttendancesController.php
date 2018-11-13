<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attendances Controller
 *
 * @property \App\Model\Table\AttendancesTable $Attendances
 *
 * @method \App\Model\Entity\Attendance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttendancesController extends AppController
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
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['MasterRoles', 'Registrations', 'MasterClasses', 'MasterSections','AttendanceRows'=>['Registrations']]
        ];
		$attendances = $this->Attendances->newEntity();
		
		if($this->request->query) {
			
			$date=$this->request->query['date'];
			$master_class_id=$this->request->query['master_class_id'];
			$master_section_id=$this->request->query['master_section_id'];
			$Attendances=$this->Attendances->find();
			if(!empty($date)){
				$attendance_date=date("Y-m-d",strtotime($date));
				$Attendances->where(['Attendances.attendance_date'=>$attendance_date]);
			}
			if(!empty($master_class_id)){
				
				$Attendances->where(['Attendances.master_class_id'=>$master_class_id]);
			}
			if(!empty($master_section_id)){
				
				$Attendances->where(['Attendances.master_section_id'=>$master_section_id]);
			}
			
			$attendances = $this->paginate($Attendances);
			
		}
		
		$masterClasses = $this->Attendances->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Attendances->MasterSections->find('list', ['limit' => 200]);
        

        $this->set(compact('attendances','masterClasses'));
    }
	
	 public function add()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['MasterRoles', 'MasterClasses', 'MasterSections','AttendanceRows']
        ];
	
		$attendancess=[];$Attendances=[];
		if($this->request->query) {
			
			$date=$this->request->query['date'];
			$master_class_id=$this->request->query['master_class_id'];
			$master_section_id=$this->request->query['master_section_id'];
			$Attendances=$this->Attendances->Registrations->find();
			
			if(!empty($master_class_id)){
				
				$Attendances->where(['Registrations.master_class_id'=>$master_class_id]);
			}
			if(!empty($master_section_id)){
				
				$Attendances->where(['Registrations.master_section_id'=>$master_section_id]);
			}
			
			
			
		}
		$attendancess = $Attendances;
		$attendance = $this->Attendances->newEntity();
		if ($this->request->is(['post'])) {
			 $attendance = $this->Attendances->patchEntity($attendance, $this->request->getData());
			 pr($this->request->getData());exit;
			 $attendance->master_role_id = 4;
			 $attendance->created_by = 4;
			 $attendance->attendance_date = $attendance->attendance_date;
			 
			
			 if($this->Attendances->save($attendance)){//pr($attendance->attendance_rows);
			 $i=1;
				 foreach($attendance->attendance_rows as $attendance_row){ echo $i.'<br/>';
					 $attendancerowss = $this->Attendances->AttendanceRows->newEntity();
					 $attendancerowss->attendance_id = $attendance->id;
					 $attendancerowss->student_id = $attendance_row->student_id;
					 $attendancerowss->attendance_mark = $attendance_row->attendance_mark;
					 $this->Attendances->AttendanceRows->save($attendancerowss);
				 $i++;}exit;
			 }	 
		}
		//exit;
		$masterClasses = $this->Attendances->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Attendances->MasterSections->find('list', ['limit' => 200]);
        

        $this->set(compact('attendancess','masterClasses','attendance','master_class_id','master_section_id','date'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendance = $this->Attendances->get($id, [
            'contain' => ['MasterRoles', 'Registrations', 'MasterClasses', 'MasterSections', 'AttendanceRows']
        ]);

        $this->set('attendance', $attendance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    

    /**
     * Edit method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendance = $this->Attendances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendance = $this->Attendances->patchEntity($attendance, $this->request->getData());
            if ($this->Attendances->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Attendances->MasterRoles->find('list', ['limit' => 200]);
        $registrations = $this->Attendances->Registrations->find('list', ['limit' => 200]);
        $masterClasses = $this->Attendances->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Attendances->MasterSections->find('list', ['limit' => 200]);
        $this->set(compact('attendance', 'masterRoles', 'registrations', 'masterClasses', 'masterSections'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendance = $this->Attendances->get($id);
        if ($this->Attendances->delete($attendance)) {
            $this->Flash->success(__('The attendance has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
