<div class="span4 content-border faculty-list-item list-item">
    
    <div class="faculti-list-item-content">
        <img src="http://placehold.it/100x100&text=<?php echo $data->name;?>" 
             class ="content-border pull-left">
        <div class="faculti-list-item-name pull-right">
                <?php echo CHtml::encode($data->name);?>
            </div>
        <div class="faculti-list-item-desc">
            <?php echo CHtml::encode($data->description);?>
        </div>
        <div class="faulty-links">
            <?php echo CHtml::link("Выпускники", 
                    Yii::app()->createUrl(
                            'alumni/list', 
                            array('faculty'=>$data->Id)
                            )
                    );?>
            <?php echo CHtml::link("Потребности", 
                    Yii::app()->createUrl(
                            'gift/list', 
                            array('faculty'=>$data->Id)
                            )
                    );?>
        </div>
    </div>
   

</div>