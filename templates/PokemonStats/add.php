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
            <?= $this->Html->link(__('List Pokemon Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemonStats form content">
            <?= $this->Form->create($pokemonStat) ?>
            <fieldset>
                <legend><?= __('Add Pokemon Stat') ?></legend>
                <?php
                    echo $this->Form->control('pokemon_id');
                    echo $this->Form->control('stat_id', ['options' => $stats]);
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
