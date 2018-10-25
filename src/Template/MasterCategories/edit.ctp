<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterCategory $masterCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Academic Calenders'), ['controller' => 'AcademicCalenders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Academic Calender'), ['controller' => 'AcademicCalenders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($masterCategory) ?>
    <fieldset>
        <legend><?= __('Edit Master Category') ?></legend>
        <?php
            echo $this->Form->control('category_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
