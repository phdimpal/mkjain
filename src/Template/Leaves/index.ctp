<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Leaves</h3>
		</div>
		<div class="box-body">
		
			<div class="col-sm-12 no-print">
				<div class="table-responsive no-padding">
		
					<table class="table table-bordered table-striped dataTable" style="width: 100%;border: #00c0ef; border-spacing: 0;border-collapse: collapse;" >
						<thead style="background-color:#eee">
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





