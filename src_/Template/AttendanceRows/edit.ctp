<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRow $attendanceRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendanceRow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceRow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attendance Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Attendances'), ['controller' => 'Attendances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendance'), ['controller' => 'Attendances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendanceRows form large-9 medium-8 columns content">
    <?= $this->Form->create($attendanceRow) ?>
    <fieldset>
        <legend><?= __('Edit Attendance Row') ?></legend>
        <?php
            echo $this->Form->control('attendance_id', ['options' => $attendances]);
            echo $this->Form->control('student_id');
            echo $this->Form->control('attendance_mark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
