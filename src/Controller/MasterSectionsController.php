<?php
namespace App\Controller;

use App\Controller\AppController;

class MasterSectionsController extends AppController
{

    public function index($id=null)
    {	
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $masterSections = $this->paginate($this->MasterSections->find()->where(['flag'=>0]));
		$message='';
		if(empty($id)){
			$mastersection = $this->MasterSections->newEntity();
			$message = 'The master section has been saved.';
		}else{
			$mastersection = $this->MasterSections->get($id);
			$message = 'The master section has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $mastersection = $this->MasterSections->patchEntity($mastersection, $this->request->getData());
			
            if ($this->MasterSections->save($mastersection)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master section could not be saved. Please, try again.'));
        }
		
        $this->set(compact('masterSections','mastersection'));
        
    }

   public function checkSectionNames(){
		$section_name = $this->request->data('section_name');
		$section_id = $this->request->data('id');
		
		$MasterSectionsexists = $this->MasterSections->exists(['section_name' => $section_name]);
		$MasterSectionsNameexists = $this->MasterSections->exists(['section_name' => $section_name,'id'=>$section_id]);
		
		if(!empty($section_name)){
			if(!empty($section_id)){
				if(!$MasterSectionsNameexists){
					echo 'false';
				}else{
					echo 'true';
				}
			}else{
				if($MasterSectionsexists){
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
       $query2 = $this->MasterSections->query();
						$query2->update()
							->set(['flag' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The master section has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
}
