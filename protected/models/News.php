<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property string $text
 * @property string $caption
 */
class News extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'length', 'max' => 400),
            array('caption', 'length', 'max' => 200),
            array('date, text', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, date, text, caption', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'date' => 'Date',
            'text' => 'Text',
            'caption' => 'Caption',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('caption', $this->caption, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getLast() {

        $criteria = new CDbCriteria;
        //$criteria->addCondition("time_add > now() - interval $d day");

        $criteria->order = "date";
        $criteria->limit = 5;
        return News::model()->findAll($criteria);
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