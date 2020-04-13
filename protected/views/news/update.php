<? $this->pageTitle = 'Редактирование новости '.$model->title.' - '.Yii::app()->params->sitename; ?>

<div class="my-panel my-form my-form-add-news">
	<div class="my-panel-header">
		<i class="fa fa-wrench"></i>&nbsp;Редактирование новости
	</div>
	<div class="my-panel-body">				
		<? $this->renderPartial('_form',array('model'=>$model)); ?>
	</div>
</div>