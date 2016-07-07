<?= $this->assign('title', $post->title .' - ') ?>

<?= $this->Html->script('Site/affix', ['block' => true]) ?>

<?= $this->Html->script('../lib/preview-card/src/jquery.boilerplate.js', ['block' => true]) ?>


<?= $this->Html->scriptStart(['block' => true]) ?>

	$( function() {
		var url = 'http://localhost/td/cartas/{id}.json';

		$("span.rarity-5" ).defaultPluginName({
			imageSize: 300,
			endPoint: url,
			field: 'img',
			beforeSend: function(){

			}
		});
	} );

<?= $this->Html->scriptEnd() ?>

<script>
</script>


<?= $this->cell('Navbar') ?>

<div class="discount-navbar-fixed">
	<div class="ad-horizontal-full hidden-xs box-padding-top">
		<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
	</div>
</div>

<div class="container box-margin-top">

	<div class="row">
		<div class="col-md-8" style="background-color: #fff;">

			<!-- Capa de vídeo -->
			<?php if ($post->video_cover): ?>
				<div style="margin: 0 -15px;">
					<?= $this->Post->showVideo($post->video_cover, $post->video_cover_provider) ?>
				</div>
			<?php endif ?>

			<?php $tagUrl = ['controller' => 'Site', 'action' => 'category', 'slug' => $post->category->slug] ?>
			<a href="<?= $this->Url->build($tagUrl) ?>" class="box-margin-top-sm" style="margin-top: 15px; display: block">
				<span class="label label-default label-lg">
					<?= $post->category->name ?>
				</span>
			</a>	

			<?php if ($post->deck): ?>
				<?= $this->Html->link('Decks de ' . $post->deck->play_class->name, ['action' => 'decksByClass', 'slug' => $post->deck->play_class->slug]) ?> >
			<?php endif ?>

			<h1 class="post-view-title box-margin-bottom box-margin-top-sm">
				<?= $post->title ?>
			</h1>
			<hr>
			<div class="row post-view-info">
				<div class="col-md-5">
					<div class="">
						<img src="http://graph.facebook.com/v2.6/100001591518421/picture?type=square" class="img-circle post-view-author-profile-picture"> <a href="#" class="post-view-author"><?= $post->author->name ?></a> . <span class="post-view-pubdate"><?= $post->pub_date_in_words ?></span>
					</div>
				</div>
				<div class="col-md-7 text-right">
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

			<hr>

			<!-- Capa imagem -->
			<?php if ($post->has_cover): ?>
				<div style="margin: 0 -15px;">
					<?= $this->Html->image($post->image_cover_full_path, ['width' => '100%']) ?>	
				</div>
			<?php endif ?>

			<div class="row box-margin-top">
				<div class="col-md-11 post-view-body box-padding-right">
					<!-- <?= $this->Text->autoParagraph($post->body) ?>		 -->
					<?= $this->Post->parseText($post->body) ?>		
				</div>
			</div>

			<div class="row box-margin-top box-margin-bottom">
				<div class="col-md-11">
					<div class="row">
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
					 
				</div>
				
				<div class="col-md-12">
					<hr>
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
					<hr>
				</div>
			</div>

			<?= $this->cell('ReadMore', ['currentPost' => $post]) ?>

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
			<div class="container-deck-list" data-spy="affix">
				<?php if ($post->deck): ?>
					<div class="row">
						<?php
							$cardsGroups = ['Cartas de ' . $post->deck->play_class->name, 'Cartas Neutras'];
						?>
						<?php foreach ($cardsGroups as $key => $group): ?>
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th class="" colspan="3">
												<?= $group ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($post->deck->cards[$key] as $card): ?>
											<tr>
												<td>
													<?= $card->_joinData->qtd ?>x&nbsp;
													<span class="rarity-<?= $card->rarity_id ?>">
														<span class="card-list-card"><?= $card->name ?></span>
														<?php if ($card->cards_set->id != 3): ?>
															<span class="card-set"><?= $card->cards_set->short_name ?></span>	
														<?php endif ?>
													</span>
												</td>
												<td style="width:50px;">
													<?= $card->mana_cost ?> <?= $this->Html->image('mana_crystal.png', ['width' => 15]) ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>