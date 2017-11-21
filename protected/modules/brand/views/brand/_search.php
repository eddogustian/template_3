<?php
/* @var $this BrandController */
/* @var $model BrandMdl */
/* @var $form CActiveForm */
?>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
		'htmlOptions'=>array('autocomplete'=>'off'),
	)); ?>
	
	<div class="form-body">
		<div class="form-group form-md-line-input form-md-floating-label has-success">
			<?php echo $form->textField($model,'brand_name',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm')); ?>	
			<label for="form_control_1"><?php echo $form->label($model,'brand_name');?></label>
		</div>
	
		<div class="form-group form-md-line-input form-md-floating-label has-success">
			<?php echo $form->textField($model,'brand_type',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm')); ?>	
			<label for="form_control_1"><?php echo $form->label($model,'brand_type');?></label>
		</div>
	</div>
	<div class="form-actions noborder">
		<?php echo CHtml::submitButton('Search', array('class' => 'btn green')); ?>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	
	<?php $this->endWidget(); ?>
</div><!-- search-form -->