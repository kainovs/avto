<?php
/* @var $this ModelAvtoController */
/* @var $model ModelAvto */

$this->breadcrumbs=array(
	'Model Avtos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ModelAvto', 'url'=>array('index')),
	array('label'=>'Manage ModelAvto', 'url'=>array('admin')),
);
?>

<h1>Create ModelAvto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>