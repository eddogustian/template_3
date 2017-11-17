<?php
/* @var $this UsermenuController */
/* @var $model UserMenuMdl */
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
					<?php echo $form->dropDownList($model,'user_id',$model->itemAlias('user_id'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'user_id');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'menu_id',$model->itemAlias('menu_id'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'menu_id');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'create',$model->itemAlias('create'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'create');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'update',$model->itemAlias('update'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'update');?></label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'delete',$model->itemAlias('delete'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'delete');?></label>
				</div>
				
				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'verify',$model->itemAlias('verify'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'verify');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'print',$model->itemAlias('print'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'print');?></label>
				</div>

				<div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php echo $form->dropDownList($model,'status',$model->itemAlias('status'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>	
					<label for="form_control_1"><?php echo $form->label($model,'status');?></label>
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