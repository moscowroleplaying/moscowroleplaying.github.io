<?
class TopParams extends CActiveRecord {
	public function getDbConnection() {
		$connection = new CDbConnection(
			"mysql:host=".Yii::app()->params->mysql_host.";dbname=".Yii::app()->params->mysql_dbname,
			Yii::app()->params->mysql_user,
			Yii::app()->params->mysql_pass
		);
		$connection->charset = 'utf8';
		return $connection;
	}	
	public function tableName() {
		return 'frapsy_top_params';
	}
	public function rules() {
		return array(
			array('top_id,field_name,label','safe'),
		);
	}	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
}
?>