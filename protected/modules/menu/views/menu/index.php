<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menu Mdls',
);

$this->menu=array(
	array('label'=>'Create MenuMdl', 'url'=>array('create')),
	array('label'=>'Manage MenuMdl', 'url'=>array('admin')),
);
?>

<h1>Menu Mdls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
