<?php

/**
 * This is the model class for table "{{avto}}".
 *
 * The followings are the available columns in table '{{avto}}':
 * @property integer $avto_fuel_type
 * @property integer $avto_v_engine
 * @property integer $avto_transmission
 * @property integer $avto_mileage
 * @property integer $avto_rul
 * @property string $avto_text
 * @property integer $avto_ad_id
 *
 * The followings are the available model relations:
 * @property Ads $avtoAd
 */
class Avto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Avto the static model class
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
		return '{{avto}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('avto_fuel_type, avto_v_engine, avto_transmission, avto_mileage, avto_rul, avto_text, avto_ad_id', 'required'),
			array('avto_fuel_type, avto_v_engine, avto_transmission, avto_mileage, avto_rul, avto_ad_id', 'numerical', 'integerOnly'=>true),
			array('avto_text', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('avto_fuel_type, avto_v_engine, avto_transmission, avto_mileage, avto_rul, avto_text, avto_ad_id', 'safe', 'on'=>'search'),
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
			'avtoAd' => array(self::BELONGS_TO, 'Ads', 'avto_ad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'avto_fuel_type' => 'Топливо',
			'avto_v_engine' => 'Объеи куб/см',
			'avto_transmission' => 'Трансмиссия',
			'avto_mileage' => 'Пробег',
			'avto_rul' => 'Руль',
			'avto_text' => 'Дополнительное описание',
			'avto_ad_id' => 'Avto Ad',
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

		$criteria->compare('avto_fuel_type',$this->avto_fuel_type);
		$criteria->compare('avto_v_engine',$this->avto_v_engine);
		$criteria->compare('avto_transmission',$this->avto_transmission);
		$criteria->compare('avto_mileage',$this->avto_mileage);
		$criteria->compare('avto_rul',$this->avto_rul);
		$criteria->compare('avto_text',$this->avto_text,true);
		$criteria->compare('avto_ad_id',$this->avto_ad_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}