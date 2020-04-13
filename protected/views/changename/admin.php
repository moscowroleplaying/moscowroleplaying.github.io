<? $this->pageTitle = 'Заявки на смену ника - '.Yii::app()->params->sitename; ?>
<div class="my-panel">
	<div class="my-panel-header">Модерация заявок на смену ника</div>
	<div class="my-panel-body">
		<table class="table table-hover table-bordered">
			<tr>
					<td><strong>#</strong></td>
					<td><strong>Старый ник</strong></td>
					<td><strong>Желаемый ник</strong></td>
					<td><strong>Причина смены</strong></td>
					<td><center><strong>Действие</strong></center></td>
			</tr>
		<? foreach($data as $val) { ?>
			<tr>
				<td><?=$val['id']?></td>
				<td><?=$val['old_name']?></td>
				<td><?=$val['new_name']?></td>
				<td><?=nl2br($val['desc'])?></td>
				<td>
					<center>
					<a href="<?=Yii::app()->baseUrl?>/changename/accept/<?=$val['id']?>" title="Одобрить заявку"><i class="fa fa-thumbs-up"></i></a>
					<a href="<?=Yii::app()->baseUrl?>/changename/decline/<?=$val['id']?>" title="Отклонить заявку"><i class="fa fa-thumbs-down"></i></a>
					</center>
				</td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	