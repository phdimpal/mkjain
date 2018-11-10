<?php
$week=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
foreach($ClassSectionMappings as $data){
	$subject_name=$data->master_subject->subject_name;
	$id=$data->master_subject->id;
	echo'<tr> <td colspan="2"><center> <b>'.$subject_name.' </b> </center> </td> <td align="right"> Teacher </td> <td>'. $this->Form->input('registration_id['.$id.']', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2','options'=>$registrations,'style'=>'width:50%;']).'</td></tr>';
	echo'<tr> <td><b>Week Name </b></td> <td><b>Start Time </b></td> <td><b>End Time </b></td> <td> <b>Number of Minute </b></td> </tr>';
	
	for($i=0;$i<7;$i++){
	?>
		<tr>
				<td>
					<input type='hidden' name='week_name[<?php echo $id; ?>][<?php echo $i; ?>]' value='<?php echo $week[$i]; ?>'>
				

					<?php echo $week[$i]; ?>
				</td>
				<td><input type='text' name='start[<?php echo $id; ?>][<?php echo $i; ?>]' value='' placeholder="08:00 AM"> </td>
				<td><input type='text' name='end[<?php echo $id; ?>][<?php echo $i; ?>]' value='' placeholder="09:00 AM"> </td>
				<td><input type='text' name='number_of_minute[<?php echo $id; ?>][<?php echo $i; ?>]' value='' placeholder="60 min/1 hour"> </td>
			
		</tr>
	
	
<?php } } ?>

