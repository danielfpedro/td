<?php $this->assign('title', 'Guias, Decks e Notícias - ') ?>

<?= $this->cell('Navbar', ['hasBigVersion' => true ]) ?>

<div class="container-topo">

	<div class="main-wrap main-container-has-horizontal-ad">

		<div class="ad-horizontal-full hidden-xs box-margin-top box-margin-bottom">
			<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
		</div>

		<?= $this->cell('HomeMain') ?>

	</div>
</div>

<div class="container box-margin-top-lg">
		<div class="row">
			<div class="col-md-8">
				<?= $this->cell('LatestsPosts', [15, 1]) ?>
				<div class="lastest-posts-load-more">
					
				</div>
				<button
					type="button"
					class="btn btn-default btn-block btn-latest-posts-load-more"
					data-url="<?= $this->Url->build(['action' => 'latestPostsLoadMore']) ?>"
					data-page="2">
					Carregar Mais
				</button>
			</div>
			<div class="col-md-4">
				<div class="text-center">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhearthstone&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
				
				<?= $this->cell('Trends') ?>

			</div>
		</div>
</div>