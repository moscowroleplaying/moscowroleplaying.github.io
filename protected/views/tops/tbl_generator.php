<table class="table table-hover table-bordered">
	<?
		// Формируем THEAD
		$tbl_tr = '<thead><tr><td><center><strong>#</strong></td><td><center><strong>Имя</strong></center></td>';
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
			// Показываем имя игрока
			$tbl_tr .= '<td><center>'.$val[$fields['username']['alias']].'</center></td>';
			// Проверяем и отображаем сортировочную графу
			switch($model->field_for_sort) {
				case $fields['admin']['alias']: {
					$tbl_tr .= '<td><center>'.$names[1]['names'][$val[$model->field_for_sort]].'</center></td>';
					break;
				}
				case $fields['member']['alias']: 
				case $fields['leader']['alias']: {
					$tbl_tr .= '<td><center>'.$names[0]['names'][$val[$model->field_for_sort]].'</center></td>';
					break;
				}	
				case $fields['job']['alias']: {
					$tbl_tr .= '<td><center>'.$names[2]['names'][$val[$model->field_for_sort]].'</center></td>';
					break;
				}	
				case $fields['online']['alias']: {
					if($val[$model->field_for_sort] == 1001) $txt = '<span class="label label-danger">Отключен</span>';
					else $txt = '<span class="label label-success">В игре</span>';
					$tbl_td .= '<td>'.$txt.'</td>';
					break;					
				}										
				default: {
					if(preg_match('/(cash|pcash|bank|pbank|money|pmoney|paccount|mats|pmats|drugs|pdrugs)/',strtolower($model->field_for_sort)))
						$tbl_tr .= '<td><center>'.number_format($val[$model->field_for_sort],0," ","`").'</center></td>';
					else if(preg_match('/(health|hp|phealth|php|pshealth|pzdorov|phpshka|philka)/',strtolower($model->field_for_sort))) {
						$tbl_tr .= '
							<td><center>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$val[$model->field_for_sort].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$val[$model->field_for_sort].'%;">
										'.$val[$model->field_for_sort].' HP
									</div>
								</div>
							</center></td>
						';
					}
					else if(preg_match('/(flylic|bizlic|callic|gunlic|boatlic|fishlic|pflylic|pbizlic|pcarlic|pgunlic|pfishlic)/',strtolower($model->field_for_sort))) {
						if($val[$model->field_for_sort] == 0) $txt = '<i>Нет</i>';
						else $txt = 'Есть';
						$tbl_tr .= '<td><center>'.$txt.'</center></td>';						
					}			
					else if(preg_match('/(house|phouse|biz|pbiz|housekey|phousekey|bizkey|pbizkey)/',strtolower($model->field_for_sort))) {
						if($val[$model->field_for_sort] == 0) $txt = '<i>Отсутствует</i>';
						else $txt = '№ '.$val[$model->field_for_sort];
						$tbl_tr .= '<td><center>'.$txt.'</center></td>';						
					}
					else
						$tbl_tr .= '<td><center>'.$val[$model->field_for_sort].'</center></td>';									
				}
			}
			// Выводим информацию из дополнительных полей			
			foreach($params as $value) {
				switch($value['field_name']) {
					case $fields['admin']['alias']: {
						$tbl_tr .= '<td><center>'.$names[1]['names'][$val[$value['field_name']]].'</center></td>';
						break;
					}
					case $fields['member']['alias']: 
					case $fields['leader']['alias']: {
						$tbl_tr .= '<td><center>'.$names[0]['names'][$val[$value['field_name']]].'</center></td>';
						break;
					}	
					case $fields['job']['alias']: {
						$tbl_tr .= '<td><center>'.$names[2]['names'][$val[$value['field_name']]].'</center></td>';
						break;
					}
					case $fields['online']['alias']: {
						if($val[$value['field_name']] == 1001) $txt = '<span class="label label-danger">Отключен</span>';
						else $txt = '<span class="label label-success">В игре</span>';
						$tbl_tr .= '<td><center>'.$txt.'</center></td>';
						break;					
					}												
					default: {
						if(preg_match('/(cash|pcash|bank|pbank|money|pmoney|paccount|mats|pmats|drugs|pdrugs)/',strtolower($value['field_name'])))
							$tbl_tr .= '<td><center>'.number_format($val[$value['field_name']],0," ","`").'</center></td>';
						else if(preg_match('/(health|hp|phealth|php|pshealth|pzdorov|phpshka|philka)/',strtolower($value['field_name']))) {
							$tbl_tr .= '
								<td><center>
									<div class="progress">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$val[$value['field_name']].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$val[$value[field_name]].'%;">
											'.$val[$value['field_name']].' HP
										</div>
									</div>
								</center></td>
							';
						}
						else if(preg_match('/(flylic|bizlic|callic|gunlic|boatlic|fishlic|pflylic|pbizlic|pcarlic|pgunlic|pfishlic)/',strtolower($value['field_name']))) {
							if($val[$value['field_name']] == 0) $txt = '<i>Нет</i>';
							else $txt = 'Есть';
							$tbl_tr .= '<td><center>'.$txt.'</center></td>';						
						}			
						else if(preg_match('/(house|phouse|biz|pbiz|housekey|phousekey|bizkey|pbizkey)/',strtolower($value['field_name']))) {
							if($val[$value['field_name']] == 0) $txt = '<i>Отсутствует</i>';
							else $txt = '№ '.$val[$value['field_name']];
							$tbl_tr .= '<td><center>'.$txt.'</center></td>';						
						}
						else
							$tbl_tr .= '<td><center>'.$val[$value['field_name']].'</center></td>';									
					}
				}
			}
			$tbl_tr .= '</tr>';
			echo $tbl_tr;
			$i++;			
		}
	?>
</table>