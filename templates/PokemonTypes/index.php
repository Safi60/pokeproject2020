<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PokemonType[]|\Cake\Collection\CollectionInterface $pokemonTypes
 */
?>
<div class="pokemonTypes index content">
    <?= $this->Html->link(__('New Pokemon Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pokemon Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pokemon_id') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokemonTypes as $pokemonType): ?>
                <tr>
                    <td><?= $this->Number->format($pokemonType->id) ?></td>
                    <td><?= h($pokemonType->pokemon_id) ?></td>
                    <td><?= $pokemonType->has('type') ? $this->Html->link($pokemonType->type->name, ['controller' => 'Types', 'action' => 'view', $pokemonType->type->id]) : '' ?></td>
                    <td><?= h($pokemonType->created) ?></td>
                    <td><?= h($pokemonType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pokemonType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pokemonType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pokemonType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonType->id)]) ?>
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
