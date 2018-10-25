<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterSections Controller
 *
 * @property \App\Model\Table\MasterSectionsTable $MasterSections
 *
 * @method \App\Model\Entity\MasterSection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterSectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $masterSections = $this->paginate($this->MasterSections);

        $this->set(compact('masterSections'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Section id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterSection = $this->MasterSections->get($id, [
            'contain' => ['Registrations', 'Syllabuses']
        ]);

        $this->set('masterSection', $masterSection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterSection = $this->MasterSections->newEntity();
        if ($this->request->is('post')) {
            $masterSection = $this->MasterSections->patchEntity($masterSection, $this->request->getData());
            if ($this->MasterSections->save($masterSection)) {
                $this->Flash->success(__('The master section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master section could not be saved. Please, try again.'));
        }
        $this->set(compact('masterSection'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Section id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterSection = $this->MasterSections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterSection = $this->MasterSections->patchEntity($masterSection, $this->request->getData());
            if ($this->MasterSections->save($masterSection)) {
                $this->Flash->success(__('The master section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master section could not be saved. Please, try again.'));
        }
        $this->set(compact('masterSection'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Section id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterSection = $this->MasterSections->get($id);
        if ($this->MasterSections->delete($masterSection)) {
            $this->Flash->success(__('The master section has been deleted.'));
        } else {
            $this->Flash->error(__('The master section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
