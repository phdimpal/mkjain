<div class="form-group">
	<label class="">Section</label>
	<?php 

	$options=[];
	foreach($ClassSectionMappings as $ClassSectionMapping){
		
		$id= $ClassSectionMapping->master_section->id;
		$section_name= $ClassSectionMapping->master_section->section_name;
		$options[$id]=$section_name;
	}
	echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
</div>