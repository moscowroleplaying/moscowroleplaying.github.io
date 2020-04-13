<? $this->pageTitle = 'Смена пароля и почты - '.Yii::app()->params->sitename; ?>
<h3 align="center" class="title">Настройки</h3>
<p>
	<h5 align="center" class="muted">Для того, чтобы изменить свой E-Mail, необходимо ввести новую почту и старую.</h5>
</p><center>
<hr>
<? $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'change-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array(
		'class'=>'my-form'
	),
));
	echo '<h5 class="muted">Смена E-Mail адреса:</h5>';
	echo $form->textField($model,$names['email']['alias'],array('value'=>'','placeholder'=>'Новый адрес'));
	echo $form->textField($model,'old_email',array('placeholder'=>'Старый адрес'));
	echo $form->error($model,'old_email');	

$this->endWidget(); ?><button class="btn btn-success" style="border-radius:0;width:258px;" type="submit">Не работает</button></center>