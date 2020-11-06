<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PokemonStat $pokemonStat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pokemon Stat'), ['action' => 'edit', $pokemonStat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pokemon Stat'), ['action' => 'delete', $pokemonStat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemon Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pokemon Stat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemonStats view content">
            <h3><?= h($pokemonStat->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pokemon Id') ?></th>
                    <td><?= h($pokemonStat->pokemon_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat') ?></th>
                    <td><?= $pokemonStat->has('stat') ? $this->Html->link($pokemonStat->stat->name, ['controller' => 'Stats', 'action' => 'view', $pokemonStat->stat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pokemonStat->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($pokemonStat->value) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
