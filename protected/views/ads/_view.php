<?php
/* @var $this AdsController */
/* @var $model Ads */
?>

<div class="view">

    <b> <?php //$i=Ads::model()->getFotos($data->ad_id);
//print_r($i);?></b>
     <?php  CHtml::encode($data->getAttributeLabel('ad_year')); ?> 
        <b> <?php echo Chtml::link(CHtml::image( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/small_image/".Ads::model()->getFoto($data->ad_id, 0)),( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/original_image/".Ads::model()->getFoto($data->ad_id, 0)));?></b>
        <b> <?php echo Chtml::link(CHtml::image( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/small_image/".Ads::model()->getFoto($data->ad_id, 1)),( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/original_image/".Ads::model()->getFoto($data->ad_id, 1)));?></b>
        <b> <?php echo Chtml::link(CHtml::image( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/small_image/".Ads::model()->getFoto($data->ad_id, 2)),( YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/original_image/".Ads::model()->getFoto($data->ad_id, 2)));?></b>
        <b> <?php// echo CHtml::image(YII::app()->getBaseUrl(true)."/images/AvtoFoto/".$data->ad_id."/medium_image/".Ads::model()->getFoto($data->ad_id, 3));?></b>
        
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
         Добавлено <?php echo  Yii::app()->dateFormatter->
         format("d MMMM yyyy", $data->ad_add_time). ' автор ' .$data->user->username ; ?>
	<br />
        
        
     
        
        <?php $this->widget('ext.widgets.fancybox.EFancyboxWidget',array(
        // Список изображений с возможностью использования масок
        'selector'=>'a[href$=\'.jpg\'],a[href$=\'.png\'],a[href$=\'.gif\'], a[href$=\'#\']',
        // Можно ли использовать колесико мышки для перемотки изображений в этой группе изображений 
        // (группа перечисляется в списке изображений выше). По умолчанию — нельзя.
        'enableMouseWheel'=>false,
        // Свойства fancybox
        'options'=>array(
            // 'padding'=>10,
            // 'margin'=>20,
             'enableEscapeButton'=>true,
        ),
    ));/*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_price')); ?>:</b>
	<?php echo CHtml::encode($data->ad_price); ?>
	<br />

	*/ ?>
       
</div> 