<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterSection $masterSection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterSection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterSection->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterSections form large-9 medium-8 columns content">
    <?= $this->Form->create($masterSection) ?>
    <fieldset>
        <legend><?= __('Edit Master Section') ?></legend>
        <?php
            echo $this->Form->control('section_name');
            echo $this->Form->control('flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
