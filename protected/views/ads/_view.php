<?php
/* @var $this AdsController */
/* @var $model Ads */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Автомобиль')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->adModels->modelBrand->brand .' '. $data->adModels->model), array('view', 'id'=>$data->ad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_year')); ?>:</b>
	<?php echo CHtml::encode($data->ad_year); ?>
	<br />
        
        <b><?php echo 'Руль'; ?>:</b>
     	<?php echo CHtml::encode(Lookup::item("RUL", $data->adAvto->avto_rul)); ?>
	<br />
        
        <b><?php echo 'Топливо'; ?>:</b>
     	<?php echo CHtml::encode(Lookup::item("FUEL", $data->adAvto->avto_fuel_type)); ?>
	<br />
        
        <b><?php echo 'Объем двигателя'; ?>:</b>
     	<?php echo CHtml::encode(Lookup::item("ENGINE", $data->adAvto->avto_v_engine)); ?>
	
        <br /><b><?php echo 'Коробка передач'; ?>:</b>
     	<?php echo CHtml::encode(Lookup::item("TRANSMISSION", $data->adAvto->avto_transmission)); ?>
	<br />
        <br />

        <b><?php echo 'Описание'; ?>:</b>
	<?php echo CHtml::encode($data->adAvto->avto_text); ?>
	<br />
        
        <br />
         Добавлено <?php echo  date('F j, Y',$data->ad_add_time). ' автор ' .$data->user->username ; ?>
	<br />
        
      
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_price')); ?>:</b>
	<?php echo CHtml::encode($data->ad_price); ?>
	<br />

	*/ ?>
        

</div> 