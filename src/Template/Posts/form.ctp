<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('deck_title');
            echo $this->Form->input('subtitle');
            echo $this->Form->input('body');
            echo $this->Form->input('is_active');
            echo $this->Form->input('tags_string');
            echo "A ultima tag deve ser o nome da categoria";
            echo $this->Form->input('pub_date');
            echo $this->Form->input('has_cover', ['type' => 'checkbox']);
            echo $this->Form->input('video_cover');
            echo $this->Form->input('video_cover_provider');
            echo $this->Form->input('home_main');
            echo $this->Form->input('home_main_order');
            echo $this->Form->input('thumb_image');
            echo $this->Form->input('thumb_image_crop_position');
            echo $this->Form->input('cover_image');
            echo $this->Form->input('cover_image_crop_position');
            echo $this->Form->input('author_id', ['options' => $authors]);
            echo $this->Form->input('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
