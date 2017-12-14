<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>My Profile</span>
		</li>
	</ul>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> My Profile </h1>
<!-- END PAGE TITLE-->

<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-user font-green"></i> 
					<span class="caption-subject font-green bold uppercase">My Profile</span>
				</div>
				<div class="tools">
					<button class="btn btn-sm btn-warning" onclick="window.location.href='<?=Yii::app()->createUrl("user/admin/updatemyprofile/id/".Yii::app()->user->id);?>'"><i class="fa fa-edit"></i> Update</button>
				</div>
			</div>
			<div class="portlet-body">
			<?php 
				// For all users
				$attributes = array(
					'username',
					'email',
				);
				
				$profileFields=ProfileField::model()->forAll()->sort()->findAll();
				if ($profileFields) {
					foreach($profileFields as $field) {
						array_push($attributes,array(
							'label' => UserModule::t($field->title),
							'name' => $field->varname,
							'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
						));
					}
				}
				array_push($attributes,
					array(
						'name' => 'create_at',
						'value' => date('d-m-Y H:i:s',strtotime($model->create_at)),
					),
					array(
						'name' => 'lastvisit_at',
						'value' => (($model->lastvisit_at!='0000-00-00 00:00:00') ? date('d-m-Y H:i:s',strtotime($model->lastvisit_at)) : UserModule::t('Not visited')),
					)
				);
						
				$this->widget('zii.widgets.CDetailView', array(
					'cssFile' => Yii::app()->baseUrl . '/themes/metronic/css/detailview.min.css',
					'data'=>$model,
					'attributes'=>$attributes,
				));

			?>

			</div>
		</div>		
	</div>
</div>
