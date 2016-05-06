<?php if ($title): ?>
	<h4 class="title title-with-divider box-margin-top"><?= $title ?></h4>
<?php endif ?>

<?php foreach ($posts as $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<?= $this->Html->image($post->full_img_square_path, ['class' => 'img-circle', 'url' => ['controller' => 'Posts']]) ?>
		</div>
		<div class="post-compact-body">
			<a href="#">
				<h2>
					<?= $post->title ?>
				</h2>
				<div class="post-compact-pub-date">
					<?= $post->pub_date_in_words ?>
				</div>
			</a>
		</div>
	</div>
<?php endforeach ?>