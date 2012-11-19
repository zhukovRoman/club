<?php
$this->breadcrumbs=array(
	'Faculties'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Faculty','url'=>array('index')),
	array('label'=>'Create Faculty','url'=>array('create')),
	array('label'=>'Update Faculty','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Faculty','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Faculty','url'=>array('admin')),
);
?>

<h1>View Faculty #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'name',
	),
)); ?>
