<!-- <h4 class="title title-with-divider">Últimos posts</h4> -->

<?php for ($i=0; $i < 4; $i++): ?>
	<?php foreach ($latest as $post): ?>
		<div class="post-latest box-margin-bottom-sm">
			<div class="row">
				<div class="col-md-3 post-latest-avatar">
					<?= $this->Html->image($post->full_img_square_path, ['url' => ['controller' => 'Posts']]) ?>
				</div>
				<div class="col-md-9">
					<div class="post-latest-content">
						<div class="post-latest-body">
							<?= $this->Html->link('Noticias', [], ['class' => 'label label-default']) ?>

							<?= $this->Html->link('<h2>'.$post->title.'</h2>',
								$post->viewUrl,
								[
									'class' => 'box-padding-top-sm',
									'style' => 'display: block;',
									'escape' => false
								]
							) ?>
							<span class="pub-date">
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