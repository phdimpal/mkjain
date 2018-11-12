<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentFee $studentFee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student Fee'), ['action' => 'edit', $studentFee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student Fee'), ['action' => 'delete', $studentFee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentFee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Student Fees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Fee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="studentFees view large-9 medium-8 columns content">
    <h3><?= h($studentFee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($studentFee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Id') ?></th>
            <td><?= $this->Number->format($studentFee->student_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Fee') ?></th>
            <td><?= $this->Number->format($studentFee->total_fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Due Fee') ?></th>
            <td><?= $this->Number->format($studentFee->due_fee) ?></td>
        </tr>
    </table>
</div>
