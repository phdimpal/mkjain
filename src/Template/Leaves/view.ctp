<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Leave'), ['action' => 'edit', $leave->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Leave'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leaves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leaves view large-9 medium-8 columns content">
    <h3><?= h($leave->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($leave->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration') ?></th>
            <td><?= $leave->has('registration') ? $this->Html->link($leave->registration->name, ['controller' => 'Registrations', 'action' => 'view', $leave->registration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leave->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason') ?></th>
            <td><?= $this->Number->format($leave->reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Days') ?></th>
            <td><?= $this->Number->format($leave->no_of_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved By') ?></th>
            <td><?= $this->Number->format($leave->approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($leave->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($leave->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($leave->to_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($leave->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($leave->updated_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved Date') ?></th>
            <td><?= h($leave->approved_date) ?></td>
        </tr>
    </table>
</div>
