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
						<span class="pub-date">
							<?= $post->pub_date_in_words ?>
						</span>	
						<p class="post-call-subtitle">
							<?= $post->subtitle ?>
						</p>
					</div>
					<div class="post-latest-footer text-right">
						<a href="#" class="dropdown-toggle latests-posts-share">
							<span class="fa fa-share"></span> Compartilhar
						</a>
						<ul class="list-inline latests-posts-share-list-buttons" style="display: none;">
							<li>
								<a
									href="<?= $post->facebook_share_url ?>"
									target="_blank">
									<span class="fa fa-facebook"></span>
								</a>
							</li>
							<li>
								<a
									href="<?= $post->twitter_share_url ?>"
									target="_blank">
									<span class="fa fa-twitter"></span>
								</a>
							</li>
							<li>
								<a
									href="<?= $post->google_plus_share_url ?>"
									target="_blank">
									<span class="fa fa-google-plus"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>