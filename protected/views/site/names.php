<? $this->pageTitle = 'Настройка названий - '.Yii::app()->params->sitename; ?>
<h3>Настройка названий организаций, работ и рангов администрации</h3>
<hr>
<p>
	Чтобы в личном кабинете Ваши игроки могли видеть вместо номера организации, работы или админки название или ранг, заполните пожалуйста эту таблицу. 
	Максимальное количество названий = 50.
</p>
<hr>
<form method="POST" action="<?=Yii::app()->baseUrl?>/site/names">
	<table class="table table-hover">
		<tr>
			<td><strong>#</strong></td>
			<td><strong>Названия организаций</strong></td>
			<td><strong>Ранги администраторов</strong></td>
			<td><strong>Названия работ</strong></td>
		</tr>
		<?
			for($i = 0; $i < 51; $i++) {
				echo '<tr>';
				echo '<td>'.$i.'</td>';
				foreach($names as $key=>$val) {
					echo '
						<td>
							<input class="form-control" type="text" name="'.$key.'['.$i.']" value="'.$val[names][$i].'">
						</td>
					';
				}
				echo '</tr>';
			}
		?>
	</table>
	<button class="btn btn-primary btn-block" type="submit">Сохранить изменения</button>
</form>	