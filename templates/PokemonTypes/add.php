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
            <?= $this->Html->link(__('List Pokemon Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemonTypes form content">
            <?= $this->Form->create($pokemonType) ?>
            <fieldset>
                <legend><?= __('Add Pokemon Type') ?></legend>
                <?php
                    echo $this->Form->control('pokemon_id');
                    echo $this->Form->control('type_id', ['options' => $types]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
