<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'View Categories', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>Update Categories <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>