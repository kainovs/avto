<?php

/**
 * This is the model class for table "{{foto}}".
 *
 * The followings are the available columns in table '{{foto}}':
 * @property integer $f_id
 * @property string $foto_file_name
 * @property integer $foto_ad_id
 *
 * The followings are the available model relations:
 * @property Ads $fotoAd
 */
class Foto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Foto the static model class
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
		return '{{foto}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('foto_file_name, foto_ad_id', 'required'),
			array('foto_ad_id', 'numerical', 'integerOnly'=>true),
			array('foto_file_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('f_id, foto_file_name, foto_ad_id', 'safe', 'on'=>'search'),
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
			'fotoAd' => array(self::BELONGS_TO, 'Ads', 'foto_ad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'f_id' => 'F',
			'foto_file_name' => 'Foto File Name',
			'foto_ad_id' => 'Foto Ad',
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

		$criteria->compare('f_id',$this->f_id);
		$criteria->compare('foto_file_name',$this->foto_file_name,true);
		$criteria->compare('foto_ad_id',$this->foto_ad_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}