<?= $this->assign('title', $post->title) ?>

<div class="ad-horizontal-full hidden-xs box-margin-top">
	<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
</div>

<div class="container-fluid box-margin-top">
	<div class="row">
		<div class="col-md-9 box-padding-left box-padding-right box-padding-top" style="background-color: #fff;">
			<h1 class="post-view-title box-margin-bottom">
				<?= $post->title ?>
			</h1>
			<div class="">
				<?= $this->Html->image('druid.jpg', ['width' => '100%']) ?>
			</div>
			<div class="row box-margin-top">
				<div class="col-md-3">
					<div></div>
				</div>
				<div class="col-md-9 post-view-body">
					<p>
						<?= $this->Text->autoParagraph($post->body) ?>		
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<?= $this->cell('TrendPosts') ?>
		</div>
	</div>
</div>