<?php
/* @var $this MenuController */
/* @var $model MenuMdl */

$this->breadcrumbs=array(
	'Menu Mdls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MenuMdl', 'url'=>array('index')),
	array('label'=>'Create MenuMdl', 'url'=>array('create')),
	array('label'=>'Update MenuMdl', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MenuMdl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MenuMdl', 'url'=>array('admin')),
);
?>

<h1>View MenuMdl #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'menu_order',
		'menu_name',
		'menu_url',
		'menu_icon',
		'parent_menu_id',
		'visible',
		'user_created',
		'time_created',
		'user_modified',
		'time_modified',
		'deleted',
	),
)); ?>
