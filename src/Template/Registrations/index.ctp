<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration[]|\Cake\Collection\CollectionInterface $registrations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registrations index large-9 medium-8 columns content">
    <h3><?= __('Registrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roll_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('father_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mother_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('father_mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mother_mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_medium_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_pic') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registrations as $registration): ?>
            <tr>
                <td><?= $this->Number->format($registration->id) ?></td>
                <td><?= $registration->has('master_role') ? $this->Html->link($registration->master_role->id, ['controller' => 'MasterRoles', 'action' => 'view', $registration->master_role->id]) : '' ?></td>
                <td><?= h($registration->roll_no) ?></td>
                <td><?= h($registration->name) ?></td>
                <td><?= h($registration->dob) ?></td>
                <td><?= h($registration->father_name) ?></td>
                <td><?= h($registration->mother_name) ?></td>
                <td><?= h($registration->father_mobile_no) ?></td>
                <td><?= h($registration->mother_mobile_no) ?></td>
                <td><?= h($registration->student_mobile_no) ?></td>
                <td><?= h($registration->teacher_mobile_no) ?></td>
                <td><?= $registration->has('master_class') ? $this->Html->link($registration->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $registration->master_class->id]) : '' ?></td>
                <td><?= $registration->has('master_section') ? $this->Html->link($registration->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $registration->master_section->id]) : '' ?></td>
                <td><?= $this->Number->format($registration->master_medium_id) ?></td>
                <td><?= $this->Number->format($registration->is_deleted) ?></td>
                <td><?= h($registration->created_on) ?></td>
                <td><?= h($registration->updated_on) ?></td>
                <td><?= $this->Number->format($registration->created_by) ?></td>
                <td><?= $this->Number->format($registration->edited_by) ?></td>
                <td><?= h($registration->profile_pic) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $registration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?>
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
