<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hero'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="heroes index large-9 medium-8 columns content">
    <h3><?= __('Heroes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($heroes as $hero): ?>
            <tr>
                <td><?= $this->Number->format($hero->id) ?></td>
                <td><?= h($hero->name) ?></td>
                <td><?= h($hero->created) ?></td>
                <td><?= h($hero->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hero->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hero->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hero->id)]) ?>
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
