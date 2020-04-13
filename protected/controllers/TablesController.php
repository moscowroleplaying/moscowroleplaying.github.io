<?

class TablesController extends Controller {
	public function actionCreate() {
		$model = new Tables;
		if(isset($_POST['Tables'])) {
			$model->attributes = $_POST['Tables'];
			$model->save();
			$this->redirect(Yii::app()->baseUrl.'/tables');
		}
		$this->render('create',array('model'=>$model));
	}
	public function actionIndex() {
		$this->render('index',array('tables'=>$this->getTables()));
	}
	public function actionDelete($id) {
		$table = $this->loadByPk($id);
		$table->delete();
		$this->redirect(Yii::app()->baseUrl.'/tables/');
	}
	public static function getTables() {
		$tbls = Tables::getTables();
		return $tbls;
	}
	public static function loadByPk($id) {
		$model = Tables::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'This page not found.');
		return $model;
	}
}

?>