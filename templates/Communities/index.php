<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Community[]|\Cake\Collection\CollectionInterface $communities
 */
?>
<div class="communities index content">
    <?= $this->Html->link(__('New Community'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Communities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('public') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($communities as $community): ?>
                <tr>
                    <td><?= $this->Number->format($community->id) ?></td>
                    <td><?= h($community->title) ?></td>
                    <td><?= h($community->public) ?></td>
                    <td><?= h($community->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $community->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $community->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $community->id], ['confirm' => __('Are you sure you want to delete # {0}?', $community->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
