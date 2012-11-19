<?php
$this->breadcrumbs=array(
	'Gifts'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gift','url'=>array('index')),
	array('label'=>'Create Gift','url'=>array('create')),
	array('label'=>'View Gift','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Gift','url'=>array('admin')),
);
?>

<h1>Update Gift <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>