<? $this->pageTitle = 'Редактирование топ-листа '.$top->top_name.' - '.Yii::app()->params->sitename; ?>
<h3>Редактирование топ-листа (рейтинга)</h3>
<hr>
<p>
	Вы можете создать бесконечное количество топ-листов по любым Вашим критериям, а также добавить 5 дополнительных полей с информацией для топ-листа. 
	<br>
	Например: к топ-листу "Самые богатые", который будет сортироваться по накоплениям в банке, Вы можете добавить поле, которое отобразит, сколько лет данный игрок прожил в штате (его уровень).
</p>
<hr>




<form action="" method="POST" role="form">
	<h4>Основная информация о топ-листе:</h4>
	<input type="text" name="Tops[top_name]" placeholder="Название топ-листа (например: самые богатые в штате)" class="form-control"><br>
	<input type="text" name="Tops[field_for_sort]" placeholder="Название поля в Вашей БД, по которому будем проводить сортировку (например: pBank)" class="form-control"><br>
	<input type="text" name="Tops[label_for_field]" placeholder="Как в топ-листе будет подписано данное поле (например: накопления)" class="form-control"><br>
	<hr>
	<h4>Дополнительные поля:</h4>
	<span class="my-hint">Если не желаете добавлять дополнительные поля, оставьте их пустыми. Заполните столько, сколько Вам нужно.</span>
	<br><br>
	<table class="table table-hover">
		<tr>
			<td>Дополнительное поле № 1</td>
			<td><input type="text" name="TopParams[1][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="TopParams[1][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 2</td>
			<td><input type="text" name="TopParams[2][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="TopParams[2][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 3</td>
			<td><input type="text" name="TopParams[3][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="TopParams[3][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 4</td>
			<td><input type="text" name="TopParams[4][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="TopParams[4][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
		<tr>
			<td>Дополнительное поле № 5</td>
			<td><input type="text" name="TopParams[5][field_name]" placeholder="Название поля в таблице" class="form-control"></td>
			<td><input type="text" name="TopParams[5][label]" placeholder="Подпись к полю" class="form-control"></td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary btn-block">Создать новый топ-лист</button>
</form>