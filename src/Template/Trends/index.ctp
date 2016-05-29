<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trend'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trends index large-9 medium-8 columns content">
    <h3><?= __('Trends') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('post_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trends as $trend): ?>
            <tr>
                <td><?= $this->Number->format($trend->id) ?></td>
                <td><?= h($trend->created) ?></td>
                <td><?= h($trend->modified) ?></td>
                <td><?= $trend->has('post') ? $this->Html->link($trend->post->title, ['controller' => 'Posts', 'action' => 'view', $trend->post->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trend->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trend->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trend->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
