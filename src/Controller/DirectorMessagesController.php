<?php
namespace App\Controller;
use Cake\View\View;
use Cake\View\ViewBuilder;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * DirectorMessages Controller
 *
 * @property \App\Model\Table\DirectorMessagesTable $DirectorMessages
 *
 * @method \App\Model\Entity\DirectorMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DirectorMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $directorMessages = $this->paginate($this->DirectorMessages);

        $this->set(compact('directorMessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);

        $this->set('directorMessage', $directorMessage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $directorMessage = $this->DirectorMessages->newEntity();
        if ($this->request->is('post')) {
            $directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
                $this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
        $directorMessage = $this->DirectorMessages->get($id, [
            'contain' => []
        ]);
		$old_image=$directorMessage->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$profile_pic=$this->request->getData('profile_pic');
			
			if(!empty($profile_pic['tmp_name'])){
				$extt=explode('/',$profile_pic['type']);
				$ext=$extt[1];
				$setNewFileName = rand(1, 100000);
				$fullpath= WWW_ROOT."img".DS."director";
				$statement_year = "/img/director/".$setNewFileName .'.'.$ext;
				$res1 = is_dir($fullpath);
				if($res1 != 1) {
						new Folder($fullpath, true, 0777);
					}
				$this->request->data['image']=$statement_year;
					
			}else{
				$this->request->data['image']=$old_image;
			}
				$directorMessage = $this->DirectorMessages->patchEntity($directorMessage, $this->request->getData());
            if ($this->DirectorMessages->save($directorMessage)) {
				if(!empty($profile_pic['tmp_name'])){
						@unlink(WWW_ROOT .$old_image);
						move_uploaded_file($profile_pic['tmp_name'],$fullpath.DS.$setNewFileName .'.'. $ext);
					
					}
				$this->Flash->success(__('The director message has been saved.'));

                return $this->redirect(['action' => 'edit',$id]);
            }
            $this->Flash->error(__('The director message could not be saved. Please, try again.'));
        }
        $this->set(compact('directorMessage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Director Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directorMessage = $this->DirectorMessages->get($id);
        if ($this->DirectorMessages->delete($directorMessage)) {
            $this->Flash->success(__('The director message has been deleted.'));
        } else {
            $this->Flash->error(__('The director message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
