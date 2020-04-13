<?
class Fields extends CActiveRecord {
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
		return 'frapsy_params_fields';
	}
	public static function getNames($id) {
		$params = self::model()->findAll(array('order'=>'sort ASC','condition'=>'table_id = :id','params'=>array(':id'=>$id),'select'=>'`field_name`,`alias`,`label`,`show`'));
		if($params === NULL) return NULL;
		$names = array();
		foreach($params as $item)
			$names[$item[field_name]] = array('alias'=>$item[alias],'label'=>$item[label],'show'=>$item[show]);
		return $names;		
	}	
	public static function getFields($id) {
		$params = self::model()->findAll(array('order'=>'`sort` ASC','condition'=>'`table_id` = :id','params'=>array(':id'=>$id),'select'=>'`table_field_id`,`field_name`,`alias`,`label`,`show`'));
		if($params === NULL) return NULL;
		$names = array();
		foreach($params as $item)
			$names[$item[table_field_id]] = array('alias'=>$item[alias],'label'=>$item[label]);
		return $names;		
	}
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}		
}
?>