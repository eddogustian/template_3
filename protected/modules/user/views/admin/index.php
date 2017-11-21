<?php

// $this->breadcrumbs=array(
// 	UserModule::t('Users')=>array('/user'),
// 	UserModule::t('Manage'),
// );

// $this->menu=array(
//     array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
//     array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
//     array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
//     array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
// );

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
//     $('.search-form').toggle();
//     return false;
// });	
// $('.search-form form').submit(function(){
//     $.fn.yiiGridView.update('user-grid', {
//         data: $(this).serialize()
//     });
//     return false;
// });
// ");

?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>User</span>
		</li>
	</ul>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> User List </h1>
<!-- END PAGE TITLE-->

<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-filter"></i> Filter 
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse" id="filter_collapse"> </a>
				</div>
			</div>
			<div class="portlet-body" id="body_collapse">
				<div class="table-scrollable">
					<?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-user font-green"></i> 
					<span class="caption-subject font-green bold uppercase">User</span>
				</div>
				<div class="tools">
					<?php
					if(AppComponent::get_user_access('user', 'create')):
					?>
						<button class="btn btn-sm btn-primary" onclick="window.location.href='<?=Yii::app()->createUrl("user/admin/create");?>'"><i class="fa fa-plus"></i> New User</button>
					<?php
					endif;
					
					if(AppComponent::get_user_access('user', 'print')):
					?>
						<button class="btn btn-sm btn-danger" form="yw0" name="download_pdf" value="pdf" onclick="window.open('<?=Yii::app()->request->requestUri;?>','_blank')"><i class="fa fa-file-pdf-o"></i> PDF</button>
						<button class="btn btn-sm btn-success" form="yw0" name="download_excel" value="excel"><i class="fa fa-file-excel-o"></i> Excel</button>
					<?php
					endif;
					?>
				</div>
			</div>
			<div class="portlet-body">
				<?php 
				$opt_button = '';
				if(AppComponent::get_user_access('usermenu', 'create'))
					$opt_button .= '{settings} ';
					if(AppComponent::get_user_access('user', 'update'))
					$opt_button .= '{update} ';
				if(AppComponent::get_user_access('user', 'delete'))
					$opt_button .= '{delete}';
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'user-grid',
					'dataProvider'=>$model->search(),
					// 'filter'=>$model,
					'itemsCssClass'=>'table table-hover table-striped table-condensed',
					'pager'=>array(
						'header' => '',
						'internalPageCssClass' => 'btn btn-pager',
						'firstPageCssClass' => 'btn btn-pager',
						'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
						'previousPageCssClass' => 'btn btn-pager',
						'prevPageLabel'  => '<i class="fa fa-angle-left"></i>',
						'nextPageCssClass' => 'btn btn-pager',
						'nextPageLabel'  => '<i class="fa fa-angle-right"></i>',
						'lastPageCssClass' => 'btn btn-pager',
						'lastPageLabel'  => '<i class="fa fa-angle-double-right"></i>',
					),
					'columns'=>array(
						// array(
						// 	'name' => 'id',
						// 	'type'=>'raw',
						// 	'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
						// ),
						// array(
						// 	'name' => 'username',
						// 	'type'=>'raw',
						// 	'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
						// ),
						array(
							'header'=>'#',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
							'htmlOptions'=>array('style' => 'text-align: center;'),
							'headerHtmlOptions' => array(
								'width' => '3%',
								'style' => 'text-align: center;'
							),
						),
						'username',
						array(
							'name'=>'email',
							'type'=>'raw',
							'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
						),
						// 'create_at',
						array(
							'name' => 'create_at',	
							'value'=> '!empty($data->create_at) ? date_format(date_create($data->create_at),"d-m-Y") : "-"',
						),
						// 'lastvisit_at',
						array(
							'name' => 'lastvisit_at',
							'value'=> '$data->lastvisit_at != "0000-00-00 00:00:00" ? date_format(date_create($data->lastvisit_at),"d-m-Y H:i:s") : "-"',
						),
						array(
							'name'=>'superuser',
							'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
							'filter'=>User::itemAlias("AdminStatus"),
						),
						array(
							'name'=>'status',
							'value'=>'User::itemAlias("UserStatus",$data->status)',
							'filter' => User::itemAlias("UserStatus"),
						),
						array(
							'class'=>'CButtonColumn',
							'template'=> $opt_button,
							'header' => 'Actions',
							'headerHtmlOptions' => array(
								'width' => '10%',
								'style' => 'text-align: center;'
							),
							'buttons'=>array (
								'settings'=>array(
									'label'=>'<i class="icon-settings"></i>',
									'imageUrl'=>true,
									'url'=>"CHtml::normalizeUrl(array('/usermenu/usermenu/admin', 'id'=>\$data->id))",
									// 'url'=>Yii::app()->baseUrl.'/index.php/usermenu/usermenu',
									'options'=>array('class'=>'btn btn-sm btn-info', 'title' => 'Settings', 'href' => Yii::app()->baseUrl.'/index.php/usermenu/usermenu'),
								),
								'update'=>array(
									'label'=>'<i class="fa fa-pencil"></i>',
									'imageUrl'=>false,
									'options'=>array('class'=>'btn btn-sm btn-warning', 'title' => 'Update'),
								),
								'delete'=>array(
									'label'=>'<i class="fa fa-trash-o"></i>',
									'imageUrl'=>false,
									'options'=>array('class'=>'btn btn-sm btn-danger', 'title' => 'Delete'),
								),
							),
						),
					),
				)); 
				?>
			</div>
		</div>
	</div>
</div>
