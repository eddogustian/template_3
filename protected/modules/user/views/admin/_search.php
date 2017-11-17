<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'htmlOptions'=>array('autocomplete'=>'off'),
)); ?>

    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-sm')); ?>
                    <label for="form_control_1"><?php echo $form->label($model,'username');?></label>
                </div>

                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class' => 'form-control input-sm')); ?>
                    <label for="form_control_1"><?php echo $form->label($model,'email');?></label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-success">
                <input class="form-control input-sm ct-form-control" placeholder="" name="UserMdl[create_at]" id="UserMdl_create_at" type="text" value="<?=$model->create_at?>">
                    <label for="form_control_1"><?php echo $form->label($model,'create_at');?></label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <input class="form-control input-sm ct-form-control" placeholder="" name="UserMdl[lastvisit_at]" id="UserMdl_lastvisit_at" type="text" value="<?=$model->lastvisit_at?>">
                    <label for="form_control_1"><?php echo $form->label($model,'lastvisit_at');?></label>
                </div>

                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>
                    <label for="form_control_1"><?php echo $form->label($model,'superuser');?></label>
                </div>

                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus'),array('class'=>'form-control input-sm', 'id'=>'form_control_1')); ?>
                    <label for="form_control_1"><?php echo $form->label($model,'status');?></label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions noborder">
		<?php echo CHtml::submitButton(UserModule::t('Search'), array('class' => 'btn green')); ?>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
    $("#UserMdl_create_at").daterangepicker({
        'language':'id',
        'format':'DD-MM-YYYY',
        'locale':{
            'daysOfWeek':['S','M','T','W','T','F','S'],
            'monthNames':['January','February','March','April','May','June','July','August','September','October','November','December']
        }
    });
    $("#UserMdl_lastvisit_at").daterangepicker({
        'language':'id',
        'format':'DD-MM-YYYY',
        'locale':{
            'daysOfWeek':['S','M','T','W','T','F','S'],
            'monthNames':['January','February','March','April','May','June','July','August','September','October','November','December']
        }
    });
});
/*]]>*/
</script>