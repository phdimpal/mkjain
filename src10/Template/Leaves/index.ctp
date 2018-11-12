<section class="content-header">
	<h1>Leaves</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Leaves</li>
	</ol>
</section>
	
	 <section class="content">
	 
		<div class="row">
<div class="col-md-12">
	<div class="box box-danger">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Leaves</h3>
		</div>
		<div class="box-body">
		
			<div class="col-sm-12 no-print">
				<div class="table-responsive no-padding">
		
					<table class="table table-bordered table-striped"  id="leavedata">
						<thead >
							<tr>
								<th>S.No.</th>
								<th>Leave By</th>
								<th>From Date</th>
								<th>To Date</th>
								<th>Reason</th>
								<th>Status</th>
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
						 foreach($leaves as $leave) {
							
							
						?>
							<tr>
						    	<td><?php echo ++$sr_no; ?></td>
								<td><?= $leave->registration->name ?></td>
								<td><?= h(date("d-m-Y",strtotime($leave->from_date))) ?></td>
								<td><?= h(date("d-m-Y",strtotime($leave->to_date))) ?></td>
								<td><?= h($leave->reason) ?></td>
								<td><?= h($leave->status) ?></td>
								<td>
								<?= $this->Form->postLink(__('Approve'), ['action' => 'approve', $leave->id], ['class' => 'btn btn-sm btn-primary','confirm' => __('Are you sure you want to approve leave ?', $leave->id)]) ?> 
								<?= $this->Form->postLink(__('Reject'), ['action' => 'reject', $leave->id], ['class' => 'btn btn-sm btn-danger','confirm' => __('Are you sure you want to reject leave ?', $leave->id)]) ?> 
								</td>
								
							</tr>
							<?php }  ?>
							</tbody>
					</table>
				</div>
			</div>
			<?php if(!empty($leaves)) { ?>
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
<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
<?php  $js="
		$(document).ready(function(){
			$('#leavedata').DataTable();	
			});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	





