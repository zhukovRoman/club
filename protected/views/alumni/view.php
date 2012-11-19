<h3 class="offset2"><?php echo "$model->surname $model->name $model->forename"; ?></h3>
<div class="span3 avatar">
    <img src="<?php echo $model->getAvatarUrl(250);?>" class ="content-border">
</div>
<div class="span5">
<?php
$lv = date("d/m/Y",  strtotime($model->lastVisit));
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>array('workplace'=>$model->workplace,
        'mobile'=>$model->mobile,
        'mail'=>$model->mail,
        'departmentID'=>$model->department->name,
        'lastVisit'=>$lv),
    'attributes'=>array(
        array('name'=>'workplace', 'label'=>'Место работы'),
        array('name'=>'mobile', 'label'=>'Телефон'),
        array('name'=>'mail', 'label'=>'e-mail'),
        array('name'=>'departmentID', 'label'=>'Кафедра'),
        array('name'=>'lastVisit', 'label'=>'Последний визит'),
    ),
));
?>
    
   
</div>