<legend>Факультеты</legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'template' => '{items}',
        'htmlOptions'=>array ('class'=>'faculty-list',)
)); ?>
