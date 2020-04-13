<!DOCTYPE html>

<html lang="ru">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="<? echo Yii::app()->params['description']; ?>">

	<meta name="author" content="Frapsy <frapsy@ya.ru>">

	<link rel="shortcut icon" href="/images/design/favicon.ico" type="image/x-icon">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link href="//bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/css/main.css">

</head>

 <body>
<!--	<style>
  body { background: url(<?=Yii::app()->baseUrl?>/images/design/fon.png); }
</style>
-->
	<header class="header">

		<nav class="navbar navbar-default" role="navigation">

			<div class="container-fluid">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

						<span class="sr-only">Toggle navigation</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

					</button>

                  <a class="navbar-brand" href="/index.php" ><img src="<?=Yii::app()->baseUrl?>/images/design/logo.png" ></a>

				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<?

						// Генерация элементов навигации

						$this->widget('zii.widgets.FrapsyNavbar');

					?>

				</div>

			</div>

		</nav>

	</header>

	<section class="page">

		<div class="all-content">

			<?=$content?>

		</div>
		<div class="clearfix"></div>
	</section>



    <!-- JavaScript -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

</body>

</html>