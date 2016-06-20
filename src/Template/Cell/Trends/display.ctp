<h4 class="title title-with-divider box-margin-top">#Trend posts</h4>

<?php $i = 1; ?>
<?php foreach ($posts as $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<span class="trend-number">
				<?php
					echo $i;
					$i++;
				?>
			</span>
		</div>
		<div class="post-compact-body">
			<?= $this->Html->link('<h2>'.$post->title.'</h2>', $post->view_url, ['escape' => false]) ?>
		</div>
	</div>
<?php endforeach ?>