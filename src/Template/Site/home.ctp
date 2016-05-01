<div class="container">
	<div class="row" style="margin-bottom: 60px; margin-top: 20px;">
		<div class="col-md-4">
			<?= $this->Html->image('logo.png') ?>
		</div>
		<div class="col-md-8 text-right">
			<img src="http://placehold.it/400x80">
		</div>	
	</div>
</div>

<div>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<ul class="nav nav-pills">
					<li class="active">
						<a href="">Home</a>
					</li>
					<li>
						<a href="">as</a>
					</li>
				</ul>
			</div>
			<div class="col-md-5 text-right">
				<button class="btn btn-default btn-sm" style="margin-right: 20px;">
					<span class="fa fa-search"></span>
				</button>
				<button class="btn btn-default btn-sm">
					<span class="fa fa-facebook"></span>
				</button>
				<button class="btn btn-default btn-sm">
					<span class="fa fa-twitter"></span>
				</button>
				<button class="btn btn-default btn-sm">
					<span class="fa fa-youtube"></span>
				</button>
			</div>
		</div>
	</div>
</div>

<?= $this->element('Site/home_main') ?>

<div class="ad-horizontal-full">
	<img src="http://placehold.it/900x100">
</div>

<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php for ($i=0; $i < 4; $i++): ?>
				<?php foreach ($latest as $post): ?>
					<div class="post-latest">
						<div class="row">
							<div class="col-md-3 post-latest-avatar">
								<?= $this->Html->image($post->full_img_square_path, ['url' => ['controller' => 'Posts']]) ?>
							</div>
							<div class="col-md-9">
								<div class="post-latest-content">
									<div class="post-latest-body">
										<div class="label label-default">
											Noticias
										</div>
										<h2 class=""><?= $this->Html->link($post->title, []) ?></h2>
										<span class="pub-date"><?= $post->pub_date_in_words ?></span>	
									</div>
									<div class="post-latest-footer">
										<?= $this->Html->link('<span class="fa fa-heart"></span> Compartilhar',
											[],
											[
												'escape' => false
											])
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<?php endfor; ?>
			</div>
			<div class="col-md-4">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				
				<h4 class="side-col-title">Trend posts</h4>

				<?php foreach ($latest as $post): ?>
					<div class="post-compact">
						<div class="row">
							<div class="col-md-3 post-compact-avatar">
								<?= $this->Html->image($post->full_img_square_path, ['class' => 'img-circle', 'url' => ['controller' => 'Posts']]) ?>
							</div>
							<div class="col-md-9">
								<div class="post-compact-body">
									<h2 class="">
										<?= $this->Html->link($post->title, []) ?>
									</h2>
									<div class="row post-compact-footer">
										<div class="col-md-5 post-compact-pub-date">
											<span class="pub-date"><?= $post->pub_date_in_words ?></span>	
										</div>
										<div class="col-md-7 post-compact-share">
											<?= $this->Html->link('<span class="fa fa-heart"></span> Compartilhar',
												[],
												[
													'escape' => false
												])
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
</div>

<div class="ad-horizontal-full">
	<img src="http://placehold.it/900x100">
</div>