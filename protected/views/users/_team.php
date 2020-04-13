<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<td><strong><center>#</center></strong></td>
			<td><strong><center>Имя</center></strong></td>
			<td><strong><center>Ранг</center></strong></td>
			<td><strong><center>Статус</center></strong></td>
			<td><strong><center>Действие</center></strong></td>
		</tr>
	</thead>
	<?
		$i = 1;
		foreach($team as $val) {
			$tr = '<tr>';
			$tr .= '<td><center>'.$i.'</center></td>';
			$tr .= '<td><center>'.$val[$field['username']['alias']].'</center></td>';
			$tr .= '<td><center>'.$val[$field['rang']['alias']].'</center></td>';
			if($val[$field['online']['alias']] == 1001)
				$tr .= '<td><center><span class="label label-danger">Отключен</span></center></td>';
			else
				$tr .= '<td><center><span class="label label-success">В игре</span></center></td>';
			$tr .= '<td><center>';
			if($val[$field['leader']['alias']] == 0) {
				$tr .= '
					<a title="Повысить ранг" class="link-color-frapsy" href="'.Yii::app()->baseUrl.'/users/rangplus/'.$val[$field['id']['alias']].'"><i class="fa fa-plus-circle fa-fw"></i></a>
					<a title="Понизить ранг" class="link-color-frapsy" href="'.Yii::app()->baseUrl.'/users/rangminus/'.$val[$field['id']['alias']].'"><i class="fa fa-minus-circle fa-fw"></i></a>
					<a title="Уволить" class="link-color-frapsy" href="'.Yii::app()->baseUrl.'/users/frkick/'.$val[$field['id']['alias']].'"><i class="fa fa-times-circle fa-fw"></i></a>				
				';
			} else $tr .= 'ЛИДЕР';
			$tr .= '</center></td>';
			$tr .= '</tr>';
			echo $tr;
			$i++;
		}

	?>
</table>