<?php
/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'passrecovery-form',
    'type' => 'horizontal',
        ));
?>

<fieldset> 
    <legend>Восстановление пароля</legend>

    <p>Пожалуйста, введите адрес Вашей электронной почты.</p>

    <?php //$this->widget('bootstrap.widgets.BootAlert');  ?>

<?php echo $form->textFieldRow($model, 'mail'); ?>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'icon' => 'envelope white',
            'label' => 'Получить новый пароль'
                )
        );
        ?>
    </div>

</fieldset> 	 
<?php $this->endWidget(); ?>
