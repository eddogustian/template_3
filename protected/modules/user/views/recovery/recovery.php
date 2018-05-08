<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Forgot Password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Forgot Password"),
);
?>

<h1><?php echo UserModule::t("Forgot Password"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
		<p><a href="<?php echo Yii::app()->baseUrl; ?>" id="back" class="pull-right">Sign in ?</a></p>
	</div>
<?php else: ?>
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
				<label class="control-label visible-ie8 visible-ie9"><?php echo CHtml::activeLabel($form,'login_or_email');?></label>
				<?php echo CHtml::activeTextField($form,'login_or_email',array('size'=>50,'maxlength'=>50, 'class' => 'form-control input-sm', 'style'=>'background-color: transparant;', 'placeholder'=>'Username or Email')); ?>	
				<span class="help-block"><?php echo UserModule::t("Please enter your login or email addres."); ?></span>
			</div>
		
			<div class="form-group">
				<?php echo CHtml::submitButton(UserModule::t("Restore"), array('class' => 'btn green')); ?>
				<button type="reset" class="btn btn-default">Reset</button>
				<p><a href="<?php echo Yii::app()->baseUrl; ?>" id="back" class="pull-right">Sign in ?</a></p>
			</div>
		</div>

		<?php echo CHtml::endForm(); ?>
	</div><!-- form -->
<?php endif; ?>