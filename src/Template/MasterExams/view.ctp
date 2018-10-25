<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterExam $masterExam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Exam'), ['action' => 'edit', $masterExam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Exam'), ['action' => 'delete', $masterExam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterExam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Exams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Exam'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterExams view large-9 medium-8 columns content">
    <h3><?= h($masterExam->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exam Type') ?></th>
            <td><?= h($masterExam->exam_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterExam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag') ?></th>
            <td><?= $this->Number->format($masterExam->flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Id') ?></th>
            <td><?= $this->Number->format($masterExam->class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Id') ?></th>
            <td><?= $this->Number->format($masterExam->section_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject Id') ?></th>
            <td><?= $this->Number->format($masterExam->subject_id) ?></td>
        </tr>
    </table>
</div>
