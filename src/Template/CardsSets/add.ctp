<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cards Sets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cardsSets form large-9 medium-8 columns content">
    <?= $this->Form->create($cardsSet) ?>
    <fieldset>
        <legend><?= __('Add Cards Set') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('short_name');
            echo $this->Form->input('slug');
            echo $this->Form->input('ordem');
            echo $this->Form->input('nickname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
