<h4 class="title title-with-divider box-margin-top">#Trend posts</h4>

<?php foreach ($trend as $key => $post): ?>
	<div class="post-compact">
		<div class="post-compact-avatar">
			<?= ($key + 1) ?>
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

<!-- <div class="list-group">
	<?php foreach ($trend as $post): ?>
		<a href="#" class="list-group-item" style="font-size: 16px;">
			<?= $post->title ?>
			<br>
			<span class="text-muted" style="font-size: 12px;">2 dias atrás</span>
		</a>
	<?php endforeach ?>
</div> -->