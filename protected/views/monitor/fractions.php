<?
	$this->pageTitle = 'Составы организаций - '.Yii::app()->params->sitename;
	$tabs = array();
	foreach($names[names] as $key => $val) {
		if(!$key) continue;
		if(preg_match('/(Название|нет)/',$val)) continue;
		$content = '
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td><strong><center>#</center></strong></td>
						<td><strong><center>Игровое имя</center></strong></td>
						<td><strong><center>Ранг</center></strong></td>
						<td><strong><center>Статус</center></strong></td>
					</tr>
				</thead>			
		';
		$iter = 1;
		foreach($data as $value) {
			if($value[$fields['member']['alias']] != $key) continue;
			if($value[$fields['leader']['alias']] == 0) $rang_txt = $value[$fields['rang']['alias']];
			else $rang_txt = 'ЛИДЕР';
			if($value[$fields['online']['alias']] == 1001) $status_txt = '<span class="label label-danger">Не в игре</span>';
			else $status_txt = '<span class="label label-success">В игре</span>';		
			$content .= '
				<tr>
					<td><center>'.$iter.'</center></td>
					<td><center>'.$value[$fields['username']['alias']].'</center></td>
					<td><center>'.$rang_txt.'</center></td>
					<td><center>'.$status_txt.'</center></td>
				</tr>				
			';			
			$iter++;
		}
		$content .= '</table>';
		$tabs[] = array('label'=>$val,'content'=>$content);
	}
	$tabs2[] = array('visible'=>false);	
	$tabs2[] = array('label'=>'Выберите нужную вам организацию','items'=>$tabs);
	$this->widget('bootstrap.widgets.TbTabs',array(
		'type'=>'pills',
		'tabs'=>$tabs2,
	));
?>