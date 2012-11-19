

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gift-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'descrip',
		'depId',
		'amount',
		'status',
		'imagePath',
		/*
		'facultyId',
		'report',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
