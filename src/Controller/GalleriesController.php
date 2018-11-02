<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class GalleriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
         $News = $this->paginate($this->Galleries->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$gallery = $this->Galleries->newEntity();
			$message = 'The Galleries has been saved.';
			$gallery->created_by = $master_role_id;
		}else{
			$gallery = $this->Galleries->get($id);
			$message = 'The Galleries has been updated.';
			$gallery->edited_by = $master_role_id;
			$image_url_old=$gallery->image_url;
		}
		
        if ($this->request->is(['post','put','patch'])) {
			$image_url=$this->request->getData('image_url');
			
			if(!empty($image_url['tmp_name'])){
				$extt=explode('/',$image_url['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."gallery";
				$news_url_data = "/img/news/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['news_url']=$news_url_data;
					
			}else{
				$this->request->data['news_url']=$news_url_old;
			}
			
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
			$gallery->news_date = date('Y-m-d',strtotime($this->request->getData()['news_date']));
			if ($this->Galleries->save($gallery)) {
				if(!empty($news_url['tmp_name'])){
					@unlink(WWW_ROOT .$news_url_old);
					move_uploaded_file($news_url['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
				}	
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Galleries could not be saved. Please, try again.'));
        }
		
        $this->set(compact('Galleries','newss'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => ['GalleryRows']
        ]);

        $this->set('gallery', $gallery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gallery = $this->Galleries->newEntity();
        if ($this->request->is('post')) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('gallery'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
