<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterYear $masterYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Year'), ['action' => 'edit', $masterYear->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Year'), ['action' => 'delete', $masterYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterYear->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Years'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Year'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterYears view large-9 medium-8 columns content">
    <h3><?= h($masterYear->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Year Name') ?></th>
            <td><?= h($masterYear->year_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterYear->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($masterYear->status) ?></td>
        </tr>
    </table>
</div>
