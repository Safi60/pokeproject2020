<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons form content">
            <?= $this->Form->create($pokemon) ?>
            <fieldset>
                <legend><?= __('Add Pokemon') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('height');
                    echo $this->Form->control('weight');
                    echo $this->Form->control('default_front_sprite_url');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
