<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AcademicCalenders Controller
 *
 * @property \App\Model\Table\AcademicCalendersTable $AcademicCalenders
 *
 * @method \App\Model\Entity\AcademicCalender[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AcademicCalendersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MasterCategories']
        ];
        $academicCalenders = $this->paginate($this->AcademicCalenders);

        $this->set(compact('academicCalenders'));
    }

    /**
     * View method
     *
     * @param string|null $id Academic Calender id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $academicCalender = $this->AcademicCalenders->get($id, [
            'contain' => ['MasterCategories']
        ]);

        $this->set('academicCalender', $academicCalender);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $academicCalender = $this->AcademicCalenders->newEntity();
        if ($this->request->is('post')) {
            $academicCalender = $this->AcademicCalenders->patchEntity($academicCalender, $this->request->getData());
            if ($this->AcademicCalenders->save($academicCalender)) {
                $this->Flash->success(__('The academic calender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academic calender could not be saved. Please, try again.'));
        }
        $masterCategories = $this->AcademicCalenders->MasterCategories->find('list', ['limit' => 200]);
        $this->set(compact('academicCalender', 'masterCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Academic Calender id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $academicCalender = $this->AcademicCalenders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $academicCalender = $this->AcademicCalenders->patchEntity($academicCalender, $this->request->getData());
            if ($this->AcademicCalenders->save($academicCalender)) {
                $this->Flash->success(__('The academic calender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academic calender could not be saved. Please, try again.'));
        }
        $masterCategories = $this->AcademicCalenders->MasterCategories->find('list', ['limit' => 200]);
        $this->set(compact('academicCalender', 'masterCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Academic Calender id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $academicCalender = $this->AcademicCalenders->get($id);
        if ($this->AcademicCalenders->delete($academicCalender)) {
            $this->Flash->success(__('The academic calender has been deleted.'));
        } else {
            $this->Flash->error(__('The academic calender could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
