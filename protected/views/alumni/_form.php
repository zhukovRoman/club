
<?php
if ($model->itIsFirtsVisit()) {?>
    <div class = "alert alert-success span7">
    <button type = "button" class = "close" data-dismiss = "alert">x</button>
    Для дальнейшей работы мы просим Вас ввести информацию о себе. Необязательные поля можно не заполнять.
    </div>
    <div class = "clearfix"></div>
    <?php
}
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'alumni-form',
    'enableAjaxValidation' => false,
        ));
?>



<?php echo $form->errorSummary($model); ?>
<h3>Личная информация:</h3>
<hr>
    
<?php echo $form->textFieldRow($model, 'surname', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'forename', array('class' => 'span5', 'maxlength' => 100)); ?>

<h3>Информация об обучении:</h3>
<hr>
<?php echo $form->textFieldRow($model, 'year', array('class' => 'span3', 'maxlength' => 4)); ?>



<?php //echo $form->textFieldRow($model, 'mobile', array('class' => 'span5', 'maxlength' => 25));  ?>


<?php
echo $form->dropDownListRow($model, 'facultyId', Faculty::getFaculties(),
        //html options
        array('ajax' => array(
        'type' => 'POST',
        'url' => $this->createUrl('alumni/ChangeFaculty'),
        'update' => '#' . CHtml::activeId($model, 'departmentID'),
        ))
);
?>


<?php
$currentFac = ($model->facultyId==NUll)? 1 : $model->facultyId;
echo $form->dropDownListRow($model, 'departmentID', Department::getDepartmentsOfFacultyForForm($currentFac));
?>

<h3>Контактная информация</h3>
<hr>
<p style="color: gray;">Внимание! Данная информация будет доступна всем членам клуба.</p>
<div class="control-group">
    <label class="control-label"> <?php echo $model->getAttributeLabel('mobile'); ?></label>
    <div class="controls">	 
        <span id ="dateselect">
            <?php
            $this->widget('CMaskedTextField', array(
                'model' => $model,
                'attribute' => 'mobile',
                'mask' => '+7(999)999-9999',
            ));
            ?> 
        </span>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'workplace', array('class' => 'span5', 'maxlength' => 250)); ?>
<?php echo $form->textFieldRow($model, 'contact_mail', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'info',
    'label' => 'Сохранить',
    'size' => 'small',
    'htmlOptions' => array('class' => 'pull-right right-button')
));
?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Отмена',
    'url' => Yii::app()->createUrl('alumni/view', array('id' => Yii::app()->user->getId())),
    'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size' => 'small', // null, 'large', 'small' or 'mini'
    'htmlOptions' => array('class' => 'pull-right right-button'),
));
?>


<?php $this->endWidget(); ?>
