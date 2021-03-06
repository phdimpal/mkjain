<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClass $masterClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($masterClass) ?>
    <fieldset>
        <legend><?= __('Add Master Class') ?></legend>
        <?php
            echo $this->Form->control('class_name');
            echo $this->Form->control('roman');
            echo $this->Form->control('flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
