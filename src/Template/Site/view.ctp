<?= $this->assign('title', $post->title .' - ') ?>

<?= $this->cell('Navbar') ?>

<div class="discount-navbar-fixed">
	<div class="ad-horizontal-full hidden-xs box-padding-top">
		<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
	</div>
</div>

<div class="container box-margin-top">

	<div class="row">
		<div class="col-md-8">
			<!-- Capa de vídeo -->
			<?php if ($post->video_cover): ?>
				<div>
					<?= $this->Post->showVideo($post->video_cover, $post->video_cover_provider) ?>
				</div>
			<?php endif ?>

			<!-- Capa imagem -->
			<?php if ($post->has_cover): ?>
				<div">
					<?= $this->Html->image($post->image_cover_full_path, ['width' => '100%']) ?>	
				</div>
			<?php endif ?>	
			<div class="content-post">

				<h1 class="post-view-title box-margin-bottom">
					<?= $post->title ?>
				</h1>
				<div class="row post-view-info box-margin-top box-margin-bottom">
					<div class="col-md-4">
						<?php $tagUrl = ['controller' => 'Site', 'action' => 'category', 'slug' => $post->category->slug] ?>
						<a href="<?= $this->Url->build($tagUrl) ?>">
							<span class="">
								<?= $post->category->name ?>
							</span>
						</a>&nbsp;<span class="post-view-pubdate"><?= $post->pub_date_in_words ?></span>
					</div>
					<div class="col-md-8 text-right">
						<a
							href="<?= $post->facebook_share_url ?>"
							class="btn btn-primary btn-share-lg"
							target="_blank">
							<span class="fa fa-facebook"></span> Compartilhar no Facebook
						</a>
						<a
							href="<?= $post->twitter_share_url ?>"
							class="btn btn-info btn-share-lg"
							target="_blank">
							<span class="fa fa-twitter"></span> Compartilhar no Twitter
						</a>
					</div>
				</div>
	

				<div class="row">
					<div class="col-md-12 post-view-body">
						<!-- <?= $this->Text->autoParagraph($post->body) ?>		 -->
						<?= $this->Post->parseText($post->body) ?>		
					</div>
				</div>

				<div class="row box-margin-top-x-2">
					<div class="col-md-12">
						Tópicos:
						<?php foreach ($post->tagsArray as $tag): ?>
							<?php $tagUrl = ['controller' => 'Site', 'action' => 'category', 'slug' => $tag['slug']] ?>
							<a href="<?= $this->Url->build($tagUrl) ?>">
								<span class="label label-light label-sm"><?= $tag['name'] ?></span>
							</a>&nbsp;								
						<?php endforeach ?>
					</div>
				</div>
				<div class="row box-margin-top">
					<div class="col-md-12 text-left">
						<a
							href="<?= $post->facebook_share_url ?>"
							class="btn btn-primary btn-share-lg"
							target="_blank">
							<span class="fa fa-facebook"></span> Compartilhar no Facebook
						</a>
						<a
							href="<?= $post->twitter_share_url ?>"
							class="btn btn-info btn-share-lg"
							target="_blank">
							<span class="fa fa-twitter"></span> Compartilhar no Twitter
						</a>
					</div>
				</div>

				<div class="box-margin-top-x-2">
					<?= $this->cell('ReadMore', ['currentPost' => $post]) ?>
				</div>

			</div>

				<hr>
				<h1 class="title box-margin-bottom">Comentários</h1>
				<!-- DISQUS -->
				<div id="disqus_thread"></div>
				<script>
				/**
				* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
				*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');

				s.src = '//topdeck.disqus.com/embed.js';

				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>				

			</div><!-- Fim .content-post -->
		</div>
		<div class="col-md-4">
			<div class="text-center">
				<img src="http://placehold.it/350x300?text=Ad%20Side Column" width="100%">
			</div>
			<div class="box-margin-top">
				<?= $this->cell('PostsRelated', [$post, 6]) ?>
			</div>
		</div>
	</div>
</div>