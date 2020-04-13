<? $this->pageTitle =  $data->title.' - '.Yii::app()->params->sitename; ?>

<?
	if(!Yii::app()->user->isGuest AND Yii::app()->user->admin >= Yii::app()->params['editor_level']) { ?>
		<div class="clearfix"></div>
		<div class="pull-right">
			<a class="btn btn-info" href="<?=Yii::app()->baseUrl?>/news/update/<?=$data->id?>" title="Редактировать">Редактировать новость</a>
			<a class="btn btn-danger" href="<?=Yii::app()->baseUrl?>/news/delete/<?=$data->id?>" title="Редактировать">Удалить новость</a>
		</div>
		<div class="clearfix"></div>
		<br><?
	}
?>

<div class="my-panel">
	<div class="my-panel-header">
		<i class="fa fa-bars"></i>&nbsp;<? echo $data->title; ?>
		<? $c = new TimeConvert; ?>
		<div class="pull-right"><abbr title="<? echo date('d.m.Y в H:m:s',strtotime($data->create_time)); ?>"><? echo $c->convert(strtotime($data->create_time)); ?></abbr></div>
	</div>
	<div class="my-panel-body">				
		<p><? echo nl2br($data->full_content); ?></p>
	</div>
</div>