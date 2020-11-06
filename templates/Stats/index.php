<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stat[]|\Cake\Collection\CollectionInterface $stats
 */
?>
<div class="stats index content">
    <?= $this->Html->link(__('New Stat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats as $stat): ?>
                <tr>
                    <td><?= $this->Number->format($stat->id) ?></td>
                    <td><?= h($stat->name) ?></td>
                    <td><?= h($stat->created) ?></td>
                    <td><?= h($stat->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stat->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stat->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stat->id)]) ?>
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
