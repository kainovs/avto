<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	$model->adModels->modelBrand->brand.' '.$model->adModels->model,
);

/*$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
	array('label'=>'Update Ads', 'url'=>array('update', 'id'=>$model->ad_id)),
	array('label'=>'Delete Ads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);*/
?>

<h1>Продам автомобиль  <?php echo $model->adModels->modelBrand->brand.' '.$model->adModels->model; ?></h1>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?> 
