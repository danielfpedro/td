<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $playClass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $playClass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Play Classes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($playClass) ?>
    <fieldset>
        <legend><?= __('Edit Play Class') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
