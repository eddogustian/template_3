<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-grid font-green"></i> 
					<span class="caption-subject font-green bold uppercase">Form</span>
				</div>
				<div class="tools">
					<button class="btn green btn-sm" onclick="window.location.href='<?=Yii::app()->createUrl("user/user/view/id/".Yii::app()->user->id);?>'"><i class="fa fa-arrow-left"></i> Back</button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'user-form',
							'enableAjaxValidation'=>false,
							'htmlOptions' => array('autocomplete'=>'off'),
						));
						?>

						<?php if($form->errorSummary(array($model,$profile)) != ''): ?>
							<div class="alert alert-danger">
								<button class="close" data-close="alert"></button>
								<span> <?php echo $form->errorSummary(array($model,$profile)); ?> </span>
							</div>
						<?php endif; ?>

						<div class="form-body">
							<div class="form-group form-md-line-input form-md-floating-label has-success">
								<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-sm')); ?>	
								<label for="form_control_1"><?php echo $form->labelEx($model,'username');?></label>
							</div>

							<div class="form-group form-md-line-input form-md-floating-label has-success">
								<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128, 'class' => 'form-control input-sm')); ?>	
								<label for="form_control_1"><?php echo $form->labelEx($model,'password');?></label>
							</div>
							
							<div class="form-group form-md-line-input form-md-floating-label has-success">
								<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class' => 'form-control input-sm')); ?>	
								<label for="form_control_1"><?php echo $form->labelEx($model,'email');?></label>
							</div>
							
							<?php 
								$profileFields=$profile->getFields();
								if ($profileFields):
									foreach($profileFields as $field):
										if ($field->hidden_field != 1):
							?>
											<div class="form-group form-md-line-input form-md-floating-label has-success">
							<?php 
									
											if ($widgetEdit = $field->widgetEdit($profile)) {
												echo $widgetEdit;
											} elseif ($field->range) {
												echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>'form-control input-sm', 'id'=>'form_control_1'));
											} elseif ($field->field_type=="TEXT") {
												echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50, 'class'=>'form-control'));
											} else {
												echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255), 'class' => 'form-control input-sm'));
											}
							?>
												<label for="form_control_1"><?php echo $form->labelEx($profile,$field->varname);?></label>
											</div>
							<?php
										endif;
									endforeach;
								endif;
							?>
							</div>
							<div class="form-actions noborder">
								<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), array('class' => 'btn green')); ?>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>

						<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
