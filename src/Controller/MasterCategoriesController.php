<?php
namespace App\Controller;

use App\Controller\AppController;

class MasterCategoriesController extends AppController
{
	public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $MasterCategories = $this->paginate($this->MasterCategories->find()->where(['flag'=>0]));
		$message='';
		if(empty($id)){
			$mastercategory = $this->MasterCategories->newEntity();
			$message = 'The master category has been saved.';
		}else{
			$mastercategory = $this->MasterCategories->get($id);
			$message = 'The master category has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $mastercategory = $this->MasterCategories->patchEntity($mastercategory, $this->request->getData());
			
            if ($this->MasterCategories->save($mastercategory)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master category could not be saved. Please, try again.'));
        }
		
        $this->set(compact('MasterCategories','mastercategory'));
       
    }
	
	 public function checkMasterCategoriesNames(){
		$category_name = $this->request->data('category_name');
		$category_id = $this->request->data('id');
		
		$MasterCategoriessexists = $this->MasterCategories->exists(['category_name' => $category_name]);
		$MasterCategoriesNameexists = $this->MasterCategories->exists(['category_name' => $category_name,'id'=>$category_id]);
		
		if(!empty($category_name)){
			if(!empty($category_id)){
				if(!$MasterCategoriesNameexists){
					echo 'false';
				}else{
					echo 'true';
				}
			}else{
				if($MasterCategoriessexists){
					echo 'false';
				}else{
					echo 'true';
				}
			}
		}
		exit;
	}
	
	public function delete($id = null)
    {
        $query2 = $this->MasterCategories->query();
						$query2->update()
							->set(['flag' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The master category has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
	
    public function index1($id = null)
    {
		$this->viewBuilder()->layout('index_layout');	
		$masterCategories = $this->paginate($this->MasterCategories);
		$this->set(compact('masterCategories'));
    }
	
	public function saveCategory1(){
		$masterCategory = $this->MasterCategories->newEntity();
		$status =false;
        if ($this->request->is('post')) {
			$masterCategory = $this->MasterCategories->patchEntity($masterCategory, $this->request->getData());
			if ($this->MasterCategories->save($masterCategory)) {
               $success = 'The master category has been saved.' ;
			   $status = true;
            }
           echo json_encode(['success'=>$success,'status'=>$status]);
			exit;
		}
		 
	}
	
	public function getCategory1(){
		$masterCategory = $this->MasterCategories->find()->toArray();
		 echo json_encode(['data'=>$masterCategory]);exit;
	}

   
	 
   
}
