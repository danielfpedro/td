<!-- <h4 class="title title-with-divider">Últimos posts</h4> -->

<?php for ($i=0; $i < 4; $i++): ?>
	<?php foreach ($latest as $post): ?>
		<div class="post-latest">
			<div class="row">
				<div class="col-md-4 post-latest-avatar">
					<?= $this->Html->image($post->full_img_square_path, ['url' => ['controller' => 'Posts']]) ?>
				</div>
				<div class="col-md-8">
					<div class="post-latest-content">
						<div class="post-latest-body">
							<?= $this->Html->link('Noticias', [], ['class' => 'label label-default']) ?>
							<h2 class=""><?= $this->Html->link($post->title, []) ?></h2>
							<span class="pub-date">
								<span class="fa fa-clock-o"></span>
								<?= $post->pub_date_in_words ?>
							</span>	
							<p class="post-call-subtitle">
								Aqui nós temos um subtexto para dar um lugar bacana e preencher localidade.
							</p>
						</div>
						<div class="post-latest-footer text-right">
							<a href="#" class="dropdown-toggle">
								<span class="fa fa-share"></span> Compartilhar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php endfor; ?>