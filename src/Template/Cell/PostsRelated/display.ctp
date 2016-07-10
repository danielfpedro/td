<?php if ($title): ?>
	<h4 class="title title-with-divider box-margin-top"><?= $title ?></h4>
<?php endif ?>

<?php foreach ($posts as $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<?= $this->Html->image($post->full_img_square_path, ['class' => '', 'url' => $post->view_url]) ?>
		</div>
		<div class="post-compact-body">
			<a href="#" class="post-compact-category">
				Notícia
			</a>
			<?= $this->Html->link('<h2>' . $post->title . '</h2>', $post->view_url, [
				'escape' => false,
				'class' => ''
			]) ?>
			<div class="post-compact-pub-date">
				<span class="fa fa-clock-o"></span>&nbsp;<?= $post->pub_date_in_words ?>
			</div>
		</div>
	</div>
<?php endforeach ?>