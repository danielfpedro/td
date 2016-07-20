<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?></li>
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
<div class="cards index large-9 medium-8 columns content">
    <h3><?= __('Cards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('mana_cost') ?></th>
                <th><?= $this->Paginator->sort('dust_cost') ?></th>
                <th><?= $this->Paginator->sort('play_class_id') ?></th>
                <th><?= $this->Paginator->sort('photo_dir') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('locale') ?></th>
                <th><?= $this->Paginator->sort('cards_set_id') ?></th>
                <th><?= $this->Paginator->sort('rarity_id') ?></th>
                <th><?= $this->Paginator->sort('tags') ?></th>
                <th><?= $this->Paginator->sort('cards_type_id') ?></th>
                <th><?= $this->Paginator->sort('cards_race_id') ?></th>
                <th><?= $this->Paginator->sort('attack') ?></th>
                <th><?= $this->Paginator->sort('health') ?></th>
                <th><?= $this->Paginator->sort('game_uid') ?></th>
                <th><?= $this->Paginator->sort('uuid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cards as $card): ?>
            <tr>
                <td><?= $this->Number->format($card->id) ?></td>
                <td><?= h($card->name) ?></td>
                <td><?= h($card->created) ?></td>
                <td><?= h($card->modified) ?></td>
                <td><?= $this->Number->format($card->mana_cost) ?></td>
                <td><?= $this->Number->format($card->dust_cost) ?></td>
                <td><?= $card->has('play_class') ? $this->Html->link($card->play_class->name, ['controller' => 'PlayClasses', 'action' => 'view', $card->play_class->id]) : '' ?></td>
                <td><?= h($card->photo_dir) ?></td>
                <td><?= h($card->photo) ?></td>
                <td><?= h($card->locale) ?></td>
                <td><?= $card->has('cards_set') ? $this->Html->link($card->cards_set->name, ['controller' => 'CardsSets', 'action' => 'view', $card->cards_set->id]) : '' ?></td>
                <td><?= $card->has('rarity') ? $this->Html->link($card->rarity->name, ['controller' => 'Rarities', 'action' => 'view', $card->rarity->id]) : '' ?></td>
                <td><?= h($card->tags) ?></td>
                <td><?= $card->has('cards_type') ? $this->Html->link($card->cards_type->name, ['controller' => 'CardsTypes', 'action' => 'view', $card->cards_type->id]) : '' ?></td>
                <td><?= $card->has('cards_race') ? $this->Html->link($card->cards_race->name, ['controller' => 'CardsRaces', 'action' => 'view', $card->cards_race->id]) : '' ?></td>
                <td><?= $this->Number->format($card->attack) ?></td>
                <td><?= $this->Number->format($card->health) ?></td>
                <td><?= h($card->game_uid) ?></td>
                <td><?= h($card->uuid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $card->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $card->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
