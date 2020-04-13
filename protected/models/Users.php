<?
class Users extends CActiveRecord {
	public $old_pass;
	public $old_email;
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
		$name = Tables::getTableName(1);
		return $name;
	}
	public function rules() {
		$names = Fields::getNames(1);
		return array(
			array('old_pass','checkpass','on'=>'changer'),
			array('old_email','checkmail','on'=>'changer'),
			array('old_email','email','on'=>'changer','message'=>'Некорректный E-Mail адрес'),
			array($names['email']['alias'].','.$names['password']['alias'],'safe','on'=>'changer'),
		);
	}
	public function checkpass($attribute,$params) {
		if(!$this->hasErrors($attribute)) {
			$names = Fields::getNames(1);
			if(!empty($this->{$attribute}) AND $this->{$attribute} !== $this->{$names['password']['alias']})
				$this->addError($attribute,'Старый пароль введен неверно');
		}
	}
	public static function getNameByPk($id) {
		$names = Fields::getNames(1);
		$params = self::model()->find(array('condition'=>$names['id']['alias'].' = :id','params'=>array(':id'=>$id),'select'=>$names['username']['alias']));
		if($params === NULL) return NULL;
		return $params->{$names['username']['alias']};		
	}	
	public function checkmail($attribute,$params) {
		if(!$this->hasErrors($attribute)) {
			$names = Fields::getNames(1);
			if($this->{$attribute} !== $this->{$names['email']['alias']})
				$this->addError($attribute,'Старый E-Mail введен неверно');
		}
	}			
	public function validatePassword($password) {
		$names = Fields::getNames(1);
		if($password === $this->{$names[password][alias]}) return true;
		else return false;
	}	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}		
}
?>