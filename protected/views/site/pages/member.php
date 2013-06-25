<h2>Стипендия</h2>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
      array('label'=>'Описание', 'url'=>Yii::app()->createUrl("site/pageview", array('view'=>'grand'))),
        array('label'=>'Участники', 'url'=>Yii::app()->createUrl("site/page", array('view'=>'member')), 'active'=>true),
        array('label'=>'Перевести средства', 'url'=>Yii::app()->createUrl("site/page", array('view'=>'donate')), ),
       
    ),
)); ?>

Данная страница пока не заполнена. Следите за обновлениями =).