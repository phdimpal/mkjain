<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterExam[]|\Cake\Collection\CollectionInterface $masterExams
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Exam'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterExams index large-9 medium-8 columns content">
    <h3><?= __('Master Exams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterExams as $masterExam): ?>
            <tr>
                <td><?= $this->Number->format($masterExam->id) ?></td>
                <td><?= h($masterExam->exam_type) ?></td>
                <td><?= $this->Number->format($masterExam->flag) ?></td>
                <td><?= $this->Number->format($masterExam->class_id) ?></td>
                <td><?= $this->Number->format($masterExam->section_id) ?></td>
                <td><?= $this->Number->format($masterExam->subject_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterExam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterExam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterExam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterExam->id)]) ?>
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
