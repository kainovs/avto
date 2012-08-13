<?php
/* @var $this ModelAvtoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Model Avtos',
);

$this->menu=array(
	array('label'=>'Create ModelAvto', 'url'=>array('create')),
	array('label'=>'Manage ModelAvto', 'url'=>array('admin')),
);
?>

<h1>Model Avtos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
