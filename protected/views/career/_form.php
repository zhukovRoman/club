<?php

Yii::app()->clientScript->registerScriptFile("js/redactor/redactor/redactor.js", CClientScript::POS_END);
Yii::app()->getClientScript()->registerCssFile('js/redactor/redactor/css/redactor.css');

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'career-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 500)); ?>
<?php

echo $form->textAreaRow($model, 'text', array('rows' => 12, 'cols' => 50, 'class' => 'span8',
    //'hint' => 'Поддерживаются html-теги a,p,i,b,img и некоторые другие...',
    'id' => "redactor",
));
?>


<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => $model->isNewRecord ? 'Создать' : 'Сохранить',
));
?>


<?php $this->endWidget(); ?>
 
<script type="text/javascript">
    $(document).ready(
        function()
        {
           var buttons = ['html', '|', 'formatting', '|', 'bold', 'italic', '|',
                                            'unorderedlist', 'orderedlist', '|',
                                            'image', 'link', 'video','|', 
                                            'alignleft', 'aligncenter', 'alignright', 'justify', '|',
                                            'horizontalrule'];
                        $('#redactor').redactor({ 
                               // imageUpload: 'index.php?r=site/RedactorUploadImage',
                                //autoresize: true,
                                cleanUp: true,
                                buttons: buttons,
                                removeClasses: true,
                                removeStyles: true,
                                css: 'docstyle.css'
                            });
            
        }
    );
</script>