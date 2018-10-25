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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
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
        $timeTable = $this->TimeTables->newEntity();
        if ($this->request->is('post')) {
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
