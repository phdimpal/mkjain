<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterCategory[]|\Cake\Collection\CollectionInterface $masterCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Academic Calenders'), ['controller' => 'AcademicCalenders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Academic Calender'), ['controller' => 'AcademicCalenders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterCategories index large-9 medium-8 columns content">
    <h3><?= __('Master Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterCategories as $masterCategory): ?>
            <tr>
                <td><?= $this->Number->format($masterCategory->id) ?></td>
                <td><?= h($masterCategory->category_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterCategory->id)]) ?>
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
