<?php
namespace App\Controller;

use App\Controller\AppController;


class MasterClassesController extends AppController
{

    public function index($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $masterClasses = $this->paginate($this->MasterClasses->find()->where(['flag'=>0]));
		$message='';
		if(empty($id)){
			$masterClass = $this->MasterClasses->newEntity();
			$message = 'The master class has been saved.';
		}else{
			$masterClass = $this->MasterClasses->get($id);
			$message = 'The master class has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $masterClass = $this->MasterClasses->patchEntity($masterClass, $this->request->getData());
			
            if ($this->MasterClasses->save($masterClass)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master class could not be saved. Please, try again.'));
        }
		
        $this->set(compact('masterClasses','masterClass'));
    }
	
	public function checkClassNames(){ 
		$class_name = $this->request->data('class_name');
		$class_id = $this->request->data('id');
		
		$MasterClassesexists = $this->MasterClasses->exists(['class_name' => $class_name]);
		$MasterClassesNameexists = $this->MasterClasses->exists(['class_name' => $class_name,'id'=>$class_id]);
		
		///pr($MasterClassesexists);exit;
		if(!empty($class_name)){
			if(!empty($class_id)){
				if(!$MasterClassesNameexists && $MasterClassesexists){
					echo 'false';
				}else{
					echo 'true';
				}
			}else{
				if($MasterClassesexists){
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
		$query2 = $this->MasterClasses->query();
						$query2->update()
							->set(['flag' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The master class has been deleted.'));
		return $this->redirect(['action' => 'index']);
		
    }
}
