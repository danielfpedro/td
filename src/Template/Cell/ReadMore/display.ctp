<h2 class="title box-margin-top">Leia mais</h2>
<div class="row box-margin-top-sm box-margin-bottom">
	<?php foreach ($posts as $post): ?>
		<div class="col-md-6 box-margin-bottom">
		<a href="<?= $this->Url->build($post->view_url) ?>">
			<div class="post-squared" style="background-image: url(<?= $this->Url->image($post->image_cover_full_path) ?>)">
				
				<div class="bg-overlay bg-overlay-20 bg-overlay-border-radius"></div>						
				<div class="post-squared-title">	
					<div class="post-squared-pub-date"><?= $post->pub_date_in_words ?></div>
					<?= $this->Html->link('<h3>' .$post->title. '</h3>', $post->view_url, ['escape' => false]) ?>

				</div>
			</div>
							</a>
		</div>
	<?php endforeach ?>
</div>