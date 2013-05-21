<?php

class AdsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','changeModel'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ads; 
                $model_avto= new Avto;
                $model_foto1= new Foto;
                $model_foto2= new Foto;
                $model_foto3= new Foto;
                

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads'])|| isset ($_POST['Avto']))
		{
			$model->attributes =$_POST['Ads']; 
                        $model_avto->attributes=$_POST['Avto'];
                        $model->ad_avto_array[]= $model_avto;
                        
                       
                        
                        $model->foto1=  CUploadedFile::getInstance($model, 'foto1');//передача картинок из формы
                            if ($model->foto1){
                                $model_foto1->foto_file_name='1.jpg'; // пишем имя файла в модель Фото
                            }
                        $model->foto2=  CUploadedFile::getInstance($model, 'foto2');//передача картинок из формы
                            if ($model->foto2){
                                $model_foto2->foto_file_name='2.jpg'; // пишем имя файла в модель Фото
                            }
                        $model->foto3=  CUploadedFile::getInstance($model, 'foto3');//передача картинок из формы
                           if ($model->foto3){
                                $model_foto3->foto_file_name='3.jpg'; // пишем имя файла в модель Фото
                            }
                        
                        $model->ad_foto_array[]=$model_foto1;// Передаем модель фото в модель массивом
                        $model->ad_foto_array[]=$model_foto2;// Передаем модель фото в модель массивом
                        $model->ad_foto_array[]=$model_foto3;// Передаем модель фото в модель массивом
                        
                        
			if($model->save()){
                            mkdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl."/images/AvtoFoto/".$model->ad_id , 0700);
                            mkdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl."/images/AvtoFoto/".$model->ad_id."/original_image/",0700);
                            mkdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl."/images/AvtoFoto/".$model->ad_id."/small_image/",0700);
                            mkdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl."/images/AvtoFoto/".$model->ad_id."/medium_image/",0700);
                        
                            $file0= $_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                                "/images/AvtoFoto/no_image.jpg"; //путь сохранения фотографии
                            $model->resizeFoto($file0, 'no_image'); // ресайзим и сохраняем обработанные фото
                               
                                    if($model->foto1){ //проверяем есть ли фаил фото и создаем директории
                                                
                                                      
                                               $file1= $_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                                        "/images/AvtoFoto/".$model->ad_id."/original_image/1.jpg";
                                                $model->foto1->saveAs($file1); // сохраняем фото оригинала
                                                $model->resizeFoto($file1, 1); // ресайзим и сохраняем обработанные фото
                                    }
                       
                            if($model->foto2){
                                            $file2= $_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                                  "/images/AvtoFoto/".$model->ad_id."/original_image/2.jpg";
                                        $model->foto2->saveAs($file2);
                                        $model->resizeFoto($file2, 2);
                               }
                       
                            if($model->foto3){
                                            $file3= $_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.
                                  "/images/AvtoFoto/".$model->ad_id."/original_image/3.jpg";
                                        $model->foto3->saveAs($file3);
                                        $model->resizeFoto($file3, 3);
                            }
                        }
                       $this->redirect(array('view','id'=>$model->ad_id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'model_avto'=>$model_avto,
                        
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ad_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $criteria = new CDbCriteria(array(
                'condition'=>'ad_publish='.Ads::STATUS_PUBLISHED,
                'order'=>'ad_add_time DESC',
                
            ));
		$dataProvider=new CActiveDataProvider('Ads',array('criteria'=>$criteria));
                $dataBrand=new CActiveDataProvider(Brand::brandAll());
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                        'dataBrand' =>  $dataBrand,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionchangeModel()
        {
            $selectedBrand = $_POST['Ads']['ad_brand_id'];
            $data = Ads::getmodels($selectedBrand);
             foreach($data as $value=>$model)  {
                        echo CHtml::tag
                                ('option', array('value'=>$value),CHtml::encode($model),true);
                    }
             
            
            
        }
}
