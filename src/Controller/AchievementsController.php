<?php
namespace App\Controller;

use App\Controller\AppController;


class AchievementsController extends AppController
{

   
    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		$this->paginate = [
            'contain' => ['Registrations']
        ];
		
        $Achievements = $this->paginate($this->Achievements->find()->where(['Achievements.is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$achievement = $this->Achievements->newEntity();
			$message = 'The achievement has been saved.';
			$achievement->created_by = $master_role_id;
		}else{
			$achievement = $this->Achievements->get($id);
			$message = 'The achievement has been updated.';
			$achievement->edited_by = $master_role_id;
		}
		
        if ($this->request->is(['post','put','patch'])) {
			
			$achievement = $this->Achievements->patchEntity($achievement, $this->request->getData());
			$achievement->achivement_date = date('Y-m-d',strtotime($this->request->getData()['achivement_date']));
			if ($this->Achievements->save($achievement)) {
					
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The achievement could not be saved. Please, try again.'));
        }
		$students = $this->Achievements->Registrations->find('list')->where(['Registrations.master_role_id'=>3,'Registrations.is_deleted'=>0]);
		$masteryears = $this->Achievements->MasterYears->find('list');
		
        $this->set(compact('Achievements','achievement','students','masteryears'));
		
    }

   
    public function delete($id = null)
    {
        $query2 = $this->Achievements->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The achievement has been deleted.'));
		return $this->redirect(['action' => 'index']);
    }
}
