<?php
/* @var $this AdsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Объявления',
);

$this->menu=array(
	array('label'=>'Подать объявление', 'url'=>array('create')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>

<h1>Объявления о продаже автомобилей г.Темрюка</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ads-grid',
	'dataProvider'=> $dataProvider,
	'columns'=>array(
            
                array(
                    'header'=>'дата',
                    'type'=>'raw',
                   // 'type'=>'datetime',
                    'value'=>  'CHtml::link(CHtml::encode(Yii::app()->dateFormatter->
                        format("d MMMM yyyy", $data->ad_add_time)), $data->url)'
                
                ),
                array(
                    
                  'class'=> 'EImageColumn',
                  'header'=>'фото',
                  'imagePathExpression'=>'Yii::app()->getBaseUrl(true).
                      "/images/AvtoFoto/".$data->ad_id."/small_image/".Ads::model()->getFoto($data->ad_id, 0)' ,
                    'emptyText'=>'-',
                
                    'imageOptions'=>array(
                        'widht'=> '10px;',          
                    ),
                ),
		
		array(
                    'header'=>'Модель',
                    'type'=>'raw',
                    'value'=>'$data->adModels->modelBrand->brand." ".$data->adModels->model',
                ),
                array(
                    'header'=>'год',
                    'value'=> '$data->ad_year ."год"',
                ),
                array(
                    'header'=>'двигатель',
                    'value'=> 'Lookup::item("FUEL", $data->adAvto->avto_fuel_type).", 
                        Объем ".Lookup::item("ENGINE", $data->adAvto->avto_v_engine).", 
                        Трансмисия ".Lookup::item("TRANSMISSION", $data->adAvto->avto_transmission);',
                    
                    
                ),
		array(
                    'header'=>'пробег',
                    'value'=> '$data->adAvto->avto_mileage ."км."',
                ),
                array(
                    'header'=>'цена',
                    'value'=>'$data->ad_price ."руб."',
                    
                )
            
		/*
		'ad_type',
		'ad_price',
		*/
		
	),
)); ?>
