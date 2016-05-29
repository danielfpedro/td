<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trend->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trend->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trends'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trends form large-9 medium-8 columns content">
    <?= $this->Form->create($trend) ?>
    <fieldset>
        <legend><?= __('Edit Trend') ?></legend>
        <?php
            echo $this->Form->input('post_id', ['options' => $posts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
