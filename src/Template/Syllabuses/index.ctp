<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Syllabus[]|\Cake\Collection\CollectionInterface $syllabuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Syllabus'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="syllabuses index large-9 medium-8 columns content">
    <h3><?= __('Syllabuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('syllabus_file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($syllabuses as $syllabus): ?>
            <tr>
                <td><?= $this->Number->format($syllabus->id) ?></td>
                <td><?= $syllabus->has('master_class') ? $this->Html->link($syllabus->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $syllabus->master_class->id]) : '' ?></td>
                <td><?= $syllabus->has('master_section') ? $this->Html->link($syllabus->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $syllabus->master_section->id]) : '' ?></td>
                <td><?= $syllabus->has('master_subject') ? $this->Html->link($syllabus->master_subject->id, ['controller' => 'MasterSubjects', 'action' => 'view', $syllabus->master_subject->id]) : '' ?></td>
                <td><?= h($syllabus->syllabus_file) ?></td>
                <td><?= h($syllabus->created_on) ?></td>
                <td><?= h($syllabus->updated_on) ?></td>
                <td><?= $this->Number->format($syllabus->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $syllabus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $syllabus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $syllabus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllabus->id)]) ?>
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
