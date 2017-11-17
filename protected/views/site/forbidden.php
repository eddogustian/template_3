<link href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/css/error.min.css" rel="stylesheet" type="text/css" />

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Forbidden</span>
		</li>
	</ul>
</div>
<!-- END PAGE BAR -->

<div class="row">
	<div class="col-md-12 page-404">
		<p>&nbsp;</p>
		<div class="number font-green"> 403 </div>
		<div class="details">
			<h3>Oops! You don't  have permission to access.</h3>
			<p>
				<a href="<?php echo Yii::app()->baseUrl; ?>" class="btn green btn-outline"> Return to dashboard </a>
			</p>
		</div>
	</div>
</div>