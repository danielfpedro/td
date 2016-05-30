<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->create($image) ?>
    <fieldset>
        <legend><?= __('Add Image') ?></legend>
        <?php
            echo $this->Form->input('photo');
            echo $this->Form->input('tags');
            echo $this->Form->input('photo_dir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
