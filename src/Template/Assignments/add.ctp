<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignment Rows'), ['controller' => 'AssignmentRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment Row'), ['controller' => 'AssignmentRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assignments form large-9 medium-8 columns content">
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <legend><?= __('Add Assignment') ?></legend>
        <?php
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('assignment_type');
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_subject_id', ['options' => $masterSubjects]);
            echo $this->Form->control('topic');
            echo $this->Form->control('assignment_date');
            echo $this->Form->control('assignment_file');
            echo $this->Form->control('description');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('registration_id', ['options' => $registrations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->

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
	<h1>Assignment</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Assignment</li>
	</ol>
	
</section>
<section class="content">
	 <div class="row">
		<div class="col-md-12">
		<?php echo $this->Form->create($assignment, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Assignment Add</h3>
			</div>
			<div class="box-body" style="display: block;">
					<div class="row">
							<div class="col-md-12 pad">
								<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Assignment type </label>
												<?php
												$option=[];
												$option['Class']='Class';
												$option['Student']='Student';
											
													echo $this->Form->input('assignment_type', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 assignment_type','options'=>$option,'style'=>'width:100%;']);
												?>
												<label for="assignment-type" class="error"></label>
										</div>
								</div>
								
								 <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Topic</label>
										<?php echo $this->Form->input('topic', ['label' => false,'placeholder'=>'Topic','class'=>'form-control','type'=>'text']); ?>
										</div>
								</div>
								 <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Date</label>
										<?php echo $this->Form->input('assignment_date', ['label' => false,'placeholder'=>'Date','class'=>'form-control','type'=>'text','id'=>'datepicker','data-date-format'=>'dd-mm-yyyy']); ?>
										</div>
								</div>
								
							</div>
							
							<div class="col-md-12 pad">
																
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Class </label>
												<?php
													echo $this->Form->input('master_class_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 class_change','options'=>$masterClasses,'style'=>'width:100%;']);
												?>
												<label class="error" for="master-class-id"></label>
										</div>
									</div>
									 <div class="col-md-3" id="section">
										<div class="form-group">
											 <label class="">Section</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2 section_change','options'=>$options,'style'=>'width:100%;']); ?>
											<label class="error" for="master-section-id"></label>
										</div>
									</div>
								<div id="all">
									 <div class="col-md-3" id="subject">
										<div class="form-group">
											 <label class="">Subject</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_subject_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
											<label class="error" for="master-subject-id"></label>
										</div>
									</div> 
									<div class="col-md-3" id="student" style="display:none;">
										<div class="form-group">
											 <label class="">Student</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('students', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
											<label class="error" for="students"></label>
										</div>
									</div>
								</div>
								 
							</div>
							
						
						<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Description </label>
										<?php echo $this->Form->input('description', ['label' => false,'placeholder'=>'Description','class'=>'form-control','type'=>'textarea','style'=>'resize:none;','rows'=>'2']); ?>
										</div>
									</div>
								   <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Attach file </label>
											<?= $this->Form->file('assignment_file') ?>
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
			
				$(document).on('change', '.assignment_type', function(){   
					var type= $(this).val();
					if(type=='Class'){
						$('#student').hide();
					}else{
						$('#student').show();
					}
				});
				
				$(document).on('change', '.section_change', function(){   
					 var class_id= $('.class_change').val();
					 var assignment_type= $('.assignment_type').val();
					 var section_id= $(this).val();
					 var url='".$this->Url->build(['controller'=>'assignments','action'=>'classsectionall'])."';
					url=url+'/'+class_id+'/'+section_id+'/'+assignment_type;
					$.ajax({ 
						url:url,
						type:'GET',
						}).done(function(response){  
						$('#all').html(response);
						$('select[name=master_subject_id]').select2();
						$('.student').select2();
					}); 
					 
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
						topic:{
							required:true,
						},
						assignment_type:{
							required:true,
						},
						assignment_date:{
							required:true,
						},
						master_class_id:{
							required:true,
						},
					   master_section_id:{
							required:true,
						},
					  master_subject_id:{
							required:true,
						},
					  description:{
							required:true,
						}
					},
					messages:{
						
					}
				});
			});
		";
		echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>
		






