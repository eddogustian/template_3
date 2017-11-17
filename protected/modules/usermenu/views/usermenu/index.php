<?php
/* @var $this UsermenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Menu Mdls',
);

$this->menu=array(
	array('label'=>'Create UserMenuMdl', 'url'=>array('create')),
	array('label'=>'Manage UserMenuMdl', 'url'=>array('admin')),
);
?>

<h1>User Menu Mdls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
