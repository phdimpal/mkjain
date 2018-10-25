<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterSubject $masterSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Subject'), ['action' => 'edit', $masterSubject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Subject'), ['action' => 'delete', $masterSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterSubject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Syllabuses'), ['controller' => 'Syllabuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllabus'), ['controller' => 'Syllabuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterSubjects view large-9 medium-8 columns content">
    <h3><?= h($masterSubject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject Name') ?></th>
            <td><?= h($masterSubject->subject_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterSubject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag') ?></th>
            <td><?= $this->Number->format($masterSubject->flag) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Syllabuses') ?></h4>
        <?php if (!empty($masterSubject->syllabuses)): ?>
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
            <?php foreach ($masterSubject->syllabuses as $syllabuses): ?>
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
