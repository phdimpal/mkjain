<?php
namespace App\Controller;

use App\Controller\AppController;

class StudentFeesController extends AppController
{

    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$master_role_id=$this->Auth->User('master_role_id');
		
        $this->paginate = [
            'contain' => ['Registrations']
        ];
		if ($this->request->is(['post','put','patch'])) {
			 //$studentFee = $this->StudentFees->patchEntity($studentFee, $this->request->getData());
			 
			if(isset($this->request->data['excel_url']))
			{
				$ext = substr(strtolower(strrchr($this->request->data['excel_url']['name'], '.')), 1);
				$arr_ext = array('csv'); 
				if (in_array($ext, $arr_ext)) 
				{
					$f = fopen($this->request->data['excel_url']['tmp_name'], 'r') or die("ERROR OPENING DATA");
					$records=0;
					while (($line = fgetcsv($f, 4096)) !== false) {
						$test[]=$line;
						++$records;
					}
					foreach($test as $key => $data)
					{ 
						if($key!=0)
						{
							
							$rollExist = $this->StudentFees->Registrations->exists(['Registrations.roll_no' => $data[0]]);
							
							if($rollExist){
								$rollExistDatas = $this->StudentFees->Registrations->find()->where(['roll_no'=>$data[0]])->first();
								if(!empty($rollExistDatas)){
									$this->StudentFees->deleteAll(['StudentFees.student_id' => $rollExistDatas->id]);
			
									$studentFee = $this->StudentFees->newEntity();
									$studentFee->student_id = $rollExistDatas->id;
									$studentFee->due_fee = $data[2];
									$this->StudentFees->save($studentFee);
								}
							}
						}
					}
					fclose($f);
					$records;
				}
			}
			
		}
        $studentFees = $this->paginate($this->StudentFees);

        $this->set(compact('studentFees'));
    }

    
}
