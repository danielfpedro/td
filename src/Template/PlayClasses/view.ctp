<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Play Class'), ['action' => 'edit', $playClass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Play Class'), ['action' => 'delete', $playClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playClass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Play Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Play Class'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playClasses view large-9 medium-8 columns content">
    <h3><?= h($playClass->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($playClass->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($playClass->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($playClass->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($playClass->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($playClass->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Decks') ?></h4>
        <?php if (!empty($playClass->decks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Decks Type Id') ?></th>
                <th><?= __('Play Class Id') ?></th>
                <th><?= __('Decks Classification Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($playClass->decks as $decks): ?>
            <tr>
                <td><?= h($decks->id) ?></td>
                <td><?= h($decks->created) ?></td>
                <td><?= h($decks->modified) ?></td>
                <td><?= h($decks->decks_type_id) ?></td>
                <td><?= h($decks->play_class_id) ?></td>
                <td><?= h($decks->decks_classification_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Decks', 'action' => 'view', $decks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Decks', 'action' => 'edit', $decks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Decks', 'action' => 'delete', $decks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
