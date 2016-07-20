<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cards Set'), ['action' => 'edit', $cardsSet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cards Set'), ['action' => 'delete', $cardsSet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cardsSet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cards Sets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cards Set'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cardsSets view large-9 medium-8 columns content">
    <h3><?= h($cardsSet->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($cardsSet->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Short Name') ?></th>
            <td><?= h($cardsSet->short_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($cardsSet->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Nickname') ?></th>
            <td><?= h($cardsSet->nickname) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cardsSet->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ordem') ?></th>
            <td><?= $this->Number->format($cardsSet->ordem) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($cardsSet->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($cardsSet->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cards') ?></h4>
        <?php if (!empty($cardsSet->cards)): ?>
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
                <th><?= __('Game Id') ?></th>
                <th><?= __('Attack') ?></th>
                <th><?= __('Health') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cardsSet->cards as $cards): ?>
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
                <td><?= h($cards->game_id) ?></td>
                <td><?= h($cards->attack) ?></td>
                <td><?= h($cards->health) ?></td>
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
