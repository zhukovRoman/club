<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'alumni-form',
        'type' => 'vertical span8',
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'mail',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span4','maxlength'=>32)); ?>
        
	<?php //echo $form->textFieldRow($model,'diplomId',array('class'=>'span4 ','maxlength'=>100)); ?>

	<div >
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'htmlOptions'=>array ('style'=>'float:right'),
			'label'=>'Зарегистрироваться',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
