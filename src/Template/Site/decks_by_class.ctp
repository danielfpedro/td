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
					Decks
				</h2>

				<br>

				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>

				<br>

				<?php foreach (['Mago', 'Bruxo', 'Xamã', 'Guerreiro', 'Ladino', 'Paladino'] as $hero): ?>
					<div class="deck-hero-container" style="background-image: url()">
						<div class="title-with-avatar">
							<div class="avatar">
								<?= $this->Html->image('mage_avatar.png', ['class' => 'img-circle']) ?>
							</div>
							<h2 class="has-anchor" id="ladino">
								<?= $hero ?>
							</h2>
						</div>

						<br>

						<table class="table table-striped table-hover table-bordered table-condensed">
							<thead>
								<tr>
									<th>
										Nome
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
										<?= $this->Html->link('Reno Jacksson Lander', ['controller' => 'Site', 'action' => 'deck']) ?>
									</td>
									<td>
										<?= $this->Html->link('Midrange', []) ?>
									</td>
									<td>
										3.000
									</td>
								</tr>
								<tr>
									<td>
										<?= $this->Html->link('Face', []) ?>
									</td>
									<td>
										<?= $this->Html->link('Aggro', []) ?>
									</td>
									<td>
										1.500
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<br>
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