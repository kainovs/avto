<?php
/* @var $this MarkaAvtoController */
/* @var $model MarkaAvto */

$this->breadcrumbs=array(
	'Marka Avtos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MarkaAvto', 'url'=>array('index')),
	array('label'=>'Create MarkaAvto', 'url'=>array('create')),
	array('label'=>'View MarkaAvto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MarkaAvto', 'url'=>array('admin')),
);
?>

<h1>Update MarkaAvto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>