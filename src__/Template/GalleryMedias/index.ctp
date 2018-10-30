<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryMedia[]|\Cake\Collection\CollectionInterface $galleryMedias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gallery Media'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galleryMedias index large-9 medium-8 columns content">
    <h3><?= __('Gallery Medias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
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
            <?php foreach ($galleryMedias as $galleryMedia): ?>
            <tr>
                <td><?= $this->Number->format($galleryMedia->id) ?></td>
                <td><?= h($galleryMedia->title) ?></td>
                <td><?= h($galleryMedia->image_url) ?></td>
                <td><?= h($galleryMedia->type) ?></td>
                <td><?= h($galleryMedia->media_date) ?></td>
                <td><?= h($galleryMedia->created_on) ?></td>
                <td><?= h($galleryMedia->updated_on) ?></td>
                <td><?= $this->Number->format($galleryMedia->is_deleted) ?></td>
                <td><?= $this->Number->format($galleryMedia->created_by) ?></td>
                <td><?= $this->Number->format($galleryMedia->edited_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $galleryMedia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galleryMedia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galleryMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryMedia->id)]) ?>
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
