<?php
/* @var $this ModelsController */
/* @var $model Models */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'models-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'model_brand_id'); ?>
		<?php echo $form->textField($model,'model_brand_id'); ?>
		<?php echo $form->error($model,'model_brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_cat_id'); ?>
		<?php echo $form->textField($model,'model_cat_id'); ?>
		<?php echo $form->error($model,'model_cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>65)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->