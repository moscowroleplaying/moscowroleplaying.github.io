<?
class UsersController extends Controller {
	public function actions() {
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	public function actionRangplus($id) {
		$user = $this->loadByPk($id);
		$names = Fields::getNames(1);
		$query = new Queries;
		$query->admin_name = Yii::app()->user->username;
		$query->action = 1;
		$query->playerid = $user->{$names['online']['alias']};
		$query->player_name = Users::getNameByPk($id);
		if($user->{$names['online']['alias']} == 1001)
			$query->flag = 1;

		$query->save();
		$user->{$names['rang']['alias']} = $user->{$names['rang']['alias']} + 1;
		$user->save();
		$this->redirect(Yii::app()->baseUrl.'/id'.Yii::app()->user->userid);
	}
	public function actionRangminus($id) {
		$user = $this->loadByPk($id);
		$names = Fields::getNames(1);
		$query = new Queries;
		$query->admin_name = Yii::app()->user->username;
		$query->action = 2;
		$query->playerid = $user->{$names['online']['alias']};
		$query->player_name = Users::getNameByPk($id);
		if($user->{$names['online']['alias']} == 1001)
			$query->flag = 1;

		$query->save();
		$user->{$names['rang']['alias']} = $user->{$names['rang']['alias']} - 1;
		$user->save();
		$this->redirect(Yii::app()->baseUrl.'/id'.Yii::app()->user->userid);
	}
	public function actionFrkick($id) {
		$user = $this->loadByPk($id);
		$names = Fields::getNames(1);
		$query = new Queries;
		$query->admin_name = Yii::app()->user->username;
		$query->action = 3;
		$query->playerid = $user->{$names['online']['alias']};
		$query->player_name = Users::getNameByPk($id);
		if($user->{$names['online']['alias']} == 1001)
			$query->flag = 1;

		$query->save();
		$user->{$names['member']['alias']} = 0;
		$user->save();
		$this->redirect(Yii::app()->baseUrl.'/id'.Yii::app()->user->userid);
	}		
	public function actionView($id) {
		$fields = Fields::getNames(1);
		$names = Names::getAllNames();
		$data = $this->loadByPk($id);
		if($data->{$fields['leader']['alias']} != 0) {
			$criteria = new CDbCriteria();
			$criteria->condition = $fields['member']['alias'].' = :leader';
			$criteria->select = $fields['id']['alias'].','.$fields['username']['alias'].','.$fields['leader']['alias'].','.$fields['online']['alias'].','.$fields['rang']['alias'];
			$criteria->params = array(':leader'=>$data->{$fields['leader']['alias']});
			$criteria->order = $fields['rang']['alias'].' DESC';
			$team = Users::model()->findAll($criteria);
		}
		$this->render('view',array('data'=>$data,'field'=>$fields,'names'=>$names,'team'=>$team));
	}
	public function actionChange() {
		$model = $this->loadByPk(Yii::app()->user->userid);
		$model->setScenario('changer');
		$names = Fields::getNames(1);
		if(isset($_POST['Users'])) {
			$model->old_pass = $_POST['Users']['old_pass'];
			$model->old_email = $_POST['Users']['old_email'];
			if($model->validate()) {
				if(!empty($_POST['Users'][$names['password']['alias']]) AND !empty($_POST['Users']['old_pass']))
					$model->{$names['password']['alias']} = $_POST['Users'][$names['password']['alias']];
				if(!empty($_POST['Users'][$names['email']['alias']]) AND !empty($_POST['Users']['old_email']))
					$model->{$names['email']['alias']} = $_POST['Users'][$names['email']['alias']];				
				$model->setScenario('');
				$model->save();
			}
		}		
		$this->render('change',array('model'=>$model,'names'=>$names));
	}
	public function actionProfile($id) {
		$names = Fields::getFields(1);
		$this->render('view',array('field'=>$names,'data'=>$this->loadByPk($id,$names)));
	}
	public function loadByName($name) {
		$model = Users::model()->find(array('condition'=>$names['username']['alias']."=':name'",'params'=>array(':name'=>$name)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
	public function loadByPk($id) {
		$model = Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>