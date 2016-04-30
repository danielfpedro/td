<div class="posts-main-container">
	<div class="container">
		<div class="row">
			<?php foreach ($main as $post): ?>
				<div class="col-md-6 col-sm-6">
					<a href="">
						<div
							class="post-main"
							style="background-image: url(<?= $this->Url->image($post->full_img_path) ?>);">
							
							<span class="label label-default">
								<?= $post->category->name ?>
							</span>
							<h2>
								<?= $post->title ?>
							</h2>

						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
