<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
 
    const ERROR_EMAIL_INVALID=3;
    const ERROR_STATUS_NOTACTIVATED=4;
    
    public function authenticate()
    {
        $username=strtolower($this->username);
        $user=  Alumni::model()->find('LOWER(mail)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else if ($user->status==Alumni::NEW_STATUS)
           
            return $this->errorCode=self::ERROR_STATUS_NOTACTIVATED;
        else
        {
            $this->_id=$user->ID;
            $this->username=$user->mail;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}