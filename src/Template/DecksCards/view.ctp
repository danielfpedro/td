<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Decks Card'), ['action' => 'edit', $decksCard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Decks Card'), ['action' => 'delete', $decksCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decksCard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decksCards view large-9 medium-8 columns content">
    <h3><?= h($decksCard->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Deck') ?></th>
            <td><?= $decksCard->has('deck') ? $this->Html->link($decksCard->deck->id, ['controller' => 'Decks', 'action' => 'view', $decksCard->deck->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Card') ?></th>
            <td><?= $decksCard->has('card') ? $this->Html->link($decksCard->card->name, ['controller' => 'Cards', 'action' => 'view', $decksCard->card->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($decksCard->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtd') ?></th>
            <td><?= $this->Number->format($decksCard->qtd) ?></td>
        </tr>
    </table>
</div>
