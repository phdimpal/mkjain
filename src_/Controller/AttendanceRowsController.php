<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttendanceRows Controller
 *
 * @property \App\Model\Table\AttendanceRowsTable $AttendanceRows
 *
 * @method \App\Model\Entity\AttendanceRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttendanceRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Attendances', 'Students']
        ];
        $attendanceRows = $this->paginate($this->AttendanceRows);

        $this->set(compact('attendanceRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendance Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendanceRow = $this->AttendanceRows->get($id, [
            'contain' => ['Attendances', 'Students']
        ]);

        $this->set('attendanceRow', $attendanceRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendanceRow = $this->AttendanceRows->newEntity();
        if ($this->request->is('post')) {
            $attendanceRow = $this->AttendanceRows->patchEntity($attendanceRow, $this->request->getData());
            if ($this->AttendanceRows->save($attendanceRow)) {
                $this->Flash->success(__('The attendance row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance row could not be saved. Please, try again.'));
        }
        $attendances = $this->AttendanceRows->Attendances->find('list', ['limit' => 200]);
        $students = $this->AttendanceRows->Students->find('list', ['limit' => 200]);
        $this->set(compact('attendanceRow', 'attendances', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendance Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendanceRow = $this->AttendanceRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendanceRow = $this->AttendanceRows->patchEntity($attendanceRow, $this->request->getData());
            if ($this->AttendanceRows->save($attendanceRow)) {
                $this->Flash->success(__('The attendance row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance row could not be saved. Please, try again.'));
        }
        $attendances = $this->AttendanceRows->Attendances->find('list', ['limit' => 200]);
        $students = $this->AttendanceRows->Students->find('list', ['limit' => 200]);
        $this->set(compact('attendanceRow', 'attendances', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendanceRow = $this->AttendanceRows->get($id);
        if ($this->AttendanceRows->delete($attendanceRow)) {
            $this->Flash->success(__('The attendance row has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
