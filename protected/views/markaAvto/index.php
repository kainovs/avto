<?php
/* @var $this MarkaAvtoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marka Avtos',
);

$this->menu=array(
	array('label'=>'Create MarkaAvto', 'url'=>array('create')),
	array('label'=>'Manage MarkaAvto', 'url'=>array('admin')),
);
?>

<h1>Marka Avtos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
