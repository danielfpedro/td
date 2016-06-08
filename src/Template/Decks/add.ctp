<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks Types'), ['controller' => 'DecksTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Decks Type'), ['controller' => 'DecksTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Play Classes'), ['controller' => 'PlayClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Play Class'), ['controller' => 'PlayClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks Classifications'), ['controller' => 'DecksClassifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Decks Classification'), ['controller' => 'DecksClassifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decks form large-9 medium-8 columns content">
    <?= $this->Form->create($deck) ?>
    <fieldset>
        <legend><?= __('Add Deck') ?></legend>
        <?php
            echo $this->Form->input('decks_type_id', ['options' => $decksTypes]);
            echo $this->Form->input('play_class_id', ['options' => $playClasses]);
            echo $this->Form->input('decks_classification_id', ['options' => $decksClassifications]);
            echo $this->Form->input('post_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
