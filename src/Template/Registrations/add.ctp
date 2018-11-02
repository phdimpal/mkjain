<style>
.pad{
	padding-right: 0px;
padding-left: 0px;
}
.form-group
{
	margin-bottom: 0px;
}
</style>
<section class="content-header">
	<h1>Registrations</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Registrations</li>
	</ol>
	
</section>
<section class="content">
	 <div class="row">
		<div class="col-md-12">
		<?php echo $this->Form->create($registration, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Registration Add</h3>
			</div>
			<div class="box-body" style="display: block;">
					<div class="row">
							<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Role </label>
										<?php
										echo $this->Form->input('master_role_id', ['empty'=> '--Select--','data-placeholder'=>'Select role','label' => false,'class'=>'form-control select2 master_role_id','options'=>$masterRoles,'style'=>'width:100%;']);
										?>
										<label class="error" for="master-role-id"></label>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Class </label>
												<?php
													echo $this->Form->input('master_class_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 class_change','options'=>$masterClasses,'style'=>'width:100%;']);
												?>
												<label class="error" for="master-class-id"></label>
										</div>
									</div>
									 <div class="col-md-4" id="section">
										<div class="form-group">
											 <label class="">Section</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
											<label class="error" for="master-section-id"></label>
										</div>
									</div>
									
								 
							</div>
							
							<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Enrollment No </label>
										<?php echo $this->Form->input('roll_no', ['label' => false,'placeholder'=>'Enrollment No','class'=>'form-control']); ?>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Name </label>
												<?php echo $this->Form->input('name', ['label' => false,'placeholder'=>'Name','class'=>'form-control']); ?>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Father name </label>
												<?php echo $this->Form->input('father_name', ['label' => false,'placeholder'=>'Father Name','class'=>'form-control']); ?>
										</div>
									</div>
									
								 
							</div>
							
							
							<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Mother name </label>
										<?php echo $this->Form->input('mother_name', ['label' => false,'placeholder'=>'Mother Name','class'=>'form-control']); ?>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Date of birth </label>
												<?php echo $this->Form->input('dob', ['label' => false,'placeholder'=>'','class'=>'form-control','id'=>'datepicker','data-date-format'=>'dd-mm-yyyy']); ?>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Father Mobile no. </label>
												<?php echo $this->Form->input('father_mobile_no', ['label' => false,'placeholder'=>'Father Mobile','class'=>'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",'maxlength'=>10]); ?>
										</div>
									</div>
									
								 
							</div>
						<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Mother Mobile no. </label>
										<?php echo $this->Form->input('mother_mobile_no', ['label' => false,'placeholder'=>'Mother Mobile','class'=>'form-control','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",'maxlength'=>10]); ?>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Student Mobile no. </label>
												<?php echo $this->Form->input('student_mobile_no', ['label' => false,'placeholder'=>'Student Mobile','class'=>'form-control student_mobile_no','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",'maxlength'=>10]); ?>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Teacher Mobile no. </label>
												<?php echo $this->Form->input('teacher_mobile_no', ['label' => false,'placeholder'=>'Teacher Mobile','class'=>'form-control teacher_mobile_no','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",'maxlength'=>10]); ?>
										</div>
									</div>
									
								 
							</div>
						<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Address </label>
										<?php echo $this->Form->input('address', ['label' => false,'placeholder'=>'Address','class'=>'form-control','type'=>'textarea','style'=>'resize:none;','rows'=>'2']); ?>
										</div>
									</div>
								   <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Image </label>
											<?= $this->Form->file('profile_pic') ?>
										</div>
									</div>
								  
						</div>
						
					</div>
			</div>
			<div class="box-footer">
				<center>
				
				<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-arrow-circle-right']).__(' Submit') ,['class'=>'btn btn-danger','type'=>'Submit','id'=>'submit_member','name'=>'registration_submit']);
					   ?>
				</center>
			</div>
			</div>
			<?php echo $this->Form->end(); ?>
			</div>
		</div>
	<section>		
		<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
		<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
		<?php echo $this->Html->script('/plugins/select2/select2.full.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
		<?php  $js=" 
			
			$(document).ready(function(){ 
			$('.select2').select2();
				$(document).on('change', '.master_role_id', function(){   
					var master_role_id=$('select[name=master_role_id] option:selected').val();
					if(master_role_id == 2){
						$('.teacher_mobile_no').attr('required','required');
						$('.student_mobile_no').removeAttr('required');
					}else if(master_role_id == 3){
						$('.student_mobile_no').attr('required','required');
						$('.teacher_mobile_no').removeAttr('required');
					}
				});
				$(document).on('change', '.class_change', function(){   
					 var state_id= $(this).val();
					var url='".$this->Url->build(['controller'=>'Registrations','action'=>'classsection'])."';
					url=url+'/'+state_id;
					$.ajax({ 
						url:url,
						type:'GET',
						}).done(function(response){  
						$('#section').html(response);
						$('select[name=master_section_id]').select2();
					}); 
				});
				
				$('#registratiomForm').validate({
					rules:{
						
					},
					messages:{
						
					}
				});
			});
		";
		echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>
		
