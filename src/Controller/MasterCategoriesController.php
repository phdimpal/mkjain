<?php
namespace App\Controller;

use App\Controller\AppController;

class MasterCategoriesController extends AppController
{

    public function index($id = null)
    {
		$this->viewBuilder()->layout('index_layout');	
		$masterCategories = $this->paginate($this->MasterCategories);
		$this->set(compact('masterCategories'));
    }
	
	public function saveCategory(){
		
	}

    /**
     * View method
     *
     * @param string|null $id Master Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterCategory = $this->MasterCategories->get($id, [
            'contain' => ['AcademicCalenders']
        ]);

        $this->set('masterCategory', $masterCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
	 
	 
    public function add()
    {
        $masterCategory = $this->MasterCategories->newEntity();
        if ($this->request->is('post')) {
            $masterCategory = $this->MasterCategories->patchEntity($masterCategory, $this->request->getData());
            if ($this->MasterCategories->save($masterCategory)) {
                $this->Flash->success(__('The master category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master category could not be saved. Please, try again.'));
        }
        $this->set(compact('masterCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterCategory = $this->MasterCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterCategory = $this->MasterCategories->patchEntity($masterCategory, $this->request->getData());
            if ($this->MasterCategories->save($masterCategory)) {
                $this->Flash->success(__('The master category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master category could not be saved. Please, try again.'));
        }
        $this->set(compact('masterCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterCategory = $this->MasterCategories->get($id);
        if ($this->MasterCategories->delete($masterCategory)) {
            $this->Flash->success(__('The master category has been deleted.'));
        } else {
            $this->Flash->error(__('The master category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
