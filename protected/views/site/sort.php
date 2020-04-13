<? $this->pageTitle = 'Сортировка информации в ЛК - '.Yii::app()->params->sitename; ?>
<h3>Сортировка выводимых полей в личном кабинете</h3>
<hr>
<p>
	Для того, чтобы информация в личном кабинете игрока отображалась так, как Вам хочется, отсортируйте поля по своему желанию. 
	<br>
	Примечание: На данной странице выводятся только отображаемые поля. Если в этом списке нет нужного параметра, проверьте, стоит ли галочка отображения в <a href="<?=Yii::app()->baseUrl?>/site/settings/1" title="Перейти к настройкам таблиц">настройках таблицы</a>.
</p>
<hr>
<?
	if(isset($msg)) {
		echo $msg;
	} else {
		$this->widget('zii.widgets.jui.CJuiSortable', array(
			'id'=>'orderList',
			'items'=>$items,
			'htmlOptions'=>array(
				'class'=>'jui-sortable',
			),	
		));
		echo CHtml::ajaxButton('Сохранить изменения','',
			array(
				'type'=>'POST',
				'data'=>array(
					'Order'=>'js:$("ul.ui-sortable").sortable("toArray").toString()',
				),
			),
			array('class'=>'btn btn-default pull-right')
		);
		echo '<div class="clearfix"></div>';	
	}				
?>	