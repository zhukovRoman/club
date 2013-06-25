<?php
    $view="meeting";
    $this->renderPartial ("/site/page", array('vote_id' => $view, 'page_name' => $view)); ?>

<h3>Истории выпускников:</h3>

<div class="clearfix"></div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'htmlOptions'=>array('class'=>'faculty-list'),
	'template'=>'{items}<div class="clearfix"></div>{pager}',
)); ?>
