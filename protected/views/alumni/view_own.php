<?php

$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, // display a larger alert block?
    'fade' => true, // use transitions?
    'closeText' => '&times;', // close link text - if set to false, no close link is displayed
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
    ),
));
?>

<?php $this->renderPartial("view", array("model" => $model)); ?>

<?php

$this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons' => array(
        array(
            'label' => "Загрузить аватар",
            'url' => Yii::app()->createUrl('alumni/uploadAvatar'),
            'type' => null, // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'small', // null, 'large', 'small' or 'mini'
            //'htmlOptions' => array('class' => 'pull-right'),
        ),
        array(
            'label' => 'Сменить пароль',
            'url' => Yii::app()->createUrl('alumni/changePass'),
            'type' => 'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'small', // null, 'large', 'small' or 'mini'
            //'htmlOptions' => array('class' => 'pull-right right-button'),
        ),
        array(
            'label' => 'Редактировать',
            'url' => Yii::app()->createUrl('alumni/editProfile'),
            'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'small', // null, 'large', 'small' or 'mini'
            //'htmlOptions' => array('class' => 'pull-right right-button'),
        ),
    ),
    'htmlOptions' => array('class' => 'pull-right right-button'),
));
?>
