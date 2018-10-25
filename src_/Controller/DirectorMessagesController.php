<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DirectorMessages Controller
 *
 * @property \App\Model\Table\DirectorMessagesTable $DirectorMessages
 *
 * @method \App\Model\Entity\DirectorMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DirectorMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $directorMessages = $this->paginate($this->DirectorMessages);

        $this->set(compact('directorMessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);

        $this->set('directorMessage', $directorMessage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $directorMessage = $this->DirectorMessages->newEntity();
        if ($this->request->is('post')) {
            $directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
                $this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
                $this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directorMessage = $this->DirectorMessages->get($id);
        if ($this->DirectorMessages->delete($directorMessage)) {
            $this->Flash->success(__('The director message has been deleted.'));
        } else {
            $this->Flash->error(__('The director message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
