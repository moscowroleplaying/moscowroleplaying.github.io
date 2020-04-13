<?
class NewsController extends Controller {
	public function actions() {
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	public function actionCreate() {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');			
		$model = new News;
		if(isset($_POST['News'])) {
			$model->title = $_POST['News']['title'];
			$model->content = $_POST['News']['content'];
			$model->full_content = $_POST['News']['full_content'];
			$model->status = 1;
			$model->author = Yii::app()->user->username;
			$model->create_time = date('Y-m-d H:i:s');
			if(!$model->save())
				throw new CHttpException(404,'По каким то причинам новость не была сохранена. Попробуйте еще раз');

			$this->redirect(Yii::app()->baseUrl.'/news/view/'.$model->id);
		}
		$this->render('create',array('model'=>$model));
	}
	public function actionDelete($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = $this->loadModel($id);
		$model->status = 0;
		if(!$model->save())
			throw new CHttpException(404,'По каким то причинам новость не была удалена. Попробуйте еще раз');

		$this->redirect(Yii::app()->baseUrl.'/news/');
	}
	public function actionUpdate($id) {
		if(Yii::app()->user->isGuest OR Yii::app()->user->admin < Yii::app()->params['editor_level'])
			throw new CHttpException(500,'Нет доступа!');		
		$model = $this->loadModel($id);
		if(isset($_POST['News'])) {
			$model->title = $_POST['News']['title'];
			$model->content = $_POST['News']['content'];
			$model->full_content = $_POST['News']['full_content'];
			$model->status = 1;
			if(!$model->save())
				throw new CHttpException(404,'По каким то причинам новость не была сохранена. Попробуйте еще раз');

			$this->redirect(Yii::app()->baseUrl.'/news/view/'.$model->id);
		}		
		$this->render('update',array('model'=>$model));
	}
	public function actionIndex() {
		$names = Fields::getNames(1);
		if($names['id']['alias'] === 'changeMe') $this->redirect(Yii::app()->baseUrl.'/site/settings/1');
		$dataProvider = new CActiveDataProvider('News',array('criteria'=>array('condition'=>'status = 1','order'=>'create_time DESC'),'pagination'=>array('pageSize'=>15)));
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	public function actionView($id) {
		$this->render('view',array('data'=>$this->loadModel($id)));
	}
	public function loadModel($id) {
		$model = News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		
}
?>