<? $this->pageTitle = 'Мониторинги проекта - '.Yii::app()->params->sitename; ?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<td><strong><center>#</center></strong></td>
			<td><strong>Название мониторинга</strong></td>
			<td><strong>Выражение выборки</strong></td>
			<td><strong>Просмотров</strong></td>
			<td><strong><center>Действие</center></strong></td>
		</tr>
	</thead>
	<? foreach($data as $val): ?>
		<tr>
			<? if($val['active']) echo '<td class="success" title="Мониторинг активен"><center>'.$val['id'].'</center></td>';
			else echo '<td class="danger" title="Мониторинг не активен"><center>'.$val['id'].'</center></td>'; ?>
			<td><a href="<?=Yii::app()->baseUrl?>/monitor/view/<?=$val['id']?>" title="Просмотр мониторинга"><?=$val['mon_name']?></a></td>
			<td><i><?=$val['condition']?></i></td>
			<td><?=$val['views']?></td>
			<td><center>
				<a title="Включить мониторинг" href="<?=Yii::app()->baseUrl?>/monitor/activate/<?=$val['id']?>"><i class="fa fa-eye fa-fw"></i></a>
				<a title="Отключить мониторинг" href="<?=Yii::app()->baseUrl?>/monitor/unactivate/<?=$val['id']?>"><i class="fa fa-eye-slash fa-fw"></i></a>
				<? if($val['id'] != 1) { ?>
					<a title="Удалить" href="<?=Yii::app()->baseUrl?>/monitor/deletemon/<?=$val['id']?>"><i class="fa fa-times fa-fw"></i></a>
				<? } ?>
			</center></td>
		</tr>
	<? endforeach; ?>
</table>

<blockquote><small>Неактивный рейтинг помечен красным и не виден в меню для пользователей.</small></blockquote>