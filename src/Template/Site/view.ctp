<?= $this->assign('title', $post->title) ?>

<?= $this->cell('Navbar') ?>

<div class="ad-horizontal-full hidden-xs box-margin-top">
	<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
</div>

<div class="container box-margin-top">
	<div class="row">
		<div class="col-md-8" style="background-color: #fff;">
			<a href="" class="box-margin-top-sm" style="margin-top: 15px; display: block">
				<span class="label label-default label-lg">
					Review
				</span>
			</a>	
			<h1 class="post-view-title box-margin-bottom box-margin-top-sm">
				<?= $post->title ?>
			</h1>
			<hr>
			<div class="row post-view-info">
				<div class="col-md-5">
					<div class="">
						<img src="http://graph.facebook.com/v2.6/100001591518421/picture?type=square" class="img-circle post-view-author-profile-picture"> <a href="#" class="post-view-author">Daniel Cocota</a> . <span class="post-view-pubdate"><?= $post->pub_date_in_words ?></span>
					</div>
				</div>
				<div class="col-md-7 text-right">
					<button class="btn btn-primary btn-share-lg">
						<span class="fa fa-facebook"></span> Compartilhar no Facebook
					</button>
					<button class="btn btn-info btn-share-lg">
						<span class="fa fa-twitter"></span> Compartilhar no Twitter
					</button>
				</div>
<!-- 				<div class="col-md-4 text-right">
					<button class="btn btn-default btn-sm">
						<span class="fa fa-comments"></span> 12 Comentários
					</button>					
				</div> -->
			</div>

			<hr>
			
			<div class="row">
				<div class="col-md-12">
					<?= $this->Html->image('druid.jpg', ['width' => '100%']) ?>	
				</div>
			</div>
			<div class="row box-margin-top">
<!-- 				<div class="col-md-2 text-right">
					<div>
						<img src="http://graph.facebook.com/v2.6/100001591518421/picture?type=square" class="img-circle">
					</div>
					<a href="#">
						<h4>
							Por Daniel Cocota
						</h4>
					</a>
					<hr>
					<?= $post->pub_date_in_words ?>
				</div> -->
				<div class="col-md-12 post-view-body box-padding-right">
					<?= $this->Text->autoParagraph($post->body) ?>		
				</div>
			</div>

			<div class="row box-margin-top box-margin-bottom">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							Tópicos:
<a href="#"><span class="label label-light label-sm">Game Of Thrones</span></a>&nbsp;<a href="#"><span class="label label-light label-sm">Game Of Thrones</span></a>&nbsp;<a href="#"><span class="label label-light label-sm">Game Of Thrones</span></a>&nbsp;<span class="label label-light label-sm">Shaniqua</span>		
						</div>
					</div>
					 
				</div>
				
				<div class="col-md-12">
					<hr>
					<button class="btn btn-primary btn-share-lg">
						<span class="fa fa-facebook"></span> Compartilhar no Facebook
					</button>
					<button class="btn btn-info btn-share-lg">
						<span class="fa fa-twitter"></span> Compartilhar no Twitter
					</button>
					<hr>
				</div>
			</div>

			<h2 class="title box-margin-top">Leia mais</h2>
			<div class="row box-margin-top-sm box-margin-bottom">
				<?php foreach ($readMore as $post): ?>
					<div class="col-md-6 box-margin-bottom">
						<div class="post-squared" style="background-image: url(<?= $this->Url->image($post->full_img_path) ?>)">
							
							<div class="bg-overlay bg-overlay-40 bg-overlay-border-radius"></div>						

							<div class="post-squared-title">	
								<a href="#">
									<h3>
										<?= $post->title ?>
									</h3>
								</a>
							</div>
							<div class="post-squared-footer">
								<a href="#">
									<img src="http://graph.facebook.com/v2.6/100001591518421/picture?type=square" class="img-circle">
								</a> <a href="#">Daniel Pedro</a> <span class="post-squared-footer-pub-date"><?= $post->pub_date_in_words ?></span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
<!-- DISQUS -->
			<div>
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
			</div>

		</div>
		<div class="col-md-4">
			<div class="">
			<div class="text-center">
				<img src="http://placehold.it/350x300?text=Ad%20Side Column" width="100%">
			</div>
			<div class="box-margin-top">
				<?= $this->cell('PostsRelated', [10]) ?>
			</div>
			</div>
		</div>
	</div>
</div>