<div class="posts-main-container">
	<div class="container">
		<div class="row">
			<?php foreach ($main as $post): ?>
				<div class="col-md-6 col-sm-6">
					<div
						class="post-main"
						style="background-image: url(<?= $this->Url->image($post->full_img_path) ?>);">
						
						<div class="post-main-content">
							<span class="label label-default">
								<?= $post->category->name ?>
							</span>
							<h2>
								<?= $post->title ?>
							</h2>
						</div>

					</div>
				</div>
			<?php endforeach ?>
		</div>

		<div class="post-main-small-container box-padding-top">
			<?php foreach ($mainSmall as $post): ?>
				<div class="col-md-4 col-sm-4">
					<a href="">
						<div class="post-main-small">
							<div class="row">
								<div class="col-md-4 post-main-small-avatar">
									<?= $this->Html->image($post->full_img_square_path, ['class' => 'img-circle', 'url' => []]) ?>
								</div>
								<div class="col-md-8 post-main-small-body">
									<span class="label label-default label-sm">
										<?= $post->category->name ?>
									</span>
									<h3 class="text-block-padding">
										<?= $this->Html->link($this->Text->truncate($post->title, 65), []) ?>
									</h3>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>