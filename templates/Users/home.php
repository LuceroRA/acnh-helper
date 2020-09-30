<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Communities'), ['controller' => 'communities', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Edit My Prices'), ['controller' => 'prices', 'action' => 'edit', $user->price->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prices view content">
            <h3><?= h($user->id) ?><?= __('\'s Prices') ?></h3>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th><?= __('Monday') ?></th>
                        <th><?= __('Tuesday') ?></th>
                        <th><?= __('Wednesday') ?></th>
                        <th><?= __('Thursday') ?></th>
                        <th><?= __('Friday') ?></th>
                        <th><?= __('Saturday') ?></th>
                        <th><?= __('Sunday') ?></th>
                    </tr>
                    <tr>
                        <td><?= $this->Number->format($user->price->monday_price) ?></td>
                        <td><?= $this->Number->format($user->price->tuesday_price) ?></td>
                        <td><?= $this->Number->format($user->price->wednesday_price) ?></td>
                        <td><?= $this->Number->format($user->price->thursday_price) ?></td>
                        <td><?= $this->Number->format($user->price->friday_price) ?></td>
                        <td><?= $this->Number->format($user->price->saturday_price) ?></td>
                        <td><?= $this->Number->format($user->price->sunday_price) ?></td>
                    </tr>
                </table>
            </div>
        <?php foreach ($user->communities as $community): ?>
            <div class="communities view content">
                <h3><?= h($community->title) ?></h3>
                <div class="related">
                    <h4><?= __('Member Prices') ?></h4>
                    <?php if (!empty($community->users)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('User') ?></th>
                                <th><?= __('Today\'s Price') ?></th>
                            </tr>
                            <?php foreach ($community->users as $member): ?>
                            <tr>
                                <td><?= h($member->id) ?></td>
                                <td><?= $this->Number->format($member->price->today_price) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
