<form class="my-form" action="<? echo Yii::app()->baseUrl; ?>/changename/index" method="post" role="form">
	<p>	Для того, чтобы сменить ник на сервере, необходимо оставить заявку. Модератор сервера рассмотрит ее и примет решение. 
		Только после этого, Вы сможете использовать новое имя. Решение модератора придет Вам на E-Mail, привязанный к Вашего аккаунту (<?=$data->{$field[email][alias]}?>)</p>
	<input type="text" name="Change[new_name]" placeholder="Желаемый ник" required="required">
	<textarea name="Change[desc]" placeholder="Почему вы хотите сменить свой ник?" required="required"></textarea>
	<button type="submit">Отправить заявку на смену ника</button>
</form>