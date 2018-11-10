<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complain $complain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Complains'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Complain Types'), ['controller' => 'ComplainTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Complain Type'), ['controller' => 'ComplainTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="complains form large-9 medium-8 columns content">
    <?= $this->Form->create($complain) ?>
    <fieldset>
        <legend><?= __('Add Complain') ?></legend>
        <?php
            echo $this->Form->control('complain_type_id', ['options' => $complainTypes]);
            echo $this->Form->control('name');
            echo $this->Form->control('email_id');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('query_reason');
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('registration_id', ['options' => $registrations]);
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
