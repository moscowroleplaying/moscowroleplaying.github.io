<?
class Menu extends CActiveRecord {
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
		return 'frapsy_menu';
	}
	public function rules() {
		return array(
			array('label,url,parent_id','safe'),
		);
	}
	public static function getMenu() {
		$menu = self::model()->findAll(array('order'=>'parent_id DESC, id'));
		if($menu !== null) return $menu;
		else return null;
	}
	public static function getMenuItems() {
		$menu = self::model()->findAll(array('order'=>'parent_id DESC, id'));
		if($menu !== null) {
			$items = array();
			foreach($menu as $val) {
				if($val['parent_id']) {
					if($val['label'] !== 'divider')
						$subitems[$val['parent_id']][] = array('id'=>$val['id'],'label'=>$val['label'],'url'=>$val['url']);
					else
						$subitems[$val['parent_id']][] = array('id'=>$val['id'],'class'=>$val['label']);
				} else {
					$items[$val['id']] = array('id'=>$val['id'],'label'=>$val['label'],'url'=>$val['url'],'items'=>$subitems[$val['id']]);
				}
			}
			return $items;			
		}
		else return null;
	}	
	/*
	public static function deleteMenu($id) {
		$connect = self::getDbConnection();
		$connect->createCommand();
		$connect->delete(self::tableName(),'id = :id OR parent_id = :id',array(':id'=>$id));
	}
	*/
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}		
}
?>