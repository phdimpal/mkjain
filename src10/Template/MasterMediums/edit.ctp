<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterMedium $masterMedium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterMedium->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterMedium->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Mediums'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterMediums form large-9 medium-8 columns content">
    <?= $this->Form->create($masterMedium) ?>
    <fieldset>
        <legend><?= __('Edit Master Medium') ?></legend>
        <?php
            echo $this->Form->control('medium_name');
            echo $this->Form->control('flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
