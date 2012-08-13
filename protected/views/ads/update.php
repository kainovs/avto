<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->ad_id=>array('view','id'=>$model->ad_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
	array('label'=>'View Ads', 'url'=>array('view', 'id'=>$model->ad_id)),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>

<h1>Update Ads <?php echo $model->ad_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>