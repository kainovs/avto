<?php
/* @var $this AdsController */
/* @var $model Ads */
?>

<div class="view">

    <b> <?php $i=Ads::model()->getFotos($data->ad_id);
//print_r($i);?></b>
        <b> <?php echo CHtml::image(YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/preveiw_".Ads::model()->getFoto($data->ad_id, 1));?></b>
        <b> <?php// echo CHtml::image(YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/preveiw_".Ads::model()->getFoto($data->ad_id, 2));?></b>
        <b> <?php //echo CHtml::image(YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/preveiw_".Ads::model()->getFoto($data->ad_id, 3));?></b>
        <b> <?php// echo CHtml::image(YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/preveiw_".Ads::model()->getFoto($data->ad_id, 4));?></b>
        
        <br />
        <hr>
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