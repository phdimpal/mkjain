<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterCategory $masterCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Category'), ['action' => 'edit', $masterCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Category'), ['action' => 'delete', $masterCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Academic Calenders'), ['controller' => 'AcademicCalenders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Academic Calender'), ['controller' => 'AcademicCalenders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterCategories view large-9 medium-8 columns content">
    <h3><?= h($masterCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category Name') ?></th>
            <td><?= h($masterCategory->category_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Academic Calenders') ?></h4>
        <?php if (!empty($masterCategory->academic_calenders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Category Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Calender Date') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Updated On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($masterCategory->academic_calenders as $academicCalenders): ?>
            <tr>
                <td><?= h($academicCalenders->id) ?></td>
                <td><?= h($academicCalenders->master_category_id) ?></td>
                <td><?= h($academicCalenders->title) ?></td>
                <td><?= h($academicCalenders->calender_date) ?></td>
                <td><?= h($academicCalenders->created_on) ?></td>
                <td><?= h($academicCalenders->updated_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AcademicCalenders', 'action' => 'view', $academicCalenders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AcademicCalenders', 'action' => 'edit', $academicCalenders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AcademicCalenders', 'action' => 'delete', $academicCalenders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicCalenders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
