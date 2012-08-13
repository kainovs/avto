<?php
/* @var $this MarkaAvtoController */
/* @var $model MarkaAvto */

$this->breadcrumbs=array(
	'Marka Avtos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MarkaAvto', 'url'=>array('index')),
	array('label'=>'Manage MarkaAvto', 'url'=>array('admin')),
);
?>

<h1>Create MarkaAvto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>