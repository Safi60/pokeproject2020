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
            <?= $this->Html->link(__('Edit Stat'), ['action' => 'edit', $stat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stat'), ['action' => 'delete', $stat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stats view content">
            <h3><?= h($stat->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($stat->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stat->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($stat->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($stat->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pokemon Stats') ?></h4>
                <?php if (!empty($stat->pokemon_stats)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pokemon Id') ?></th>
                            <th><?= __('Stat Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($stat->pokemon_stats as $pokemonStats) : ?>
                        <tr>
                            <td><?= h($pokemonStats->id) ?></td>
                            <td><?= h($pokemonStats->pokemon_id) ?></td>
                            <td><?= h($pokemonStats->stat_id) ?></td>
                            <td><?= h($pokemonStats->value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PokemonStats', 'action' => 'view', $pokemonStats->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonStats', 'action' => 'edit', $pokemonStats->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonStats', 'action' => 'delete', $pokemonStats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStats->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
