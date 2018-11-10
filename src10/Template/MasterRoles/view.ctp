<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterRole $masterRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Role'), ['action' => 'edit', $masterRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Role'), ['action' => 'delete', $masterRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterRoles view large-9 medium-8 columns content">
    <h3><?= h($masterRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Name') ?></th>
            <td><?= h($masterRole->role_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterRole->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Registrations') ?></h4>
        <?php if (!empty($masterRole->registrations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Role Id') ?></th>
                <th scope="col"><?= __('Roll No') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Father Name') ?></th>
                <th scope="col"><?= __('Mother Name') ?></th>
                <th scope="col"><?= __('Father Mobile No') ?></th>
                <th scope="col"><?= __('Mother Mobile No') ?></th>
                <th scope="col"><?= __('Student Mobile No') ?></th>
                <th scope="col"><?= __('Teacher Mobile No') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Master Class Id') ?></th>
                <th scope="col"><?= __('Master Section Id') ?></th>
                <th scope="col"><?= __('Master Medium Id') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Updated On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Profile Pic') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($masterRole->registrations as $registrations): ?>
            <tr>
                <td><?= h($registrations->id) ?></td>
                <td><?= h($registrations->master_role_id) ?></td>
                <td><?= h($registrations->roll_no) ?></td>
                <td><?= h($registrations->name) ?></td>
                <td><?= h($registrations->dob) ?></td>
                <td><?= h($registrations->father_name) ?></td>
                <td><?= h($registrations->mother_name) ?></td>
                <td><?= h($registrations->father_mobile_no) ?></td>
                <td><?= h($registrations->mother_mobile_no) ?></td>
                <td><?= h($registrations->student_mobile_no) ?></td>
                <td><?= h($registrations->teacher_mobile_no) ?></td>
                <td><?= h($registrations->address) ?></td>
                <td><?= h($registrations->master_class_id) ?></td>
                <td><?= h($registrations->master_section_id) ?></td>
                <td><?= h($registrations->master_medium_id) ?></td>
                <td><?= h($registrations->is_deleted) ?></td>
                <td><?= h($registrations->created_on) ?></td>
                <td><?= h($registrations->updated_on) ?></td>
                <td><?= h($registrations->created_by) ?></td>
                <td><?= h($registrations->edited_by) ?></td>
                <td><?= h($registrations->profile_pic) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Registrations', 'action' => 'view', $registrations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Registrations', 'action' => 'edit', $registrations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Registrations', 'action' => 'delete', $registrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registrations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
