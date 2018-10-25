<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery[]|\Cake\Collection\CollectionInterface $galleries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gallery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gallery Rows'), ['controller' => 'GalleryRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gallery Row'), ['controller' => 'GalleryRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galleries index large-9 medium-8 columns content">
    <h3><?= __('Galleries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('media_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($galleries as $gallery): ?>
            <tr>
                <td><?= $this->Number->format($gallery->id) ?></td>
                <td><?= h($gallery->image_url) ?></td>
                <td><?= h($gallery->media_date) ?></td>
                <td><?= h($gallery->created_on) ?></td>
                <td><?= h($gallery->updated_on) ?></td>
                <td><?= $this->Number->format($gallery->is_deleted) ?></td>
                <td><?= $this->Number->format($gallery->created_by) ?></td>
                <td><?= $this->Number->format($gallery->edited_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gallery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]) ?>
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
