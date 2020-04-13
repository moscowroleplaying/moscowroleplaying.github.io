<?php

class FrapsyNavbar extends CWidget
{

	public function init() {
		//
	}
	public function run() {
		$items = array();
		$items = Menu::getMenuItems();
		$arr = Tops::getTops();
		if(!empty($arr)) {
			foreach($arr as $val) {
				$tops[] = array('label'=>$val[top_name],'url'=>'/tops/view/'.$val[id]);
			}
			$items[] = array('label'=>'Рейтинги','url'=>'#','items'=>$tops);						
		}
		$arr = Monitors::getMonitors();
		if(!empty($arr)) {
			foreach($arr as $val) {
				if($val[id] == 1)
					$monitors[] = array('label'=>$val[mon_name],'url'=>'/monitor/fractions');
				else
					$monitors[] = array('label'=>$val[mon_name],'url'=>'/monitor/view/'.$val[id]);
			}
			$items[] = array('label'=>'Составы','url'=>'#','items'=>$monitors);						
		}
		if(!Yii::app()->user->isGuest AND Yii::app()->user->admin >= Yii::app()->params->editor_level) {
			$items[] = array('label'=>'Админ-панель','url'=>'#','items'=>array(
				array('label'=>'Параметры сайта','url'=>'/site/config'),
				array('label'=>'Файлы HTML и CSS','url'=>'/site/design/1'),							
				array('label'=>'Настройка таблицы','url'=>'/site/settings/1'),
				array('label'=>'Сортировка полей','url'=>'/site/sort/1'),
				array('label'=>'Настройка названий','url'=>'/site/names'),
				array('label'=>'Изменение ников','url'=>'/changename/admin'),
				array('label'=>'Добавить новость','url'=>'/news/create'),
				array('label'=>'Создать топ-лист','url'=>'/tops/create'),
				array('label'=>'Создать мониторинг','url'=>'/monitor/create'),
				array('label'=>'Добавить таблицу','url'=>'/tables/create'),
				array('label'=>'Редактор меню','url'=>'/site/editmenu'),
				array('label'=>'Управление рейтингами','url'=>'/tops/admin'),
				array('label'=>'Управление мониторингами','url'=>'/monitor/admin'),
				array('label'=>'Управление таблицами','url'=>'/tables/'),
			));
		}					
		if(Yii::app()->user->isGuest) {
			$items[] = array('label'=>'Личный кабинет','url'=>'/site/login');
		} else {
			$items[] = array('label'=>'Личный кабинет','url'=>'#','items'=>array(
				array('label'=>'Просмотр','url'=>'/id'.Yii::app()->user->userid),							
				array('label'=>'Настройки','url'=>'/users/change'),
				array('label'=>'Выйти','url'=>'/site/logout'),
			));
		}
		$this->renderMenu($items);
	}
	protected function renderMenu($items) {
		echo '<ul class="nav navbar-nav navbar-center">';
		foreach($items as $val) {
			if(isset($val[items])) {
				echo '
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'.
						$val[label].
					' <i class="caret"></i></a>';
				echo '<ul class="dropdown-menu">';
				foreach($val[items] as $sub) {
					if(isset($sub['class'])) {
						echo '<li class='.$sub["class"].'></li>';
					} else {
						if(!preg_match('/(http|https)/',$sub[url]))
							echo '<li><a href="'.Yii::app()->baseUrl.$sub[url].'">'.$sub[label].'</a></li>';
						else
							echo '<li><a href="'.$sub[url].'">'.$sub[label].'</a></li>';
					}
				}
				echo '</ul></li>';
			} else {
				if(!preg_match('/(http|https)/',$val[url]))
					echo '<li><a href="'.Yii::app()->baseUrl.$val[url].'">'.$val[label].'</a></li>';
				else
					echo '<li><a href="'.$val[url].'">'.$val[label].'</a></li>';
			}
		}
		echo '</ul>';
	}

}