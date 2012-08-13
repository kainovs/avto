<?php
/* @var $this ModelsController */
/* @var $model Models */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->model_brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->model_cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />


</div>