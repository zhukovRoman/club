
<legend>Список выпускников</legend>
<?php  $this->renderPartial ('/alumni/_tabs', array (
    'faculty'=>$faculty,
    'letter'=>$letter,
));?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'htmlOptions'=>array('class'=>'faculty-list'),
        'template'=>'{items}<div class="clearfix"></div>{pager}',
)); ?>
