<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Registration View</h3>
		</div>
		<div class="box-body">
		
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
								<?php  echo $this->Html->link('Edit', 
								array('controller' => 'Registrations', 'action' => 'edit',$registration->id),
								['class' => 'btn btn-sm btn-primary','escape'=>false]); ?>
								
								
								<?php
								echo $this->Form->postLink(
									'Delete',
									['controller' => 'Registrations', 'action' => 'delete', $registration->id],
									['class' => 'btn btn-sm btn-danger',
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




