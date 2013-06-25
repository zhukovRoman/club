
<h3>Ваши истории:</h3>


<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Создать',
    'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size' => 'small', // null, 'large', 'small' or 'mini'
    'url' => Yii::app()->createUrl("career/create"),
    'htmlOptions' => array('style' => 'float:right; margin-right:30px'),
));
?>

<div class="clearfix"></div>
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'htmlOptions' => array('class' => 'faculty-list'),
    'template' => '{items}<div class="clearfix"></div>{pager}',
));
?>
