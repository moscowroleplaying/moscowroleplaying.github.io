<?php

class Controller extends CController
{
	public function actionGetLay() {
		echo parent::GetLay();
	}
	public $layout='//layouts/column1';
	public $menu=array();
	public $breadcrumbs=array();
}