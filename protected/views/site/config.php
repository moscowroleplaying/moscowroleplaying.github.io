<? $this->pageTitle = 'Основные настройки сайта - '.Yii::app()->params->sitename; ?>
<form method="POST" action="<?=Yii::app()->baseUrl?>/site/config">
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
	<button type="submit" class="btn btn-primary btn-block">Сохранить</button>
</form>