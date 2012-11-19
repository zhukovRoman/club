<?php
/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'right-login-form',
    'htmlOptions' => array('class' => 'rigth-form '),
    'type' => 'inline',
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'action' => array('site/login'),
        //'action' => array('site/login'),
        ));
?>
<div class="form-title">Войти</div>	 
<fieldset> 
    <?php $model = new LoginForm; ?>   
    <?php echo $form->textFieldRow($model, 'username', array('class' => 'right-form-textbox', 'style' => 'margin-bottom: 10px;')); ?>
    <?php
    echo $form->passwordFieldRow($model, 'password', array('class' => 'right-form-textbox', 'style' => 'margin-bottom: 10px;', 'hint' => CHtml::link(CHtml::encode("Забыли пароль?"), array('account/passrecovery'))));
    ?>
    <?php echo $form->checkBoxRow($model, 'rememberMe', array('class' => 'pull-right',)); ?>
   
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'icon' => 'ok white',
        'label' => 'Войти',
        'size' => 'mini',
        'url' => array('/site/login'),
        'htmlOptions' => array('class' => 'pull-right right-form-button')
            )
    );
    ?>
 <?php echo CHtml::link('Зарегистрироваться', 
            Yii::app()->createUrl('alumni/singup'),
           array('class'=>'pull-left singUp-link') ); ?>


</fieldset> 	 
<?php $this->endWidget(); ?>
