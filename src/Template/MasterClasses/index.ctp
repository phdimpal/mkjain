<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClass[]|\Cake\Collection\CollectionInterface $masterClasses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClasses index large-9 medium-8 columns content">
    <h3><?= __('Master Classes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roman') ?></th>
                <th scope="col"><?= $this->Paginator->sort('flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterClasses as $masterClass): ?>
            <tr>
                <td><?= $this->Number->format($masterClass->id) ?></td>
                <td><?= h($masterClass->class_name) ?></td>
                <td><?= h($masterClass->roman) ?></td>
                <td><?= $this->Number->format($masterClass->flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterClass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterClass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClass->id)]) ?>
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
