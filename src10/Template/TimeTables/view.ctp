<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable $timeTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Table'), ['action' => 'edit', $timeTable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Table'), ['action' => 'delete', $timeTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Tables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Table'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTables view large-9 medium-8 columns content">
    <h3><?= h($timeTable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $timeTable->has('master_role') ? $this->Html->link($timeTable->master_role->role_name, ['controller' => 'MasterRoles', 'action' => 'view', $timeTable->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $timeTable->has('master_class') ? $this->Html->link($timeTable->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $timeTable->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $timeTable->has('master_section') ? $this->Html->link($timeTable->master_section->section_name, ['controller' => 'MasterSections', 'action' => 'view', $timeTable->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Subject') ?></th>
            <td><?= $timeTable->has('master_subject') ? $this->Html->link($timeTable->master_subject->subject_name, ['controller' => 'MasterSubjects', 'action' => 'view', $timeTable->master_subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Name') ?></th>
            <td><?= h($timeTable->teacher_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration') ?></th>
            <td><?= $timeTable->has('registration') ? $this->Html->link($timeTable->registration->name, ['controller' => 'Registrations', 'action' => 'view', $timeTable->registration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week Name') ?></th>
            <td><?= h($timeTable->week_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeTable->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Minute') ?></th>
            <td><?= $this->Number->format($timeTable->number_of_minute) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($timeTable->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($timeTable->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($timeTable->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($timeTable->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($timeTable->updated_on) ?></td>
        </tr>
    </table>
</div>
