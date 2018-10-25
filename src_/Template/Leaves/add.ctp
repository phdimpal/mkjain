<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Leaves'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leaves form large-9 medium-8 columns content">
    <?= $this->Form->create($leave) ?>
    <fieldset>
        <legend><?= __('Add Leave') ?></legend>
        <?php
            echo $this->Form->control('from_date');
            echo $this->Form->control('to_date');
            echo $this->Form->control('reason');
            echo $this->Form->control('status');
            echo $this->Form->control('registration_id', ['options' => $registrations]);
            echo $this->Form->control('no_of_days');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('approved_date');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
