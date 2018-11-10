<?php
namespace App\Controller;

use App\Controller\AppController;

class MasterSubjectsController extends AppController
{

    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $MasterSubjects = $this->MasterSubjects->find()->where(['flag'=>0])->order(['id'=>'DESC']);
		$message='';
		if(empty($id)){
			$mastersubject = $this->MasterSubjects->newEntity();
			$message = 'The master subject has been saved.';
		}else{
			$mastersubject = $this->MasterSubjects->get($id);
			$message = 'The master subject has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $mastersubject = $this->MasterSubjects->patchEntity($mastersubject, $this->request->getData());
			
            if ($this->MasterSubjects->save($mastersubject)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master subject could not be saved. Please, try again.'));
        }
		
        $this->set(compact('MasterSubjects','mastersubject'));
       
    }

   public function checkSubjectsNames(){
		$subject_name = $this->request->data('subject_name');
		$subject_id = $this->request->data('id');
		
		$MasterSubjectsexists = $this->MasterSubjects->exists(['subject_name' => $subject_name]);
		$MasterSubjectsNameexists = $this->MasterSubjects->exists(['subject_name' => $subject_name,'id'=>$subject_id]);
		
		if(!empty($subject_name)){
			if(!empty($subject_id)){
				if(!$MasterSubjectsNameexists && $MasterSubjectsexists){
					echo 'false';
				}else{
					echo 'true';
				}
			}else{
				if($MasterSubjectsexists){
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
        $query2 = $this->MasterSubjects->query();
						$query2->update()
							->set(['flag' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The master subject has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
}
