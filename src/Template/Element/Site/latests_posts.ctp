<?php if (count($posts) < 1): ?>
	<em>Nenhum post para exibir.</em>
<?php endif ?>
<?php foreach ($posts as $post): ?>
	<div class="post-latest box-margin-bottom-sm">
		<div class="row">
			<div class="col-md-3 post-latest-avatar">
				<?= $this->Html->image($post->full_img_square_path, [
					'url' => $post->view_url,
					'alt' => $post->thumb_image
				]) ?>
			</div>
			<div class="col-md-9">
				<div class="post-latest-content">
					<div class="post-latest-body">
						<?= $this->Html->link($post->category->name, $post->category->view_url, ['class' => 'label label-default']) ?>

						<?= $this->Html->link('<h2>'.$post->title.'</h2>',
							$post->viewUrl,
							[
								'class' => 'box-padding-top-sm',
								'style' => 'display: block;',
								'escape' => false
							]
						) ?>
						<p class="post-call-subtitle">
							<?= $post->subtitle ?>
						</p>
						<span class="pub-date">
							<?= $post->pub_date_in_words ?>
						</span>	
					</div>
					<div class="post-latest-footer text-right">
						<ul class="list-inline">
							<li>
								<a
									href="<?= $post->facebook_share_url ?>"
									class="latest-post-social facebook"
									target="_blank">
									<span class="fa fa-facebook fa-fw"></span>
								</a>
							</li>
							<li>
								<a
									href="<?= $post->twitter_share_url ?>"
									class="latest-post-social twitter"
									target="_blank">
									<span class="fa fa-twitter fa-fw"></span>
								</a>
							</li>
							<li>
								<a
									href="<?= $post->google_plus_share_url ?>"
									class="latest-post-social google-plus"
									target="_blank">
									<span class="fa fa-google-plus fa-fw"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>