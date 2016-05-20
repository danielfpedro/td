<?= $this->assign('title', 'Deck Legendary Midrange - ') ?>



<style>
			.custom-popover {
				border: none;
				box-shadow: none;
				background: none!important;
				padding: 0;
				z-index: 9999;
				/*top: 10 !important;*/

			}
			.custom-popover > .popover-content {
				padding: 0;
				background: none!important;
				background-color: none!important;
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
				right: 0;
				bottom: 0;
				left: 0;
				background-color: rgba(0, 0, 0, .8);
				z-index: 2;
				-webkit-background-size: cover;
				background-size: cover;
				display: none;
			}
			.my-modal {
				position: fixed;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				/*background-color: #000;*/
				z-index: 3;
				/*background-image: url(https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png);*/
				margin: 40px;
			}
			.my-modal-body {
				width: 100%;
				height: 100%;
				-webkit-background-size: cover;
				background-size: auto 100%;
				background-position: center center;
				background-repeat: no-repeat;
			}
			.my-modal-body-loading {
				border-radius: 6px;
				background-color: #FFF;
				padding: 60px;
			}

.loader {
  margin: 0;
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: 5px solid rgba(231, 76, 60,1.0);
  border-right: 5px solid rgba(231, 76, 60,1.0);
  border-bottom: 5px solid rgba(231, 76, 60,1.0);
  border-left: 5px solid #FFF;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
.loader,
.loader:after {
  border-radius: 50%;
  width: 35px;
  height: 35px;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

.loader-container{
	display: flex;
	flex-direction: row;
	align-items: center;
	background-color: rgba(0, 0, 0, .8);
	padding: 10px;
	border-radius: 4px;
}
.loader-text {
	font-size: 16px;
	margin-left: 10px;
	font-family: 'Arial';

}
</style>

<?= $this->Html->script('../lib/preview-card/src/jquery.boilerplate.js', ['block' => true]) ?>

<div class="ad-horizontal-full hidden-xs box-margin-top">
	<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 deck-view-cover" style="background-color: #fff;">
			<a href="" class="box-margin-top-sm" style="">
				<span class="label label-default label-lg">
					Deck
				</span>
			</a>	
			<h1 class="post-view-title box-margin-top-sm">
				Legendary Midrange
			</h1>
			<div class="title-with-avatar box-margin-bottom box-margin-top-sm">
				<div class="avatar avatar-sm">
					<?= $this->Html->image('mage_avatar.png', ['class' => 'img-circle']) ?>
				</div>
				
				<a href="#">
					<h3>
						Deck de Mago
					</h3>
				</a>
			</div>
			<div class="row post-view-info">
				<div class="col-md-5">
					<div class="">
						<span class="post-view-pubdate">Atualizado 2 dias atrás</span>
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
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-8" style="background-color: #fff;">
			<div class="row box-margin-top">
				<div class="col-md-12 post-view-body box-padding-right">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>
			</div>

			<div class="row box-margin-top box-margin-bottom">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							Tópicos:
<a href="#"><span class="label label-light label-sm">Deck</span></a>&nbsp;<a href="#"><span class="label label-light label-sm">Midrange</span></a>&nbsp;<a href="#"><span class="label label-light label-sm">Mago</span></a>&nbsp;<span class="label label-light label-sm">Lendário</span>		
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
			<?= $this->element('Site/disqus') ?>
		</div>
		<div class="col-md-4">
			<div class="deck-list">
				<?= $this->element('Site/deck_list') ?>
			</div>
		</div>
	</div>
</div>
