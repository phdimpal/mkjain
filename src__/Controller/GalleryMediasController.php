<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GalleryMedias Controller
 *
 * @property \App\Model\Table\GalleryMediasTable $GalleryMedias
 *
 * @method \App\Model\Entity\GalleryMedia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleryMediasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $galleryMedias = $this->paginate($this->GalleryMedias);

        $this->set(compact('galleryMedias'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery Media id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galleryMedia = $this->GalleryMedias->get($id, [
            'contain' => []
        ]);

        $this->set('galleryMedia', $galleryMedia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galleryMedia = $this->GalleryMedias->newEntity();
        if ($this->request->is('post')) {
            $galleryMedia = $this->GalleryMedias->patchEntity($galleryMedia, $this->request->getData());
            if ($this->GalleryMedias->save($galleryMedia)) {
                $this->Flash->success(__('The gallery media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery media could not be saved. Please, try again.'));
        }
        $this->set(compact('galleryMedia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery Media id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galleryMedia = $this->GalleryMedias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galleryMedia = $this->GalleryMedias->patchEntity($galleryMedia, $this->request->getData());
            if ($this->GalleryMedias->save($galleryMedia)) {
                $this->Flash->success(__('The gallery media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery media could not be saved. Please, try again.'));
        }
        $this->set(compact('galleryMedia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery Media id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galleryMedia = $this->GalleryMedias->get($id);
        if ($this->GalleryMedias->delete($galleryMedia)) {
            $this->Flash->success(__('The gallery media has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
