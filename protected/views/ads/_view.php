<?php
/* @var $this AdsController */
/* @var $model Ads */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_id), array('view', 'id'=>$data->ad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Автомобиль')); ?>:</b>
	    <?php echo CHtml::encode( $data->adModels->modelBrand->brand); ?>
            <?php echo CHtml::encode( $data->adModels->model); ?>
	<br /> 

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_publish')); ?>:</b>
	<?php echo CHtml::encode($data->ad_publish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_add_time')); ?>:</b>
	<?php echo CHtml::encode($data->ad_add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_year')); ?>:</b>
	<?php echo CHtml::encode($data->ad_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_type')); ?>:</b>
	<?php echo CHtml::encode($data->ad_type); ?>
	<br />
        <b><?php echo 'Описание'; ?>:</b>
     
	<?php echo CHtml::encode($data->adAvto->avto_text); ?>
	<br />
        <br />
        <b><?php echo 'Топливо'; ?>:</b>
     
	<?php echo CHtml::encode(Lookup::item("FUEL", $data->adAvto->avto_fuel_type)); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_price')); ?>:</b>
	<?php echo CHtml::encode($data->ad_price); ?>
	<br />

	*/ ?>

</div>