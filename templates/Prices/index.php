<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Price[]|\Cake\Collection\CollectionInterface $prices
 */
?>
<div class="prices index content">
    <?= $this->Html->link(__('New Price'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prices') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('monday_price') ?></th>
                    <th><?= $this->Paginator->sort('tuesday_price') ?></th>
                    <th><?= $this->Paginator->sort('wednesday_price') ?></th>
                    <th><?= $this->Paginator->sort('thursday_price') ?></th>
                    <th><?= $this->Paginator->sort('friday_price') ?></th>
                    <th><?= $this->Paginator->sort('saturday_price') ?></th>
                    <th><?= $this->Paginator->sort('sunday_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prices as $price): ?>
                <tr>
                    <td><?= $this->Number->format($price->id) ?></td>
                    <td><?= $this->Number->format($price->user_id) ?></td>
                    <td><?= $this->Number->format($price->monday_price) ?></td>
                    <td><?= $this->Number->format($price->tuesday_price) ?></td>
                    <td><?= $this->Number->format($price->wednesday_price) ?></td>
                    <td><?= $this->Number->format($price->thursday_price) ?></td>
                    <td><?= $this->Number->format($price->friday_price) ?></td>
                    <td><?= $this->Number->format($price->saturday_price) ?></td>
                    <td><?= $this->Number->format($price->sunday_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $price->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $price->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $price->id], ['confirm' => __('Are you sure you want to delete # {0}?', $price->id)]) ?>
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
