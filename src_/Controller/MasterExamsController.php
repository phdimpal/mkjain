<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MasterExams Controller
 *
 * @property \App\Model\Table\MasterExamsTable $MasterExams
 *
 * @method \App\Model\Entity\MasterExam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterExamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classes', 'Sections', 'Subjects']
        ];
        $masterExams = $this->paginate($this->MasterExams);

        $this->set(compact('masterExams'));
    }

    /**
     * View method
     *
     * @param string|null $id Master Exam id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masterExam = $this->MasterExams->get($id, [
            'contain' => ['Classes', 'Sections', 'Subjects']
        ]);

        $this->set('masterExam', $masterExam);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masterExam = $this->MasterExams->newEntity();
        if ($this->request->is('post')) {
            $masterExam = $this->MasterExams->patchEntity($masterExam, $this->request->getData());
            if ($this->MasterExams->save($masterExam)) {
                $this->Flash->success(__('The master exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master exam could not be saved. Please, try again.'));
        }
        $classes = $this->MasterExams->Classes->find('list', ['limit' => 200]);
        $sections = $this->MasterExams->Sections->find('list', ['limit' => 200]);
        $subjects = $this->MasterExams->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('masterExam', 'classes', 'sections', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Master Exam id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masterExam = $this->MasterExams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masterExam = $this->MasterExams->patchEntity($masterExam, $this->request->getData());
            if ($this->MasterExams->save($masterExam)) {
                $this->Flash->success(__('The master exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The master exam could not be saved. Please, try again.'));
        }
        $classes = $this->MasterExams->Classes->find('list', ['limit' => 200]);
        $sections = $this->MasterExams->Sections->find('list', ['limit' => 200]);
        $subjects = $this->MasterExams->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('masterExam', 'classes', 'sections', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Master Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterExam = $this->MasterExams->get($id);
        if ($this->MasterExams->delete($masterExam)) {
            $this->Flash->success(__('The master exam has been deleted.'));
        } else {
            $this->Flash->error(__('The master exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
