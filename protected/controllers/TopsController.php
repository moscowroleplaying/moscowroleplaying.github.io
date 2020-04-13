<?
class TopsController extends Controller {
	public function actionCreate() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = new Tops;
		if(isset($_POST['Tops'])) {
			$model->attributes = $_POST['Tops'];
			$model->table_name = Tables::getTableName($model->table_id);
			$model->active = 1;
			if(!$model->save())
				throw new CHttpException(500,'Ошибка сохранения топ-листа');
			$id = $model->id;
			foreach($_POST['TopParams'] as $key=>$val) {
				if(empty($val['field_name']) OR empty($val['label']))
					continue;
				$model = new TopParams;
				$model->top_id = $id;
				$model->field_name = $val['field_name'];
				$model->label = $val['label'];
				$model->save();
			}
			$this->redirect(Yii::app()->baseUrl.'/tops/view/'.$id);
		} else {
			$tables = Tables::getTables();
			$this->render('create',array('tables'=>$tables));
		}
	}
	public function actionAdmin() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		$data = Tops::model()->findAll(array('order'=>'views DESC'));
		$this->render('admin',array('data'=>$data));		
	}
	public function actionUnactivate($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');
		$top = $this->loadByPk($id);
		$top->active = 0;
		$top->save();
		$this->redirect(Yii::app()->baseUrl.'/tops/admin');
	}
	public function actionActivate($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$top = $this->loadByPk($id);
		$top->active = 1;
		$top->save();
		$this->redirect(Yii::app()->baseUrl.'/tops/admin');
	}
	public function actionDeletetop($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');

		$top = $this->loadByPk($id);
		$top->delete();
		$this->redirect(Yii::app()->baseUrl.'/tops/admin');
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
		$criteria->order = $model->field_for_sort.' DESC';
		$criteria->limit = '15';
		$criteria->select = $fields['username']['alias'].','.$model->field_for_sort.','.$select_str;		
		$data = Uni::getData($criteria);			
		$this->render('view',array('model'=>$model,'data'=>$data,'fields'=>$fields,'names'=>$names,'params'=>$params));
	}
	public function loadByPk($id) {
		$model = Tops::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>