<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicCalender[]|\Cake\Collection\CollectionInterface $academicCalenders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Academic Calender'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Categories'), ['controller' => 'MasterCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Category'), ['controller' => 'MasterCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="academicCalenders index large-9 medium-8 columns content">
    <h3><?= __('Academic Calenders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calender_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($academicCalenders as $academicCalender): ?>
            <tr>
                <td><?= $this->Number->format($academicCalender->id) ?></td>
                <td><?= $academicCalender->has('master_category') ? $this->Html->link($academicCalender->master_category->id, ['controller' => 'MasterCategories', 'action' => 'view', $academicCalender->master_category->id]) : '' ?></td>
                <td><?= h($academicCalender->title) ?></td>
                <td><?= h($academicCalender->calender_date) ?></td>
                <td><?= h($academicCalender->created_on) ?></td>
                <td><?= h($academicCalender->updated_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $academicCalender->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $academicCalender->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $academicCalender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicCalender->id)]) ?>
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
