<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gallery'), ['action' => 'edit', $gallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gallery'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gallery Rows'), ['controller' => 'GalleryRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery Row'), ['controller' => 'GalleryRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="galleries view large-9 medium-8 columns content">
    <h3><?= h($gallery->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($gallery->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($gallery->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($gallery->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($gallery->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media Date') ?></th>
            <td><?= h($gallery->media_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($gallery->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($gallery->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($gallery->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($gallery->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Gallery Rows') ?></h4>
        <?php if (!empty($gallery->gallery_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Gallery Id') ?></th>
                <th scope="col"><?= __('Gallery Pic') ?></th>
                <th scope="col"><?= __('Flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gallery->gallery_rows as $galleryRows): ?>
            <tr>
                <td><?= h($galleryRows->id) ?></td>
                <td><?= h($galleryRows->gallery_id) ?></td>
                <td><?= h($galleryRows->gallery_pic) ?></td>
                <td><?= h($galleryRows->flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GalleryRows', 'action' => 'view', $galleryRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GalleryRows', 'action' => 'edit', $galleryRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GalleryRows', 'action' => 'delete', $galleryRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
