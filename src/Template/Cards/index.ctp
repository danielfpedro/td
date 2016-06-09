<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cards index large-9 medium-8 columns content">
    <h3><?= __('Cards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('mana_cost') ?></th>
                <th><?= $this->Paginator->sort('dust_cost') ?></th>
                <th><?= $this->Paginator->sort('rarity') ?></th>
                <th><?= $this->Paginator->sort('play_class_id') ?></th>
                <th><?= $this->Paginator->sort('photo_dir') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cards as $card): ?>
            <tr>
                <td><?= $this->Number->format($card->id) ?></td>
                <td><?= h($card->name) ?></td>
                <td><?= h($card->created) ?></td>
                <td><?= h($card->modified) ?></td>
                <td><?= $this->Number->format($card->mana_cost) ?></td>
                <td><?= $this->Number->format($card->dust_cost) ?></td>
                <td><?= $this->Number->format($card->rarity) ?></td>
                <td><?= $card->has('play_class') ? $this->Html->link($card->play_class->name, ['controller' => 'PlayClasses', 'action' => 'view', $card->play_class->id]) : '' ?></td>
                <td><?= h($card->photo_dir) ?></td>
                <td><?= h($card->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $card->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $card->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?>
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
