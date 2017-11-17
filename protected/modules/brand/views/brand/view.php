<?php
/* @var $this BrandController */
/* @var $model BrandMdl */

$this->breadcrumbs=array(
	'Brand Mdls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BrandMdl', 'url'=>array('index')),
	array('label'=>'Create BrandMdl', 'url'=>array('create')),
	array('label'=>'Update BrandMdl', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BrandMdl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BrandMdl', 'url'=>array('admin')),
);
?>

<h1>View BrandMdl #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'brand_name',
		'brand_type',
	),
)); ?>
