<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $card->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cards form large-9 medium-8 columns content">
    <?= $this->Form->create($card, ['type' => 'file']) ?>
    <fieldset>
        <legend>Form</legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('mana_cost');
            echo $this->Form->input('locale', ['options' => ['pt_BR' => 'pt_BR']]);
            echo $this->Form->input('play_class_id', ['options' => $playClasses, 'empty' => true]);
            echo $this->Form->input('photo_file', ['type' => 'file']);
            echo $this->Form->input('tags');
            echo $this->Form->input('rarity_id', ['options' => $rarities]);
            echo $this->Form->input('cards_type_id', ['options' => $cardsTypes]);
            echo $this->Form->input('cards_race_id', ['options' => $cardsRaces, 'empty' => 'Selecione:']);
            echo $this->Form->input('cards_set_id', ['options' => $cardsSets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
