<?
class Tops extends CActiveRecord {
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
		return 'frapsy_tops';
	}
	public function rules() {
		return array(
			array('top_name,field_for_sort,label_for_field,table_id,table_name','safe'),
		);
	}
	public function relations() {
		return array(
			'load_params'=>array(self::HAS_MANY,'TopParams','top_id'),
		);
	}
	public static function getTops() {
		$tops = self::model()->findAll(array('select'=>'`id`,`top_name`','condition'=>'active = 1'));
		if($tops === NULL) return NULL;
		$arr = array();
		foreach($tops as $item)
			$arr[] = array('id'=>$item[id],'top_name'=>$item[top_name]);
		return $arr;		
	}	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
}
?>