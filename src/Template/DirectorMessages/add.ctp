<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DirectorMessage $directorMessage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Director Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="directorMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($directorMessage) ?>
    <fieldset>
        <legend><?= __('Add Director Message') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('discription');
            echo $this->Form->control('image');
            echo $this->Form->control('created_on');
            echo $this->Form->control('updated_on');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('is_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
