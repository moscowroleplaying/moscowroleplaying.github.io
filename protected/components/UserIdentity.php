<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
 
    public function authenticate() {
        $username = strtolower($this->username);
        $names = Fields::getNames(1);
        $find = 'LOWER('.$names[username][alias].')=?';
        $user = Users::model()->find($find,array($username));
        if($user===null) $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password)) $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->{$names[id][alias]};
            $this->username = $user->{$names[username][alias]};
			$this->setState('userid',$this->_id);
			$this->setState('username',$this->username);
            $this->setState('skinid',$user->{$names[skin][alias]});
            $this->setState('admin',$user->{$names[admin][alias]});
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
    }
    public function getId() {
        return $this->_id;
    }
}
?>