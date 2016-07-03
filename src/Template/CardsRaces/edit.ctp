<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cardsRace->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cardsRace->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cards Races'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cardsRaces form large-9 medium-8 columns content">
    <?= $this->Form->create($cardsRace) ?>
    <fieldset>
        <legend><?= __('Edit Cards Race') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
