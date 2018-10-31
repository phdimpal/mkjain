<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave[]|\Cake\Collection\CollectionInterface $leaves
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Leave'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leaves index large-9 medium-8 columns content">
    <h3><?= __('Leaves') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approved_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaves as $leave): ?>
            <tr>
                <td><?= $this->Number->format($leave->id) ?></td>
                <td><?= h($leave->from_date) ?></td>
                <td><?= h($leave->to_date) ?></td>
                <td><?= $this->Number->format($leave->reason) ?></td>
                <td><?= h($leave->status) ?></td>
                <td><?= $leave->has('registration') ? $this->Html->link($leave->registration->name, ['controller' => 'Registrations', 'action' => 'view', $leave->registration->id]) : '' ?></td>
                <td><?= $this->Number->format($leave->no_of_days) ?></td>
                <td><?= h($leave->created_on) ?></td>
                <td><?= h($leave->updated_on) ?></td>
                <td><?= $this->Number->format($leave->approved_by) ?></td>
                <td><?= h($leave->approved_date) ?></td>
                <td><?= $this->Number->format($leave->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leave->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

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
								<th>From Date</th>
								<th>To Date</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Leave By</th>
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





