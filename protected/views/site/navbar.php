

<?php

$f = 'Приоединиться';

$items = array(
    array(
        'label' => 'Вход',
        'url' => Yii::app()->createUrl('site/login')
    )
        ,);
if (!Yii::app()->user->isGuest) {
    $items = array(
        array('label' => 'Кабинет', 'items' => array(
                array('label' => 'Профиль', 'url' => Yii::app()->createUrl("alumni/profile")
                ),
                array('label' => 'История', 'url' => Yii::app()->createUrl("gift/History")),
                //array('label' => 'Ваша кафедра', 'url' => '#'),
                '---',
                array('label' => 'Выход', 'url' => '#'),
        )),
        '---',
        array('label' => 'Выход', 'url' => Yii::app()->createUrl('site/logout')),
    );
    $f = "Новости";
}

$this->widget('bootstrap.widgets.TbNavbar', array(
    //'type'=>'inverse', // null or 'inverse'
    'fixed' =>  false,
    'brand' => false,
    'fluid'=>true,
    //'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array('label' => $f, 'url' => Yii::app()->createUrl('site/index'),),
                array('label' => 'Пожертвовать',
                    'url' => Yii::app()->createUrl('gift/list')),
                array('label' => 'Выпускники',
                    'url' => Yii::app()->createUrl('alumni/list')),
                array('label' => 'Факультеты',
                    'url' => Yii::app()->createUrl('faculty/index'),
//                        'items' => array(
//                        array('label' => 'ИУ', 'url' => '#'),
//                        array('label' => 'ИУ', 'url' => '#'),
//                        array('label' => 'ИУ', 'url' => '#'),
//                        array('label' => 'ИУ', 'url' => '#'),
//                        array('label' => 'ИУ', 'url' => '#'),
//                )
                ),
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => $items,
        ),
    ),
    'htmlOptions' => array('class' => 'header-menu')
));
?>