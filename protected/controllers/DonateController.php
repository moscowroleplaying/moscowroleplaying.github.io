<?
class DonateController extends Controller {
	public function actions() {
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	public function actionIndex() {
		if(isset($_POST['Donate'])) {
			$model = new Donate;
			$model->sum = $_POST['Donate']['sum'];
			$model->nickname = $_POST['Donate']['nickname'];

			$fields = Fields::getNames(1);
			$criteria = new CDbCriteria(array(
				'condition'=>$fields['username']['alias'].' = :username',
				'params'=>array(':username'=>$_POST['Donate']['nickname']),
				'select'=>$fields['id']['alias'],
			));				
			$user = Users::model()->find($criteria);
			if($user === NULL)
				throw new CHttpException(404,'Игрок с таким именем не найден');
			$id = $user->{$fields['id']['alias']};

			$model->create_time = date('Y-m-d H:i:s');
			if(!$model->save())
				throw new CHttpException(500,'Не удалось сохранить запись о покупке');
			$this->render('index',array('model'=>$model,'userid'=>$id));
		} else $this->render('index');
	}	
	public function actionUnitpay() {
		$secretKey = Yii::app()->params['secret_key'];
		$method = $_REQUEST['method'];
		$params = $_REQUEST['params'];

		if($params['sign'] != $this->md5sign($params,$secretKey)) {
			$this->responseError("Некорректная цифровая подпись");
		}
		switch($method) {
			case 'check': {
				$criteria = new CDbCriteria(array(
					'condition'=>"sum = :sum",
					'params'=>array(':sum'=>$params['sum']),
					'order'=>'create_time DESC',
				));
				$model = Donate::model()->find($criteria);
				if($model === null) $this->responseError('Счет не найден в таблице!');
				break;
			}
			case 'pay': {
				$fields = Fields::getNames(1);		
				$user = Users::model()->findByPk($params['account']);
				if($user->{$fields['online']['alias']} == 1001) {
					$user->{$fields['donate']['alias']} = $user->{$fields['donate']['alias']} + $params['sum'];
					$user->save();
				} else {
					$query = new Queries;
					$query->admin_name = $user->{$fields['username']['alias']};
					$query->player_name = $user->{$fields['username']['alias']};
					$query->action = 6;
					$query->amount = $params['sum'];
					$query->playerid = $user->{$fields['online']['alias']};
					$query->flag = 0;
					$query->save();
				}
				$criteria = new CDbCriteria(array(
					'condition'=>'nickname = :nickname',
					'params'=>array(':nickname'=>$user->{$fields['username']['alias']}),
					'order'=>'create_time DESC',
				));
				$model = Donate::model()->find($criteria);
				$model->status = 1;
				$model->save();				
				break;
			}
			case 'error': {
				$this->responseError($params['errorMessage']);
				break;
			}
			default: $this->responseError("Некорректный метод, поддерживаются методы: check и pay"); exit;
		}
		$this->responseSuccess("ок");
	}
	public function md5sign($params, $secretKey) {
		ksort($params);
		unset($params['sign']);
		return md5(join(null, $params).$secretKey);
	}
	public function responseError($message) {
		$error = array(
			"jsonrpc" => "2.0",
			"error" => array(
				"code" => -32000,
				"message" => $message
			),
			'id' => 1
		);
		echo json_encode($error); exit();
	}
	public function responseSuccess($message) {
		$success = array(
			"jsonrpc" => "2.0",
			"result" => array(
				"message"=>$message
			),
			'id' => 1
		);
		echo json_encode($success); exit();
	}		
	public function loadByPk($id) {
		$model = Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>