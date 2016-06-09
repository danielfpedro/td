<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Decks Card'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decksCards index large-9 medium-8 columns content">
    <h3><?= __('Decks Cards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('deck_id') ?></th>
                <th><?= $this->Paginator->sort('card_id') ?></th>
                <th><?= $this->Paginator->sort('qtd') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($decksCards as $decksCard): ?>
            <tr>
                <td><?= $this->Number->format($decksCard->id) ?></td>
                <td><?= $decksCard->has('deck') ? $this->Html->link($decksCard->deck->id, ['controller' => 'Decks', 'action' => 'view', $decksCard->deck->id]) : '' ?></td>
                <td><?= $decksCard->has('card') ? $this->Html->link($decksCard->card->name, ['controller' => 'Cards', 'action' => 'view', $decksCard->card->id]) : '' ?></td>
                <td><?= $this->Number->format($decksCard->qtd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $decksCard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decksCard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decksCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decksCard->id)]) ?>
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
