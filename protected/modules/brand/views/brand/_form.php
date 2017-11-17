<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-grid font-green"></i> 
					<span class="caption-subject font-green bold uppercase">Form</span>
				</div>
				<div class="tools">
					<button class="btn green btn-sm" onclick="window.location.href='<?=Yii::app()->createUrl("brand/brand");?>'"><i class="fa fa-list"></i> <?=ucfirst(Yii::app()->controller->id)?> List</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'brand-mdl-form',
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>false,
							'htmlOptions'=>array('autocomplete'=>'off'),
						)); ?>
						
						<?php if($form->errorSummary($model) != ''): ?>
							<div class="alert alert-danger">
								<button class="close" data-close="alert"></button>
								<span> <?php echo $form->errorSummary($model); ?> </span>
							</div>
						<?php endif; ?>

						<div class="form-body">
							<div class="form-group form-md-line-input form-md-floating-label has-success">
								<?php echo $form->textField($model,'brand_name',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm')); ?>	
								<label for="form_control_1"><?php echo $form->labelEx($model,'brand_name');?></label>
							</div>
						
							<div class="form-group form-md-line-input form-md-floating-label has-success">
								<?php echo $form->textField($model,'brand_type',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm')); ?>	
								<label for="form_control_1"><?php echo $form->labelEx($model,'brand_type');?></label>
							</div>
						</div>
						<div class="form-actions noborder">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn green')); ?>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
		
						<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
