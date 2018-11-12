<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable[]|\Cake\Collection\CollectionInterface $timeTables
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Time Table'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTables index large-9 medium-8 columns content">
    <h3><?= __('Time Tables') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('week_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_minute') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeTables as $timeTable): ?>
            <tr>
                <td><?= $this->Number->format($timeTable->id) ?></td>
                <td><?= $timeTable->has('master_role') ? $this->Html->link($timeTable->master_role->role_name, ['controller' => 'MasterRoles', 'action' => 'view', $timeTable->master_role->id]) : '' ?></td>
                <td><?= $timeTable->has('master_class') ? $this->Html->link($timeTable->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $timeTable->master_class->id]) : '' ?></td>
                <td><?= $timeTable->has('master_section') ? $this->Html->link($timeTable->master_section->section_name, ['controller' => 'MasterSections', 'action' => 'view', $timeTable->master_section->id]) : '' ?></td>
                <td><?= $timeTable->has('master_subject') ? $this->Html->link($timeTable->master_subject->subject_name, ['controller' => 'MasterSubjects', 'action' => 'view', $timeTable->master_subject->id]) : '' ?></td>
                <td><?= h($timeTable->teacher_name) ?></td>
                <td><?= $timeTable->has('registration') ? $this->Html->link($timeTable->registration->name, ['controller' => 'Registrations', 'action' => 'view', $timeTable->registration->id]) : '' ?></td>
                <td><?= h($timeTable->week_name) ?></td>
                <td><?= h($timeTable->start_time) ?></td>
                <td><?= h($timeTable->end_time) ?></td>
                <td><?= $this->Number->format($timeTable->number_of_minute) ?></td>
                <td><?= h($timeTable->created_on) ?></td>
                <td><?= h($timeTable->updated_on) ?></td>
                <td><?= $this->Number->format($timeTable->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeTable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeTable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTable->id)]) ?>
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
