<? $this->pageTitle = $model->mon_name.' - '.Yii::app()->params->sitename; ?>
<h3 align="center" class="title"><?=$model->mon_name?></h3>
<hr>
<?
	// Генерация таблицы мониторинга.
	$allParams = array('model'=>$model,'data'=>$data,'params'=>$params,'fields'=>$fields,'names'=>$names);
	if($model->table_id == 1) 
		$content = $this->renderPartial('tbl_generator',$allParams,true);
	else
		$content = $this->renderPartial('tbl_generator2',$allParams,true);
	echo $content;
?>