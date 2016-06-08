<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Play Class'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playClasses index large-9 medium-8 columns content">
    <h3><?= __('Play Classes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playClasses as $playClass): ?>
            <tr>
                <td><?= $this->Number->format($playClass->id) ?></td>
                <td><?= h($playClass->name) ?></td>
                <td><?= h($playClass->created) ?></td>
                <td><?= h($playClass->modified) ?></td>
                <td><?= h($playClass->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playClass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playClass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playClass->id)]) ?>
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
