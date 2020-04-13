<table class="table table-hover table-bordered">
	<?
		// Формируем THEAD
		$tbl_tr = '<thead><tr><td><center><strong>#</strong></td><td><center><strong>Имя</strong></center></td>';
		foreach($model->load_params as $val) {
			$tbl_tr .= '<td><center><strong>'.$val['label'].'</strong></center></td>';
		}
		$tbl_tr .= '</tr></thead>';
		echo $tbl_tr;

		// Формируем тело таблицы
		$i = 1;
		foreach($data as $val) {
			$tbl_tr = '<tr>';
			// Показываем порядковый номер в списке
			$tbl_tr .= '<td><center>'.$i.'</center></td>';

			// Показываем имя игрока
			$tbl_tr .= '<td><center>'.$val[$fields['username']['alias']].'</center></td>';

			// Выводим информацию из дополнительных полей			
			foreach($model->load_params as $value) {
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
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$val[$value['field_name']].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$val[$value['field_name']].'%;">
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