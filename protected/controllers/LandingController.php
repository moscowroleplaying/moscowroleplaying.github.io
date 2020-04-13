<?
class LandingController extends Controller {
	public $layout = 'landing';
	public function actionIndex() {
		$this->render('index');
	}		
}
?>