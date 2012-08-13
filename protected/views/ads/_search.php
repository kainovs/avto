<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ad_id'); ?>
		<?php echo $form->textField($model,'ad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_user_id'); ?>
		<?php echo $form->textField($model,'ad_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_models_id'); ?>
		<?php echo $form->textField($model,'ad_models_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_publish'); ?>
		<?php echo $form->textField($model,'ad_publish'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_add_time'); ?>
		<?php echo $form->textField($model,'ad_add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_year'); ?>
		<?php echo $form->textField($model,'ad_year',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_type'); ?>
		<?php echo $form->textField($model,'ad_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_price'); ?>
		<?php echo $form->textField($model,'ad_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->