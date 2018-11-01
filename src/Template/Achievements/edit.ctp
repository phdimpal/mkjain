<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement $achievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $achievement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Achievements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="achievements form large-9 medium-8 columns content">
    <?= $this->Form->create($achievement) ?>
    <fieldset>
        <legend><?= __('Edit Achievement') ?></legend>
        <?php
            echo $this->Form->control('achivement_year');
            echo $this->Form->control('student_id', ['options' => $registrations]);
            echo $this->Form->control('achivement');
            echo $this->Form->control('achivement_rank');
            echo $this->Form->control('achivement_date');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
