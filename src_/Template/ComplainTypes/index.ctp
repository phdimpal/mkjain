<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComplainType[]|\Cake\Collection\CollectionInterface $complainTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Complain Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Complains'), ['controller' => 'Complains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Complain'), ['controller' => 'Complains', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="complainTypes index large-9 medium-8 columns content">
    <h3><?= __('Complain Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($complainTypes as $complainType): ?>
            <tr>
                <td><?= $this->Number->format($complainType->id) ?></td>
                <td><?= h($complainType->name) ?></td>
                <td><?= h($complainType->created_on) ?></td>
                <td><?= h($complainType->updated_on) ?></td>
                <td><?= $this->Number->format($complainType->created_by) ?></td>
                <td><?= $this->Number->format($complainType->edited_by) ?></td>
                <td><?= $this->Number->format($complainType->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $complainType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $complainType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $complainType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complainType->id)]) ?>
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
