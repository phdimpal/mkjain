<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Registration'), ['action' => 'edit', $registration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Registration'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registrations view large-9 medium-8 columns content">
    <h3><?= h($registration->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $registration->has('master_role') ? $this->Html->link($registration->master_role->id, ['controller' => 'MasterRoles', 'action' => 'view', $registration->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Roll No') ?></th>
            <td><?= h($registration->roll_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($registration->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($registration->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Name') ?></th>
            <td><?= h($registration->father_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mother Name') ?></th>
            <td><?= h($registration->mother_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Mobile No') ?></th>
            <td><?= h($registration->father_mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mother Mobile No') ?></th>
            <td><?= h($registration->mother_mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Mobile No') ?></th>
            <td><?= h($registration->student_mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Mobile No') ?></th>
            <td><?= h($registration->teacher_mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $registration->has('master_class') ? $this->Html->link($registration->master_class->id, ['controller' => 'MasterClasses', 'action' => 'view', $registration->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $registration->has('master_section') ? $this->Html->link($registration->master_section->id, ['controller' => 'MasterSections', 'action' => 'view', $registration->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Pic') ?></th>
            <td><?= h($registration->profile_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($registration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Medium Id') ?></th>
            <td><?= $this->Number->format($registration->master_medium_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($registration->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($registration->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($registration->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($registration->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($registration->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($registration->address)); ?>
    </div>
</div>
