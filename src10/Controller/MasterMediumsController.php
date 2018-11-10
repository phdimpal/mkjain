<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterMediums Controller
 *
 * @property \App\Model\Table\MasterMediumsTable $MasterMediums
 *
 * @method \App\Model\Entity\MasterMedium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterMediumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $masterMediums = $this->paginate($this->MasterMediums);

        $this->set(compact('masterMediums'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Medium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterMedium = $this->MasterMediums->get($id, [
            'contain' => ['Registrations']
        ]);

        $this->set('masterMedium', $masterMedium);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterMedium = $this->MasterMediums->newEntity();
        if ($this->request->is('post')) {
            $masterMedium = $this->MasterMediums->patchEntity($masterMedium, $this->request->getData());
            if ($this->MasterMediums->save($masterMedium)) {
                $this->Flash->success(__('The master medium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master medium could not be saved. Please, try again.'));
        }
        $this->set(compact('masterMedium'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Medium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterMedium = $this->MasterMediums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterMedium = $this->MasterMediums->patchEntity($masterMedium, $this->request->getData());
            if ($this->MasterMediums->save($masterMedium)) {
                $this->Flash->success(__('The master medium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master medium could not be saved. Please, try again.'));
        }
        $this->set(compact('masterMedium'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Medium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterMedium = $this->MasterMediums->get($id);
        if ($this->MasterMediums->delete($masterMedium)) {
            $this->Flash->success(__('The master medium has been deleted.'));
        } else {
            $this->Flash->error(__('The master medium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
