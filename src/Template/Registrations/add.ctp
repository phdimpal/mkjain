<!--<div class="registrations form large-9 medium-8 columns content">
    <?= $this->Form->create($registration) ?>
    <fieldset>
        <legend><?= __('Add Registration') ?></legend>
        <?php
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('roll_no');
            echo $this->Form->control('name');
            echo $this->Form->control('dob');
            echo $this->Form->control('father_name');
            echo $this->Form->control('mother_name');
            echo $this->Form->control('father_mobile_no');
            echo $this->Form->control('mother_mobile_no');
            echo $this->Form->control('student_mobile_no');
            echo $this->Form->control('teacher_mobile_no');
            echo $this->Form->control('address');
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_medium_id');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('profile_pic');
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
<div class="col-md-12">
<?php echo $this->Form->create($registration, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="box box-primary">
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
										echo $this->Form->input('master_role_id', ['empty'=> '--Select--','data-placeholder'=>'Select role','label' => false,'class'=>'form-control select2','options'=>$masterRoles,'style'=>'width:100%;']);
										?>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Class </label>
												<?php
													echo $this->Form->input('master_class_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2','options'=>$masterClasses,'style'=>'width:100%;']);
												?>
										</div>
									</div>
									 <div class="col-md-4">
										<div class="form-group">
											 <label class="">Section</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
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
												<?php echo $this->Form->input('dob', ['label' => false,'placeholder'=>'','class'=>'form-control']); ?>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Father Mobile no. </label>
												<?php echo $this->Form->input('father_name', ['label' => false,'placeholder'=>'Father Mobile','class'=>'form-control']); ?>
										</div>
									</div>
									
								 
							</div>
						<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Mother Mobile no. </label>
										<?php echo $this->Form->input('mother_mobile_no', ['label' => false,'placeholder'=>'Mother Mobile','class'=>'form-control']); ?>
										</div>
									</div>
								   
								  
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Student Mobile no. </label>
												<?php echo $this->Form->input('student_mobile_no', ['label' => false,'placeholder'=>'Student Mobile','class'=>'form-control']); ?>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Teacher Mobile no. </label>
												<?php echo $this->Form->input('teacher_mobile_no', ['label' => false,'placeholder'=>'Teacher Mobile','class'=>'form-control']); ?>
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
								  
							</div>
						
					</div>
			</div>
			<div class="box-footer">
				<center>
				
				<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']).__(' Submit') ,['class'=>'btn btn-success','type'=>'Submit','id'=>'submit_member','name'=>'registration_submit']);
					   ?>
				</center>
			</div>
			</div>
			<?php echo $this->Form->end(); ?>
			</div>
