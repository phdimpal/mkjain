<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterSubject $masterSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($masterSubject) ?>
    <fieldset>
        <legend><?= __('Add Master Subject') ?></legend>
        <?php
            echo $this->Form->control('subject_name');
            echo $this->Form->control('flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
