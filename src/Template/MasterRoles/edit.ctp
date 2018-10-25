<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterRole $masterRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($masterRole) ?>
    <fieldset>
        <legend><?= __('Edit Master Role') ?></legend>
        <?php
            echo $this->Form->control('role_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
