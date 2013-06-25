<div class="span3 right-buttons">
   
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'action',
            'label' => 'Проекты клуба',
            'block' => true,
            //'url' => Yii::app()->createUrl('site/page', array('view' => 'programs')),
            'url' => '#',
            'id' => 'proj_btn',
            'htmlOptions'=>array('onClick'=>'$("#proj").toggle();', 'class'=>"btn-dark"),
        ));
        ?>
       <?php //$current = (Yii::app()->controller->action->id=="pageview") ? "block" : "none";
                $current = "block"; ?>
        <div id="proj" style="display: <?php echo $current; ?> ; margin: 2px 10px 10px 10px;" >
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                //'type' => ($_GET['view']=='grand')?'info':'action',
                //'type' => 'action',
                'label' => 'Стипендия',
                'block' => true,
                'url' => Yii::app()->createUrl('site/pageview', array('view' => 'grand')),
                //'htmlOptions'=>array ('class'=>"dark-btn"),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                //'type' => ($_GET['view']=='gifts')?'info':'action',
                'label' => 'Подарок кафедре',
                'block' => true,
                'url' => Yii::app()->createUrl('site/pageview', array('view' => 'gifts')),
                //'htmlOptions'=>array ('class'=>"dark-btn"),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                //'type' => ($_GET['view']=='meeting')?'info':'action',
                'label' => 'Профессия - Бауманец',
                'block' => true,
                'url' => Yii::app()->createUrl('career/index'),
                //'url' => Yii::app()->createUrl('site/pageview', array('view' => 'meeting')),
                //'htmlOptions'=>array ('class'=>"dark-btn"),
            ));
            ?>
        </div>
  
    <?php
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'type' => 'action',
//        'label' => 'События',
//        'block' => true,
//        'url' => Yii::app()->createUrl('site/page', array('view' => 'events')),
//    ));
    
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'action',
        'label' => 'О нас',
        'block' => true,
        'url' => Yii::app()->createUrl('site/page', array('view' => 'about')),
        'htmlOptions'=>array ('class'=>"btn-dark"),
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
