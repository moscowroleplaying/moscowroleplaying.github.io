<script src="<?=Yii::app()->baseUrl?>/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea',
		language:'ru',
		plugins: 'link image media lists emoticons textcolor wordcount',
		toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor emoticons", 
	});
</script>
<? $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'add-news-form',
	'enableClientValidation'=>true,
)); ?>
	<h4>Заголовок:</h4>
	<? echo $form->textField($model,'title'); ?>
	<? echo $form->error($model,'title'); ?>
	<h4>Краткий текст:</h4>
	<? echo $form->textArea($model,'content',array('style'=>'min-height:200px;')); ?>
	<? echo $form->error($model,'content'); ?>
	<h4>Полный текст:</h4>
	<? echo $form->textArea($model,'full_content',array('style'=>'min-height:200px;')); ?>
	<? echo $form->error($model,'full_content'); ?>	
	<button type="submit"><? echo $model->isNewRecord ? 'Добавить новость' : 'Сохранить изменения'; ?></button>
<? $this->endWidget(); ?>