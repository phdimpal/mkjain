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
	<div class="box box-danger">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Student List</h3>
		</div>
		<div class="box-body">
			<?php echo $this->Form->create($Registrations, ['type' => 'GET']); ?>
					<div class="row no-print">
						<div class="col-md-12 table-responsive">
								<div class="col-md-2">
										
										<div class="form-group">
											<label class="control-label">Enrollment no </label>
												<?php echo $this->Form->input('roll_no', ['label' => false,'placeholder'=>'Enrollment No.','class'=>'form-control']); ?>
										</div>
								
								</div>
								   <div class="col-md-2">
										
										<div class="form-group">
											<label class="control-label">Name </label>
												<?php echo $this->Form->input('name', ['label' => false,'placeholder'=>'Name','class'=>'form-control']); ?>
										</div>
								
								</div>
								   
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Class </label>
												<?php
													echo $this->Form->input('master_class_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 class_change','options'=>$masterClasses,'style'=>'width:100%;']);
												?>
										</div>
									</div>
									 <div class="col-md-3" id="section">
										<div class="form-group">
											 <label class="">Section</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;']); ?>
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label"> </label>
												<?= $this->Form->button(__(' Filter') ,['class'=>'btn btn-danger','type'=>'Submit','id'=>'submit_member','name'=>'attendance_submit','style'=>'margin-top: 25px;','value'=>'attendance']) ?>
										</div>
									</div>
								 
							</div>
						
						</div>
					</form>
			<div class="col-sm-12 no-print">
				<div class="table-responsive no-padding">
		
					<table class="table table-bordered table-striped dataTable" style="width: 100%;border: #00c0ef; border-spacing: 0;border-collapse: collapse;" >
						<thead style="background-color:#eee">
							 <tr>
								<th>S.No.</th>
								<th>Enrollment no.</th>
								<th>Name</th>
								<th>Dob</th>
								<th>Father Name</th>
								<th>Mother Name</th>
								<th>Class</th>
								<th>Section</th>
								<th>Actions</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						
						if(!empty($page)){
							$sr_no=$page*50-50;
						}else{
							$sr_no=0;
						}
						 foreach($registrations as $registration) {
							
							
						?>
							<tr>
								<td><?php echo ++$sr_no; ?></td>
								  <td><?= h($registration->roll_no) ?></td>
								  <td><?= h($registration->name) ?></td>
								  <td><?= h($registration->dob) ?></td>
								  <td><?= h($registration->father_name) ?></td>
								  <td><?= h($registration->mother_name) ?></td>
								  <td><?= $registration->master_class->class_name ?></td>
								  <td><?= $registration->master_section->section_name ?></td>
								<td><center>
								<?php  echo $this->Html->link('<i class="fa fa-pencil"></i>', 
								array('controller' => 'Registrations', 'action' => 'edit',$registration->id),
								['class' => 'btn btn-sm bg-olive','escape'=>false]); ?>
								
								
								<?php
								echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>',
									['controller' => 'Registrations', 'action' => 'delete', $registration->id],
									['class' => 'btn btn-sm bg-red',
										'escape' => false,
										'confirm' => 'Are you sure you want to delete ?']
								);
								
								
								?>
								</td>
							</tr>
							<?php }  ?>
							</tbody>
					</table>
				</div>
			</div>
			<?php if(!empty($registrations)) { ?>
			<div  class="col-sm-12 no print">
				<div class="pull-left">
					<div style="margin-top: 20px;white-space: nowrap;font-weight: 600;">
					Showing &nbsp; <?= $this->Paginator->counter(); ?></div>
				</div>
				<div class="pull-right" style="float:right;">
					<div class="paginator" style="float:right;">
						<ul class="pagination">
							<?= $this->Paginator->prev(__('Previous')) ?>
							<?= $this->Paginator->numbers() ?>
							<?= $this->Paginator->next(__('Next')) ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>	
	    </div>
	</div>
</div>
</div>
</section>

<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	 
		<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
		
		<?php  $js=" 
			
			$(document).ready(function(){ 
			$('#aattendanceview').DataTable();	
				$(document).on('change', '.class_change', function(){   
					 var state_id= $(this).val();
					var url='".$this->Url->build(['controller'=>'Registrations','action'=>'classsection'])."';
					url=url+'/'+state_id;
					$.ajax({ 
						url:url,
						type:'GET',
						}).done(function(response){  
						$('#section').html(response);
						
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
		echo $this->Html->scriptBlock($js, ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
