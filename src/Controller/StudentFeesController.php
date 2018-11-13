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
									 $this->Flash->success(__('The fees has been saved.'));
								}
							}
						}
					}
					fclose($f);
					$records;
				}
				
			}
			
			// Notifications Code Start	
			$studentfeesdata = $this->StudentFees->find()->order(['StudentFees.id'=>'DESC'])->first();
			if(sizeof($studentfeesdata) > 0){
						$Registrationsnews=$this->StudentFees->Registrations->find()->where(['Registrations.is_deleted'=>0,'Registrations.id'=>$studentfeesdata->student_id,'Registrations.device_token !='=>''])->first();
						date_default_timezone_set("Asia/Calcutta");
						
							
							$reg_id=$Registrationsnews->id;
							$device_token=$Registrationsnews->device_token;
							
							$tokens = array($device_token);
							$random=(string)mt_rand(1000,9999);
							$header = [
							'Content-Type:application/json',
							'Authorization: Key=AAAAMDhcGSU:APA91bGGXZ2FClcRw5lmRvE76x5OHKrm2wqk8Xy5hBBYu0OYPjXrP5c7NJlR8yeYZxWBmC5DwFILj3Tzw7pqZ_zzPrSmI4E2_2j22QVrm4jnUgY6c6SLldZH7eSjaD0CHqryqJqz_oFR'
							];

							$msg = [
							'title'=> 'Student Fees',
							'message' => 'Student Fees added',
							'image' => '',
							'link' => 'mkjain://fees?id='.$reg_id,
							'notification_id'    => $random,
							];
							
							$payload = array(
							'registration_ids' => $tokens,
							'data' => $msg
							);

							$curl = curl_init();
							curl_setopt_array($curl, array(
							CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS => json_encode($payload),
							CURLOPT_HTTPHEADER => $header
							));
							$response = curl_exec($curl);
							$err = curl_error($curl);
							curl_close($curl);
							$final_result=json_decode($response);
							$sms_flag=$final_result->success; 	
							if ($err) {
							//echo "cURL Error #:" . $err;
							} else {
							//$response;
							}	
							if($sms_flag==1){
								$Notifications = $this->StudentFees->Registrations->Notifications->newEntity();
								$Notifications->title='Student Fees';
								$Notifications->message='Student Fees added';
								$Notifications->notify_date=date("Y-m-d");
								$Notifications->notify_time=date("h:i A"); 
								$Notifications->created_by=0; 
								$Notifications->registration_id=$reg_id; 
								$Notifications->notify_link='mkjain://fees?id='.$reg_id; 
								$this->StudentFees->Registrations->Notifications->save($Notifications);
							}	
						
					//End Notification Code	
			
			}
			
		}
		$this->Flash->error(__('The fees has been not saved.'));
        $studentFees = $this->paginate($this->StudentFees);

        $this->set(compact('studentFees'));
    }

    
}
