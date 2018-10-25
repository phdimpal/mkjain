<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComplainType $complainType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Complain Type'), ['action' => 'edit', $complainType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Complain Type'), ['action' => 'delete', $complainType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complainType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Complain Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Complain Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Complains'), ['controller' => 'Complains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Complain'), ['controller' => 'Complains', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="complainTypes view large-9 medium-8 columns content">
    <h3><?= h($complainType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($complainType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($complainType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($complainType->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($complainType->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($complainType->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($complainType->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($complainType->updated_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Complains') ?></h4>
        <?php if (!empty($complainType->complains)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Complain Type Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email Id') ?></th>
                <th scope="col"><?= __('Mobile No') ?></th>
                <th scope="col"><?= __('Master Class Id') ?></th>
                <th scope="col"><?= __('Master Section Id') ?></th>
                <th scope="col"><?= __('Query Reason') ?></th>
                <th scope="col"><?= __('Master Role Id') ?></th>
                <th scope="col"><?= __('Registration Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Updated On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($complainType->complains as $complains): ?>
            <tr>
                <td><?= h($complains->id) ?></td>
                <td><?= h($complains->complain_type_id) ?></td>
                <td><?= h($complains->name) ?></td>
                <td><?= h($complains->email_id) ?></td>
                <td><?= h($complains->mobile_no) ?></td>
                <td><?= h($complains->master_class_id) ?></td>
                <td><?= h($complains->master_section_id) ?></td>
                <td><?= h($complains->query_reason) ?></td>
                <td><?= h($complains->master_role_id) ?></td>
                <td><?= h($complains->registration_id) ?></td>
                <td><?= h($complains->created_on) ?></td>
                <td><?= h($complains->updated_on) ?></td>
                <td><?= h($complains->is_deleted) ?></td>
                <td><?= h($complains->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Complains', 'action' => 'view', $complains->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Complains', 'action' => 'edit', $complains->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Complains', 'action' => 'delete', $complains->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complains->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
