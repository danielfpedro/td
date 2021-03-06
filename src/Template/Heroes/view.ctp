<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hero'), ['action' => 'edit', $hero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hero'), ['action' => 'delete', $hero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Heroes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hero'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="heroes view large-9 medium-8 columns content">
    <h3><?= h($hero->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($hero->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($hero->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($hero->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($hero->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Decks') ?></h4>
        <?php if (!empty($hero->decks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Hero Id') ?></th>
                <th><?= __('Decks Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hero->decks as $decks): ?>
            <tr>
                <td><?= h($decks->id) ?></td>
                <td><?= h($decks->created) ?></td>
                <td><?= h($decks->modified) ?></td>
                <td><?= h($decks->hero_id) ?></td>
                <td><?= h($decks->decks_type_id) ?></td>
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
