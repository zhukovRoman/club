<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
	 
<fieldset> 
	<legend>Восстановление пароля</legend>
	
	<br><p><span class="label label-info">Спасибо!</span>
	Новый пароль выслан Вам на адрес Вашей электронной почты.</p>
	
	<?php echo CHtml::link(CHtml::decode("Вернуться на главную"), Yii::app()->createUrl('site/index')); ?>

</fieldset> 	 
<?php $this->endWidget(); ?>