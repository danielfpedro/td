<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Decks Classification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decksClassifications index large-9 medium-8 columns content">
    <h3><?= __('Decks Classifications') ?></h3>
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
            <?php foreach ($decksClassifications as $decksClassification): ?>
            <tr>
                <td><?= $this->Number->format($decksClassification->id) ?></td>
                <td><?= h($decksClassification->name) ?></td>
                <td><?= h($decksClassification->created) ?></td>
                <td><?= h($decksClassification->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $decksClassification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decksClassification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decksClassification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decksClassification->id)]) ?>
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
