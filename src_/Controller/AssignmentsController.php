<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 *
 * @method \App\Model\Entity\Assignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MasterRoles', 'Students', 'MasterClasses', 'MasterSections', 'MasterSubjects', 'Registrations']
        ];
        $assignments = $this->paginate($this->Assignments);

        $this->set(compact('assignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => ['MasterRoles', 'Students', 'MasterClasses', 'MasterSections', 'MasterSubjects', 'Registrations']
        ]);

        $this->set('assignment', $assignment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Assignments->MasterRoles->find('list', ['limit' => 200]);
        $students = $this->Assignments->Students->find('list', ['limit' => 200]);
        $masterClasses = $this->Assignments->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Assignments->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Assignments->MasterSubjects->find('list', ['limit' => 200]);
        $registrations = $this->Assignments->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'masterRoles', 'students', 'masterClasses', 'masterSections', 'masterSubjects', 'registrations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $masterRoles = $this->Assignments->MasterRoles->find('list', ['limit' => 200]);
        $students = $this->Assignments->Students->find('list', ['limit' => 200]);
        $masterClasses = $this->Assignments->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Assignments->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Assignments->MasterSubjects->find('list', ['limit' => 200]);
        $registrations = $this->Assignments->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'masterRoles', 'students', 'masterClasses', 'masterSections', 'masterSubjects', 'registrations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
