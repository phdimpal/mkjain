<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRow $attendanceRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendance Row'), ['action' => 'edit', $attendanceRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendance Row'), ['action' => 'delete', $attendanceRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendance Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendance Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attendances'), ['controller' => 'Attendances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendance'), ['controller' => 'Attendances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attendanceRows view large-9 medium-8 columns content">
    <h3><?= h($attendanceRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attendance') ?></th>
            <td><?= $attendanceRow->has('attendance') ? $this->Html->link($attendanceRow->attendance->id, ['controller' => 'Attendances', 'action' => 'view', $attendanceRow->attendance->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendance Mark') ?></th>
            <td><?= h($attendanceRow->attendance_mark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendanceRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Id') ?></th>
            <td><?= $this->Number->format($attendanceRow->student_id) ?></td>
        </tr>
    </table>
</div>
