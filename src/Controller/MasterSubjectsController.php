<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterSubjects Controller
 *
 * @property \App\Model\Table\MasterSubjectsTable $MasterSubjects
 *
 * @method \App\Model\Entity\MasterSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $masterSubjects = $this->paginate($this->MasterSubjects);

        $this->set(compact('masterSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterSubject = $this->MasterSubjects->get($id, [
            'contain' => ['Syllabuses']
        ]);

        $this->set('masterSubject', $masterSubject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterSubject = $this->MasterSubjects->newEntity();
        if ($this->request->is('post')) {
            $masterSubject = $this->MasterSubjects->patchEntity($masterSubject, $this->request->getData());
            if ($this->MasterSubjects->save($masterSubject)) {
                $this->Flash->success(__('The master subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master subject could not be saved. Please, try again.'));
        }
        $this->set(compact('masterSubject'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterSubject = $this->MasterSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterSubject = $this->MasterSubjects->patchEntity($masterSubject, $this->request->getData());
            if ($this->MasterSubjects->save($masterSubject)) {
                $this->Flash->success(__('The master subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master subject could not be saved. Please, try again.'));
        }
        $this->set(compact('masterSubject'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterSubject = $this->MasterSubjects->get($id);
        if ($this->MasterSubjects->delete($masterSubject)) {
            $this->Flash->success(__('The master subject has been deleted.'));
        } else {
            $this->Flash->error(__('The master subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
