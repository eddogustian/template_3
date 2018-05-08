<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change Password"),
);
?>

<h1><?php echo UserModule::t("Change Password"); ?></h1>


<div class="form">
	<?php echo CHtml::beginForm(); ?>
	
	<?php if(CHtml::errorSummary($form) != ''): ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span> <?php echo CHtml::errorSummary($form); ?> </span>
		</div>
	<?php endif; ?>
	
	<div class="form-body">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo CHtml::activeLabelEx($form,'password');?></label>
			<?php echo CHtml::activePasswordField($form,'password',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm', 'style'=>'background-color: transparant;', 'placeholder'=>'Password ')); ?>	
			<span class="help-block"><?php echo UserModule::t("Minimal password length 4 symbols."); ?></span>
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo CHtml::activeLabelEx($form,'verifyPassword');?></label>
			<?php echo CHtml::activePasswordField($form,'verifyPassword',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm', 'style'=>'background-color: transparant;', 'placeholder'=>'Retype Password')); ?>	
			<span class="help-block"><?php echo UserModule::t("Minimal password length 4 symbols."); ?></span>
		</div>
	
		<div class="form-group">
			<?php echo CHtml::submitButton(UserModule::t("Save"), array('class' => 'btn green')); ?>
			<button type="reset" class="btn btn-default">Reset</button>
		</div>
	</div>

	<?php echo CHtml::endForm(); ?>
</div><!-- form -->