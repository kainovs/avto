<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="form">
<?php //echo $this->renderPartial('_form',array('model'=>$model, 'model_avto'=>$model_avto));?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data',
))); ?>

	<p class="note">Поля с знаком <span class="required">*</span> обязательные  к заполнению.</p>

	<?php echo $form->errorSummary($model, $model_avto); ?>

	<div class="row">
		<?php // echo $form->labelEx($model,'ad_user_id'); ?>
		<?php // echo $form->textField($model,'ad_user_id'); ?>
		<?php // echo $form->error($model,'ad_user_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model, 'ad_brand_id'); ?>
		<?php echo $form->dropDownList($model, 'ad_brand_id',CHtml::listData(Brand::model()->findAll(),'id','brand'),
		array( 'empty'=>Yii::t('default', 'Выберите марку...'),
                    'ajax' => array(
                        'type'   => 'POST',
                        'url'    => $this->createUrl('ads/changeModel'),
                        'update' => '#'.CHtml::activeId($model,'ad_models_id'),                        
                                        )
                    ));?>
       
        <div class="row">
		<?php echo $form->labelEx($model,'ad_models_id'); ?>
		<?php echo $form->dropDownList($model,'ad_models_id', Ads::getmodels(50)); ?>
		<?php echo $form->error($model,'ad_models_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_year'); ?>
		<?php echo $form->textField($model,'ad_year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ad_year'); ?>
	</div>
            
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_mileage'); ?>
		<?php echo $form->textField($model_avto,'avto_mileage',array('size'=>7,'maxlength'=>6)); ?>
		<?php echo $form->error($model_avto,'avto_mileage'); ?>
	</div>
            
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_fuel_type'); ?>
		<?php echo $form->dropDownList($model_avto,'avto_fuel_type', Lookup::items("FUEL"),
                        array( 'empty'=>Yii::t('default', 'Выберите тип топлива...'))); ?>
		<?php echo $form->error($model,'avto_fuel_type'); ?>
	</div>
        
         <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_transmission'); ?>
		<?php echo $form->dropDownList($model_avto,'avto_transmission', Lookup::items("TRANSMISSION"),
                         array( 'empty'=>Yii::t('default', 'Выберите тип трансмиссии...'))); ?>
		<?php echo $form->error($model,'avto_transmission'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_v_engine'); ?>
		<?php echo $form->dropDownList($model_avto,'avto_v_engine', Lookup::items("ENGINE"),
                         array( 'empty'=>Yii::t('default', 'Выберите объем двигателя...'))); ?>
		<?php echo $form->error($model,'avto_v_engine'); ?>
	</div>
            
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_rul'); ?>
		<?php echo $form->dropDownList($model_avto,'avto_rul', Lookup::items("RUL"),
                        array( 'empty'=>Yii::t('default', 'Выберите расположения руля...'))); ?>
		<?php echo $form->error($model,'avto_rul'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'ad_price'); ?>
		<?php echo $form->textField($model,'ad_price'); ?>
		<?php echo $form->error($model,'ad_price'); ?>
	</div>
                 
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_text'); ?>
		<?php echo $form->textArea($model_avto,'avto_text', array('cols'=>50, 'rows'=>10)); ?>
		<?php echo $form->error($model_avto,'avto_text'); ?>
	</div>
            
         
             <div class="row">
		<?php echo $form->labelEx($model,'foto1'); ?>
		<?php echo CHtml::activeFileField($model,'foto1'); ?>
		<?php echo $form->error($model,'foto1'); ?>
      	</div>
            <div class="row">
		<?php echo $form->labelEx($model,'foto2'); ?>
		<?php echo CHtml::activeFileField($model,'foto2'); ?>
		<?php echo $form->error($model,'foto2'); ?>
      	</div>
            <div class="row">
		<?php echo $form->labelEx($model,'foto3'); ?>
		<?php echo CHtml::activeFileField($model,'foto3'); ?>
		<?php echo $form->error($model,'foto3'); ?>
      	</div>
            
<!--            <div class="row">
               <?php// echo CHtml::activeFileField($model, 'foto_self'); ?>
            </div>-->
            
            




	<div class="row buttons">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Primary',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
     
)); ?>
            
//TODO
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->