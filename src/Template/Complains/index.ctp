<section class="content-header">
	<h1>Complains / Feedback</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Complains / Feedback</li>
	</ol>
</section>
	
	 <section class="content">
	 
		<div class="row">
<div class="col-md-12">
	<div class="box box-danger">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Complains / Feedback</h3>
		</div>
		<div class="box-body">
		
			<div class="col-sm-12 no-print">
				<div class="table-responsive no-padding">
		
					<table class="table table-bordered table-striped" id="colpandata">
						<thead>
							 <tr>
								<th>S.No.</th>
								<th>Complain Type</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile No</th>
								<th>Class</th>
								<th>Section</th>
								<th>Complain By</th>
								<th>Description</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						
						if(!empty($page)){
							$sr_no=$page*50-50;
						}else{
							$sr_no=0;
						}
						 foreach($complains as $complain) {
							
							
						?>
							<tr>
								<td><?php echo ++$sr_no; ?></td>
								<td><?= h($complain->complain_type->name) ?></td>
								<td><?= h($complain->name) ?></td>
								<td><?= h($complain->email_id) ?></td>
								<td><?= h($complain->mobile_no) ?></td>
								<td><?= $complain->master_class->class_name ?></td>
								<td><?= $complain->master_section->section_name ?></td>
								<td><?= $complain->registration->name ?></td>
								<td><?= h($complain->query_reason) ?></td>
							</tr>
							<?php }  ?>
							</tbody>
					</table>
				</div>
			</div>
			<?php if(!empty($complains)) { ?>
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
			$('#colpandata').DataTable();	
			});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	


