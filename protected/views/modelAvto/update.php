<?php
/* @var $this ModelAvtoController */
/* @var $model ModelAvto */

$this->breadcrumbs=array(
	'Model Avtos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ModelAvto', 'url'=>array('index')),
	array('label'=>'Create ModelAvto', 'url'=>array('create')),
	array('label'=>'View ModelAvto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ModelAvto', 'url'=>array('admin')),
);
?>

<h1>Update ModelAvto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>