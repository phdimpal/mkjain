<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryRow[]|\Cake\Collection\CollectionInterface $galleryRows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gallery Row'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galleryRows index large-9 medium-8 columns content">
    <h3><?= __('Gallery Rows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gallery_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gallery_pic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($galleryRows as $galleryRow): ?>
            <tr>
                <td><?= $this->Number->format($galleryRow->id) ?></td>
                <td><?= $galleryRow->has('gallery') ? $this->Html->link($galleryRow->gallery->title, ['controller' => 'Galleries', 'action' => 'view', $galleryRow->gallery->id]) : '' ?></td>
                <td><?= $this->Number->format($galleryRow->gallery_pic) ?></td>
                <td><?= $this->Number->format($galleryRow->flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $galleryRow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galleryRow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galleryRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryRow->id)]) ?>
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
