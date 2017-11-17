<?php
/* @var $this UsermenuController */
/* @var $model UserMenuMdl */

$this->breadcrumbs=array(
	'User Menu Mdls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserMenuMdl', 'url'=>array('index')),
	array('label'=>'Create UserMenuMdl', 'url'=>array('create')),
	array('label'=>'Update UserMenuMdl', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserMenuMdl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserMenuMdl', 'url'=>array('admin')),
);
?>

<h1>View UserMenuMdl #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'menu_id',
		'create',
		'update',
		'delete',
		'verify',
		'print',
		'status',
		'user_created',
		'time_created',
		'user_modified',
		'time_modified',
		'deleted',
	),
)); ?>
