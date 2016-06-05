<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($tag->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($tag->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Thumb Image') ?></th>
                <th><?= __('Cover Image') ?></th>
                <th><?= __('Author Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Day') ?></th>
                <th><?= __('Month') ?></th>
                <th><?= __('Year') ?></th>
                <th><?= __('Pub Date') ?></th>
                <th><?= __('Home Main') ?></th>
                <th><?= __('Home Main Order') ?></th>
                <th><?= __('Subtitle') ?></th>
                <th><?= __('Has Cover') ?></th>
                <th><?= __('Video Cover') ?></th>
                <th><?= __('Video Cover Provider') ?></th>
                <th><?= __('Cover Image Crop Position') ?></th>
                <th><?= __('Thumb Image Crop Position') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->slug) ?></td>
                <td><?= h($posts->is_active) ?></td>
                <td><?= h($posts->tags) ?></td>
                <td><?= h($posts->thumb_image) ?></td>
                <td><?= h($posts->cover_image) ?></td>
                <td><?= h($posts->author_id) ?></td>
                <td><?= h($posts->category_id) ?></td>
                <td><?= h($posts->day) ?></td>
                <td><?= h($posts->month) ?></td>
                <td><?= h($posts->year) ?></td>
                <td><?= h($posts->pub_date) ?></td>
                <td><?= h($posts->home_main) ?></td>
                <td><?= h($posts->home_main_order) ?></td>
                <td><?= h($posts->subtitle) ?></td>
                <td><?= h($posts->has_cover) ?></td>
                <td><?= h($posts->video_cover) ?></td>
                <td><?= h($posts->video_cover_provider) ?></td>
                <td><?= h($posts->cover_image_crop_position) ?></td>
                <td><?= h($posts->thumb_image_crop_position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
