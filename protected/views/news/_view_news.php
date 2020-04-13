<div class="my-panel">
	<div class="my-panel-header">
		<i></i>&nbsp;<a href="<? echo Yii::app()->baseUrl.'/news/view/'.$data->id; ?>"><? echo $data->title; ?></a>
		<? $c = new TimeConvert; ?>
		<div class="pull-right"><? echo $c->convert(strtotime($data->create_time)); ?></div>
	</div>
	<div class="my-panel-body">				
		<p>
			<?=$data->content?>
			<p align="right"><a href="<? echo Yii::app()->baseUrl.'/news/view/'.$data->id; ?>" class="btn btn-default">Подробнее</a></p>
		</p>
	</div>
		
</div>
