<!DOCTYPE html>

<html lang="ru">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="<? echo Yii::app()->params['description']; ?>">

	<meta name="author" content="Frapsy <frapsy@ya.ru>">

	<link rel="shortcut icon" href="/images/design/favicon.ico" type="image/x-icon">

	<title>Главная страница - Florida RolePlay</title>

  <link href="//bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/css/style.css">

</head>

<body>
	<nav class="navbar navbar-default" role="navigation">

		<div class="container-fluid">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>				

              <a class="navbar-brand" href="/index.php" ><img src="./images/design/logo.png" ></a>

			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<?

					// Генерация элементов навигации

					$this->widget('zii.widgets.FrapsyNavbar');

				?>

			</div>

		</div>

	</nav>

	<div id="frapsy_slider" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">

			<li data-target="#frapsy_slider" data-slide-to="0" class="active"></li>

			<li data-target="#frapsy_slider" data-slide-to="1"></li>

			<li data-target="#frapsy_slider" data-slide-to="2"></li>

		</ol>

		<div class="carousel-inner">

			<div class="item active">

				<img src="images/design/slide_1.png" alt="">

				<div class="carousel-caption">

<div class="welcome-text">           
            <h2 class="title">Florida RolePlay</h2>
            <p>
                Вы когда нибудь хотели поиграть в GTA по сети?<br>
                Мы предоставляем вам такую уникальную возможность.<br>
 				Совершено новый проект который был в разработке около года.<br>
				Наш сервер отличается своими системами и игровым процессом. <br>
              	Мы делаем все чтобы вам было удобно играть на нашем проекте.<br>
				Основатель данного проекта Женя Антипов.<br>
				Гл.администратор Андрей Алексеев.
            </p>
        </div>

				</div>							

			</div>

	</div>
<div style="font-size: 12px; color: #000000; background-color: #FFFFFF;font-weight: bold; font-style: normal; text-decoration: none;" align="center" id="florida"></div>
	<script src="http://super22.ru/i/timer/countdown.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript">var eventstr = "Сервер уже работает";</script>
	<script type="text/javascript">var upstr = "До открытия проекта осталось :";</script>
        <script type="text/javascript">var counterid = "florida";</script>

	<div class="container">
      <div class="container" id="information">
        <h3><p align="center" class="title">Как начать играть?</p></h3>
    <!-- Что такое САМП -->
    <article class="info">
        <header>Шаг 1</header>
        <p>
            Для начала вам нужна сама игра Grand The Auto San Andreas. Скачать её можно <a href="http://igri-2012.ru/engine/download.php?id=910" >Тут</a>
        </p>
    </article>
 
    <article class="info">
      <header>Шаг 2</header>
        <p>
            Установить SA:MP. Скачать его можно <a href="http://dl.gta-sa-mp.de/samp/sa-mp-0.3z-R2-install.exe">Тут</a>
        </p>
    </article>
            <article class="info">
      <header>Шаг 3</header>
        <p>
            Для вас остаётся только добавить наш IP в список ваших серверов в окне программы SA-MP 
        </p>
    </article>
</div>
      <div class="container">
    <div class="all-news-button">
        <a href="/news">Перейти к странице новостей</a>
    </div>
</div>
      <div class="container">
    <div class="all-news-button">
      <a href="http://forum.rp-florida.ru">Перейти на форум</a>
    </div>
</div>
      <div class="container freelife-footer" style="padding-right:50px;padding-left:50px">
    <hr>
    <div class="row">
        <!-- Информация -->
        <div class="col-sm-6 col-xs-12"> 
            <div class="col-sm-2 text-center">
            </div>
            <div class="col-sm-10">
                <div class="footer-info">
                  <a href="http://unitpay.ru/" target="_blank"><img src="./images/design/UnitPay.gif" style="margin-right: 5px;" /></a>
<script type="text/javascript">document.write("<a href='//www.liveinternet.ru/click' target=_blank><img src='//counter.yadro.ru/hit?t12.2;r" + escape(document.referrer) + ((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)) + ";u" + escape(document.URL) + ";" + Math.random() + "' border=0 width=88 height=31 alt='' title='LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня'><\/a>")</script>
                </div>
            </div>
        </div>
        <!-- Меню -->
        <div class="col-sm-6 hidden-xs">
            <nav class="footer-nav">
                <ul class="clearfix">
                    <li><a href="/site/login">Личный Кабинет</a></li>
                    <li><a href="/news">Новости</a></li>
                  <li><a href="http://forum.rp-florida.ru">Форум</a></li>
                    <li><a href="/donate">Магазин</a></li>
                </ul>
            </nav>
        </div>
    </div>
      </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>