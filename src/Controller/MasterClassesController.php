<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterClasses Controller
 *
 * @property \App\Model\Table\MasterClassesTable $MasterClasses
 *
 * @method \App\Model\Entity\MasterClass[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterClassesController extends AppController
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
		
        $masterClasses = $this->paginate($this->MasterClasses);
		
		$masterClass = $this->MasterClasses->newEntity();
        if ($this->request->is('post')) {
            $masterClass = $this->MasterClasses->patchEntity($masterClass, $this->request->getData());
			
            if ($this->MasterClasses->save($masterClass)) {
                $this->Flash->success(__('The master class has been saved.'));

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
		
		if($MasterClassesexists){
			echo true;
		}else{
			echo false;
		}
		exit;
	}

    /**
     * View method
     *
     * @param string|null $id Master Class id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterClass = $this->MasterClasses->get($id, [
            'contain' => ['Registrations', 'Syllabuses']
        ]);

        $this->set('masterClass', $masterClass);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterClass = $this->MasterClasses->newEntity();
        if ($this->request->is('post')) {
            $masterClass = $this->MasterClasses->patchEntity($masterClass, $this->request->getData());
            if ($this->MasterClasses->save($masterClass)) {
                $this->Flash->success(__('The master class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master class could not be saved. Please, try again.'));
        }
        $this->set(compact('masterClass'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterClass = $this->MasterClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterClass = $this->MasterClasses->patchEntity($masterClass, $this->request->getData());
            if ($this->MasterClasses->save($masterClass)) {
                $this->Flash->success(__('The master class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master class could not be saved. Please, try again.'));
        }
        $this->set(compact('masterClass'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterClass = $this->MasterClasses->get($id);
        if ($this->MasterClasses->delete($masterClass)) {
            $this->Flash->success(__('The master class has been deleted.'));
        } else {
            $this->Flash->error(__('The master class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
