<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Syllabus $syllabus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $syllabus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $syllabus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="syllabuses form large-9 medium-8 columns content">
    <?= $this->Form->create($syllabus) ?>
    <fieldset>
        <legend><?= __('Edit Syllabus') ?></legend>
        <?php
            echo $this->Form->control('master_class_id', ['options' => $masterClasses]);
            echo $this->Form->control('master_section_id', ['options' => $masterSections]);
            echo $this->Form->control('master_subject_id', ['options' => $masterSubjects]);
            echo $this->Form->control('syllabus_file');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
