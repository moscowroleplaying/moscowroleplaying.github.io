<table class="table table-bordered table-hover">	
	<? foreach($field as $key=>$val) {
		if(!empty($val['alias']) && $val['alias'] !== 'Новый параметр' && $val['show'] != 0) {
			switch($key) {
				case 'leader': {
					echo '
						<tr>
							<td><strong>'.$val['label'].'</strong></td>
							<td><i>'.$names[0]['names'][$data->{$val['alias']}].'</i></td>							
						</tr>
					';
					break;
				}				
				case 'member': {
					echo '
						<tr>
							<td><strong>'.$val['label'].'</strong></td>
							<td><i>'.$names[0]['names'][$data->{$val['alias']}].' (ранг: '.$data->{$field['rang']['alias']}.')</i></td>
						</tr>
					';
					break;
				}
				case 'admin': {
					echo '
						<tr>
							<td><strong>'.$val['label'].'</strong></td>
							<td><i>'.$names[1]['names'][$data->{$val['alias']}].'</i></td>
						</tr>
					';
					break;
				}
				case 'job': {
					echo '
						<tr>
							<td><strong>'.$val['label'].'</strong></td>
							<td><i>'.$names[2]['names'][$data->{$val['alias']}].'</i></td>
						</tr>
					';
					break;
				}
				case 'online': {
					if($data->{$val['alias']} == 1001) $txt = '<span class="label label-danger">Отключен</span>';
					else $txt = '<span class="label label-success">В игре</span>';
					echo '
						<tr>
							<td><strong>'.$val['label'].'</strong></td>
							<td>'.$txt.'</td>
						</tr>
					';
					break;					
				}								
				default: {
					if(preg_match('/(heal|hp|phealth|php|pshealth|pzdorov|phpshka|philka)/',strtolower($val['alias']))) {
						echo '
							<tr>
								<td><strong>'.$val['label'].'</strong></td>
								<td>
									<div class="progress">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$data->{$val[alias]}.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$data->{$val[alias]}.'%;">
											'.$data->{$val['alias']}.' HP
										</div>
									</div>
								</td>
							</tr>
						';						
					}
					else if(preg_match('/(cash|pcash|bank|pbank|Money|pmoney|paccount)/',strtolower($val['alias']))) {
						echo '
							<tr>
								<td><strong>'.$val['label'].'</strong></td>
								<td>'.number_format($data->{$val['alias']},0,' ','`').' $</td>
							</tr>
						';						
					}
					else if(preg_match('/(house|phouse|biz|pbiz|housekey|phousekey|bizkey|pbizkey)/',strtolower($val['alias']))) {
						if($data->{$val['alias']} == 0) $txt = '<i>Отсутствует</i>';
						else {
							$all_tables = Tables::getTableNames();
							$tableID = -1;
							

							for($i = 0; $i < count($all_tables); $i++) {
								if(preg_match('/(house|doma)/',strtolower($all_tables[$i]['attributes']['table_name']))) {
									$tableID = $all_tables[$i]['attributes']['id'];
									$tableName = $all_tables[$i]['attributes']['table_name'];
								}								
							}
							if($tableID != -1) {						
								$houseFields = Fields::getFields($tableID);
								if(!empty($houseFields)) {
									$select = array();	
									foreach($houseFields as $alias)
										if($alias['show']) $select[] = $alias['alias'];
									$select_str = implode(',',$select);

									// Запрашиваем название первого столба, который обычно - номер дома
									$connection = new CDbConnection(
										"mysql:host=".Yii::app()->params->mysql_host.";dbname=".Yii::app()->params->mysql_dbname,
										Yii::app()->params->mysql_user,
										Yii::app()->params->mysql_pass
									);
									$connection->charset = 'utf8';
									$command = $connection->createCommand("SHOW COLUMNS FROM `houses`");
									$columnName = $command->queryAll();


									// Получаем нужные данные о доме пользователя
									$criteria = new CDbCriteria;
									$criteria->alias = $tableName;
									$criteria->condition = $columnName[0]['Field'].' = '.$data->{$val['alias']};
									$criteria->select = $select_str;			
									$houseData = Uni::getData($criteria);
									
									// Генерируем контент информации
									$houseInformation = ' ';
									foreach($houseFields as $fld) {
										if(preg_match('/(cost|money|balance|products|cena|price|mats|drugs|value)/',strtolower($fld['alias']))) {
											$houseInformation .= '<strong>'.$fld['label'].':</strong> '.number_format($houseData[0][$fld['alias']],0," ","`").' $<br>';
										}									
										else if(preg_match('/(owned)/',strtolower($fld['alias']))) {
											if($houseData[0][$fld['alias']] == 0) $txt = '<span class="label label-success">Свободен</span>';
											else $txt = '<span class="label label-danger">Занят</span>';
											$houseInformation .= '<strong>'.$fld['label'].':</strong> '.$txt.'<br>';					
										}										
										else if(preg_match('/(vehicle|veh|vec)/',strtolower($fld['alias']))) {
											if($houseData[0][$fld['alias']] == 0) $txt = '<i>Отсутствует</i>';
											else $txt = '<i>'.SAMP::getvehicleName($houseData[0][$fld['alias']]).'</i>';
											$houseInformation .= '<strong>'.$fld['label'].':</strong> '.$txt.'<br>';					
										}
										else {
											$houseInformation .= '<strong>'.$fld['label'].':</strong> '.$houseData[0][$fld['alias']].'<br>';
										}

									}							
									$txt = '<a style="cursor:pointer;" data-toggle="modal" data-target="#houseInfo">№ '.$data->{$val['alias']}.'</a>';
									$txt .= '
										<div class="modal fade" id="houseInfo" tabindex="-1" role="dialog" aria-labelledby="houseInfoLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="houseInfoLabel">Дом №'.$data->{$val['alias']}.'</h4>
													</div>
													<div class="modal-body">
														'.$houseInformation.'
													</div>
													<div class="modal-footer">
													</div>									
												</div>
											</div>
										</div>
									';
								}
								else {
									$txt = '№ '.$data->{$val['alias']};
								}						
							} else {
								$txt = '№ '.$data->{$val['alias']};
							}
						}
						echo '
							<tr>
								<td><strong>'.$val['label'].'</strong></td>
								<td>'.$txt.'</td>
							</tr>
						';						
					}
					else if(preg_match('/(flylic|bizlic|callic|gunlic|boatlic|fishlic|pflylic|pbizlic|pcarlic|pgunlic|pfishlic|vodprava)/',strtolower($val[alias]))) {
						if($data->{$val['alias']} == 0) $txt = '<i>Нет</i>';
						else $txt = 'Есть';
						echo '
							<tr>
								<td><strong>'.$val['label'].'</strong></td>
								<td>'.$txt.'</td>
							</tr>
						';						
					}																
					else {
						echo '
							<tr>
								<td><strong>'.$val['label'].'</strong></td>
								<td>'.$data->{$val['alias']}.'</td>
							</tr>
						';
					}
					break;
				}
			}
		}
	} ?>
</table>
<?
	$cs = Yii::app()->getClientScript();
	$cs->registerScript('modal',"$('#houseInfo').modal({backdrop:false,show:false});");
?>