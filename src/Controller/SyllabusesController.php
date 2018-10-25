<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Syllabuses Controller
 *
 * @property \App\Model\Table\SyllabusesTable $Syllabuses
 *
 * @method \App\Model\Entity\Syllabus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SyllabusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects']
        ];
        $syllabuses = $this->paginate($this->Syllabuses);

        $this->set(compact('syllabuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Syllabus id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $syllabus = $this->Syllabuses->get($id, [
            'contain' => ['MasterClasses', 'MasterSections', 'MasterSubjects']
        ]);

        $this->set('syllabus', $syllabus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $syllabus = $this->Syllabuses->newEntity();
        if ($this->request->is('post')) {
            $syllabus = $this->Syllabuses->patchEntity($syllabus, $this->request->getData());
            if ($this->Syllabuses->save($syllabus)) {
                $this->Flash->success(__('The syllabus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The syllabus could not be saved. Please, try again.'));
        }
        $masterClasses = $this->Syllabuses->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Syllabuses->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Syllabuses->MasterSubjects->find('list', ['limit' => 200]);
        $this->set(compact('syllabus', 'masterClasses', 'masterSections', 'masterSubjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Syllabus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $syllabus = $this->Syllabuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $syllabus = $this->Syllabuses->patchEntity($syllabus, $this->request->getData());
            if ($this->Syllabuses->save($syllabus)) {
                $this->Flash->success(__('The syllabus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The syllabus could not be saved. Please, try again.'));
        }
        $masterClasses = $this->Syllabuses->MasterClasses->find('list', ['limit' => 200]);
        $masterSections = $this->Syllabuses->MasterSections->find('list', ['limit' => 200]);
        $masterSubjects = $this->Syllabuses->MasterSubjects->find('list', ['limit' => 200]);
        $this->set(compact('syllabus', 'masterClasses', 'masterSections', 'masterSubjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Syllabus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $syllabus = $this->Syllabuses->get($id);
        if ($this->Syllabuses->delete($syllabus)) {
            $this->Flash->success(__('The syllabus has been deleted.'));
        } else {
            $this->Flash->error(__('The syllabus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
