<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complain $complain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Complain'), ['action' => 'edit', $complain->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Complain'), ['action' => 'delete', $complain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complain->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Complains'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Complain'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Complain Types'), ['controller' => 'ComplainTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Complain Type'), ['controller' => 'ComplainTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="complains view large-9 medium-8 columns content">
    <h3><?= h($complain->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Complain Type') ?></th>
            <td><?= $complain->has('complain_type') ? $this->Html->link($complain->complain_type->name, ['controller' => 'ComplainTypes', 'action' => 'view', $complain->complain_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($complain->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Id') ?></th>
            <td><?= h($complain->email_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($complain->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $complain->has('master_class') ? $this->Html->link($complain->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $complain->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $complain->has('master_section') ? $this->Html->link($complain->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $complain->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $complain->has('master_role') ? $this->Html->link($complain->master_role->id, ['controller' => 'MasterRoles', 'action' => 'view', $complain->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration') ?></th>
            <td><?= $complain->has('registration') ? $this->Html->link($complain->registration->name, ['controller' => 'Registrations', 'action' => 'view', $complain->registration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($complain->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Query Reason') ?></th>
            <td><?= $this->Number->format($complain->query_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($complain->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($complain->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($complain->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($complain->updated_on) ?></td>
        </tr>
    </table>
</div>
