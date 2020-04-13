<? $this->pageTitle = 'Авторизация - '.Yii::app()->params->sitename; ?>
<?
	if(!Yii::app()->user->isGuest)
		$this->redirect(Yii::app()->baseUrl.'/id'.Yii::app()->user->userid);
?>
<center>
<h3 align="center" class="title">Авторизация</h3>
<h5 align="center" class="muted"> Введите ваш логин и пароль</h5>
	<form class="form-vertical" id="login-form" action="/site/login" method="post">		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<input placeholder="Ник.." class="form-control col-xs-3" name="LoginForm[username]" id="LoginForm_username" type="text" />				<input placeholder="Пароль.." class="form-control" style="margin-top:40px" name="LoginForm[password]" id="LoginForm_password" type="password" />			
			</div>
			
			<div class="col-xs-3">
					
			</div>
			<div class="col-xs-2"></div>
		</div>			<br>  <button class="btn btn-success" style="border-radius:0;width:258px;" type="submit">Войти</button>
<a href="/site/recovery/"><button class="btn btn-warning" style="border-radius:0;margin-top: 0px;width:258px;" href="/site/recovery/" type="button" >Забыли пароль?</button></a>
</center>
