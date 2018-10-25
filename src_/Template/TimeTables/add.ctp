<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeTable $timeTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Time Tables'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTables form large-9 medium-8 columns content">
    <?= $this->Form->create($timeTable) ?>
    <fieldset>
        <legend><?= __('Add Time Table') ?></legend>
        <?php
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_subject_id', ['options' => $masterSubjects]);
            echo $this->Form->control('registration_id', ['options' => $registrations]);
            echo $this->Form->control('week_name');
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
            echo $this->Form->control('number_of_minute');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
