<?php
/* @var $this ModelAvtoController */
/* @var $model ModelAvto */
?>

<div class="view">

	
	<b>
        Марка автомобиля <?php echo $data->marka->mark; ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />


</div>