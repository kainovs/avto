<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_user_id'); ?>
		<?php echo $form->textField($model,'ad_user_id'); ?>
		<?php echo $form->error($model,'ad_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_models_id'); ?>
		<?php echo $form->textField($model,'ad_models_id'); ?>
		<?php echo $form->error($model,'ad_models_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_publish'); ?>
		<?php echo $form->textField($model,'ad_publish'); ?>
		<?php echo $form->error($model,'ad_publish'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_add_time'); ?>
		<?php echo $form->textField($model,'ad_add_time'); ?>
		<?php echo $form->error($model,'ad_add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_year'); ?>
		<?php echo $form->textField($model,'ad_year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ad_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_type'); ?>
		<?php echo $form->textField($model,'ad_type'); ?>
		<?php echo $form->error($model,'ad_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_price'); ?>
		<?php echo $form->textField($model,'ad_price'); ?>
		<?php echo $form->error($model,'ad_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->