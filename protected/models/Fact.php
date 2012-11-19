<?php

/**
 * This is the model class for table "fact".
 *
 * The followings are the available columns in table 'fact':
 * @property integer $id
 * @property integer $alumniId
 * @property integer $giftId
 * @property double $trsSum
 * @property string $trsDate
 * @property string $method
 * @property string $comment
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Alumni $alumni
 * @property Gift $gift
 */
class Fact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fact the static model class
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
		return 'fact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumniId, giftId, status', 'numerical', 'integerOnly'=>true),
			array('trsSum', 'numerical'),
			array('method', 'length', 'max'=>100),
			array('comment', 'length', 'max'=>250),
			array('trsDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumniId, giftId, trsSum, trsDate, method, comment, status', 'safe', 'on'=>'search'),
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
			'alumni' => array(self::BELONGS_TO, 'Alumni', 'alumniId'),
			'gift' => array(self::BELONGS_TO, 'Gift', 'giftId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alumniId' => 'Alumni',
			'giftId' => 'Назначение',
			'trsSum' => 'Сумма пожертвований',
			'trsDate' => 'Дата',
			'method' => 'Метод',
			'comment' => 'Comment',
			'status' => 'Status',
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
		$criteria->compare('alumniId',$this->alumniId);
		$criteria->compare('giftId',$this->giftId);
		$criteria->compare('trsSum',$this->trsSum);
		$criteria->compare('trsDate',$this->trsDate,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}