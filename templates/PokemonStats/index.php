<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PokemonStat[]|\Cake\Collection\CollectionInterface $pokemonStats
 */
?>
<div class="pokemonStats index content">
    <?= $this->Html->link(__('New Pokemon Stat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pokemon Stats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pokemon_id') ?></th>
                    <th><?= $this->Paginator->sort('stat_id') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokemonStats as $pokemonStat): ?>
                <tr>
                    <td><?= $this->Number->format($pokemonStat->id) ?></td>
                    <td><?= h($pokemonStat->pokemon_id) ?></td>
                    <td><?= $pokemonStat->has('stat') ? $this->Html->link($pokemonStat->stat->name, ['controller' => 'Stats', 'action' => 'view', $pokemonStat->stat->id]) : '' ?></td>
                    <td><?= $this->Number->format($pokemonStat->value) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pokemonStat->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pokemonStat->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pokemonStat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStat->id)]) ?>
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
