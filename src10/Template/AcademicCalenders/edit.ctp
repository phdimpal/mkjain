<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicCalender $academicCalender
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $academicCalender->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $academicCalender->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Academic Calenders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Categories'), ['controller' => 'MasterCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Category'), ['controller' => 'MasterCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="academicCalenders form large-9 medium-8 columns content">
    <?= $this->Form->create($academicCalender) ?>
    <fieldset>
        <legend><?= __('Edit Academic Calender') ?></legend>
        <?php
            echo $this->Form->control('master_category_id', ['options' => $masterCategories]);
            echo $this->Form->control('title');
            echo $this->Form->control('calender_date');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
