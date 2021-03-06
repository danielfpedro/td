<?= $this->assign('title', $tag['name'] . ' - ') ?>

<?= $this->cell('Navbar') ?>

<div class="discount-navbar-fixed">
	<div class="ad-horizontal-full hidden-xs box-padding-top">
		<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
	</div>
</div>

<div class="container box-margin-top">

	<div class="row">
		<div class="col-md-8">
			<h1 class="title box-margin-bottom-sm"><?= $tag->name ?></h1>

			<?= $this->element('Site/latests_posts', ['posts' => $posts]) ?>

			<ul class="pagination">
				<?= $this->Paginator->prev('<span class="fa fa-chevron-left"></span>', ['escape'=> false]) ?>
				<?= $this->Paginator->next('<span class="fa fa-chevron-right"></span>', ['escape'=> false]) ?>
			</ul>
		</div>
		<div class="col-md-4">
			<div class="">
			<div class="text-center">
				<img src="http://placehold.it/350x300?text=Ad%20Side Column" width="100%">
			</div>
			<div class="box-margin-top">
				<?= $this->cell('PostsRelated', [null, 10]) ?>
			</div>
			</div>
		</div>
	</div>
</div>