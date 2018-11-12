<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assignment'), ['action' => 'edit', $assignment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assignment'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['controller' => 'MasterClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['controller' => 'MasterClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Sections'), ['controller' => 'MasterSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Section'), ['controller' => 'MasterSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['controller' => 'MasterSubjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Subject'), ['controller' => 'MasterSubjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignment Rows'), ['controller' => 'AssignmentRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment Row'), ['controller' => 'AssignmentRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assignments view large-9 medium-8 columns content">
    <h3><?= h($assignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $assignment->has('master_role') ? $this->Html->link($assignment->master_role->role_name, ['controller' => 'MasterRoles', 'action' => 'view', $assignment->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assignment Type') ?></th>
            <td><?= h($assignment->assignment_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Class') ?></th>
            <td><?= $assignment->has('master_class') ? $this->Html->link($assignment->master_class->class_name, ['controller' => 'MasterClasses', 'action' => 'view', $assignment->master_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Section') ?></th>
            <td><?= $assignment->has('master_section') ? $this->Html->link($assignment->master_section->section_name, ['controller' => 'MasterSections', 'action' => 'view', $assignment->master_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Subject') ?></th>
            <td><?= $assignment->has('master_subject') ? $this->Html->link($assignment->master_subject->subject_name, ['controller' => 'MasterSubjects', 'action' => 'view', $assignment->master_subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assignment File') ?></th>
            <td><?= h($assignment->assignment_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration') ?></th>
            <td><?= $assignment->has('registration') ? $this->Html->link($assignment->registration->name, ['controller' => 'Registrations', 'action' => 'view', $assignment->registration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($assignment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($assignment->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($assignment->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($assignment->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assignment Date') ?></th>
            <td><?= h($assignment->assignment_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($assignment->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($assignment->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Topic') ?></h4>
        <?= $this->Text->autoParagraph(h($assignment->topic)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($assignment->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Assignment Rows') ?></h4>
        <?php if (!empty($assignment->assignment_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Registration Id') ?></th>
                <th scope="col"><?= __('Assignment Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($assignment->assignment_rows as $assignmentRows): ?>
            <tr>
                <td><?= h($assignmentRows->id) ?></td>
                <td><?= h($assignmentRows->registration_id) ?></td>
                <td><?= h($assignmentRows->assignment_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AssignmentRows', 'action' => 'view', $assignmentRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AssignmentRows', 'action' => 'edit', $assignmentRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AssignmentRows', 'action' => 'delete', $assignmentRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignmentRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
