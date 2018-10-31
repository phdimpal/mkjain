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
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		 $this->paginate = [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects', 'MasterMediums']
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
		$master_sections = $this->ClassSectionMappings->MasterSections->find()->where(['flag'=>0]);
		$master_subjects = $this->ClassSectionMappings->MasterSubjects->find()->where(['flag'=>0]);
        $this->set(compact('ClassSectionMappings','classsectionmapping','master_class','master_sections','master_subjects'));
		
    }

    /**
     * View method
     *
     * @param string|null $id Class Section Mapping id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classSectionMapping = $this->ClassSectionMappings->get($id, [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects', 'MasterMedia']
        ]);

        $this->set('classSectionMapping', $classSectionMapping);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classSectionMapping = $this->ClassSectionMappings->newEntity();
        if ($this->request->is('post')) {
            $classSectionMapping = $this->ClassSectionMappings->patchEntity($classSectionMapping, $this->request->getData());
            if ($this->ClassSectionMappings->save($classSectionMapping)) {
                $this->Flash->success(__('The class section mapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class section mapping could not be saved. Please, try again.'));
        }
        $masterClasses = $this->ClassSectionMappings->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->ClassSectionMappings->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->ClassSectionMappings->MasterSubjects->find('list', ['limit' => 200]);
        $masterMedia = $this->ClassSectionMappings->MasterMedia->find('list', ['limit' => 200]);
        $this->set(compact('classSectionMapping', 'masterClasses', 'masterSections', 'masterSubjects', 'masterMedia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Class Section Mapping id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classSectionMapping = $this->ClassSectionMappings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classSectionMapping = $this->ClassSectionMappings->patchEntity($classSectionMapping, $this->request->getData());
            if ($this->ClassSectionMappings->save($classSectionMapping)) {
                $this->Flash->success(__('The class section mapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class section mapping could not be saved. Please, try again.'));
        }
        $masterClasses = $this->ClassSectionMappings->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->ClassSectionMappings->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->ClassSectionMappings->MasterSubjects->find('list', ['limit' => 200]);
        $masterMedia = $this->ClassSectionMappings->MasterMedia->find('list', ['limit' => 200]);
        $this->set(compact('classSectionMapping', 'masterClasses', 'masterSections', 'masterSubjects', 'masterMedia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Class Section Mapping id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classSectionMapping = $this->ClassSectionMappings->get($id);
        if ($this->ClassSectionMappings->delete($classSectionMapping)) {
            $this->Flash->success(__('The class section mapping has been deleted.'));
        } else {
            $this->Flash->error(__('The class section mapping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
