<?= $this->assign('title', 'Deck - ') ?>

<?= $this->Html->css('/lib/jquery-ui/themes/cupertino/jquery-ui.min', ['block' => true]) ?>
<?= $this->Html->script('/lib/jquery-ui/jquery-ui.min', ['block' => true]) ?>
<?= $this->Html->script('Admin/cards/make', ['block' => true]) ?>


<textarea id="cards-json"><?= json_encode($deck->cards) ?></textarea>

<div class="container" style="margin-top: 100px">
	<?= $this->Form->create($deck) ?>
		<?= $this->Form->submit('Salvar') ?>
		<div class="row">
			<div class="col-md-4">
				<input
					type="text"
					class="form-control"
					data-url="<?= $this->Url->build(['controller' => 'Cards', 'action' => 'autocomplete','prefix' => false]) ?>"
					id="search">
			</div>
			<div class="col-md-1">
				<input type="text" id="qtd" value="2" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-1">
				<button type="button" class="btn btn-primary btn-block btn-add">Add</button>
			</div>
			<div class="col-md-4">
				<ul id="cards">
					
				</ul>
			</div>
		</div>
	<?= $this->Form->end() ?>
</div>