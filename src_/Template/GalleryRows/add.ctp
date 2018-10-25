<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryRow $galleryRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gallery Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galleryRows form large-9 medium-8 columns content">
    <?= $this->Form->create($galleryRow) ?>
    <fieldset>
        <legend><?= __('Add Gallery Row') ?></legend>
        <?php
            echo $this->Form->control('gallery_id', ['options' => $galleries]);
            echo $this->Form->control('gallery_pic');
            echo $this->Form->control('flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
