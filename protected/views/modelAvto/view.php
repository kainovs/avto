<?php
/* @var $this ModelAvtoController */
/* @var $model ModelAvto */

$this->breadcrumbs=array(
	'Model Avtos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ModelAvto', 'url'=>array('index')),
	array('label'=>'Create ModelAvto', 'url'=>array('create')),
	array('label'=>'Update ModelAvto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ModelAvto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelAvto', 'url'=>array('admin')),
);
?>

<h1>View ModelAvto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mark_id',
		'model',
	),
)); ?>
