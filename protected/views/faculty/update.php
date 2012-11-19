<?php
$this->breadcrumbs=array(
	'Faculties'=>array('index'),
	$model->name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Faculty','url'=>array('index')),
	array('label'=>'Create Faculty','url'=>array('create')),
	array('label'=>'View Faculty','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Faculty','url'=>array('admin')),
);
?>

<h1>Update Faculty <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>