<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon[]|\Cake\Collection\CollectionInterface $pokemons
 */
?>
<div class="pokemons index content">
    <?= $this->Html->link(__('New Pokemon'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pokemons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('height') ?></th>
                    <th><?= $this->Paginator->sort('weight') ?></th>
                    <th><?= $this->Paginator->sort('default_front_stripe_url') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokemons as $pokemon): ?>
                <tr>
                    <td><?= $this->Number->format($pokemon->id) ?></td>
                    <td><?= h($pokemon->name) ?></td>
                    <td><?= $this->Number->format($pokemon->height) ?></td>
                    <td><?= $this->Number->format($pokemon->weight) ?></td>
                    <td><?= h($pokemon->default_front_stripe_url) ?></td>
                    <td><?= h($pokemon->created) ?></td>
                    <td><?= h($pokemon->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pokemon->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pokemon->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id)]) ?>
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
