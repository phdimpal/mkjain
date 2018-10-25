<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClass $masterClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Class'), ['action' => 'edit', $masterClass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Class'), ['action' => 'delete', $masterClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Class'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Registrations'), ['controller' => 'Registrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['controller' => 'Registrations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterClasses view large-9 medium-8 columns content">
    <h3><?= h($masterClass->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Class Name') ?></th>
            <td><?= h($masterClass->class_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Roman') ?></th>
            <td><?= h($masterClass->roman) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterClass->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag') ?></th>
            <td><?= $this->Number->format($masterClass->flag) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Registrations') ?></h4>
        <?php if (!empty($masterClass->registrations)): ?>
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
            <?php foreach ($masterClass->registrations as $registrations): ?>
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
    <div class="related">
        <h4><?= __('Related Syllabuses') ?></h4>
        <?php if (!empty($masterClass->syllabuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Class Id') ?></th>
                <th scope="col"><?= __('Master Section Id') ?></th>
                <th scope="col"><?= __('Master Subject Id') ?></th>
                <th scope="col"><?= __('Syllabus File') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Updated On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($masterClass->syllabuses as $syllabuses): ?>
            <tr>
                <td><?= h($syllabuses->id) ?></td>
                <td><?= h($syllabuses->master_class_id) ?></td>
                <td><?= h($syllabuses->master_section_id) ?></td>
                <td><?= h($syllabuses->master_subject_id) ?></td>
                <td><?= h($syllabuses->syllabus_file) ?></td>
                <td><?= h($syllabuses->created_on) ?></td>
                <td><?= h($syllabuses->updated_on) ?></td>
                <td><?= h($syllabuses->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Syllabuses', 'action' => 'view', $syllabuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Syllabuses', 'action' => 'edit', $syllabuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Syllabuses', 'action' => 'delete', $syllabuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllabuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
