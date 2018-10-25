<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notifications view large-9 medium-8 columns content">
    <h3><?= h($notification->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Notify Link') ?></th>
            <td><?= h($notification->notify_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($notification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($notification->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($notification->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($notification->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notify Date') ?></th>
            <td><?= h($notification->notify_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notify Time') ?></th>
            <td><?= h($notification->notify_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($notification->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($notification->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($notification->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($notification->message)); ?>
    </div>
</div>
