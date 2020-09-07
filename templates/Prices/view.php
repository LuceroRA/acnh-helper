<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Price $price
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Price'), ['action' => 'edit', $price->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Price'), ['action' => 'delete', $price->id], ['confirm' => __('Are you sure you want to delete # {0}?', $price->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Price'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prices view content">
            <h3><?= h($price->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($price->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($price->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monday Price') ?></th>
                    <td><?= $this->Number->format($price->monday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tuesday Price') ?></th>
                    <td><?= $this->Number->format($price->tuesday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wednesday Price') ?></th>
                    <td><?= $this->Number->format($price->wednesday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Thursday Price') ?></th>
                    <td><?= $this->Number->format($price->thursday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Friday Price') ?></th>
                    <td><?= $this->Number->format($price->friday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saturday Price') ?></th>
                    <td><?= $this->Number->format($price->saturday_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sunday Price') ?></th>
                    <td><?= $this->Number->format($price->sunday_price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
