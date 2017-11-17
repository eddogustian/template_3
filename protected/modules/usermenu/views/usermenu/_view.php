<?php
/* @var $this UsermenuController */
/* @var $data UserMenuMdl */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::encode($data->menu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create')); ?>:</b>
	<?php echo CHtml::encode($data->create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update')); ?>:</b>
	<?php echo CHtml::encode($data->update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete')); ?>:</b>
	<?php echo CHtml::encode($data->delete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verify')); ?>:</b>
	<?php echo CHtml::encode($data->verify); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('print')); ?>:</b>
	<?php echo CHtml::encode($data->print); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

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