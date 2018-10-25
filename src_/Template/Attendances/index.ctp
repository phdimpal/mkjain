<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance[]|\Cake\Collection\CollectionInterface $attendances
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attendance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendance Rows'), ['controller' => 'AttendanceRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendance Row'), ['controller' => 'AttendanceRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendances index large-9 medium-8 columns content">
    <h3><?= __('Attendances') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendance_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendances as $attendance): ?>
            <tr>
                <td><?= $this->Number->format($attendance->id) ?></td>
                <td><?= $attendance->has('master_role') ? $this->Html->link($attendance->master_role->id, ['controller' => 'MasterRoles', 'action' => 'view', $attendance->master_role->id]) : '' ?></td>
                <td><?= $attendance->has('registration') ? $this->Html->link($attendance->registration->name, ['controller' => 'Registrations', 'action' => 'view', $attendance->registration->id]) : '' ?></td>
                <td><?= $attendance->has('master_class') ? $this->Html->link($attendance->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $attendance->master_class->id]) : '' ?></td>
                <td><?= $attendance->has('master_section') ? $this->Html->link($attendance->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $attendance->master_section->id]) : '' ?></td>
                <td><?= h($attendance->attendance_date) ?></td>
                <td><?= $this->Number->format($attendance->created_by) ?></td>
                <td><?= $this->Number->format($attendance->edited_by) ?></td>
                <td><?= h($attendance->created_on) ?></td>
                <td><?= h($attendance->updated_on) ?></td>
                <td><?= $this->Number->format($attendance->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id)]) ?>
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
