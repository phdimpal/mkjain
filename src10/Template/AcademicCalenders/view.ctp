<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicCalender $academicCalender
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Academic Calender'), ['action' => 'edit', $academicCalender->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Academic Calender'), ['action' => 'delete', $academicCalender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicCalender->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Academic Calenders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Academic Calender'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Categories'), ['controller' => 'MasterCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Category'), ['controller' => 'MasterCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="academicCalenders view large-9 medium-8 columns content">
    <h3><?= h($academicCalender->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Category') ?></th>
            <td><?= $academicCalender->has('master_category') ? $this->Html->link($academicCalender->master_category->id, ['controller' => 'MasterCategories', 'action' => 'view', $academicCalender->master_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($academicCalender->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($academicCalender->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calender Date') ?></th>
            <td><?= h($academicCalender->calender_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($academicCalender->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($academicCalender->updated_on) ?></td>
        </tr>
    </table>
</div>
