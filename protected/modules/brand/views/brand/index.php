<?php
/* @var $this BrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Brand Mdls',
);

$this->menu=array(
	array('label'=>'Create BrandMdl', 'url'=>array('create')),
	array('label'=>'Manage BrandMdl', 'url'=>array('admin')),
);
?>

<h1>Brand Mdls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
