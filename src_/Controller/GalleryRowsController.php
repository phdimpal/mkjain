<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GalleryRows Controller
 *
 * @property \App\Model\Table\GalleryRowsTable $GalleryRows
 *
 * @method \App\Model\Entity\GalleryRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleryRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Galleries']
        ];
        $galleryRows = $this->paginate($this->GalleryRows);

        $this->set(compact('galleryRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galleryRow = $this->GalleryRows->get($id, [
            'contain' => ['Galleries']
        ]);

        $this->set('galleryRow', $galleryRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galleryRow = $this->GalleryRows->newEntity();
        if ($this->request->is('post')) {
            $galleryRow = $this->GalleryRows->patchEntity($galleryRow, $this->request->getData());
            if ($this->GalleryRows->save($galleryRow)) {
                $this->Flash->success(__('The gallery row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery row could not be saved. Please, try again.'));
        }
        $galleries = $this->GalleryRows->Galleries->find('list', ['limit' => 200]);
        $this->set(compact('galleryRow', 'galleries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galleryRow = $this->GalleryRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galleryRow = $this->GalleryRows->patchEntity($galleryRow, $this->request->getData());
            if ($this->GalleryRows->save($galleryRow)) {
                $this->Flash->success(__('The gallery row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery row could not be saved. Please, try again.'));
        }
        $galleries = $this->GalleryRows->Galleries->find('list', ['limit' => 200]);
        $this->set(compact('galleryRow', 'galleries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galleryRow = $this->GalleryRows->get($id);
        if ($this->GalleryRows->delete($galleryRow)) {
            $this->Flash->success(__('The gallery row has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
