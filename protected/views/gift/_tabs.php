<?php

$params = array(
    'faculty' => $faculty,
    'department' => $department,
    'status' => $status,
);

//*********************************************************//
//              Закладки по факультетам                    //
//*********************************************************//

$faculties = Faculty::getAllNames();
$currentFaculty = $faculty;

$itemsFaculty = array();
$param = $params;
$param['faculty'] = 0;
$tmp = array(
    'label' => 'Все',
    'url' => Yii::app()->createUrl('gift/list', $param)
);
if ($currentFaculty == 0) {
    $tmp['active'] = true;
}
$itemsFaculty[] = $tmp;

foreach ($faculties as $f) {
    $param = $params;
    $param['faculty'] = $f['id'];
    $tmp = array(
        'label' => $f['name'],
        'url' => Yii::app()->createUrl('gift/list', $param),
    );
    if ($currentFaculty == $f['id']) {
        $tmp['active'] = true;
    }
    $itemsFaculty[] = $tmp;
}

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $itemsFaculty,
    'htmlOptions' => array('class' => 'faculty-tabs'),
));

//*********************************************************//
//              Закладки по статусам                       //
//*********************************************************//

$statusItems = array(
    array('label' => 'Все',
        'active' => ($status == 0) ? true : false,
        'url' => Yii::app()->createUrl('gift/list', array(
            'faculty' => $faculty,
            'department' => $department,
            'status' => 0,
        )),),
    array('label' => 'Завершенные',
        'active' => ($status == Gift::STATUS_DONE) ? true : false,
        'url' => Yii::app()->createUrl('gift/list', array(
            'faculty' => $faculty,
            'department' => $department,
            'status' => Gift::STATUS_DONE,
        )),),
    array('label' => 'В процессе',
        'active' => ($status == Gift::STATUS_ACTIVE) ? true : false,
        'url' => Yii::app()->createUrl('gift/list', array(
            'faculty' => $faculty,
            'department' => $department,
            'status' => Gift::STATUS_ACTIVE,
        )),),
);

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $statusItems,
    'htmlOptions' => array('class' => 'gift-status-pills'),
));

//*********************************************************//
//              Закладки по кафедрам                       //
//*********************************************************//

if ($currentFaculty != 0) {
    

    $param = $params;
    $param['department']=0;
    $depItems = array();
    $tmp = array(
        'label' => 'Все',
        'url' => Yii::app()->createUrl('gift/list', $param)
    );
    if ($department == 0) {
        $tmp['active'] = true;
    }
    $depItems[] = $tmp;
    
    $departments = Department::getDepartmentsOfFaculty($currentFaculty);
    foreach ($departments as $dep)
    {
        $param = $params;
        $param['department']=$dep->Id;
        $tmp = array (
            'label'=>$dep->name,
            'url' => Yii::app()->createUrl('gift/list', $param),
        );
        if ($department==$dep->Id)
            $tmp['active']=true;
            
            
        $depItems[]=$tmp;
    }
    
    $this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $depItems,
    'htmlOptions'=>array('class'=>'department-pills'),
));
}
?>