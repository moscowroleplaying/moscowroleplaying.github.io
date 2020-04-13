<h3>Редактор навигации:</h3>
<?
	$this->pageTitle = 'Редактор навигации - '.Yii::app()->params->sitename;
	echo '<blockquote>';
	foreach($items as $val) {
		if(!empty($val['items'])) {
			echo $val['label'];
			foreach($val['items'] as $sub)
				echo '<small>'.$sub['label'].' <a href="'.Yii::app()->baseUrl.'/site/deletemenu/'.$sub['id'].'"><i class="fa fa-times fa-fw"></i></a></small>';
			
		} else
			echo $val['label'].' <a href="'.Yii::app()->baseUrl.'/site/deletemenu/'.$val['id'].'"><i class="fa fa-times fa-fw"></i></a><br>';
	}
	echo '</blockquote>';
?>
<form action="<?=Yii::app()->baseUrl?>/site/editmenu" method="POST">
	<table class="table table-hover table-bordered">
		<tr>
			<td><input type="text" name="Menu[label]" placeholder="Заголовок" class="form-control"></td>
			<td><span class="my-hint">Текст, который будет отображаться как ссылка</span></td>
		</tr>
		<tr>
			<td><input type="text" name="Menu[url]" placeholder="URL" class="form-control"></td>
			<td><span class="my-hint">Ссылка на страницу</span></td>
		</tr>
		<tr>
			<td>
				<select name="Menu[parent_id]" class="form-control">
					<option value="0" selected>Нет</option>
					<?
						foreach($parents as $val) {
							echo '<option value="'.$val['id'].'">'.$val['label'].'</option>';
						}
					?>
				</select>				
			</td>
			<td><span class="my-hint">Родительская ссылка.<br>Используйте этот параметр, если хотите создать подменю.<br>Если этот параметр выбран, ссылка будет вложена в родительскую.</span></td>
		</tr>				
	</table>
	<button type="submit" class="btn btn-primary btn-block">Добавить</button>
</form>
<br>
<blockquote>
	Для добавления разделителя в подменю, введите в заголовок слово "divider" и выбирите родительскую ссылку.
</blockquote>