<? $this->pageTitle = 'Добавленные таблицы - '.Yii::app()->params->sitename; ?>
<h3>Добавленные в систему таблицы:</h3>
<hr>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<td><strong>Подпись таблицы</strong></td>
			<td><strong>Название таблицы</strong></td>
			<td><strong><center>Действие</center></strong></td>
		</tr>
	</thead>
	<? foreach($tables as $val): ?>
		<tr>			
			<td><?=$val['label']?></td>
			<td><i><?=$val['table_name']?></i></td>
			<td><center>
				<?
					$links = '';
					if($val['id'] != 1) {
						$links .= '<a title="Настройки" href="'.Yii::app()->baseUrl.'/site/settings/'.$val[id].'"><i class="fa fa-cog fa-fw"></i></a>';
						$links .= '<a title="Удалить" href="'.Yii::app()->baseUrl.'/tables/delete/'.$val[id].'"><i class="fa fa-times fa-fw"></i></a>';
					} else {
						$links .= '<a title="Настройки" href="'.Yii::app()->baseUrl.'/site/settings/'.$val[id].'"><i class="fa fa-cog fa-fw"></i></a>';
					}
					echo $links;
				?>			
			</center></td>
		</tr>
	<? endforeach; ?>
</table>