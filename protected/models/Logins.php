<?
class Logins extends CActiveRecord {
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
		return 'frapsy_logins';
	}
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}		
}
?>