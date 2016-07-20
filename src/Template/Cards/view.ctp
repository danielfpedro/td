<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards Sets'), ['controller' => 'CardsSets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cards Set'), ['controller' => 'CardsSets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rarities'), ['controller' => 'Rarities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rarity'), ['controller' => 'Rarities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards Races'), ['controller' => 'CardsRaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cards Race'), ['controller' => 'CardsRaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards Types'), ['controller' => 'CardsTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cards Type'), ['controller' => 'CardsTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cards view large-9 medium-8 columns content">
    <h3><?= h($card->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($card->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Play Class') ?></th>
            <td><?= $card->has('play_class') ? $this->Html->link($card->play_class->name, ['controller' => 'PlayClasses', 'action' => 'view', $card->play_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($card->photo_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($card->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Locale') ?></th>
            <td><?= h($card->locale) ?></td>
        </tr>
        <tr>
            <th><?= __('Cards Set') ?></th>
            <td><?= $card->has('cards_set') ? $this->Html->link($card->cards_set->name, ['controller' => 'CardsSets', 'action' => 'view', $card->cards_set->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rarity') ?></th>
            <td><?= $card->has('rarity') ? $this->Html->link($card->rarity->name, ['controller' => 'Rarities', 'action' => 'view', $card->rarity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tags') ?></th>
            <td><?= h($card->tags) ?></td>
        </tr>
        <tr>
            <th><?= __('Cards Type') ?></th>
            <td><?= $card->has('cards_type') ? $this->Html->link($card->cards_type->name, ['controller' => 'CardsTypes', 'action' => 'view', $card->cards_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cards Race') ?></th>
            <td><?= $card->has('cards_race') ? $this->Html->link($card->cards_race->name, ['controller' => 'CardsRaces', 'action' => 'view', $card->cards_race->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Game Uid') ?></th>
            <td><?= h($card->game_uid) ?></td>
        </tr>
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= h($card->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($card->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Mana Cost') ?></th>
            <td><?= $this->Number->format($card->mana_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Dust Cost') ?></th>
            <td><?= $this->Number->format($card->dust_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Attack') ?></th>
            <td><?= $this->Number->format($card->attack) ?></td>
        </tr>
        <tr>
            <th><?= __('Health') ?></th>
            <td><?= $this->Number->format($card->health) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($card->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($card->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($card->text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Flavor') ?></h4>
        <?= $this->Text->autoParagraph(h($card->flavor)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Decks') ?></h4>
        <?php if (!empty($card->decks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Decks Type Id') ?></th>
                <th><?= __('Play Class Id') ?></th>
                <th><?= __('Decks Classification Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($card->decks as $decks): ?>
            <tr>
                <td><?= h($decks->id) ?></td>
                <td><?= h($decks->created) ?></td>
                <td><?= h($decks->modified) ?></td>
                <td><?= h($decks->decks_type_id) ?></td>
                <td><?= h($decks->play_class_id) ?></td>
                <td><?= h($decks->decks_classification_id) ?></td>
                <td><?= h($decks->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Decks', 'action' => 'view', $decks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Decks', 'action' => 'edit', $decks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Decks', 'action' => 'delete', $decks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
