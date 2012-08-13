<?php
/* @var $this MarkaAvtoController */
/* @var $model MarkaAvto */

$this->breadcrumbs=array(
	'Marka Avtos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MarkaAvto', 'url'=>array('index')),
	array('label'=>'Create MarkaAvto', 'url'=>array('create')),
	array('label'=>'Update MarkaAvto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MarkaAvto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MarkaAvto', 'url'=>array('admin')),
);
?>

<h1>View MarkaAvto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mark',
	),
)); ?>
