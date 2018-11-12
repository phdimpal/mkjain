<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterYears Controller
 *
 * @property \App\Model\Table\MasterYearsTable $MasterYears
 *
 * @method \App\Model\Entity\MasterYear[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterYearsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $masterYears = $this->paginate($this->MasterYears);

        $this->set(compact('masterYears'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Year id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterYear = $this->MasterYears->get($id, [
            'contain' => []
        ]);

        $this->set('masterYear', $masterYear);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterYear = $this->MasterYears->newEntity();
        if ($this->request->is('post')) {
            $masterYear = $this->MasterYears->patchEntity($masterYear, $this->request->getData());
            if ($this->MasterYears->save($masterYear)) {
                $this->Flash->success(__('The master year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master year could not be saved. Please, try again.'));
        }
        $this->set(compact('masterYear'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Year id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterYear = $this->MasterYears->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterYear = $this->MasterYears->patchEntity($masterYear, $this->request->getData());
            if ($this->MasterYears->save($masterYear)) {
                $this->Flash->success(__('The master year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master year could not be saved. Please, try again.'));
        }
        $this->set(compact('masterYear'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Year id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterYear = $this->MasterYears->get($id);
        if ($this->MasterYears->delete($masterYear)) {
            $this->Flash->success(__('The master year has been deleted.'));
        } else {
            $this->Flash->error(__('The master year could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
