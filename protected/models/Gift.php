<?php

/**
 * This is the model class for table "gift".
 *
 * The followings are the available columns in table 'gift':
 * @property integer $Id
 * @property string $descrip
 * @property integer $depId
 * @property integer $amount
 * @property integer $status
 * @property string $imagePath
 * @property integer $facultyId
 * @property string $report
 *
 * The followings are the available model relations:
 * @property Fact[] $facts
 * @property Faculty $faculty
 * @property Department $dep
 * @property Report[] $reports
 */
class Gift extends CActiveRecord
{
    
        const STATUS_ACTIVE=1;
        const STATUS_DONE=2;
        const STATUS_REPORT = 3;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gift the static model class
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
		return 'gift';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descrip', 'required'),
			array('depId, amount, status, facultyId', 'numerical', 'integerOnly'=>true),
			array('imagePath', 'length', 'max'=>300),
			array('report', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, descrip, depId, amount, status, imagePath, facultyId, report', 'safe', 'on'=>'search'),
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
			'facts' => array(self::HAS_MANY, 'Fact', 'giftId'),
			'faculty' => array(self::BELONGS_TO, 'Faculty', 'facultyId'),
			'dep' => array(self::BELONGS_TO, 'Department', 'depId'),
			'reports' => array(self::HAS_MANY, 'Report', 'giftId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'descrip' => 'Descrip',
			'depId' => 'Dep',
			'amount' => 'Amount',
			'status' => 'Status',
			'imagePath' => 'Image Path',
			'facultyId' => 'Faculty',
			'report' => 'Report',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('descrip',$this->descrip,true);
		$criteria->compare('depId',$this->depId);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status);
		$criteria->compare('imagePath',$this->imagePath,true);
		$criteria->compare('facultyId',$this->facultyId);
		$criteria->compare('report',$this->report,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}