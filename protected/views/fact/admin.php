

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'fact-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $provider,
    'template' => '{items}{pager}',
   'columns' => array(
            
            array(
                'name'=>'giftId',
                'type'=>'raw',  
                'header'=>'Назанчение',
                'sortable' => false,
                'value' => 'Chtml::link ( $data->gift->title, 
                    Yii::app()->createUrl("gift/view", array("id"=>$data->giftId)));',
                'filter'=>false,
                
            ),
        array(
                'name'=>'trsSum',
                'header'=>'Сумма',
                'sortable' => false,
                'value' => '$data->trsSum',
                'filter'=>false, 
            ),
        array(
                'name'=>'trsDate',
                'header'=>'Дата',
                'sortable' => false,
                'value' => 'date("d/m/Y H:i", strtotime($data->trsDate))',
                'filter'=>false,
            ),
        array(
                'name'=>'method',
                'header'=>'Метод',
                'sortable' => false,
                'value' => '$data->method',
                'filter'=>false,
            ),
            
   
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template' => '{view}',                    
                'htmlOptions'=>array('width'=>'50px'),
            ),
            
        ),
    ));
?>
