<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	
	public $activationCode;

	private $_identity;

	
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// username and password needs to be authenticated
			//array('password', 'authenticate'),
			//array('username', 'authenticate'),
			//array('username, password', 'authenticate'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			
			// username должен соответствовать шаблону
			//array('username', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
			// username должен быть корректным e-mail адресом
			//array('username', 'email'),
			// username должен существовать
			//array('username', 'exist', 'enableClientValidation' => true , 'allowEmpty' => true, 'attributeName' => 'mail', 'className' => 'Account', 'message' => 'Пользователь с таким e-mail не найден'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'e-mail',
			'password'=>'Пароль',
			'rememberMe'=>'запомнить',
		);
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			switch($this->_identity->errorCode)
			{
			
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username', 'Неверный логин');
					break;
				case UserIdentity::ERROR_STATUS_NOTACTIVATED:
					$this->addError('username', 'Ваш аккаунт еще не активирован');
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password', 'Неверный пароль');
					break;
			}
	}
	
	
}
