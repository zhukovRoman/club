<?php

/**
 * This is the model class for table "alumni".
 *
 * The followings are the available columns in table 'alumni':
 * @property integer $ID
 * @property string $name
 * @property string $forename
 * @property string $surname
 * @property string $workpalce
 * @property string $mobile
 * @property string $login
 * @property string $pass
 * @property string $diplomId
 * @property integer $status
 * @property integer $departmentID
 * @property string $mail
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property Fact[] $facts
 */
class Alumni extends CActiveRecord {

    // Сценарий регистрации
    public $newpass;
    public $oldpass;

    const NEW_STATUS = 1;
    const ACTIVATE_STATUS = 2;
    const SCENARIO_SIGNUP = 'signup';
    const SCENARIO_PASSRECOVERY = 'passrecovery';
    const AVATAR_PATH = "users/";
    const AVATAR_DEF_PATH = "/users/def/";
    const SCENARIO_UPDATE = 'UPDATE';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Alumni the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'alumni';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
            //сценарий редактирования 
            array('name, surname,departmentID,year,facultyId', 'required', 'on' => array(self::SCENARIO_UPDATE)),
            array('name, forename, surname, diplomId', 'length', 'max' => 100, 'min' => 3),
            array('workplace', 'length', 'max' => 250),
            array('mobile', 'length', 'max' => 25),
            array('year','length', 'max'=>4, 'min'=>4),
            array('name, forename, surname,departmentID,year,workplace,facultyId,contact_mail', 'safe', 'on'=>array(self::SCENARIO_UPDATE)),
            //сценарий реги и забытия пароля
            array('pass, mail', 'required', 'on' => array(self::SCENARIO_SIGNUP)),
            array('pass, mail, diplomId', 'safe', 'on' => array(self::SCENARIO_SIGNUP)),
            array('mail', 'unique', 'on' => self::SCENARIO_SIGNUP),
            // Почта должна быть в пределах от 6 до 50 символов
            array('mail', 'length', 'min' => 6, 'max' => 50, 'on' => array(self::SCENARIO_SIGNUP, self::SCENARIO_PASSRECOVERY)),
            array('mail', 'safe', 'on' => array(self::SCENARIO_PASSRECOVERY)),
            array('mail', 'email', 'on' => array(self::SCENARIO_SIGNUP, self::SCENARIO_PASSRECOVERY)),
            array('status, departmentID', 'numerical', 'integerOnly' => true),
            array('login, mail', 'length', 'max' => 50),
            //array('pass', 'length', 'max' => 32),
            array('newpass , pass', 'length', 'max' => 32, 'min' => 6),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                //array('ID, name, forename, surname, workpalce, mobile, login, pass, diplomId, status, departmentID, mail', 'safe', 'on' => 'search'),
        );
    }

    public function itIsFirtsVisit() {

        return ($this->name == "" || $this->forename == "");
    }

    public function setNewVisitDate() {

        $this->lastVisit = date("Y-m-d H:i:s");
        $this->save();
    }

    public function getAvatarUrl($size) {
        $path = Alumni::AVATAR_PATH . $this->ID . "/avatar_$size.jpg";

        if (file_exists($path)) {
            return $path;
        }
        else
            return Alumni::AVATAR_DEF_PATH . "avatar_$size.jpg";
    }

    public function validatePassword($password) {
        return md5($password) == $this->pass;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'department' => array(self::BELONGS_TO, 'Department', 'departmentID'),
            'facts' => array(self::HAS_MANY, 'Fact', 'alumniId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'name' => 'Имя',
            'forename' => 'Отчество',
            'surname' => 'Фамилия',
            'workpalce' => 'Место работы',
            'workplace' => 'Место работы',
            'mobile' => 'Телефон',
            'login' => 'Login',
            'pass' => 'Пароль',
            'year'=>'Год выпуска',
            'diplomId' => 'номер диплома',
            'status' => 'Status',
            'departmentID' => 'Кафедра',
            'facultyId' => 'Факультет',
            'mail' => 'E-mail',
            'newpass' => "Новый пароль",
            'oldpass' => "Старый пароль",
            'contact_mail'=> "Контакная почта",
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('forename', $this->forename, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('workplace', $this->workpalce, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('diplomId', $this->diplomId, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('departmentID', $this->departmentID);
        $criteria->compare('mail', $this->mail, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}