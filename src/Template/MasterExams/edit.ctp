<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterExam $masterExam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterExam->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterExam->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Exams'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="masterExams form large-9 medium-8 columns content">
    <?= $this->Form->create($masterExam) ?>
    <fieldset>
        <legend><?= __('Edit Master Exam') ?></legend>
        <?php
            echo $this->Form->control('exam_type');
            echo $this->Form->control('flag');
            echo $this->Form->control('class_id');
            echo $this->Form->control('section_id');
            echo $this->Form->control('subject_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
