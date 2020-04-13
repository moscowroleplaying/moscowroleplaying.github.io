<table class="table table-hover table-bordered">
	<?
		// Формируем THEAD
		$tbl_tr = '<thead><tr><td><center><strong>#</strong></td>';
		$tbl_tr .= '<td><center><strong>'.$model->label_for_field.'</strong></center></td>';
		foreach($params as $val) {
			$tbl_tr .= '<td><center><strong>'.$val['label'].'</strong></center></td>';
		}
		$tbl_tr .= '</tr></thead>';
		echo $tbl_tr;

		// Формируем тело таблицы
		$i = 1;
		foreach($data as $val) {
			$tbl_tr = '<tr>';
			// Показываем картинки для первых трех, остальным просто номер
			switch($i) {
				case 1: $tbl_tr .= '<td><center><img src="'.Yii::app()->baseUrl.'/images/design/gold_medal.png" alt="Золотая медаль"></center></td>'; break;
				case 2: $tbl_tr .= '<td><center><img src="'.Yii::app()->baseUrl.'/images/design/sereb_medal.png" alt="Серебряная медаль"></center></td>'; break;
				case 3: $tbl_tr .= '<td><center><img src="'.Yii::app()->baseUrl.'/images/design/bronze_medal.png" alt="Бронзовая медаль"></center></td>'; break;
				default: $tbl_tr .= '<td><center>'.$i.'</center></td>'; break;
			}

			// Проверяем и отображаем сортировочную графу
			if(preg_match('/(cash|money|balance|products|cena|price|mats|drugs|value)/',strtolower($model->field_for_sort)))
				$tbl_tr .= '<td><center>'.number_format($val[$model->field_for_sort],0," ","`").'</center></td>';
			
			else if(preg_match('/(owned)/',strtolower($model->field_for_sort))) {
				if($val[$model->field_for_sort] == 0) $txt = '<span class="label label-success">Свободен</span>';
				else $txt = '<span class="label label-danger">Занят</span>';
				$tbl_tr .= '<td><center>'.$txt.'</center></td>';					
			}
			else if(preg_match('/(vehicle|veh|vec)/',strtolower($model->field_for_sort))) {
				if($val[$model->field_for_sort] == 0) $txt = '<i>Отсутствует</i>';
				else $txt = '<i>'.SAMP::getvehicleName($val[$model->field_for_sort]).'</i>';
				$tbl_tr .= '<td><center>'.$txt.'</center></td>';					
			}								
			else {
				$tbl_tr .= '<td><center>'.$val[$model->field_for_sort].'</center></td>';
			}

			// Выводим информацию из дополнительных полей			
			foreach($params as $value) {
				if(preg_match('/(cash|money|balance|products|cena|price|mats|drugs|value)/',strtolower($value['field_name'])))
					$tbl_tr .= '<td><center>'.number_format($val[$value['field_name']],0," ","`").'</center></td>';
				
				else if(preg_match('/(owned)/',strtolower($value['field_name']))) {
					if($val[$value['field_name']] == 0) $txt = '<span class="label label-success">Свободен</span>';
					else $txt = '<span class="label label-danger">Занят</span>';
					$tbl_tr .= '<td><center>'.$txt.'</center></td>';					
				}
				else if(preg_match('/(vehicle|veh|vec)/',strtolower($value['field_name']))) {
					if($val[$value['field_name']] == 0) $txt = '<i>Отсутствует</i>';
					else $txt = '<i>'.SAMP::getvehicleName($val[$value['field_name']]).'</i>';
					$tbl_tr .= '<td><center>'.$txt.'</center></td>';					
				}								
				else {
					$tbl_tr .= '<td><center>'.$val[$value['field_name']].'</center></td>';
				}
			}
			$tbl_tr .= '</tr>';
			echo $tbl_tr;
			$i++;			
		}
	?>
</table>