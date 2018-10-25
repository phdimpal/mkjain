<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ComplainTypes Controller
 *
 * @property \App\Model\Table\ComplainTypesTable $ComplainTypes
 *
 * @method \App\Model\Entity\ComplainType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComplainTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $complainTypes = $this->paginate($this->ComplainTypes);

        $this->set(compact('complainTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Complain Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $complainType = $this->ComplainTypes->get($id, [
            'contain' => ['Complains']
        ]);

        $this->set('complainType', $complainType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $complainType = $this->ComplainTypes->newEntity();
        if ($this->request->is('post')) {
            $complainType = $this->ComplainTypes->patchEntity($complainType, $this->request->getData());
            if ($this->ComplainTypes->save($complainType)) {
                $this->Flash->success(__('The complain type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complain type could not be saved. Please, try again.'));
        }
        $this->set(compact('complainType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Complain Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $complainType = $this->ComplainTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $complainType = $this->ComplainTypes->patchEntity($complainType, $this->request->getData());
            if ($this->ComplainTypes->save($complainType)) {
                $this->Flash->success(__('The complain type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complain type could not be saved. Please, try again.'));
        }
        $this->set(compact('complainType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Complain Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $complainType = $this->ComplainTypes->get($id);
        if ($this->ComplainTypes->delete($complainType)) {
            $this->Flash->success(__('The complain type has been deleted.'));
        } else {
            $this->Flash->error(__('The complain type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
