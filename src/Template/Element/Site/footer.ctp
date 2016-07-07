
<div class="footer box-margin-top-x-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<ul class="list-inline footer-links">
					<li>
						<a href="#">
							<?= $this->Html->link('Trabalhe conosco', []) ?>
						</a>
					</li>
					<li>
						<a href="#">
							<?= $this->Html->link('Imprensa', []) ?>
						</a>
					</li>
					<li>
						<a href="#">
							<?= $this->Html->link('Publicidade', []) ?>
						</a>
					</li>
					<li>
						<a href="#">
							<?= $this->Html->link('Termos de utilização', []) ?>
						</a>
					</li>
					<li>
						<a href="#">
							<?= $this->Html->link('Privacidade', []) ?>
						</a>
					</li>
				</ul>	
			</div>
			<div class="col-md-12 text-center box-margin-top-sm" style="margin-bottom: 10px;">
				Siga a gente nas Redes Sociais:
			</div>
			<div class="col-md-12 text-center">
				<ul class="list-inline footer-social-links">
					<li>
						<?= $this->Html->link('<span class="fa fa-facebook fa-fw"></span>', [], [
							'class' => 'btn btn-primary btn-xs',
							'escape' => false]
						) ?>		
					</li>
					<li>
						<?= $this->Html->link('<span class="fa fa-twitter fa-fw"></span>', [], [
							'class' => 'btn btn-info btn-xs',
							'escape' => false
						]) ?>		
					</li>
					<li>
						<?= $this->Html->link('<span class="fa fa-youtube-play fa-fw"></span>', [], [
							'class' => 'btn btn-danger btn-xs',
							'escape' => false
						]) ?>		
					</li>
				</ul>
			</div>
			<div class="col-md-12 text-center box-margin-top-sm">
				<?= $this->Html->link('Papo de Taverna', ['controller' => 'Site', 'action' => 'home']) ?> © 2016. Feito com <span class="fa fa-heart heart"></span> por <a href="#">Daniel Pedro</a>.
			</div>
		</div>
	</div>
</div>