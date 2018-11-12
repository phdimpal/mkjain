<div class="col-md-3" id="subject">
	<div class="form-group">
		 <label class="">Subject</label>
	<?php 

	$options=[];
	foreach($ClassSectionMappings as $ClassSectionMapping){
		
		$subject_name=$ClassSectionMapping->master_subject->subject_name;
		$id=$ClassSectionMapping->master_subject->id;
		$options[$id]=$subject_name;
	}
		echo $this->Form->input('master_subject_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
		<label class="error" for="master-subject-id"></label>
	</div>
</div> 
<div class="col-md-3" id="student" <?php if($assignment_type=='Class'){ ?>style="display:none" <?php } ?>>
	<div class="form-group">
		 <label class="">Student</label>
		<?php 

		$options=[];
		foreach($Registrations as $Registration){

			$id= $Registration->id;
			$name= $Registration->name;
			$options[$id]=$name;
		}
		echo $this->Form->input('students[]', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2 student','options'=>$options,'style'=>'width:100%;','multiple']); ?>
		<label class="error" for="students"></label>
	</div>
</div>