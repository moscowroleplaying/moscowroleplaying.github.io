<? $this->pageTitle = 'Рейтинги проекта - '.Yii::app()->params->sitename; ?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<td><strong><center>#</center></strong></td>
			<td><strong>Название рейтинга</strong></td>
			<td><strong>Сортировка по</strong></td>
			<td><strong>Просмотров</strong></td>
			<td><strong><center>Действие</center></strong></td>
		</tr>
	</thead>
	<? foreach($data as $val): ?>
		<tr>
			<? if($val['active']) echo '<td class="success" title="Рейтинг активен"><center>'.$val['id'].'</center></td>';
			else echo '<td class="danger" title="Рейтинг не активен"><center>'.$val['id'].'</center></td>'; ?>
			<td><a href="<?=Yii::app()->baseUrl?>/tops/view/<?=$val['id']?>" title="Просмотр рейтинга"><?=$val['top_name']?></a></td>
			<td><?=$val['field_for_sort']?> <i>(<?=$val['label_for_field']?>)</i></td>
			<td><?=$val['views']?></td>
			<td><center>
				<a title="Включить рейтинг" href="<?=Yii::app()->baseUrl?>/tops/activate/<?=$val['id']?>"><i class="fa fa-eye fa-fw"></i></a>
				<a title="Отключить рейтинг" href="<?=Yii::app()->baseUrl?>/tops/unactivate/<?=$val['id']?>"><i class="fa fa-eye-slash fa-fw"></i></a>
				<a title="Удалить" href="<?=Yii::app()->baseUrl?>/tops/deletetop/<?=$val['id']?>"><i class="fa fa-times fa-fw"></i></a>
			</center></td>
		</tr>
	<? endforeach; ?>
</table>

<blockquote><small>Неактивный рейтинг помечен красным и не виден в меню для пользователей.</small></blockquote>