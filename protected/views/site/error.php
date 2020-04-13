<? $this->pageTitle = 'Ошибка '.$code.' - '.Yii::app()->params->sitename; ?>
	<div class="alert alert-dismissible alert-danger">
  <strong><h2>Ошибка <?php echo $code; ?></h2></strong> <h3><?php echo CHtml::encode($message); ?></h3>
</div>

</div>