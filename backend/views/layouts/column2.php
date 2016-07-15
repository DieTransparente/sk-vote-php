<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<div class="row">
	<div class="col-sm-3">
	<?php 
		use kartik\widgets\SideNav;
		use yii\helpers\Url;
		
	if (!empty($this->params['sidenav']['items'])) {
		// widget description and demo: http://demos.krajee.com/widget-details/sidenav
		$type = !empty($this->params['sidenav']['type']) ? $this->params['sidenav']['type'] : SideNav::TYPE_DEFAULT;
		$heading = !empty($this->title) ? $this->title : false;
		$currentItem = !empty($this->title) ? $this->title : '';
		$items = $this->params['sidenav']['items'];
		
		echo SideNav::widget([
				'type' => $type,
				'encodeLabels' => false,
				'heading' => $heading,
				'items' => $items,
		]);
	}
	?>
	</div>
	<div class="col-sm-19">
		<div class="column2 content-wrapper">
			<?= $content ?>
		</div>
	</div>
</div>

<?php $this->endContent(); ?>