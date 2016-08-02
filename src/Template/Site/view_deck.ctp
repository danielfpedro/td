<?= $this->assign('title', $post->title .' - ') ?>

<style type="text/css">
			.my-hs-popover{
				background-position: center center;
				background-size: contain;
				background-repeat: no-repeat;
				position: absolute;
				/*background-color: #DDD;*/
				display: none;
				z-index: 999;
			}
			.custom-modal .modal-content{
				background: none!important;
			}
			.custom-modal .modal-content{
				background: none!important;
			}
			.custom-modal .modal-body {
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center center;
				position: relative;
				overflow: hidden;
			}
			.overlay {
				position: fixed;
				top: 0;
				left: 0
				right: 0;
				bottom: 0;
				width: 100%;
				background-color: rgba(0, 0, 0, .8);
				/*background-color: pink;*/
				z-index: 99999;
				display: none;
				padding: 20px;
			}
			.my-modal-body {
				position: relative;
				width: 100%;
				height: 100%;
				background-size: contain;
				background-position: center center;
				background-repeat: no-repeat;
				/*background-color: red;*/
			}
			.my-modal-body-loading {
				position: absolute;
				top: 50%;
				left: 50%;
				width: 42px;
				height: 42px;
				margin-left: -21px;
				margin-top: -21px;
			}
			.my-modal-close {
				clear: both;
				z-index: 3;
				position: fixed;
				top: 0;
				right: 0;
				border: none;
				background: none;
				float: right;
				font-weight: bold;
				font-size: 30px;
				background-color: #c0392b;
				color: #FFF;
				margin: 0;
				padding: 0!important;
/*			    cursor: pointer;
			    display: flex;
			    flex-wrap: wrap-reverse;*/
/*			    align-content: center;
			    align-items: center;*/

			}
</style>

<?= $this->Html->script('Site/affix', ['block' => true]) ?>

<?= $this->Html->script('Site/card-preview.js', ['block' => true]) ?>


<div class="overlay">
	<span class="my-modal-close">&times;</span>
	<div class="my-modal-body">
	</div>
</div>

<?= $this->cell('Navbar') ?>

<div class="discount-navbar-fixed">
	<div class="ad-horizontal-full hidden-xs box-padding-top">
		<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
	</div>
</div>

<div class="container box-margin-top">

	<div class="row">
		<div class="col-md-8">
			<div class="content-post">
				<?php $tagUrl = ['controller' => 'Site', 'action' => 'category', 'slug' => $post->category->slug] ?>
				<a href="<?= $this->Url->build($tagUrl) ?>" class="post-view-category">
					<span class="">
						<?= $post->category->name ?>
					</span>
				</a>
				<h1 class="post-view-title box-margin-bottom">
					<?= $post->title ?>
				</h1>

				<div class="row box-margin-bottom-sm">
					<div class="col-md-12">
						<span class="post-view-pubdate">
							<span class="fa fa-clock-o"></span>
							<?= $post->pub_date_in_words ?>
						</span>
					</div>
				</div>
				<div class="row">
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

				<div class="row box-margin-top-x-2">
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
													<span
														class="card rarity-<?= $card->rarity_id ?>"
														data-card-uid="<?= $card->id ?>">
														<span class="card-list-card">
															<?= $card->name ?>
														</span>
														<?php if ($card->cards_set->id != 3): ?>
															<span class="card-set"><?= $card->cards_set->short_name ?></span>	
														<?php endif ?>
													</span>
												</td>
												<td style="width:50px;">
													<?= $card->mana_cost ?> <?= $this->Html->image('mana_crystal.png', [
														'width' => 15
													]) ?>
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

<?= $this->element('Site/footer') ?>