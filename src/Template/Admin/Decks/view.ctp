<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deck'), ['action' => 'edit', $deck->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deck'), ['action' => 'delete', $deck->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks Types'), ['controller' => 'DecksTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Type'), ['controller' => 'DecksTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks Classifications'), ['controller' => 'DecksClassifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Classification'), ['controller' => 'DecksClassifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decks view large-9 medium-8 columns content">
    <h3><?= h($deck->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Decks Type') ?></th>
            <td><?= $deck->has('decks_type') ? $this->Html->link($deck->decks_type->name, ['controller' => 'DecksTypes', 'action' => 'view', $deck->decks_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Play Class') ?></th>
            <td><?= $deck->has('play_class') ? $this->Html->link($deck->play_class->name, ['controller' => 'PlayClasses', 'action' => 'view', $deck->play_class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Decks Classification') ?></th>
            <td><?= $deck->has('decks_classification') ? $this->Html->link($deck->decks_classification->name, ['controller' => 'DecksClassifications', 'action' => 'view', $deck->decks_classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($deck->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Post') ?></th>
            <td><?= $deck->has('post') ? $this->Html->link($deck->post->title, ['controller' => 'Posts', 'action' => 'view', $deck->post->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deck->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($deck->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($deck->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cards') ?></h4>
        <?php if (!empty($deck->cards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Mana Cost') ?></th>
                <th><?= __('Dust Cost') ?></th>
                <th><?= __('Play Class Id') ?></th>
                <th><?= __('Photo Dir') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Locale') ?></th>
                <th><?= __('Cards Set Id') ?></th>
                <th><?= __('Rarity Id') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Cards Type Id') ?></th>
                <th><?= __('Cards Race Id') ?></th>
                <th><?= __('Text') ?></th>
                <th><?= __('Flavor') ?></th>
                <th><?= __('Attack') ?></th>
                <th><?= __('Health') ?></th>
                <th><?= __('Game Uid') ?></th>
                <th><?= __('Uuid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deck->cards as $cards): ?>
            <tr>
                <td><?= h($cards->id) ?></td>
                <td><?= h($cards->name) ?></td>
                <td><?= h($cards->created) ?></td>
                <td><?= h($cards->modified) ?></td>
                <td><?= h($cards->mana_cost) ?></td>
                <td><?= h($cards->dust_cost) ?></td>
                <td><?= h($cards->play_class_id) ?></td>
                <td><?= h($cards->photo_dir) ?></td>
                <td><?= h($cards->photo) ?></td>
                <td><?= h($cards->locale) ?></td>
                <td><?= h($cards->cards_set_id) ?></td>
                <td><?= h($cards->rarity_id) ?></td>
                <td><?= h($cards->tags) ?></td>
                <td><?= h($cards->cards_type_id) ?></td>
                <td><?= h($cards->cards_race_id) ?></td>
                <td><?= h($cards->text) ?></td>
                <td><?= h($cards->flavor) ?></td>
                <td><?= h($cards->attack) ?></td>
                <td><?= h($cards->health) ?></td>
                <td><?= h($cards->game_uid) ?></td>
                <td><?= h($cards->uuid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cards', 'action' => 'view', $cards->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cards', 'action' => 'edit', $cards->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cards', 'action' => 'delete', $cards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cards->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
