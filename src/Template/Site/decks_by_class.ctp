<?php $this->assign('title', 'Decks - ') ?>

<?= $this->cell('Navbar') ?>

<div class="discount-navbar-fixed">
	<div class="ad-horizontal-full hidden-xs box-padding-top">
		<img src="http://placehold.it/800x90?text=Ad%20Horizontal%20full%20800x900">
	</div>
</div>

<div class="container box-margin-top">
		<div class="row">
			<div class="col-md-8">
				<h2 class="title title-with-divider">
					<?= $this->Html->link('Decks', ['controller' => 'Site', 'action' => 'decks']) ?>
					>
					<?= $playClass->name ?>
				</h2>

				<?= $this->Html->image('mage_wide.jpg', ['width' => '100%']) ?>

				<br>

				<?php foreach ($decksClassifications as $classification): ?>
					<h2 class="title box-margin-top"><?= $classification->name ?></h2>
					<?php foreach ($classification->decks as $deck): ?>
						<table class="table table-striped table-hover table-bordered table-condensed box-margin-top-sm box-margin-bottom">
							<thead>
								<tr>
									<th>
										Nome
									</th>
									<th>
										Expansões
									</th>
									<th>
										Estilo
									</th>
									<th>
										Custo (Mana)
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?= $this->Html->link($deck->name, $deck->post->view_url) ?>
										<br>
										
									</td>
									<td>
										<span class="label label-small label-primary">TOG</span>
									</td>
									<td>
										<?= $this->Html->link($deck->decks_type->name, []) ?>
									</td>
									<td>
										3.000
									</td>
								</tr>
							</tbody>
						</table>
					<?php endforeach ?>
					<?php if (!$classification->decks): ?>
						<p class="box-margin-top-sm"><em>Nenhum deck adicionado ainda.</em></p>
					<?php endif ?>
				<?php endforeach ?>
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