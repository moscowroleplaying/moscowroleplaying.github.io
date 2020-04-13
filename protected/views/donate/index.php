<? $this->pageTitle = 'Покупка донат-очков - '.Yii::app()->params->sitename; ?>
	
<? if(isset($model)) { ?><center>	<h4 align="center" class="title">Информация о заказе:</h4>
	<strong>Сумма: </strong><span><?=$model->sum?> р.</span><br>
	<strong>F - монет: </strong><span><?=$model->sum?></span><br>
	<strong>Игровое имя: </strong><span><?=$model->nickname?></span><br>
	<strong>Описание: </strong><span>Покупка F - монет</span><br>
	<hr>
	<form action="<?=Yii::app()->params[unitpay_action]?>" method="post" role="form">
		<input type="hidden" name="sum" value="<?=$model->sum?>">
		<input type="hidden" name="desc" value="Покупка донат-очков">
		<input type="hidden" name="account" value="<?=$userid?>">
		<button type="submit" style="border-radius:0;width:258px;" class="btn btn-primary" align="center">Перейти к оплате</button>
	</form></center>

<? } else { ?>
<h2><p align="center" class="title">Магазин</p></h2><h5><p align="center" class="muted">Покупка донат-очков</p></h5><center>
<form action="/donate/" method="post" role="form">				<div class="row">					<div class="col-xs-2"></div>					<div class="col-xs-8">						<input type="text" name="Donate[sum]" placeholder="Сумма" required="required"  class="form-control">						<input type="text" name="Donate[nickname]" placeholder="Ваш ник на сервере" required="required"  class="form-control" style="margin-top:10px">						</div>					<div class="col-xs-3"></div>					<div class="col-xs-2"></div>				</div><br><button style="border-radius:0;width:258px;" class="btn btn-primary" align="center" type="submit">Отправить</button>			</form>			<br>			<p>Калькулятор: 1 рубль = 1 F-монет<br>Внимательно проверьте правильность ника, иначе могут возникнуть проблемы.</p>
</center>
<? } ?>
