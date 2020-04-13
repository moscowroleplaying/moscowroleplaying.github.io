<?
class MonitorController extends Controller {
	public function actionCreate() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = new Monitors;
		if(isset($_POST['Monitors'])) {
			if(preg_match('/(@|#|№|%|&|;)/',$_POST['Monitors']['condition'])){
				$err = 'Неверно заполнено выражение для выборки, используйте только буквы, цифры, подчеркивание и знаки ! = > <';
				$this->render('create',array('error'=>$err));
			} else {
				$model->attributes = $_POST['Monitors'];
				$model->table_name = Tables::getTableName($model->table_id);
				$model->active = 1;
				if(!$model->save())
					throw new CHttpException(500,'Ошибка сохранения мониторинга');
				$id = $model->id;
				foreach($_POST['MonParams'] as $key=>$val) {
					if(empty($val['field_name']) OR empty($val['label']))
						continue;
					$model = new MonParams;
					$model->mon_id = $id;
					$model->field_name = $val['field_name'];
					$model->label = $val['label'];
					$model->save();
				}
				$this->redirect(Yii::app()->baseUrl.'/monitor/view/'.$id);
			}
		} else {
			$tables = Tables::getTables();
			$this->render('create',array('tables'=>$tables));
		}
	}
	public function actionFractions() {
		$names = Names::getNames(1);
		$fields = Fields::getNames(1);

		$criteria = new CDbCriteria(array(
			'condition'=>$fields['member']['alias'].' != 0',
			'select'=>$fields['username']['alias'].','.$fields['member']['alias'].','.$fields['rang']['alias'].','.$fields['leader']['alias'].','.$fields['online']['alias'],
		));
		$data = Users::model()->findAll($criteria);		
		$this->render('fractions',array('names'=>$names,'fields'=>$fields,'data'=>$data));
	}
	public function actionAdmin() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		$data = Monitors::model()->findAll(array('order'=>'views DESC'));
		$this->render('admin',array('data'=>$data));		
	}
	public function actionUnactivate($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		$top = $this->loadByPk($id);
		$top->active = 0;
		$top->save();
		$this->redirect(Yii::app()->baseUrl.'/monitor/admin');
	}
	public function actionActivate($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$top = $this->loadByPk($id);
		$top->active = 1;
		$top->save();
		$this->redirect(Yii::app()->baseUrl.'/monitor/admin');
	}
	public function actionDeletemon($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$monitor = $this->loadByPk($id);
		$monitor->delete();
		$this->redirect(Yii::app()->baseUrl.'/monitor/admin');
	}			
	public function actionView($id) {
		$model = $this->loadByPk($id);
		$model->views++;
		$model->save();
		$params = $model->load_params;

		$fields = Fields::getNames($model->table_id);
		$names = Names::getAllNames();
		$select = array();		
		for($i = 0; $i < count($params); $i++) {
			$select[] = $params[$i]['field_name'];
		}
		$select_str = implode(',',$select);
		//
		$criteria = new CDbCriteria;
		$criteria->alias = $model->table_name;
		$criteria->condition = $model->condition;
		$select_str .= ','.$fields['username']['alias'];
		$criteria->select = $select_str;			
		$data = Uni::getData($criteria);			
		$this->render('view',array('model'=>$model,'data'=>$data,'fields'=>$fields,'names'=>$names,'params'=>$params));	
	}
	public function loadByPk($id) {
		$model = Monitors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>