<?php

/**
 * This is the model class for table "{{models}}".
 *
 * The followings are the available columns in table '{{models}}':
 * @property integer $id
 * @property integer $model_brand_id
 * @property integer $model_cat_id
 * @property string $model
 *
 * The followings are the available model relations:
 * @property Ads[] $ads
 * @property Brand $modelBrand
 * @property Categories $modelCat
 */
class Models extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Models the static model class
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
		return '{{models}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_brand_id, model_cat_id, model', 'required'),
			array('model_brand_id, model_cat_id', 'numerical', 'integerOnly'=>true),
			array('model', 'length', 'max'=>65),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, model_brand_id, model_cat_id, model', 'safe', 'on'=>'search'),
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
			'ads' => array(self::HAS_MANY, 'Ads', 'ad_models_id'),
			'modelBrand' => array(self::BELONGS_TO, 'Brand', 'model_brand_id'),
			'modelCat' => array(self::BELONGS_TO, 'Categories', 'model_cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'model_brand_id' => 'Model Brand',
			'model_cat_id' => 'Model Cat',
			'model' => 'Model',
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
		$criteria->compare('model_brand_id',$this->model_brand_id);
		$criteria->compare('model_cat_id',$this->model_cat_id);
		$criteria->compare('model',$this->model,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}