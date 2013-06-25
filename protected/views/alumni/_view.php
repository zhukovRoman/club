<div class="alumni-list-item span4 content-border list-item">
    <div class="alumni-list-avatar pull-left">
         <img src="<?php echo $data->getAvatarUrl(100);?>">
    </div>
    <div class="alumni-list-data">
        <?php
                $link= CHtml::encode($data->surname . " " .
                //$data->forername . " " .
                $data->name);
        echo CHtml::link($link, Yii::app()->createUrl('alumni/view', 
                                                        array('id'=>$data->ID)));
        ?>
        <br>
        <?php echo CHtml::encode("Кафедра: ".$data->department->name); ?>
        <br><?php echo CHtml::encode("Год выпуска: $data->year");?>
        <br><?php echo CHtml::encode("$data->workplace");?>
        <br><?php echo CHtml::encode("$data->contact_mail"); ?>
        <br><?php // echo CHtml::encode("Телефон: 2010");?>
        
    </div>
</div>