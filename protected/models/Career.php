<?php

/**
 * This is the model class for table "career".
 *
 * The followings are the available columns in table 'career':
 * @property integer $id
 * @property string $text
 * @property integer $user_id
 * @property string $title
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Alumni $user
 */
class Career extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Career the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, title', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500, 'min'=>5),
                        array('title, text', 'safe'),
                        array('text', 'length', 'max'=>25000, 'min'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, text, user_id, title, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'Alumni', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'text' => 'Текст',
			'user_id' => 'User',
			'title' => 'Заголовок',
			'create_date' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public function getShortText() {
        $string = strip_tags($this->text, "<a><p><b><i>");;
        $maxlen=900;
        $len = (mb_strlen($string) > $maxlen) ? mb_strripos(mb_substr($string, 0, $maxlen), ' ') : $maxlen;
        //echo $len;
        $cutStr = mb_substr($string, 0, $len);
        return (mb_strlen($string) > $maxlen) ?   $cutStr . ' ...' :  $cutStr ;
//        $limit = 100;
//        $matches = explode(" ", $this->text, $limit);
//        if (strpos($matches[$limit - 1], " ")) {
//            unset($matches[$limit - 1]);
//            $text = implode(" ", $matches) . "...";
//            return strip_tags($text, "<a><p><b><i>");
//        }
//        else
//            return implode(" ", $matches);
//        return;
    }
}