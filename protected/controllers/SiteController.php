<?php
class SiteController extends Controller {
	public function actions() {
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionEditMenu() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');			
		if(isset($_POST['Menu'])) {
			$model = new Menu;
			$model->attributes = $_POST['Menu'];
			$model->save();
		}
		$menu = Menu::getMenu();
		$items = array();
		$parents = array();
		$subitems = array();
		foreach($menu as $val) {
			if($val['parent_id']) {
				if($val['label'] !== 'divider')
					$subitems[$val['parent_id']][] = array('id'=>$val['id'],'label'=>$val['label'],'url'=>$val['url']);
				else
					$subitems[$val['parent_id']][] = array('id'=>$val['id'],'class'=>$val['label']);
			} else {
				$parents[] = array('id'=>$val['id'],'label'=>$val['label']);
				$items[$val['id']] = array('id'=>$val['id'],'label'=>$val['label'],'url'=>$val['url'],'items'=>$subitems[$val['id']]);
			}
		}
		$this->render('menu',array('items'=>$items,'parents'=>$parents));
	}
	public function actionDeleteMenu($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$menu = Menu::model()->findByPk($id);
		$menu->delete();
		$this->redirect(Yii::app()->baseUrl.'/site/editmenu');
	}
	public function actionConfig() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');			
		$model = new ConfigForm;
		if(isset($_POST['Config'])) {
			$model->attributes = $_POST['Config'];
			$model->save();
		}
		$i = 0;
		$data = array();
		foreach($model->getAttributes() as $key => $val) {
			if(!preg_match('/_label/',$key))
				$data[$i] = array('value'=>$val,'name'=>$key);
			else {
				$data[$i] = array_merge($data[$i],array('label'=>$val));
				$i++;
			}
		}		
		$this->render('config', array('data' => $data));
	}	
	public function actionNames() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');	
		if(isset($_POST)) {

			foreach($_POST as $key=>$val) {
				$model = Names::model()->findByPk($key+1);
				$model->params = serialize($val);
				$model->save();
			}
		}
		$names = Names::getAllNames();
		$this->render('names',array('names'=>$names));
	}
	public function actionSort($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		if(isset($_REQUEST['Order'])) {
			$models = explode(',', $_POST['Order']);
			for ($i = 0; $i < sizeof($models); $i++) {
				if($model = Fields::model()->findbyPk($models[$i]))
					$model->updateByPk($models[$i],array('sort'=>$i) );
			}
		}
		$dataProvider = new CActiveDataProvider('Fields', array(
			'pagination'=>false,
			'criteria'=>array(
				'condition'=>'`show` = 1 AND `table_id` = :id',
				'params'=>array(':id'=>$id),
				'order'=>'sort ASC',
			),
		));
		if(!count($dataProvider->getData())) {
			$msg = 'В настройках полей не выбрано ни одного поля для отображения.';
		} else {
			foreach($dataProvider->getData() as $val) {
				$items[$val['table_field_id']] = $val['label'];
			}
		}			
		$this->render('sort',array('items'=>$items,'msg'=>$msg));
	}	
	public function actionIndex() {
		$this->render('index');
	}
	public function actionDesign($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		switch($id) {
			case 1: $file = Yii::getPathOfAlias('webroot.css.style').'.css'; break;
			case 2: $file = Yii::getPathOfAlias('webroot.css.main').'.css'; break;
			case 3: $file = Yii::getPathOfAlias('application.views.layouts.main').'.php'; break;
			case 4: $file = Yii::getPathOfAlias('application.views.layouts.main2').'.php'; break;
		}		
		if(isset($_POST['code']))
			file_put_contents($file,$_POST['code']);

		$this->render('design',array('content'=>file_get_contents($file),'id'=>$id));
	}
	public function actionError() {
		if($error=Yii::app()->errorHandler->error) {
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionControl() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		if(isset($_POST['rcon_command'])) {
			switch($_POST['rcon_command']) {
				case 'check': {
					$class = new SampQueryAPI(Yii::app()->params['server_ip'],Yii::app()->params['server_port']);
					if($class->isOnline()) {
						$msg = "<strong>Статус: </strong><span class='label label-success'>Онлайн</span><br>";
						$msg .= "<strong>Пинг: </strong>".$class->sPing." ms.";
					} else {
						$msg = "<strong>Статус: </strong><span class='label label-danger'>Офлайн</span><br>";
						$msg .= "<strong>Пинг: </strong>none";						
					}			
					break;
				}
				case 'help': {
					$msg = "
						<h3>RCON - команды и их описания:</h3>
						<strong>cmdlist</strong> - просмотр всех команд<br>
						<strong>varlist</strong> - просмотр всех настроек сервера <br>
						<strong>exit</strong> - закрывает сервер <br>
						<strong>echo [текст]</strong> - Показывает [текст] в консоле сервера (НЕ в общем чате). <br>
						<strong>hostname [название]</strong> - изменяет название сервера (пример: /rcon hostname my server). <br>
						<strong>gamemodetext [название]</strong> - меняет название мода (пример: /rcon gamemodetext my gamemode). <br>
						<strong>mapname [название]</strong> - меняет название карты (пример: /rcon mapname San Andreas). <br>
						<strong>exec [имя файла]</strong> - открывает файлы .cfg (пример: /rcon exec blah.cfg). <br>
						<strong>kick [ID]</strong> - кик определённого человека по иду (пример: /rcon kick 2). <br>
						<strong>ban [ID]</strong> - бан определённого человека по иду (пример: /rcon ban 2). <br>
						<strong>changemode [mode]</strong> - смена мода по названию (пример: /rcon changemode sftdm). <br>
						<strong>gmx</strong> - смена мода по очереди в настройках сервера <br>
						<strong>reloadbans</strong> - обновляет данные из файла samp.ban <br>
						<strong>reloadlog</strong> - очищает лог <br>
						<strong>say</strong> - сказать в общий чат от лица админа (пример: /rcon say blah). <br>
						<strong>players</strong> - показать всех игроков на сервере с их именами, ip и пингом. <br>
						<strong>banip [IP]</strong> - бан по ip (пример: /rcon banip 127.0.0.1). <br>
						<strong>unbanip [IP]</strong> - разбан по ip (пример: /rcon unbanip 127.0.0.1). <br>
						<strong>gravity</strong> - изменение гравитации - (пример: /rcon gravity 0.008). <br>
						<strong>weather [ID]</strong> - изменение погоды (пример: /rcon weather 1). <br>
						<strong>loadfs</strong> - загружает фс (пример: /rcon loadfs adminfs). <br>
						<strong>unloadfs</strong> - выгружает фильтер-скрипт (пример: /rcon unloadfs adminfs). <br>
						<strong>reloadfs</strong> - перезагрузить фильтер-скрипт (пример: /rcon reloadfs adminfs).   <br> 
						<strong>gamemode[1-15]</strong> - установка порядка гэйм-модов (пример: /rcon gamemode1 sftdm). <br>
						<strong>instagib [bool]</strong> - убийство с одной пули (пример: /rcon instagib 0). <br>
						<strong>filterscripts</strong> - просмотр всех фильтер-скриптов <br>
						<strong>lanmode [bool]</strong> - установка LAN (пример: /rcon lanmode 1). <br>
						<strong>password [string]</strong> - установка [string] пароля на сервер (пример: /rcon password mypassword). <br>
						<strong>plugins</strong> - плагины, установленные на сервере. <br>
						<strong>port</strong> - порт сервера. <br>
						<strong>rcon_password [string]</strong> - установка [string] rcon-пароля (/rcon rcon_password myrconpassword) <br>
						<strong>version</strong> - версия сервера <br>
						<strong>weburl [url]</strong> - установка [url] сайта на сервере (пример: /rcon weburl www.mysite.com). <br>
						<strong>worldtime [time]</strong> - установка [time] времени на сервере (пример: /rcon worldtime 2). <br>
						<strong>maxplayers</strong> - максимальное кол-во игроков на сервере. <br>
						<strong>timestamp</strong> - установка часового пояса <br>
					";
					break;
				}
				default: {
					$class = new SampRconAPI(Yii::app()->params['server_ip'],Yii::app()->params['server_port'],Yii::app()->params['server_rcon']);
					if($class->isOnline()) 
						$msg = $class->call($_POST['rcon_command']);
					else
						$msg = '<span class="alert alert-danger">Не возможно подключиться к серверу</span>';
					break;
				}
			}

		}
		$this->render('control',array('msg'=>$msg));
	}
	public function ping($host) {
		return exec(sprintf('ping -n 1 -w 1000 %s',escapeshellarg($host)), $res, $rval);

	}
	public function actionRecovery() {
		if(isset($_POST['Data'])) {
			$names = Fields::getNames(1);
			$criteria = new CDbCriteria;
			$criteria->condition = "`{$names['username']['alias']}` = :username AND `{$names['email']['alias']}` = :email";
			$criteria->params = array(':username'=>$_POST['Data']['rec_username'],':email'=>$_POST['Data']['rec_email']);
			$criteria->select = "{$names['id']['alias']},{$names['username']['alias']},{$names['email']['alias']},{$names['password']['alias']}";
			$user = Users::model()->find($criteria);
			if($user !== null) {
				$headers  = 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
				$headers .= 'From: Admin <no-reply@'.$_SERVER['SERVER_NAME'].'>'."\r\n";
				$text = '
					<html>
						<head><title>Password</title></head>
						<body>
							<strong>ID:</strong> '.$user->{$names['id']['alias']}.'<br>
							<strong>Nickname:</strong> '.$user->{$names['username']['alias']}.'<br>
							<strong>Your password:</strong> '.$user->{$names['password']['alias']}.'
						</body>
					</html>
				';
				mail($user->{$names['email']['alias']},Yii::app()->params->sitename,$text,$headers);
				$mess = 'Пароль успешно выслан на E-Mail адрес.';	
			} 
			else 
				$mess = 'Аккаунта с такими параметрами не найдено.';
		} 
		$this->render('recovery',array('message'=>$mess));
	}
	public function actionLogin() {
		$model = new LoginForm;
		if(isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if($model->validate() && $model->login()) {
				$log = new Logins;
				$log->account = Yii::app()->user->username;
				$log->ip = $_SERVER['REMOTE_ADDR'];
				$log->date = date('Y-m-d H:i:s');
				$log->useragent = $this->getAgent($_SERVER['HTTP_USER_AGENT']);
				$log->save();
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$this->render('login',array('model'=>$model));
	}
	public function getAgent($agent) {
		preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info);
		list(,$browser,$version) = $browser_info;
		if(preg_match("/(YaBrowser)/i",$agent,$yandex)) return 'Яндекс.Браузер'; 
		if(preg_match("/(Opera)/i", $agent, $opera)) return 'Opera';
		if($browser == 'MSIE') {
			preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie);
			if($ie) return $ie[1].' based on IE';
			return 'InternetExplorer';
		}
		if($browser == 'Firefox') {
			preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); 
			if($ff) return $ff[1];
		}
		if($browser == 'Version') return 'Safari';
		if(!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko';
		return $browser; 
	}
	public function actionAddField($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = new Fields;
		$model->alias = 'Новый параметр';
		$model->label = 'Новый параметр';
		$model->table_id = intval($id);
		if($model->save()) {
			$sql_id = $model->table_field_id;
			$model = Fields::model()->findByPk($sql_id);
			$model->field_name = 'myField_'.$sql_id;
			$model->desc = 'Пользовательский параметр - '.$sql_id;
			$model->save();
		}
		$this->redirect(Yii::app()->baseUrl.'/site/settings/'.$id);
	}
	public function actionDeleteField($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = Fields::model()->findByPk($id);
		$model->delete();
		$this->redirect(Yii::app()->baseUrl.'/site/settings/1');
	}
	public function actionSettings() {	
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$id = $_GET['id'];
		foreach($_POST as $key => $val) {
			if($key == 'Tables') {
				$tables = Tables::model()->findByPk(intval($id));
				$tables->table_name = $_POST['Tables']['table_name'];
				if(!$tables->save())
					throw new CHttpException(404,'Ошибка сохранения модели "Таблицы"');				
			}
			if($val['alias'] !== $val['h_alias'] || $val['label'] !== $val['h_label'] || $val['show'] !== $val['h_show']) {
				$crit = new CDbCriteria;
				$crit->condition = 'table_field_id = :id';
				$crit->params = array(':id'=>intval($key));
				$model = Fields::model()->find($crit);
				$model->alias = $val['alias'];
				$model->label = $val['label'];
				$model->show = ($val['show'] == 'on') ? 1:0;
				if(!$model->save())
					throw new CHttpException(500,'Ошибка сохранения модели - '.$item);
			}
		}				
		$criteria = new CDbCriteria;
		$criteria->condition = 'id = :id';
		$criteria->params = array(':id'=>$id);
		$tables = Tables::model()->findAll($criteria);
		//
		$criteria->condition = 'table_id = :id';
		$criteria->params = array(':id'=>$id);
		$fields = Fields::model()->findAll($criteria);

		$this->render('settings',array('tables'=>$tables,'fields'=>$fields,'id'=>$id));
	}
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
} 
?>