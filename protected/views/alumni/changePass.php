<legend>Смена пароля</legend>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'alumni-form',
    'enableAjaxValidation' => false,
        ));
?>



<?php echo $form->errorSummary($model); ?>

<?php echo $form->passwordFieldRow($model, 'oldpass', array('class' => 'span3', 'maxlength' => 50)); ?>

<?php echo $form->passwordFieldRow($model, 'newpass', array('class' => 'span3', 'maxlength' => 50)); ?>


<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Отмена',
    'url' => Yii::app()->createUrl('alumni/view', array('id' => Yii::app()->user->getId())),
    'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size' => 'small', // null, 'large', 'small' or 'mini'
    'htmlOptions' => array('class' => 'pull-right right-button'),
));
?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'info',
    'label' => 'Сохранить',
    'size' => 'small',
    'htmlOptions' => array('class' => 'pull-right right-button')
));
?>

<?php $this->endWidget(); ?>

