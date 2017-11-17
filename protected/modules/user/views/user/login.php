<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
?>

<form class="login-form" action="<?php echo Yii::app()->baseUrl; ?>/index.php/user/login" method="post" autocomplete="off">
	<h3 class="form-title font-green">Sign In</h3>

	<?php if(CHtml::errorSummary($model) != ''): ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span> <?php echo CHtml::errorSummary($model); ?> </span>
		</div>
	<?php endif; ?>

	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9">Username or Email</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username or Email" name="UserLogin[username]" id="UserLogin_username" /> 
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Password</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="UserLogin[password]" id="UserLogin_password" />
	</div>
	<div class="form-actions">
		<button type="submit" class="btn green uppercase" name="yt0">Login</button>
		<label class="rememberme check mt-checkbox mt-checkbox-outline">
			<input name="UserLogin[rememberMe]" id="ytUserLogin_rememberMe" type="hidden" value="0" />
			<input name="UserLogin[rememberMe]" id="UserLogin_rememberMe" value="1" type="checkbox" />
			Remember
			<span></span>
		</label>
		<!--
			<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/user/recovery" id="forget-password" class="forget-password">Forgot Password?</a>
		-->
	</div>
</form>
