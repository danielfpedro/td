<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trend'), ['action' => 'edit', $trend->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trend'), ['action' => 'delete', $trend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trend->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trends'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trend'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trends view large-9 medium-8 columns content">
    <h3><?= h($trend->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Post') ?></th>
            <td><?= $trend->has('post') ? $this->Html->link($trend->post->title, ['controller' => 'Posts', 'action' => 'view', $trend->post->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trend->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($trend->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($trend->modified) ?></td>
        </tr>
    </table>
</div>
