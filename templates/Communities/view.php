<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Community $community
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Community'), ['action' => 'edit', $community->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Community'), ['action' => 'delete', $community->id], ['confirm' => __('Are you sure you want to delete # {0}?', $community->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Communities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Community'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Join Community'), ['action' => 'join', $community->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Leave Community'), ['action' => 'leave', $community->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="communities view content">
            <h3><?= h($community->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($community->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($community->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($community->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Public') ?></th>
                    <td><?= $community->public ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Member Prices') ?></h4>
                <?php if (!empty($community->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User') ?></th>
                            <th><?= __('Monday') ?></th>
                            <th><?= __('Tuesday') ?></th>
                            <th><?= __('Wednesday') ?></th>
                            <th><?= __('Thursday') ?></th>
                            <th><?= __('Friday') ?></th>
                            <th><?= __('Saturday') ?></th>
                            <th><?= __('Sunday') ?></th>
                        </tr>
                        <?php foreach ($community->users as $user): ?>
                        <tr>
                            <td><?= h($user->id) ?></td>
                            <td><?= $this->Number->format($user->price->monday_price) ?></td>
                            <td><?= $this->Number->format($user->price->tuesday_price) ?></td>
                            <td><?= $this->Number->format($user->price->wednesday_price) ?></td>
                            <td><?= $this->Number->format($user->price->thursday_price) ?></td>
                            <td><?= $this->Number->format($user->price->friday_price) ?></td>
                            <td><?= $this->Number->format($user->price->saturday_price) ?></td>
                            <td><?= $this->Number->format($user->price->sunday_price) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
