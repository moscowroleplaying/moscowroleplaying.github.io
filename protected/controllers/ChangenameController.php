<?
class ChangenameController extends Controller {
	public function actions() {
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	public function actionAdmin() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		$data = Changename::model()->findAll(array('condition'=>'status = 0'));
		$this->render('admin',array('data'=>$data));
	}
	public function actionIndex() {
		if(isset($_POST['Change'])) {
			$model = new Changename;
			$model->user_id = Yii::app()->user->userid;
			$model->old_name = Yii::app()->user->username;
			$model->new_name = $_POST['Change']['new_name'];
			$model->status = 0;
			$model->moder_name = 'none';
			$model->create_time = date('Y-m-d H:i:s');
			$model->desc = $_POST['Change']['desc'];
			if(!$model->save())
				throw new CHttpException(500,'Модель заявки не была сохранена. Попробуйте еще раз или обратитесь к администратору');

			$this->render('index',array('msg'=>'Ваша заявка отправлена на модерацию. Решение прийдет вам на E-Mail'));
		} else {
			if(!Yii::app()->user->isGuest) $this->redirect(Yii::app()->baseUrl.'/id'.Yii::app()->user->userid);
			else $this->redirect(Yii::app()->baseUrl.'/site/login');
		}
	}
	public function actionAccept($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$model = $this->loadByPk($id);
		if($model === null)
			throw new CHttpException(500,'Модель не была загружена. Попробуйте еще раз.');

		$names = Fields::getNames(1);
		$user = Users::model()->findByPk($model->user_id,array(
			'select'=>$names['id']['alias'].','.$names['email']['alias'].','.$names['username']['alias'].','.$names['online']['alias'],
		));
		if($user === null)
			throw new CHttpException(500,'Модель игрока не была загружена. Попробуйте позже.');

		$query = new Queries;
		$query->admin_name = Yii::app()->user->username;
		$query->action = 7;
		$query->new_nickname = $model->new_name;
		$query->player_name = $user->{$names[username][alias]};
		if($user->{$names[online][alias]} == 1001) {
			$query->playerid = 1001;
			$query->flag = 1;
			/*
			*
			*

			$connection = new CDbConnection(
				"mysql:host=".Yii::app()->params->mysql_host.";dbname=".Yii::app()->params->mysql_dbname,
				Yii::app()->params->mysql_user,
				Yii::app()->params->mysql_pass
			);
			$connection->charset = 'utf8';
			$command = $connection->createCommand("UPDATE `weapons` SET `name` = :newname WHERE `name` = :oldname");
			$command->bindParam(':newname',$model->new_name,PDO::PARAM_STR);
			$command->bindParam(':oldname',$user->{$names['username']['alias']},PDO::PARAM_STR);
			$command->execute();
			$command->text = "UPDATE `inventory` SET `name` = :newname WHERE `name` = :oldname";
			// $command->bindParam(':newname',$model->new_name,PDO::PARAM_STR);
			// $command->bindParam(':oldname',$user->{$names['username']['alias']},PDO::PARAM_STR);
			$command->execute();			
			*
			*
			*/			
			$user->{$names[username][alias]} = $model->new_name;
			$user->save();
		} else {
			$query->playerid = $user->{$names[online][alias]};
			$query->flag = 0;
		}
		$query->save();
		$model->status = 1;
		$model->moder_name = Yii::app()->user->username;
		if(!$model->save())
			throw new CHttpException(500,'Модель не была сохранена. Попробуйте позже.');

		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: Admin <no-reply@".$_SERVER['SERVER_NAME'].">\r\n";
		$text = "
			<html>
				<head><title>Оповещение о модерации заявки</title></head>
				<body>
					<p>Здравствуйте, ".$user->{$names['username']['alias']}.". Ваша заявка на смену ника была промодерирована.</p><br>
					<strong>Номер заявки:</strong> ".$model->id."<br>
					<strong>Желаемое имя:</strong> ".$model->new_name."<br>
					<strong>Решение:</strong> ОДОБРЕНО<br>
				</body>
			</html>
		";
		mail($user->{$names['email']['alias']},Yii::app()->params->sitename,$text,$headers);
		$this->redirect(Yii::app()->baseUrl.'/changename/admin');
	}
	public function actionDecline($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$model = $this->loadByPk($id);
		if($model === null)
			throw new CHttpException(500,'Модель не была загружена. Попробуйте еще раз.');

		$names = Fields::getNames(1);
		$user = Users::model()->findByPk($model->user_id,array(
			'select'=>$names['email']['alias'].",".$names['username']['alias'],
		));
		if($user === null)
			throw new CHttpException(500,'Модель игрока не была загружена. Попробуйте позже.');

		$model->status = 2;
		$model->moder_name = Yii::app()->user->username;
		if(!$model->save())
			throw new CHttpException(500,'Модель не была сохранена. Попробуйте позже.');

		//$model = $this->loadByPk($id);
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: Администратор <no-reply@".$_SERVER['SERVER_NAME'].">\r\n";
		$text = "
			<html>
				<head><title>Оповещение о модерации заявки</title></head>
				<body>
					<p>Здравствуйте, ".$user->{$names['username']['alias']}.". Ваша заявка на смену ника была промодерирована.</p><br>
					<strong>Номер заявки:</strong> ".$model->id."<br>
					<strong>Желаемое имя:</strong> ".$model->new_name."<br>
					<strong>Решение:</strong> ОТКАЗАНО<br>
				</body>
			</html>
		";
		mail($user->{$names['email']['alias']},Yii::app()->params->sitename,$text,$headers);
		$this->redirect(Yii::app()->baseUrl.'/changename/admin');
	}	
	public function loadByPk($id) {
		$model = Changename::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>