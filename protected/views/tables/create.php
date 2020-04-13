<? $this->pageTitle = 'Добавление новой таблицы в систему - '.Yii::app()->params->sitename; ?>
<h3>Добавление новой таблицы в систему</h3>
<hr>
	<p>Добавление новой таблицы в систему, позволяет Вам производить все доступные функции панели с этой таблицей, например, создавать мониторинги по ней.</p>
<hr>
<?
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'enableClientValidation'=>true,
	));	
		$content = $form->errorSummary($model);
		$content .= '<br>';
		$content .= $form->textField($model,'table_name',array('class'=>'form-control','placeholder'=>'Название таблицы в БД (например: accounts, houses, banlist)'));		
		$content .= '<br>';
		$content .= $form->textField($model,'label',array('class'=>'form-control','placeholder'=>'Подпись таблицы (например: Аккаунты, Дома, Банлист)'));
		$content .= '<br>';
		$content .= $form->textArea($model,'desc',array('class'=>'form-control','placeholder'=>'Краткое описание таблицы (по желанию)'));	

		$content .= '<button type="submit" class="btn btn-primary btn-block">Добавить таблицу в систему</button>';
		echo $content;
	$this->endWidget();

?>