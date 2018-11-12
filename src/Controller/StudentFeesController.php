<?php
namespace App\Controller;

use App\Controller\AppController;

class StudentFeesController extends AppController
{

    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		$studentFee = $this->StudentFees->newEntity();
        $this->paginate = [
            'contain' => ['Registrations']
        ];
		if ($this->request->is(['post','put','patch'])) {
			 $studentFee = $this->StudentFees->patchEntity($studentFee, $this->request->getData());
			 
			if(isset($this->request->data['excel_url']))
			{
				$file = $this->request->data['excel_url']['tmp_name'];
				$f = fopen($file, 'r') or die("ERROR OPENING DATA");
				
				$batchcount=0;
				$records=0;
				while (($line = fgetcsv($f, 4096, ';')) !== false) {
					$numcols = count($line);
					
					foreach($line as $data)
					{
						$seperated_data=str_getcsv($data, ",", '"');
					}
					$seperated_data=array_filter($seperated_data);
					
					$studentFees[]=$seperated_data[0];
				}
					 
				++$records;
				fclose($f);	
			}
			 pr($studentFees);exit;
			  if ($this->StudentFees->save($studentFee)) {
                $this->Flash->success(__('The student fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student fee could not be saved. Please, try again.'));
		}
        $studentFees = $this->paginate($this->StudentFees);

        $this->set(compact('studentFees'));
    }

    
}
