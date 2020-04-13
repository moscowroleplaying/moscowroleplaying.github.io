<?php
class LoginForm extends CFormModel {
	public $username;
	public $password;
	private $_identity;
	public function rules() {
		return array(
			array('username', 'required','message'=>'Введите логин'),
			array('password', 'required','message'=>'Введите пароль'),
			array('password', 'authenticate'),
		);
	}
	public function authenticate($attribute,$params) {
		if(!$this->hasErrors()) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Неверное имя пользователя или пароль.');
		}
	}
	public function login() {
		if($this->_identity===null) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else return false;
	}
}
?>