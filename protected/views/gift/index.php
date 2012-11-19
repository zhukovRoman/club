<legend>Подарки</legend>
<?php $this->renderPartial ("_tabs", array(
    'faculty'=>$currentFaculty,
    'department'=>$currentDepartment,
    'status'=>$currentStatus,
));?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'template' => '{items}{pager}',
        'htmlOptions'=>array ('class'=>'gift-list',)
)); ?>