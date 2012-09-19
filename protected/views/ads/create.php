<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	'Создать объявление',
);

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>

<h1>Создать объявление</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_avto'=>$model_avto,'model_foto1'=>$model_foto1,'model_foto2'=>$model_foto2,'model_foto3'=>$model_foto3)); ?>