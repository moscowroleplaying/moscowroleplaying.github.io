<? if(Yii::app()->request->cookies['instal']->value == 3) {?>
	<h3>Завершение установки.</h3>
	<hr>
	<p>
		Вы успешно установили Universal UCP - HARD. Для обеспечения безопасности, удалите файл установки по адресу <code>/protected/controllers/InstalController.php</code>
		<br>
		Теперь Вы можете авторизоваться в личном кабинете, используя свой серверный аккаунт. Если все параметры были введены верно, Вы увидите информацию о своем аккаунте.
		<hr>
		<a href="<?=Yii::app()->baseUrl?>/site/login" class="btn btn-info btn-lg btn-block">Авторизоваться в личном кабинете</a>
	</p>
<? 
	unset(Yii::app()->request->cookies['instal']);
} else {
	$instal = new CHttpCookie('instal','1');
	Yii::app()->request->cookies['instal'] = $instal; ?>
	<h3>Мастер установки Universal UCP - HARD</h3>
	<hr>
	<p>
		Вас приветствует мастер установки Universal UCP - HARD. Следуйте указаниям до полного завершения установки.
	</p>
	<hr>
	<a href="<?=Yii::app()->baseUrl?>/instal/config" class="btn btn-info btn-lg btn-block">Приступить к установке</a>
<? } ?>