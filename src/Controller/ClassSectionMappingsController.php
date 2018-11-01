<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClassSectionMappings Controller
 *
 * @property \App\Model\Table\ClassSectionMappingsTable $ClassSectionMappings
 *
 * @method \App\Model\Entity\ClassSectionMapping[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassSectionMappingsController extends AppController
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
		 $this->paginate = [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects']
        ];
        $ClassSectionMappings = $this->paginate($this->ClassSectionMappings->find()->where(['is_deleted'=>0]));
		$message='';
		if(empty($id)){
			$classsectionmapping = $this->ClassSectionMappings->newEntity();
			$message = 'The class section mapping has been saved.';
		}else{
			$classsectionmapping = $this->ClassSectionMappings->get($id);
			$message = 'The class section mapping has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $classsectionmapping = $this->ClassSectionMappings->patchEntity($classsectionmapping, $this->request->getData());
			
            if ($this->ClassSectionMappings->save($classsectionmapping)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class section mapping could not be saved. Please, try again.'));
        }
		
		$master_class = $this->ClassSectionMappings->MasterClasses->find('list')->where(['flag'=>0]);
		$master_sections = $this->ClassSectionMappings->MasterSections->find('list')->where(['flag'=>0]);
		$master_subjects = $this->ClassSectionMappings->MasterSubjects->find('list')->where(['flag'=>0]);
		
        $this->set(compact('ClassSectionMappings','classsectionmapping','master_class','master_sections','master_subjects'));
		
    }

    
    public function delete($id = null)
    {
		$query2 = $this->ClassSectionMappings->query();
						$query2->update()
							->set(['is_deleted' =>1])
							->where(['id' => $id])
							->execute();
							
		$this->Flash->error(__('The class section mapping has been deleted.'));
		return $this->redirect(['action' => 'index']);
       
    }
	
	public function getSectionLists($class_id=null){
		$classsectionmappings = $this->ClassSectionMappings->find()->where(['master_class_id'=>$class_id])->contain(['MasterSections']);
		$options=[];
		foreach($classsectionmappings as $classsectionmapping){
			$options[]= ['text'=>$classsectionmapping->master_section->section_name,'value'=>$classsectionmapping->master_section->id];
		}
		
		 $this->set(compact('options'));
	}
	
	public function getSubjectLists($class_id=null,$section_id=null){
		$classsectionmappings = $this->ClassSectionMappings->find()->where(['master_class_id'=>$class_id,'master_section_id'=>$section_id,'is_deleted'=>0])->contain(['MasterSections','MasterSubjects']);
		$options=[];
		foreach($classsectionmappings as $classsectionmapping){
			$options[]= ['text'=>$classsectionmapping->master_subject->subject_name,'value'=>$classsectionmapping->master_subject->id];
		}
		
		 $this->set(compact('options'));
	}
}
