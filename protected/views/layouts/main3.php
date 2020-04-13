<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<? echo Yii::app()->params[description]; ?>">
	<meta name="author" content="Frapsy <frapsy@ya.ru>">
	<link rel="shortcut icon" href="/images/design/favicon.ico" type="image/x-icon">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/instal.css">
</head>
<body>

	<section class="frapsy_instal">
		<?=$content?>
	</section>

</body>
</html>