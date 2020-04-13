<? $this->pageTitle = 'Создание мониторинга - '.Yii::app()->params->sitename; ?>
<h3>Создание нового мониторинга</h3>
<hr>
<p>
	Вы можете создать бесконечное количество мониторингов по любым Вашим критериям, а также добавить к ним 5 полей с информацией. 
	<br>
	Например: к монинторингу "Лидеры проекта", необходимо будет добавить поле, которое выведет его организацию. Дополнительно можно вывести ранг или уровень.
</p>
<hr>
<?
	if(isset($error))
		echo '<span class="alert alert-danger">'.$error.'</span><hr>';
?>
<form action="" method="POST" role="form">
	<h4>Основная информация о мониторинге:</h4>
	<input required="required" type="text" name="Monitors[mon_name]" placeholder="Название мониторинга (например: лидеры проекта)" class="form-control"><br>
	<span>Таблица, по которой создается мониторинг:</span>
	<select name="Monitors[table_id]" class="form-control">
		<?
			$options = '';
			foreach($tables as $val) {
				$options .= '<option value="'.$val['id'].'">'.$val['label'].' ('.$val['table_name'].')</option>';
			}
			echo $options;
		?>
	</select><br>
	<input type="text" name="Monitors[condition]" placeholder="Выражение для выборки игроков (например: pLeader != 0)" class="form-control"><br>
	<blockquote>
		Примеры выражений, на их основании Вы можете написать свое:
		<small>Leader != 0   -   выводит всех лидеров (всех, у кого Leader не равно нулю, то есть, является лидером)</small>
		<small>Admin = 5   -   выведет всех админов пятого лвла</small>
		<small>Admin != 0 AND pOnline != 1001   -   выведет всех администраторов, которые в сети</small>
		<small>оставьте поле пустым, чтобы вывести все записи в таблице</small>
		Естественно, Leader,Admin и pOnline - ваши названия полей в БД.
	</blockquote>
	<input required="required" type="text" name="MonParams[1][field_name]" placeholder="Название поля в таблице (например: pMember или pLeader)" class="form-control"><br>
	<input required="required" type="text" name="MonParams[1][label]" placeholder="Подпись к полю (например: Организация)" class="form-control">
	<hr>
	<h4>Поля с информацией:</h4>
	<span class="my-hint">Для того, чтобы мониторинг отобразился для пользователей, необходимо добавить хотябы одно информационное поле</span>
	<br><br>
	<table class="table table-hover">
		<tr>
			<td>Дополнительное поле № 1</td>
			<td><input type="text" name="MonParams[2][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="MonParams[2][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 2</td>
			<td><input type="text" name="MonParams[3][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="MonParams[3][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 3</td>
			<td><input type="text" name="MonParams[4][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="MonParams[4][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 4</td>
			<td><input type="text" name="MonParams[5][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="MonParams[5][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 5</td>
			<td><input type="text" name="MonParams[6][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="MonParams[6][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary btn-block">Создать мониторинг</button>
</form>