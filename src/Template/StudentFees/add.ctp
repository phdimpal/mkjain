<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentFee $studentFee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Student Fees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="studentFees form large-9 medium-8 columns content">
    <?= $this->Form->create($studentFee) ?>
    <fieldset>
        <legend><?= __('Add Student Fee') ?></legend>
        <?php
            echo $this->Form->control('student_id');
            echo $this->Form->control('total_fee');
            echo $this->Form->control('due_fee');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
