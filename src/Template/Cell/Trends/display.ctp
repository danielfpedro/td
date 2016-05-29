<h4 class="title title-with-divider box-margin-top">#Trend posts</h4>

<?php $i = 1; ?>
<?php foreach ($posts as $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<?php
				echo $i;
				$i++;
			?>
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