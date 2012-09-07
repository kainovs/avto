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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
		<?php echo $form->dropDownList($model,'ad_models_id', Ads::getmodels(1)); ?>
		<?php echo $form->error($model,'ad_models_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_year'); ?>
		<?php echo $form->textField($model,'ad_year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ad_year'); ?>
	</div>
                  <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_fuel_type'); ?>
		<?php echo $form->dropDownList($model_avto,'avto_fuel_type', Lookup::items("FUEL")); ?>
		<?php echo $form->error($model,'avto_fuel_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_price'); ?>
		<?php echo $form->textField($model,'ad_price'); ?>
		<?php echo $form->error($model,'ad_price'); ?>
	</div>
                 
        <div class="row">
		<?php echo $form->labelEx($model_avto,'avto_text'); ?>
		<?php echo $form->textarea($model_avto,'avto_text'); ?>
		<?php echo $form->error($model_avto,'avto_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->