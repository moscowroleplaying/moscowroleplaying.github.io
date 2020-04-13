<?php

class FrapsySidebar extends CWidget
{

	public function init() {
		//
	}
	public function run() {
		$items = array();
		$items[] = array('label'=>'Новости','url'=>'/news');
		if(Yii::app()->user->isGuest) {
			$items[] = array('label'=>'Войти','url'=>'/site/login');
		} else {
			$items[] = array('label'=>'Профиль','url'=>'/id'.Yii::app()->user->userid);
			$items[] = array('label'=>'Безопасность','url'=>'/users/change');
		}						
		$items[] = array('label'=>'Донат','url'=>'/donate');
		$this->renderMenu($items);
	}
	protected function renderMenu($items) {
		echo '<div class="icons"><ul>';
		foreach($items as $val) {
			if(isset($val[items])) {
				echo '<li><a href="#">'.$val[label].'</a>';
				echo '<ul>';
				foreach($val[items] as $sub) {
					if(!preg_match('/(http|https)/',$sub[url]))
						echo '<li><a href="'.Yii::app()->baseUrl.$sub[url].'">'.$sub[label].'</a></li>';
					else
						echo '<li><a href="'.$sub[url].'">'.$sub[label].'</a></li>';
				}
				echo '</ul></li>';
			} else {
				if(!preg_match('/(http|https)/',$val[url]))
					echo '<li><a href="'.Yii::app()->baseUrl.$val[url].'">'.$val[label].'</a></li>';
				else
					echo '<li><a href="'.$val[url].'">'.$val[label].'</a></li>';
			}
		}
		echo '</ul></div>';
	}
}