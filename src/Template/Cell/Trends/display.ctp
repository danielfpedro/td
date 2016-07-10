<h4 class="title box-margin-bottom-sm title-with-divider">#Trend posts</h4>

<?php $i = 1; ?>
<div class="">
	<?php foreach ($posts as $post): ?>
		<div class="trends-container">
			<div class="trend">	
				<div class="trends-number">
					<span class="">
						<?php
							echo $i;
							$i++;
						?>
					</span>
				</div>
				<div class="trends-body">
					<?= $this->Html->link('<h2>'.$post['title'].'</h2>', [], ['escape' => false]) ?>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>