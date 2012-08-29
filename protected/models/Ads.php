<?php

/**
 * This is the model class for table "{{ads}}".
 *
 * The followings are the available columns in table '{{ads}}':
 * @property integer $ad_id
 * @property integer $ad_user_id
 * @property integer $ad_models_id
 * @property integer $ad_publish
 * @property string $ad_add_time
 * @property string $ad_year
 * @property integer $ad_type
 * @property integer $ad_price
 *
 * The followings are the available model relations:
 * @property Models $adModels
 * @property Avto[] $avtos
 * @property Foto[] $fotos
 */
class Ads extends CActiveRecord
{
            const STATUS_NO_PUBLISHED = 0 ;
            const STATUS_PUBLISHED = 1 ;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ads the static model class
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
		return '{{ads}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_user_id, ad_models_id, ad_price', 'required'),
			array('ad_user_id, ad_models_id, ad_publish, ad_type, ad_price', 'numerical', 'integerOnly'=>true),
			array('ad_year', 'length', 'max'=>4),
			array('ad_add_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_id, ad_user_id, ad_models_id, ad_publish, ad_add_time, ad_year, ad_type, ad_price', 'safe', 'on'=>'search'),
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
			'adModels' => array(self::BELONGS_TO, 'Models', 'ad_models_id'),
			'adAvto' => array(self::HAS_ONE, 'Avto', 'avto_ad_id'),
			'adFoto' => array(self::HAS_MANY, 'Foto', 'foto_ad_id'),
                        'user'   => array(self::BELONGS_TO, 'User', 'ad_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ad_id' => 'Id',
			'ad_user_id' => 'Автор',
			'ad_models_id' => 'Автомобиль',
			'ad_publish' => 'Публикация',
			'ad_add_time' => 'Дата объявления',
			'ad_year' => 'Год выпуска',
			'ad_type' => 'Тип объявления',
			'ad_price' => 'Цена',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('ad_user_id',$this->ad_user_id);
		$criteria->compare('ad_models_id',$this->ad_models_id);
		$criteria->compare('ad_publish',$this->ad_publish);
		$criteria->compare('ad_add_time',$this->ad_add_time,true);
		$criteria->compare('ad_year',$this->ad_year,true);
		$criteria->compare('ad_type',$this->ad_type);
		$criteria->compare('ad_price',$this->ad_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getUrl()
	{
		return Yii::app()->createUrl('ads/view', array(
			'id'=>$this->ad_id,
			
		));
	}
        
        public function getFoto($pk, $i)
        {
             $img= Ads::model()->with('adFoto')->findByPk($pk);
            if (isset($img->adFoto[$i]))
		return $img->adFoto[$i]->foto_file_name;
	return 'no_image.jpg';
        }

       public function getFotos($pk)
        {
            $img= Ads::model()->with('adFoto')->findByPk($pk);
            if (isset($img->adFoto))
		return $img->adFoto[0];
	return 'no_image.jpg';
        }
}