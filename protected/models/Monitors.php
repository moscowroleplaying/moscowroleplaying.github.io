<?
class Monitors extends CActiveRecord {
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
		return 'frapsy_mon';
	}
	public function rules() {
		return array(
			array('mon_name,condition,table_name,table_id','safe'),
		);
	}
	public function relations() {
		return array(
			'load_params'=>array(self::HAS_MANY,'MonParams','mon_id'),
		);
	}
	public static function getMonitors() {
		$monitors = self::model()->findAll(array('select'=>'`id`,`mon_name`','condition'=>'active = 1'));
		if($monitors === NULL) return NULL;
		$arr = array();
		foreach($monitors as $item)
			$arr[] = array('id'=>$item[id],'mon_name'=>$item[mon_name]);
		return $arr;		
	}	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
}
?>