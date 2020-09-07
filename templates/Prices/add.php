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
            <?= $this->Html->link(__('List Prices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prices form content">
            <?= $this->Form->create($price) ?>
            <fieldset>
                <legend><?= __('Add Price') ?></legend>
                <?php
                    echo $this->Form->control('monday_price');
                    echo $this->Form->control('tuesday_price');
                    echo $this->Form->control('wednesday_price');
                    echo $this->Form->control('thursday_price');
                    echo $this->Form->control('friday_price');
                    echo $this->Form->control('saturday_price');
                    echo $this->Form->control('sunday_price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
