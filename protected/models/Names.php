<?
class Names extends CActiveRecord {
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
		return 'frapsy_names';
	}
	public static function getNames($id) {
		$params = self::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>$id),'select'=>'label,params'));
		if($params === NULL) return NULL;
		$names[label] = $params->label;
		$names[names] = unserialize($params->params);
		return $names;
	}
	public static function getAllNames() {
		$params = self::model()->findAll(array('select'=>'label,params'));
		if($params === NULL) return NULL;
		foreach($params as $val) {
			$names[] = array('label'=>$val[label],'names'=>unserialize($val[params]));
		}
		return $names;
	}


	public static function model($className=__CLASS__) {
		return parent::model($className);
	}		
}
?>