<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cards Set'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cardsSets index large-9 medium-8 columns content">
    <h3><?= __('Cards Sets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('short_name') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cardsSets as $cardsSet): ?>
            <tr>
                <td><?= $this->Number->format($cardsSet->id) ?></td>
                <td><?= h($cardsSet->name) ?></td>
                <td><?= h($cardsSet->created) ?></td>
                <td><?= h($cardsSet->modified) ?></td>
                <td><?= h($cardsSet->short_name) ?></td>
                <td><?= h($cardsSet->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cardsSet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cardsSet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cardsSet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cardsSet->id)]) ?>
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
