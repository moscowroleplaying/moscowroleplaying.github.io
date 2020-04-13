<? $this->pageTitle = 'RCON управление сервером - '.Yii::app()->params->sitename; ?>
<div class="my-panel">
	<div class="my-panel-header">&nbsp; RCON - управление</div>
	<div class="my-panel-body">	
		<hr>			
		<?
		if(is_array($msg)) {
			foreach($msg as $var)
				printf('%s<br>',$var);
		} else echo $msg;
		?>
		<hr>
		<form class="my-form" action="<?=Yii::app()->baseUrl?>/site/control" method="post" role="form">
			<input type="text" name="rcon_command" placeholder="Rcon-команда" required="required">
			<p>Введите rcon-команду в окно</p>
			<button type="submit">Отправить</button>
		</form>
	</div>
</div>