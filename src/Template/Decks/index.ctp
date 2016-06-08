<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Heroes'), ['controller' => 'Heroes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hero'), ['controller' => 'Heroes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks Types'), ['controller' => 'DecksTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Decks Type'), ['controller' => 'DecksTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decks index large-9 medium-8 columns content">
    <h3><?= __('Decks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('hero_id') ?></th>
                <th><?= $this->Paginator->sort('decks_type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($decks as $deck): ?>
            <tr>
                <td><?= $this->Number->format($deck->id) ?></td>
                <td><?= h($deck->created) ?></td>
                <td><?= h($deck->modified) ?></td>
                <td><?= $deck->has('hero') ? $this->Html->link($deck->hero->name, ['controller' => 'Heroes', 'action' => 'view', $deck->hero->id]) : '' ?></td>
                <td><?= $deck->has('decks_type') ? $this->Html->link($deck->decks_type->name, ['controller' => 'DecksTypes', 'action' => 'view', $deck->decks_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deck->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deck->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deck->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]) ?>
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
