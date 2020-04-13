<?
class Tables extends CActiveRecord {
	public function getDbConnection() {
		$connection = new CDbConnection(
			"mysql:host=".Yii::app()->params->mysql_host.";dbname=".Yii::app()->params->mysql_dbname,
			Yii::app()->params->mysql_user,
			Yii::app()->params->mysql_pass
		);
		$connection->charset = 'utf8';
		return $connection;
	}	
	public function rules() {
		return array(
			array('table_name','unique','message'=>'Таблица с таким названием уже добавлена в систему'),
			array('label,desc','safe'),
		);
	}
	public function tableName() {
		return 'frapsy_params_tables';
	}
	public static function getTableName($id) {
		$tbl = self::model()->findByPk($id,array('select'=>'table_name'));
		return $tbl === NULL ? NULL : $tbl->table_name;
	}
	public static function getTableLabels() {
		$tbls = self::model()->findAll(array('select'=>'id,label'));
		return $tbls;
	}
	public static function getTableNames() {
		$tbls = self::model()->findAll(array('select'=>'id,table_name'));
		return $tbls;
	}	
	public static function getTables() {
		$tbls = self::model()->findAll();
		return $tbls;
	}	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
}
?>