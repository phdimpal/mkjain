<?php
namespace App\Controller;

use App\Controller\AppController;


class VideoesController extends AppController
{

    
    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $Videoes = $this->paginate($this->Videoes->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$video = $this->Videoes->newEntity();
			$message = 'The videos has been saved.';
		}else{
			$video = $this->Videoes->get($id);
			$message = 'The videos has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $video = $this->Videoes->patchEntity($video, $this->request->getData());
			
			
            if ($this->Videoes->save($video)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The videos could not be saved. Please, try again.'));
        }
		
        $this->set(compact('Videoes','video'));
        
    }

    
    public function delete($id = null)
    {
        $query2 = $this->Videoes->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The videos has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
}
