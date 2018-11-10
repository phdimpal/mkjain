<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendance'), ['action' => 'edit', $attendance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendance'), ['action' => 'delete', $attendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attendance Rows'), ['controller' => 'AttendanceRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendance Row'), ['controller' => 'AttendanceRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attendances view large-9 medium-8 columns content">
    <h3><?= h($attendance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $attendance->has('master_role') ? $this->Html->link($attendance->master_role->role_name, ['controller' => 'MasterRoles', 'action' => 'view', $attendance->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration') ?></th>
            <td><?= $attendance->has('registration') ? $this->Html->link($attendance->registration->name, ['controller' => 'Registrations', 'action' => 'view', $attendance->registration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $attendance->has('master_class') ? $this->Html->link($attendance->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $attendance->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $attendance->has('master_section') ? $this->Html->link($attendance->master_section->section_name, ['controller' => 'MasterSections', 'action' => 'view', $attendance->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($attendance->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($attendance->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($attendance->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendance Date') ?></th>
            <td><?= h($attendance->attendance_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($attendance->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($attendance->updated_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attendance Rows') ?></h4>
        <?php if (!empty($attendance->attendance_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Attendance Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Attendance Mark') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attendance->attendance_rows as $attendanceRows): ?>
            <tr>
                <td><?= h($attendanceRows->id) ?></td>
                <td><?= h($attendanceRows->attendance_id) ?></td>
                <td><?= h($attendanceRows->student_id) ?></td>
                <td><?= h($attendanceRows->attendance_mark) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AttendanceRows', 'action' => 'view', $attendanceRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AttendanceRows', 'action' => 'edit', $attendanceRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AttendanceRows', 'action' => 'delete', $attendanceRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
