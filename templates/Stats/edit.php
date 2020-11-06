<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stat $stat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stat->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stats form content">
            <?= $this->Form->create($stat) ?>
            <fieldset>
                <legend><?= __('Edit Stat') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
