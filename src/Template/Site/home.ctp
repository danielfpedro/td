<?php $this->assign('title', 'Papo de Taverna') ?>

<div class="container-topo">
	<?= $this->element('Site/navbar') ?>

	<div class="main-wrap main-container-has-horizontal-ad">

		<div class="ad-horizontal-full hidden-xs" style="margin: 20px 0">
			<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
		</div>

		<?= $this->element('Site/home_main') ?>
	</div>
</div>

<div class="container box-margin-top-lg">
		<div class="row">
			<div class="col-md-8">
				<?= $this->element('Site/latest_posts') ?>
			</div>
			<div class="col-md-4">
				<div class="text-center">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhearthstone&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
				
				<?= $this->cell('TrendPosts') ?>

			</div>
		</div>
</div>