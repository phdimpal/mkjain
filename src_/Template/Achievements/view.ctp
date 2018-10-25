<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement $achievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Achievement'), ['action' => 'edit', $achievement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Achievement'), ['action' => 'delete', $achievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Achievements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Achievement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="achievements view large-9 medium-8 columns content">
    <h3><?= h($achievement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Achivement Year') ?></th>
            <td><?= h($achievement->achivement_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Achivement Rank') ?></th>
            <td><?= h($achievement->achivement_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($achievement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Id') ?></th>
            <td><?= $this->Number->format($achievement->student_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($achievement->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($achievement->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($achievement->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Achivement Date') ?></th>
            <td><?= h($achievement->achivement_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($achievement->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($achievement->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Achivement') ?></h4>
        <?= $this->Text->autoParagraph(h($achievement->achivement)); ?>
    </div>
</div>
