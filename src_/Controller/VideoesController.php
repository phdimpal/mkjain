<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Videoes Controller
 *
 * @property \App\Model\Table\VideoesTable $Videoes
 *
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VideoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $videoes = $this->paginate($this->Videoes);

        $this->set(compact('videoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videoes->get($id, [
            'contain' => []
        ]);

        $this->set('video', $video);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videoes->newEntity();
        if ($this->request->is('post')) {
            $video = $this->Videoes->patchEntity($video, $this->request->getData());
            if ($this->Videoes->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $this->set(compact('video'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videoes->patchEntity($video, $this->request->getData());
            if ($this->Videoes->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $this->set(compact('video'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videoes->get($id);
        if ($this->Videoes->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
