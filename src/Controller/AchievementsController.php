<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

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
	
	 public function add()
	{
		$this->viewBuilder()->layout('index_layout');
		$Achievements = $this->Achievements->newEntity();
		if ($this->request->is('post')) {
			
			$files=$this->request->getData('file');
			$Achievements = $this->Achievements->patchEntity($Achievements, $this->request->getData());
			if ($this->Achievements->save($Achievements)) {
			
				if(!empty($files[0]['tmp_name'])){
					foreach($files as $file){
						if(!empty($file['tmp_name'])){
							
							$extt=explode('/',$file['type']);
							$ext=$extt[1];
							$setNewFileName = rand(1, 100000);
							$fullpath= WWW_ROOT."img".DS."Achievement";
							$news_url_data = "/img/Achievement/".$setNewFileName .'.'.$ext;
							$res1 = is_dir($fullpath);
							if($res1 != 1) {
								new Folder($fullpath, true, 0777);
							}
							move_uploaded_file($file['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
						}
						$AchievementRows = $this->Achievements->AchievementRows->newEntity();
			
						$AchievementRows->achievement_id=$Achievements->id;
						$AchievementRows->image=$news_url_data;
						$AchievementRows->flag=0;
						$this->Achievements->AchievementRows->save($AchievementRows);
						
					}
				}
				
				$this->Flash->success(__('The Achievement has been saved.'));

				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error(__('The Achievement could not be saved. Please, try again.'));
		}
		$masteryears = $this->Achievements->MasterYears->find('list');
		$this->set(compact('Achievements','masteryears'));
	}
}
