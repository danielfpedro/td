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
				<div class="content">
					<h2 class="title title-with-divider">
						Decks
					</h2>

					<br>

					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>

					<br>
				
					<div class="row">
						<?php foreach ($classes as $class): ?>
							<div class="col-md-4">
								<?php $icon = $this->Html->image($class->slug . '-icon.png', ['width' => '50px', 'style' => 'margin-right: 15px']) ?>
								<?= $this->Html->link('<h2>' . $icon . $class->name . '</h2>', [
									'controller' => 'Site',
									'action' => 'decksByClass',
									'slug' => $class->slug
								], [
									'escape' => false,
									'class' => 'decks-hero-title'
								]) ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
	
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