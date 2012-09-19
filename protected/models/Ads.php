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
            
            public $ad_brand_id;
            public $ad_avto_array;
            public $ad_foto_array; 
          
            public $foto1;
            public $foto2;
            public $foto3;
            
            

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
			array('ad_user_id, ad_models_id, ad_price, ad_add_time', 'required'),
			array('ad_user_id, ad_models_id, ad_publish, ad_type, ad_price', 'numerical', 'integerOnly'=>true),
			array('ad_year', 'length', 'max'=>4),
			array('ad_add_time', 'safe'),
                    array('ad_brand_id', 'safe'),
                    
                        array('foto1, foto2, foto3','file',
                            'types'=>'jpg',
                            'maxSize'=>1024 * 1024 * 5, // 5 MB
                            'allowEmpty'=>'true',
                            'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.'
                            ),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_id, ad_user_id, ad_models_id, ad_publish, ad_add_time, ad_year, ad_type, ad_price, foto1, $foto2, $foto3 ', 'safe', 'on'=>'search'),
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
			'ad_models_id' => 'Модель автомобиля',
			'ad_publish' => 'Публикация',
			'ad_add_time' => 'Дата объявления',
			'ad_year' => 'Год выпуска',
			'ad_type' => 'Тип объявления',
			'ad_price' => 'Цена',
                        'ad_brand_id'=>' Марка автомобиля',
                        'foto1'=> 'фото 1',
                        'foto2'=> 'фото 2',
                        'foto3'=>'фото 3',
                     
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
        
        public static function getFoto($pk, $i)
        {
             $img= Ads::model()->with('adFoto')->findByPk($pk);
            if (isset($img->adFoto[$i]))
		return $img->adFoto[$i]->foto_file_name;
	return 'no_image.jpg';
        }

       public function getFotos($pk)
        {
          
        }
        public function resizeFoto($file,$name){
             $ih=new CImageHandler;
                            Yii::app()->ih->
                                    load($file)//загрузка оригинала картинки
                                    ->thumb('120','120')// превьюха 120 пх
                                    ->save($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                      "/images/AvtoFoto/".$this->ad_id."/small_image/".$name.".jpg")//сохраняемся
                                    ->reload()// перегружаем картинку в объект ih
                                    ->thumb('350','350')//большая картинка
                                    ->save($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                      "/images/AvtoFoto/".$this->ad_id."/medium_image/".$name.".jpg");//сохраняемся
         }
        
        public static function getmodels ($id_brand)
        {
            $data = Models::model()->findAll('model_brand_id=:par', array (':par'=>$id_brand));
            $res = array();
            if(count($data)!= 0){
               $res[0] = "Выберите модель...";}
                    foreach ($data as $model){
                        $res[$model->id]= $model->model;
                            }
                         
                            return $res;
        }
        
        protected function beforeValidate()
{
                if(parent::beforeValidate())
                {
                    if($this->isNewRecord)
                    {
                        $this->ad_add_time=  date("Y-m-d H:i:s");
                        $this->ad_user_id= Yii::app()->user->id;
                        $this->ad_publish= 1;
                    }

                    return true;
                }
                else
                    return false;
            }
            protected function afterSave()
           {
             parent::afterSave();
               foreach ($this->ad_avto_array as $model_avtos){
                 $model_avtos->avto_ad_id=$this->ad_id;
                 $model_avtos->save();
               }
               foreach($this->ad_foto_array as $fotos){
                   $fotos->foto_ad_id= $this->ad_id;
                   $fotos->save();
                                    
                   
               }
            }
               
}