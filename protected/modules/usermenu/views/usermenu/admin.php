<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span><?=ucfirst(Yii::app()->controller->id)?></span>
		</li>
	</ul>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> <?=ucfirst(Yii::app()->controller->id)?> List </h1>
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
					<i class="<?=AppComponent::get_menu_icon_by_name('usermenu')?> font-green"></i> 
					<span class="caption-subject font-green bold uppercase"><?=ucfirst(Yii::app()->controller->id)?></span>
				</div>
				<div class="tools">
					<?php
					if(AppComponent::get_user_access('usermenu', 'create')):
					?>
						<button class="btn btn-sm btn-primary" onclick="window.location.href='<?=Yii::app()->createUrl("usermenu/usermenu/create");?>'"><i class="fa fa-plus"></i> New <?=ucfirst(Yii::app()->controller->id)?></button>
					<?php
					endif;
					?>
				</div>
			</div>
			<div class="portlet-body">
				<?php 
				$opt_button = '';
				if(AppComponent::get_user_access('usermenu', 'update'))
					$opt_button .= '{update} ';
				if(AppComponent::get_user_access('usermenu', 'delete'))
					$opt_button .= '{delete}';

				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'user-menu-mdl-grid',
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
						// 'id',
						array(
							'header'=>'#',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
							'htmlOptions'=>array('style' => 'text-align: center;'),
							'headerHtmlOptions' => array(
								'width' => '3%',
								'style' => 'text-align: center;'
							),
						),
						array(
							'name'=>'user_id',
							'value'=>'!empty($data->user_id) ? ucwords($data->users->username) : "-"',
						),
						array(
							'name'=>'menu_id',
							'value'=>'!empty($data->menu_id) ? ucwords($data->menu->menu_name) : "-"',
						),
						array(
							'name'=>'create',
							'value'=>'UserMenuMdl::itemAlias("create",$data->create)',
							'filter'=>UserMenuMdl::itemAlias("create"),
						),
						array(
							'name'=>'update',
							'value'=>'UserMenuMdl::itemAlias("update",$data->update)',
							'filter'=>UserMenuMdl::itemAlias("update"),
						),
						array(
							'name'=>'delete',
							'value'=>'UserMenuMdl::itemAlias("delete",$data->delete)',
							'filter'=>UserMenuMdl::itemAlias("delete"),
						),
						array(
							'name'=>'verify',
							'value'=>'UserMenuMdl::itemAlias("verify",$data->verify)',
							'filter'=>UserMenuMdl::itemAlias("verify"),
						),
						array(
							'name'=>'print',
							'value'=>'UserMenuMdl::itemAlias("print",$data->print)',
							'filter'=>UserMenuMdl::itemAlias("print"),
						),
						array(
							'name'=>'status',
							'value'=>'UserMenuMdl::itemAlias("status",$data->status)',
							'filter'=>UserMenuMdl::itemAlias("status"),
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