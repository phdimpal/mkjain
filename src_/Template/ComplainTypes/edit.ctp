<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComplainType $complainType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $complainType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $complainType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Complain Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Complains'), ['controller' => 'Complains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Complain'), ['controller' => 'Complains', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="complainTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($complainType) ?>
    <fieldset>
        <legend><?= __('Edit Complain Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
