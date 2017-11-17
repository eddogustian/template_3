<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="<?php echo Yii::app()->baseUrl.'/index.php/user/admin'; ?>">User</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Update</span>
		</li>
	</ul>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Update User </h1>
<!-- END PAGE TITLE-->

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>