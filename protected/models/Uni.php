<?
class Uni {
	public function getDbConnection() {
		$connection = new CDbConnection(
			"mysql:host=".Yii::app()->params->mysql_host.";dbname=".Yii::app()->params->mysql_dbname,
			Yii::app()->params->mysql_user,
			Yii::app()->params->mysql_pass
		);
		$connection->charset = 'utf8';
		return $connection;
	}	
	public static function getData($criteria) {
		$base = self::getDbConnection();
		$command = $base->createCommand()
			->select($criteria->select)
			->from($criteria->alias)
			->where($criteria->condition,$criteria->params)
			->order($criteria->order)
			->limit($criteria->limit);
		$data = $command->queryAll();
		return $data;
	}		
}
?>