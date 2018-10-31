<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassSectionMapping $classSectionMapping
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Class Section Mapping'), ['action' => 'edit', $classSectionMapping->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Class Section Mapping'), ['action' => 'delete', $classSectionMapping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classSectionMapping->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Class Section Mappings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Section Mapping'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classSectionMappings view large-9 medium-8 columns content">
    <h3><?= h($classSectionMapping->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $classSectionMapping->has('master_class') ? $this->Html->link($classSectionMapping->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $classSectionMapping->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $classSectionMapping->has('master_section') ? $this->Html->link($classSectionMapping->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $classSectionMapping->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Subject') ?></th>
            <td><?= $classSectionMapping->has('master_subject') ? $this->Html->link($classSectionMapping->master_subject->id, ['controller' => 'MasterSubjects', 'action' => 'view', $classSectionMapping->master_subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($classSectionMapping->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Medium Id') ?></th>
            <td><?= $this->Number->format($classSectionMapping->master_medium_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($classSectionMapping->is_deleted) ?></td>
        </tr>
    </table>
</div>
