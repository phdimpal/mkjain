<?php
namespace App\Controller;

use App\Controller\AppController;

class AcademicCalendersController extends AppController
{

    public function index($id=null)
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $AcademicCalenders = $this->AcademicCalenders->find()->contain(['MasterCategories']);;
		$message='';
		if(empty($id)){
			$academiccalender = $this->AcademicCalenders->newEntity();
			$message = 'The academic calender has been saved.';
		}else{
			$academiccalender = $this->AcademicCalenders->get($id);
			$message = 'The academic calender has been updated.';
		}
		
        if ($this->request->is(['post','put','patch'])) {
            $academiccalender = $this->AcademicCalenders->patchEntity($academiccalender, $this->request->getData());
			
			$academiccalender->calender_date = date('Y-m-d',strtotime($this->request->getData()['calender_date']));
			
            if ($this->AcademicCalenders->save($academiccalender)) {
                $this->Flash->success(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academic calender could not be saved. Please, try again.'));
        }
		
		$mastercategories = $this->AcademicCalenders->MasterCategories->find('list');
        $this->set(compact('AcademicCalenders','academiccalender','mastercategories'));
		
    }

   
    public function delete($id = null)
    {
		$academicCalender = $this->AcademicCalenders->get($id);
		$this->AcademicCalenders->delete($academicCalender);
		$this->Flash->success(__('The academic calender has been deleted.'));
		 return $this->redirect(['action' => 'index']);
       

       
    }
}
