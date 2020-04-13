<? $this->pageTitle = 'Основные настройки сайта - '.Yii::app()->params->sitename; 

if(Yii::app()->request->cookies['instal']->value != 1) { ?>
	<h3>Шаг 1: основные настройки</h3>
	<hr>
	<p>Перед настройкой, не забудьте импортировать файл <code>database.sql</code> в базу данных сервера. Внимательно настраивайте эти параметры, изменить их Вы сможете только после авторизации под администратором.</p>
	<hr>
<? } ?>
<form method="POST" action="<?=Yii::app()->baseUrl?>/instal/config">
	<table class="table table-hover table-bordered">	
		<?php
			$i = 0;
			foreach($data as $val) {
				switch($i) {
					case 0: echo '<tr><td><h4>Основные настройки</h4></td></tr>'; break;
					case 3: echo '<tr><td><h4>Настроки базы данных</h4></td></tr>'; break;
					case 7: echo '<tr><td><h4>Настройки доступа к модулям</h4></td></tr>'; break;
					case 8: echo '<tr><td><h4>Настройки мониторинга</h4></td></tr>'; break;
					case 11: echo '<tr><td><h4>Настройки донат-системы</h4></td></tr>'; break;						
				}				
				echo "
					<tr>
						
						<td>".$val['label']."</td>
						<td><input type='text' class='form-control' name='Config[".$val['name']."]' value='".$val['value']."' required='required'></td>

					</tr>
				";
				$i++;
			}
		?>
	</table>
	<hr>
	<button type="submit" class="btn btn-info btn-lg btn-block">Я проверил правильность введенных данных и хочу перейти к следующему шагу</button>	
</form>