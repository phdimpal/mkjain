<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterYear $masterYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterYear->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterYear->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Years'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="masterYears form large-9 medium-8 columns content">
    <?= $this->Form->create($masterYear) ?>
    <fieldset>
        <legend><?= __('Edit Master Year') ?></legend>
        <?php
            echo $this->Form->control('year_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
