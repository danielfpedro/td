
<div class="footer box-margin-top-x-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<ul class="list-inline footer-links">
					<li>
						<a href="mailto:trabalheconosco@papodetaverna.com.br" target="_blank">
							Trabalhe Conosco
						</a>
					</li>
					<li>
						<a href="mailto:imprensa@papodetaverna.com.br" target="_blank">
							Imprensa
						</a>
					</li>
					<li>
						<a href="mailto:publicidade@papodetaverna.com.br" target="_blank">
							Publicidade
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
				<?= $this->Html->link('Papo de Taverna', ['controller' => 'Site', 'action' => 'home']) ?> © <?= (new Datetime())->format('Y') ?>.
			</div>
		</div>
	</div>
</div>