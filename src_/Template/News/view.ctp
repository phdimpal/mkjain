<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="news view large-9 medium-8 columns content">
    <h3><?= h($news->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('News Url') ?></th>
            <td><?= h($news->news_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($news->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($news->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($news->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($news->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('News Date') ?></th>
            <td><?= h($news->news_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($news->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated On') ?></th>
            <td><?= h($news->updated_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($news->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($news->description)); ?>
    </div>
</div>
