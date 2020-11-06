<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PokemonType $pokemonType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pokemon Type'), ['action' => 'edit', $pokemonType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pokemon Type'), ['action' => 'delete', $pokemonType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemon Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pokemon Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemonTypes view content">
            <h3><?= h($pokemonType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pokemon Id') ?></th>
                    <td><?= h($pokemonType->pokemon_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $pokemonType->has('type') ? $this->Html->link($pokemonType->type->name, ['controller' => 'Types', 'action' => 'view', $pokemonType->type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pokemonType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pokemonType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($pokemonType->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
