<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assignment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'index']) ?></li>
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
<div class="assignments form large-9 medium-8 columns content">
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <legend><?= __('Edit Assignment') ?></legend>
        <?php
            echo $this->Form->control('master_role_id', ['options' => $masterRoles]);
            echo $this->Form->control('assignment_type');
            echo $this->Form->control('student_id');
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_subject_id', ['options' => $masterSubjects]);
            echo $this->Form->control('topic');
            echo $this->Form->control('assignment_date');
            echo $this->Form->control('assignment_file');
            echo $this->Form->control('description');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('registration_id', ['options' => $registrations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
