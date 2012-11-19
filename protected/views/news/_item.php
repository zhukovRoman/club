<div class="news-item content-border">
    <img src="<?php echo $model->caption; ?>" 
         class="news-caption" 
         alt="<?php echo $model->title; ?>" 
         title="<?php echo $model->title; ?>"
         width="250" height="170"
         >

    <div class ="news-title">
        <?php
        echo CHtml::link(CHtml::encode($model->title), Yii::app()->createUrl('news/view', array('id' => $model->id)));
        ?></div>
    <div class ="news-short-text">
        <?php echo CHtml::decode($model->getShortText()); ?>
    </div>
    <div>
        <span class ="news-date"><?php echo $model->date; ?></span>
        <span class ="news-read-more pull-right">
            <?php echo CHtml::link(CHtml::encode("Далее >>"), Yii::app()->createUrl('news/view', array('id' => $model->id)));
            ?></span>
    </div>     
</div>