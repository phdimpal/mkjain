<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video[]|\Cake\Collection\CollectionInterface $videoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Video'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videoes index large-9 medium-8 columns content">
    <h3><?= __('Videoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('video_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videoes as $video): ?>
            <tr>
                <td><?= $this->Number->format($video->id) ?></td>
                <td><?= h($video->video_url) ?></td>
                <td><?= $this->Number->format($video->created_by) ?></td>
                <td><?= $this->Number->format($video->edited_by) ?></td>
                <td><?= h($video->created_on) ?></td>
                <td><?= h($video->updated_on) ?></td>
                <td><?= $this->Number->format($video->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $video->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $video->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?>
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
