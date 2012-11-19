<div class="span4 content-border list-item">

    <div class="faculti-list-item-content ">
        <img width="100px" src="gift.png" height="100px" 
             class ="content-border pull-left gift-pict">
        <div class="gift-list-item-name">
            <?php echo CHtml::link(CHtml::encode($data->title), Yii::app()->createUrl('gift/view', array('id' => $data->Id)));
            ?>
        </div>
        <div class="gifts-list-item-info-block">
            <?php
            $this->widget('bootstrap.widgets.TbProgress', array(
                'type' => 'info', // 'info', 'success' or 'danger'
                'percent' => ($data->current / $data->amount) * 100, // the progress
                'striped' => false,
                'animated' => false,
                'htmlOptions' => array('class' => 'gift-progress-bar'),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'info',
                'label' => 'Подробнее',
                'size'=>'mini',
                'url' => Yii::app()->createUrl('gift/view', array('id' => $data->Id)),
                'htmlOptions' => array('class' => 'gift-button-more pull-right')
            ));
            ?>
        </div>
        <div class="gift-badge">
            <?php
            $this->widget('bootstrap.widgets.TbLabel', array(
                'type' => 'success', // 'success', 'warning', 'important', 'info' or 'inverse'
                'label' => 'V',
            ));
            ?>
        </div>
    </div>


</div>