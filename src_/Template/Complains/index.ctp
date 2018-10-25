<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complain[]|\Cake\Collection\CollectionInterface $complains
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Complain'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Complain Types'), ['controller' => 'ComplainTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Complain Type'), ['controller' => 'ComplainTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="complains index large-9 medium-8 columns content">
    <h3><?= __('Complains') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complain_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('query_reason') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($complains as $complain): ?>
            <tr>
                <td><?= $this->Number->format($complain->id) ?></td>
                <td><?= $complain->has('complain_type') ? $this->Html->link($complain->complain_type->name, ['controller' => 'ComplainTypes', 'action' => 'view', $complain->complain_type->id]) : '' ?></td>
                <td><?= h($complain->name) ?></td>
                <td><?= h($complain->email_id) ?></td>
                <td><?= h($complain->mobile_no) ?></td>
                <td><?= $complain->has('master_class') ? $this->Html->link($complain->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $complain->master_class->id]) : '' ?></td>
                <td><?= $complain->has('master_section') ? $this->Html->link($complain->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $complain->master_section->id]) : '' ?></td>
                <td><?= $this->Number->format($complain->query_reason) ?></td>
                <td><?= $complain->has('master_role') ? $this->Html->link($complain->master_role->id, ['controller' => 'MasterRoles', 'action' => 'view', $complain->master_role->id]) : '' ?></td>
                <td><?= $complain->has('registration') ? $this->Html->link($complain->registration->name, ['controller' => 'Registrations', 'action' => 'view', $complain->registration->id]) : '' ?></td>
                <td><?= h($complain->created_on) ?></td>
                <td><?= h($complain->updated_on) ?></td>
                <td><?= $this->Number->format($complain->is_deleted) ?></td>
                <td><?= $this->Number->format($complain->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $complain->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $complain->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $complain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complain->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
