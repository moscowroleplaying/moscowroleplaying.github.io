<?php

class ConfigForm extends CFormModel {
	private $_file;
	private $_params;

	public function __construct($scenario = '') {
		$this->_file = Yii::getPathOfAlias('application.config.params') . '.php';
		$this->_params = require $this->_file;
		parent::__construct($scenario);
	}
	public function setAttributes($data) {
		foreach($this->_params as $key => $value) {
			if(isset($data[$key]))
				$this->_params[$key] = $data[$key];
		}
	}
	public function getAttributes() {
		return $this->_params;
	}
	public function __get($name) {
		if(isset($this->_params[$name]))
			return $this->_params[$name];
		return parent::__get($name);
	}
	public function __set($name, $value) {
		if(isset($this->_params[$name]))
			$this->_params[$name] = $value;
		else
			parent::__set($name, $value);
	}
	public function rules() {
		return array(
			array(
				implode(',', array_keys($this->_params)), 'required',
				'message' => Yii::t('base', 'Cannot be blank.')
			)
		);
	}
	public function attributeLabels() {
		$labels = array();
		foreach($this->_params as $name => $value)
			$labels[$name] = Yii::t('base', $this->generateAttributeLabel($name));
		return $labels;
	}
	public function save() {
		if($this->validate()) {
			file_put_contents($this->_file,'<?php return ' . var_export($this->_params, true) . ';');
			return true;
		}
		return false;
	}
}