<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <?= $this->Html->image('logo.png', ['width' => '60px']) ?>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="#">Notícias</a></li>
        <li><a href="#">Reportagens</a></li>
        <li><a href="#">Programas</a></li>
      </ul>

      <div class="navbar-right">
<!-- 			<form class="navbar-form navbar-left">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default navbar-search-submit">
								<span class="fa fa-search"></span>
							</button>
						</div>
						<input type="search" class="form-control navbar-search-input" placeholder="Buscar...">
					</div>
				</div>
			</form> -->
      <ul class="nav navbar-nav">
        <li style="margin-right: 10px;">
        	<a href="#" class="text-primary">
        		<span class="fa fa-search"></span>
        	</a>
        </li>
        <li>
        	<a href="#" class="text-primary">
        		<span class="fa fa-facebook"></span>
        	</a>
        </li>
        <li>
        	<a href="#" class="text-danger">
        		<span class="fa fa-youtube-play"></span>
        	</a>
        </li>
        <li class="">
        	<a href="#" class="text-info">
        		<span class="fa fa-twitter"></span>
        	</a>
        </li>        
      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="main-wrap main-container-has-horizontal-ad">

	<div class="ad-horizontal-full">
		<img src="http://placehold.it/800x90">
	</div>

	<?= $this->element('Site/home_main') ?>
</div>

<div class="container" style="margin-top: 20px;">
		<h4 class="side-col-title">Últimos posts</h4>
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