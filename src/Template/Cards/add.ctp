<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards Sets'), ['controller' => 'CardsSets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cards Set'), ['controller' => 'CardsSets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rarities'), ['controller' => 'Rarities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rarity'), ['controller' => 'Rarities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards Races'), ['controller' => 'CardsRaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cards Race'), ['controller' => 'CardsRaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards Types'), ['controller' => 'CardsTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cards Type'), ['controller' => 'CardsTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cards form large-9 medium-8 columns content">
    <?= $this->Form->create($card) ?>
    <fieldset>
        <legend><?= __('Add Card') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('mana_cost');
            echo $this->Form->input('dust_cost');
            echo $this->Form->input('play_class_id', ['options' => $playClasses, 'empty' => true]);
            echo $this->Form->input('photo_dir');
            echo $this->Form->input('photo');
            echo $this->Form->input('locale');
            echo $this->Form->input('cards_set_id', ['options' => $cardsSets]);
            echo $this->Form->input('rarity_id', ['options' => $rarities]);
            echo $this->Form->input('tags');
            echo $this->Form->input('cards_type_id', ['options' => $cardsTypes]);
            echo $this->Form->input('cards_race_id', ['options' => $cardsRaces, 'empty' => true]);
            echo $this->Form->input('text');
            echo $this->Form->input('flavor');
            echo $this->Form->input('attack');
            echo $this->Form->input('health');
            echo $this->Form->input('game_uid');
            echo $this->Form->input('uuid');
            echo $this->Form->input('decks._ids', ['options' => $decks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
