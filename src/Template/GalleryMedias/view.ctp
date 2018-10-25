<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryMedia $galleryMedia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gallery Media'), ['action' => 'edit', $galleryMedia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gallery Media'), ['action' => 'delete', $galleryMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryMedia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gallery Medias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery Media'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="galleryMedias view large-9 medium-8 columns content">
    <h3><?= h($galleryMedia->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($galleryMedia->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($galleryMedia->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($galleryMedia->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($galleryMedia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($galleryMedia->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($galleryMedia->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($galleryMedia->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media Date') ?></th>
            <td><?= h($galleryMedia->media_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($galleryMedia->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($galleryMedia->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($galleryMedia->description)); ?>
    </div>
</div>
