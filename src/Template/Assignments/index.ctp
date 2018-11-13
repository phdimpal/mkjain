<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment[]|\Cake\Collection\CollectionInterface $assignments
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['action' => 'add']) ?></li>
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
<div class="assignments index large-9 medium-8 columns content">
    <h3><?= __('Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignment_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignment_file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?= $this->Number->format($assignment->id) ?></td>
                <td><?= $assignment->has('master_role') ? $this->Html->link($assignment->master_role->role_name, ['controller' => 'MasterRoles', 'action' => 'view', $assignment->master_role->id]) : '' ?></td>
                <td><?= h($assignment->assignment_type) ?></td>
                <td><?= $assignment->has('master_class') ? $this->Html->link($assignment->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $assignment->master_class->id]) : '' ?></td>
                <td><?= $assignment->has('master_section') ? $this->Html->link($assignment->master_section->section_name, ['controller' => 'MasterSections', 'action' => 'view', $assignment->master_section->id]) : '' ?></td>
                <td><?= $assignment->has('master_subject') ? $this->Html->link($assignment->master_subject->subject_name, ['controller' => 'MasterSubjects', 'action' => 'view', $assignment->master_subject->id]) : '' ?></td>
                <td><?= h($assignment->assignment_date) ?></td>
                <td><?= h($assignment->assignment_file) ?></td>
                <td><?= $this->Number->format($assignment->created_by) ?></td>
                <td><?= $this->Number->format($assignment->edited_by) ?></td>
                <td><?= h($assignment->created_on) ?></td>
                <td><?= h($assignment->updated_on) ?></td>
                <td><?= $this->Number->format($assignment->is_deleted) ?></td>
                <td><?= $assignment->has('registration') ? $this->Html->link($assignment->registration->name, ['controller' => 'Registrations', 'action' => 'view', $assignment->registration->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
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
</div>-->


<section class="content-header">
	<h1>Assignments</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Assignments</li>
	</ol>
</section>
<section class="content">
	 <div class="row">
<div class="col-md-12">
	<div class="box box-danger">
		<div class="box-header with-border no-print">
			<h3 class="box-title">Assignments List</h3>
		</div>
		<div class="box-body">
		
			<div class="col-sm-12 no-print">
				<div class="table-responsive no-padding">
		
					<table class="table table-bordered table-striped dataTable" style="width: 100%;border: #00c0ef; border-spacing: 0;border-collapse: collapse;" >
						<thead style="background-color:#eee">
							 <tr>
								<th>S.No.</th>
								<th>Topic</th>
								<th>Date</th>
								<th>Class</th>
								<th>Section</th>
								<th>Subject</th>
								<th>Description</th>
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
						 foreach($assignments as $assignment) {
							
							
						?>
							<tr>
								<td><?php echo ++$sr_no; ?></td>
								  <td><?= h($assignment->topic) ?></td>
								  <td><?= date("d-m-Y",strtotime($assignment->assignment_date)) ?></td>
								  <td><?= h($assignment->master_class->class_name) ?></td>
								  <td><?= h($assignment->master_section->section_name) ?></td>
								  <td><?= h($assignment->master_subject->subject_name) ?></td>
								  <td><?= $assignment->description ?></td>
								
								<td><center>
								
								<?php echo $this->Html->link('Download', $assignment->assignment_file, array(
								'class' => 'btn btn-sm bg-olive',
								'rel'   => 'nofollow',
								'download' => $assignment->assignment_file
								)); ?>
								
								<?php
								echo $this->Form->postLink(
									'<i class="fa fa-trash"></i>',
									['controller' => 'assignments', 'action' => 'delete', $assignment->id],
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






