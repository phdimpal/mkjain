<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Syllabus $syllabus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Syllabus'), ['action' => 'edit', $syllabus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Syllabus'), ['action' => 'delete', $syllabus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllabus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllabus'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="syllabuses view large-9 medium-8 columns content">
    <h3><?= h($syllabus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $syllabus->has('master_class') ? $this->Html->link($syllabus->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $syllabus->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $syllabus->has('master_section') ? $this->Html->link($syllabus->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $syllabus->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Subject') ?></th>
            <td><?= $syllabus->has('master_subject') ? $this->Html->link($syllabus->master_subject->id, ['controller' => 'MasterSubjects', 'action' => 'view', $syllabus->master_subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Syllabus File') ?></th>
            <td><?= h($syllabus->syllabus_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($syllabus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($syllabus->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($syllabus->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($syllabus->updated_on) ?></td>
        </tr>
    </table>
</div>
