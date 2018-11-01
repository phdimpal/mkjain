<label class="control-label">Syllabus Section</label>
<?php echo $this->Form->input('master_section_id', ['empty' => "--Select--",'options'=>$options,'label' => false,'class' => 'form-control master_section_id','required','onchange'=>'getSubject(this.value)']); ?> 
<label class="error" for="master-section-id"></label>