<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cardsSet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cardsSet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cards Sets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cardsSets form large-9 medium-8 columns content">
    <?= $this->Form->create($cardsSet) ?>
    <fieldset>
        <legend><?= __('Edit Cards Set') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('short_name');
            echo $this->Form->input('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
