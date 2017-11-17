<?php
/* @var $this MenuController */
/* @var $model MenuMdl */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
		'htmlOptions'=>array('autocomplete'=>'off'),
	)); ?>

	<div class="form-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->textField($model,'menu_order',array('size'=>4,'maxlength'=>4, 'class' => 'form-control input-sm only_number')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'menu_order');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->textField($model,'menu_name',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'menu_name');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->textField($model,'menu_url',array('size'=>60,'maxlength'=>100, 'class' => 'form-control input-sm')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'menu_url');?></label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->textField($model,'menu_icon',array('size'=>30,'maxlength'=>30, 'class' => 'form-control input-sm')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'menu_icon');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'visible',$model->itemAlias('visible'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'visible');?></label>
				</div>
			</div>
		</div>
	</div>
	<div class="form-actions noborder">
		<?php echo CHtml::submitButton('Search', array('class' => 'btn green')); ?>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->