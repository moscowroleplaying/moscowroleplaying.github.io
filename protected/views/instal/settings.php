<? $this->pageTitle = 'Настройки таблицы - '.Yii::app()->params->sitename;

if(Yii::app()->request->cookies['instal']->value != 2) { ?>
	<h3>Шаг 2: настройки таблицы с аккаунтами</h3>
	<hr>
	<p>Внимательно настраивайте эти параметры, изменить их Вы сможете только после авторизации под администратором.</p>
	<hr>
<? } ?>

<form role="form" action="<? echo Yii::app()->baseUrl; ?>/instal/settings/<? echo $id; ?>" method="POST">
	<h4>Название таблицы:</h4>
	<? foreach($tables as $data)
		echo '<input type="text" class="form-control" value="'.$data[table_name].'" name="Tables[table_name]" placeholder="Введите название таблицы с аккаунтами">'; ?>
	<hr>
	<h4>Настройка названий полей</h4>
	<table class="table table-hover">
		<tr><td></td><td><strong>Название поля</strong></td><td><strong>Описание</strong></td><td><strong>Отображать?</strong></td></tr>
		<? foreach($fields as $data) {
			if(!$data[required]) $lnk = '<a href="'.Yii::app()->baseUrl.'/site/deletefield/'.$data[table_field_id].'" title="Удалить параметр"><i class="fa fa-times fa-fw"></i></a>';
			$content = '<tr>';
			$content ='
				<td>'.$lnk.$data[desc].'</td>
				<td>
					<input type="text" class="form-control" placeholder="Введите название поля.."" value="'.$data[alias].'" name="'.$data[table_field_id].'[alias]">
					<input type="hidden" name="'.$data[table_field_id].'[h_alias]" value="'.$data[alias].'">
				</td>
				<td>
					<input type="text" class="form-control" placeholder="Введите описание.." value="'.$data[label].'" name="'.$data[table_field_id].'[label]">
					<input type="hidden" name="'.$data[table_field_id].'[h_label]" value="'.$data[label].'">
				</td>
			';
			if($data[show]) {
				$content .= '<td><center><input type="checkbox" name="'.$data[table_field_id].'[show]" checked="checked"></center></td>';
				$content .= '<td><center><input type="hidden" name="'.$data[table_field_id].'[h_show]" value="on"></center></td>';
			} else {
				$content .= '<td><center><input type="checkbox" name="'.$data[table_field_id].'[show]"></center></td>';
				$content .= '<td><center><input type="hidden" name="'.$data[table_field_id].'[h_show]" value="null"></center></td>';									
			}
			$content .= '</tr>';
			echo $content;
		} ?>
	</table>
	<hr>
	<button type="submit" class="btn btn-info btn-lg btn-block">Я проверил правильность введенных данных и хочу перейти к следующему шагу</button>			
</form>	