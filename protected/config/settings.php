<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'preload'=>array('log','bootstrap'),
	'defaultController'=>'landing',
	'language'=>'ru',
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'theme'=>'bootstrap',
	'components'=>array(
		'bootstrap'=>array('class'=>'bootstrap.components.Bootstrap'),    
		'user'=>array(
			'allowAutoLogin'=>true,
		),		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'id<id:\d+>'=>'users/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),     
	),
	'name'=>'FRAPSY PANEL',
	'params'=>require dirname(__FILE__) . '/params.php',
);