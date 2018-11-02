<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
class SyllabusesController extends AppController
{

    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		 $this->paginate = [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects']
        ];
        $Syllabuses = $this->paginate($this->Syllabuses->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$syllabus = $this->Syllabuses->newEntity();
			$message = 'The Syllabuses has been saved.';
			$syllabus->created_by = $master_role_id;
		}else{
			$syllabus = $this->Syllabuses->get($id);
			$message = 'The Syllabuses has been updated.';
			$syllabus->edited_by = $master_role_id;
			$syllabus_url_old=$syllabus->syllabus_file;
		}
		
        if ($this->request->is(['post','put','patch'])) {
			$syllabus_file=$this->request->getData('syllabus_file');
			
			if(!empty($syllabus_file['tmp_name'])){
				$extt=explode('/',$syllabus_file['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."syllabus";
				$news_url_data = "/img/syllabus/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['syllabus_file']=$news_url_data;
					
			}else{
				@$this->request->data['syllabus_file']=@$syllabus_url_old;
			}
			
            $syllabus = $this->Syllabuses->patchEntity($syllabus, $this->request->getData());
			
			if ($this->Syllabuses->save($syllabus)) {
				if(!empty($syllabus_file['tmp_name'])){
					@unlink(WWW_ROOT .$syllabus_url_old);
					move_uploaded_file($syllabus_file['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
				}	
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Syllabuses could not be saved. Please, try again.'));
        }
		
		$masterclasses = $this->Syllabuses->MasterClasses->find('list')->where(['flag'=>0]);
		$mastersections = $this->Syllabuses->ClassSectionMappings->find()->where(['is_deleted'=>0])->contain(['MasterSections']);
		$mastersubjects = $this->Syllabuses->ClassSectionMappings->find()->where(['is_deleted'=>0])->contain(['MasterSections','MasterSubjects']);
		//$mastersubjects = $this->Syllabuses->MasterSubjects->find()->where(['flag'=>0]);
        $this->set(compact('Syllabuses','syllabus','masterclasses','mastersections','mastersubjects'));
		
    }

    
    public function delete($id = null)
    {
		$query2 = $this->Syllabuses->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The syllabus has been deleted.'));
		return $this->redirect(['action' => 'index']);
       
    }
}
