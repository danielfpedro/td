<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cardsType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cardsType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cards Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cardsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($cardsType) ?>
    <fieldset>
        <legend><?= __('Edit Cards Type') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
