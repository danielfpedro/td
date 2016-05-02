<div class="posts-main-container posts-main-container-has-horizontal-ad">
	<div class="container">
		
			<div class="row">
				<?php foreach ($main as $post): ?>
					<div class="col-md-6 col-sm-6">
						<div class="post-main-wrap">
							<div
								class="post-main"
								style="background-image: url(<?= $this->Url->image($post->full_img_path) ?>);">

								<a href="#">
									<div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;z-index:-1;"></div>
								</a>
								
								<div class="post-main-content">
<!-- 									<span class="label label-default">
										<?= $post->category->name ?>
									</span> -->
									
									<?= $this->Html->link('<h2>' . h($post->title) . '</h2>', [], ['escape' => false]) ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<div class="post-main-small-container box-padding-top">
				<?php foreach ($mainSmall as $post): ?>
					<div class="col-md-4 col-sm-4">
						<div class="post-main-small">
							<div class="post-main-small-avatar">
								<?= $this->Html->image($post->full_img_square_path, ['class' => 'img-circle', 'url' => ['controller' => 'Posts']]) ?>
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