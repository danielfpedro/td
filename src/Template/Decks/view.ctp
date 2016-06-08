<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deck'), ['action' => 'edit', $deck->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deck'), ['action' => 'delete', $deck->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Heroes'), ['controller' => 'Heroes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hero'), ['controller' => 'Heroes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks Types'), ['controller' => 'DecksTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Type'), ['controller' => 'DecksTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decks view large-9 medium-8 columns content">
    <h3><?= h($deck->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Hero') ?></th>
            <td><?= $deck->has('hero') ? $this->Html->link($deck->hero->name, ['controller' => 'Heroes', 'action' => 'view', $deck->hero->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Decks Type') ?></th>
            <td><?= $deck->has('decks_type') ? $this->Html->link($deck->decks_type->name, ['controller' => 'DecksTypes', 'action' => 'view', $deck->decks_type->id]) : '' ?></td>
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
</div>
