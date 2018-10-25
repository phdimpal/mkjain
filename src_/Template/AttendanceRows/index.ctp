<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRow[]|\Cake\Collection\CollectionInterface $attendanceRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attendance Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendances'), ['controller' => 'Attendances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendance'), ['controller' => 'Attendances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendanceRows index large-9 medium-8 columns content">
    <h3><?= __('Attendance Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendance_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendance_mark') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendanceRows as $attendanceRow): ?>
            <tr>
                <td><?= $this->Number->format($attendanceRow->id) ?></td>
                <td><?= $attendanceRow->has('attendance') ? $this->Html->link($attendanceRow->attendance->id, ['controller' => 'Attendances', 'action' => 'view', $attendanceRow->attendance->id]) : '' ?></td>
                <td><?= $this->Number->format($attendanceRow->student_id) ?></td>
                <td><?= h($attendanceRow->attendance_mark) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendanceRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendanceRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendanceRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceRow->id)]) ?>
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
