<div class="span3 right-buttons">

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'action',
        'label' => 'События',
        'block' => true,
        'url' => Yii::app()->createUrl('site/page', array('view' => 'events')),
    ));
    ?>
    <div class="btn-group btn-group-vertical" style="display: block; margin: 10px 0px;">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'info',
            'label' => 'Проекты клуба',
            'block' => true,
            //'url' => Yii::app()->createUrl('site/page', array('view' => 'programs')),
            'url' => '#',
            'id' => 'proj_btn',
            'htmlOptions'=>array('onClick'=>'$("#proj").toggle();'),
        ));
        ?>
       <?php $current = (Yii::app()->controller->action->id=="pageview") ? "block" : "none";?>
        <div id="proj" style="display: <?php echo $current; ?> ;">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'action',
                'label' => 'Стипендия',
                'block' => true,
                'url' => Yii::app()->createUrl('site/pageview', array('view' => 'grand')),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'action',
                'label' => 'Поддержка кафедры',
                'block' => true,
                'url' => Yii::app()->createUrl('site/pageview', array('view' => 'gifts')),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'action',
                'label' => 'Встречи',
                'block' => true,
                'url' => Yii::app()->createUrl('site/pageview', array('view' => 'meeting')),
            ));
            ?>
        </div>
    </div>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'action',
        'label' => 'О нас',
        'block' => true,
    ));
    ?>

    <?php
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'type' => 'info',
//        'label' => 'Сделать подарок',
//        'block' => true,
//        'url' => Yii::app()->createUrl('gift/list'),
//        'htmlOptions' => array('style' => 'margin-top: 10px; ')
//    ));
    ?>

</div>
