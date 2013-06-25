<div class="news-item content-border">
    <div class ="news-title">
        <?php
        echo CHtml::link(CHtml::encode($data->title), Yii::app()->createUrl('career/view', array('id' => $data->id)));
        ?></div>
    <div class ="news-short-text">
        <?php echo CHtml::decode($data->getShortText()); ?>
    </div>
    <div>
        <span class ="news-date">
            <?php echo CHtml::link($data->user->name." ".$data->user->surname, 
                            Yii::app()->createUrl("alumni/view", array('id'=>$data->user_id)));
                    echo "($data->create_date)"; ?>
        </span>
        <span class ="news-read-more pull-right">
            <?php echo CHtml::link(CHtml::encode("Далее >>"), Yii::app()->createUrl('career/view', array('id' => $data->id)));
            ?></span>
    </div>     
</div>