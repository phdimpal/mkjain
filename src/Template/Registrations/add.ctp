<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registrations form large-9 medium-8 columns content">
    <?= $this->Form->create($registration) ?>
    <fieldset>
        <legend><?= __('Add Registration') ?></legend>
        <?php
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('roll_no');
            echo $this->Form->control('name');
            echo $this->Form->control('dob');
            echo $this->Form->control('father_name');
            echo $this->Form->control('mother_name');
            echo $this->Form->control('father_mobile_no');
            echo $this->Form->control('mother_mobile_no');
            echo $this->Form->control('student_mobile_no');
            echo $this->Form->control('teacher_mobile_no');
            echo $this->Form->control('address');
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_medium_id');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('profile_pic');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
