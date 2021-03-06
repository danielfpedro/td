<div class="main-container">
	<div class="container">
		<div class="row">
			<?php foreach ($main as $post): ?>
				<?php
					$postUrl = $this->Url->build($post['view_url']);
				?>
				<div class="col-md-6 col-sm-6">
					<div class="post-main-wrap">
						<div
							class="post-main"
							style="background-image: url(<?= $this->Url->image($post->full_img_path) ?>);">

							<a href="<?= $postUrl ?>">
								<div class="post-main-overlay"></div>
							</a>
							
							<div class="post-main-content">
								<a href="<?= $postUrl ?>">
									<h2>
										<?= h($post->title) ?>
									</h2>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<div class="post-main-small-wrap">
			<div class="row">
				<?php foreach ($mainSmall as $post): ?>
					<div class="col-md-4 col-sm-4">
						<div class="post-main-small">
							<div class="post-main-small-avatar">
								<?= $this->Html->image($post->full_img_square_path, [
										'class' => 'img-circle',
										'url' => ['controller' => 'Posts']
									]) ?>
							</div>
							<div class="post-main-small-body">
								<?= $this->Html->link('<h3>' . $post->title . '</h3>', [], ['escape' => false]) ?>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>