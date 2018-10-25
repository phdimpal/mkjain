<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Complains Controller
 *
 * @property \App\Model\Table\ComplainsTable $Complains
 *
 * @method \App\Model\Entity\Complain[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComplainsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ComplainTypes', 'Emails', 'MasterClasses', 'MasterSections', 'MasterRoles', 'Registrations']
        ];
        $complains = $this->paginate($this->Complains);

        $this->set(compact('complains'));
    }

    /**
     * View method
     *
     * @param string|null $id Complain id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $complain = $this->Complains->get($id, [
            'contain' => ['ComplainTypes', 'Emails', 'MasterClasses', 'MasterSections', 'MasterRoles', 'Registrations']
        ]);

        $this->set('complain', $complain);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $complain = $this->Complains->newEntity();
        if ($this->request->is('post')) {
            $complain = $this->Complains->patchEntity($complain, $this->request->getData());
            if ($this->Complains->save($complain)) {
                $this->Flash->success(__('The complain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complain could not be saved. Please, try again.'));
        }
        $complainTypes = $this->Complains->ComplainTypes->find('list', ['limit' => 200]);
        $emails = $this->Complains->Emails->find('list', ['limit' => 200]);
        $masterClasses = $this->Complains->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Complains->MasterSections->find('list', ['limit' => 200]);
        $masterRoles = $this->Complains->MasterRoles->find('list', ['limit' => 200]);
        $registrations = $this->Complains->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('complain', 'complainTypes', 'emails', 'masterClasses', 'masterSections', 'masterRoles', 'registrations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Complain id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $complain = $this->Complains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $complain = $this->Complains->patchEntity($complain, $this->request->getData());
            if ($this->Complains->save($complain)) {
                $this->Flash->success(__('The complain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complain could not be saved. Please, try again.'));
        }
        $complainTypes = $this->Complains->ComplainTypes->find('list', ['limit' => 200]);
        $emails = $this->Complains->Emails->find('list', ['limit' => 200]);
        $masterClasses = $this->Complains->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Complains->MasterSections->find('list', ['limit' => 200]);
        $masterRoles = $this->Complains->MasterRoles->find('list', ['limit' => 200]);
        $registrations = $this->Complains->Registrations->find('list', ['limit' => 200]);
        $this->set(compact('complain', 'complainTypes', 'emails', 'masterClasses', 'masterSections', 'masterRoles', 'registrations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Complain id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $complain = $this->Complains->get($id);
        if ($this->Complains->delete($complain)) {
            $this->Flash->success(__('The complain has been deleted.'));
        } else {
            $this->Flash->error(__('The complain could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
