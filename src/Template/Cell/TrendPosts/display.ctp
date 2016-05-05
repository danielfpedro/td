<h4 class="title title-with-divider box-margin-top">#Trend posts</h4>

<?php foreach ($trend as $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<?= $this->Html->image($post->full_img_square_path, ['class' => 'img-circle', 'url' => ['controller' => 'Posts']]) ?>
		</div>
		<div class="post-compact-body">
			<a href="#">
				<h2>
					<?= $post->title ?>
				</h2>
			</a>
		</div>
	</div>
<?php endforeach ?>