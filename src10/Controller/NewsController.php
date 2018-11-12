<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class NewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $News = $this->paginate($this->News->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$newss = $this->News->newEntity();
			$message = 'The News has been saved.';
			$newss->created_by = $master_role_id;
		}else{
			$newss = $this->News->get($id);
			$message = 'The News has been updated.';
			$newss->edited_by = $master_role_id;
			$news_url_old=$newss->news_url;
		}
		
        if ($this->request->is(['post','put','patch'])) {
			$news_url=$this->request->getData('news_url');
			
			if(!empty($news_url['tmp_name'])){
				$extt=explode('/',$news_url['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."news";
				$news_url_data = "/img/news/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['news_url']=$news_url_data;
					
			}else{
				$this->request->data['news_url']=$news_url_old;
			}
			
            $newss = $this->News->patchEntity($newss, $this->request->getData());
			$newss->news_date = date('Y-m-d',strtotime($this->request->getData()['news_date']));
			if ($this->News->save($newss)) {
				if(!empty($news_url['tmp_name'])){
					@unlink(WWW_ROOT .$news_url_old);
					move_uploaded_file($news_url['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
				}	
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The News could not be saved. Please, try again.'));
        }
		
        $this->set(compact('News','newss'));
    }

    
    public function delete($id = null)
    {
        $query2 = $this->News->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The News has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
}
