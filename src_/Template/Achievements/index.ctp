<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement[]|\Cake\Collection\CollectionInterface $achievements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Achievement'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="achievements index large-9 medium-8 columns content">
    <h3><?= __('Achievements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('achivement_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('achivement_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('achivement_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($achievements as $achievement): ?>
            <tr>
                <td><?= $this->Number->format($achievement->id) ?></td>
                <td><?= h($achievement->achivement_year) ?></td>
                <td><?= $this->Number->format($achievement->student_id) ?></td>
                <td><?= h($achievement->achivement_rank) ?></td>
                <td><?= h($achievement->achivement_date) ?></td>
                <td><?= h($achievement->created_on) ?></td>
                <td><?= h($achievement->updated_on) ?></td>
                <td><?= $this->Number->format($achievement->created_by) ?></td>
                <td><?= $this->Number->format($achievement->edited_by) ?></td>
                <td><?= $this->Number->format($achievement->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $achievement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $achievement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $achievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]) ?>
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
