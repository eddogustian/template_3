<?php
/* @var $this MenuController */
/* @var $data MenuMdl */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_order')); ?>:</b>
	<?php echo CHtml::encode($data->menu_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_name')); ?>:</b>
	<?php echo CHtml::encode($data->menu_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_url')); ?>:</b>
	<?php echo CHtml::encode($data->menu_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_icon')); ?>:</b>
	<?php echo CHtml::encode($data->menu_icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_menu_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_menu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_created')); ?>:</b>
	<?php echo CHtml::encode($data->user_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_created')); ?>:</b>
	<?php echo CHtml::encode($data->time_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_modified')); ?>:</b>
	<?php echo CHtml::encode($data->user_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_modified')); ?>:</b>
	<?php echo CHtml::encode($data->time_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	*/ ?>

</div>