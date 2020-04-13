<? $this->pageTitle = $model->top_name.' - '.Yii::app()->params->sitename; ?>
<h3>Рейтинг: <?=$model->top_name?></h3>
<hr>
<?
	// Отображение рейтинговой таблицы.
	$all_params = array('model'=>$model,'data'=>$data,'params'=>$params,'fields'=>$fields,'names'=>$names);
	if($model->table_id == 1) 
		$content = $this->renderPartial('tbl_generator',$all_params,true);
	else
		$content = $this->renderPartial('tbl_generator2',$all_params,true);
	echo $content;
?>