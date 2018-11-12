<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gallery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gallery Rows'), ['controller' => 'GalleryRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gallery Row'), ['controller' => 'GalleryRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galleries form large-9 medium-8 columns content">
    <?= $this->Form->create($gallery) ?>
    <fieldset>
        <legend><?= __('Edit Gallery') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('image_url');
            echo $this->Form->control('media_date');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
