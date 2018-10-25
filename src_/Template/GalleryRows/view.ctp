<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryRow $galleryRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gallery Row'), ['action' => 'edit', $galleryRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gallery Row'), ['action' => 'delete', $galleryRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gallery Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="galleryRows view large-9 medium-8 columns content">
    <h3><?= h($galleryRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Gallery') ?></th>
            <td><?= $galleryRow->has('gallery') ? $this->Html->link($galleryRow->gallery->title, ['controller' => 'Galleries', 'action' => 'view', $galleryRow->gallery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($galleryRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gallery Pic') ?></th>
            <td><?= $this->Number->format($galleryRow->gallery_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag') ?></th>
            <td><?= $this->Number->format($galleryRow->flag) ?></td>
        </tr>
    </table>
</div>
