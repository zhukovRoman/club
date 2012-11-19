<?php

$faculties = Faculty::getAllNames();
$currentFaculty = $faculty;

$itemsFaculty = array();
$tmp = array(
    'label' => 'Все',
    'url' => Yii::app()->createUrl('alumni/list')
);
if ($currentFaculty == 0) {
    $tmp['active'] = true;
}
$itemsFaculty[] = $tmp;

foreach ($faculties as $f) {
    $tmp = array(
        'label' => $f['name'],
        'url' => Yii::app()->createUrl('alumni/list', array('faculty' => $f['id'],))
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
));
?>

<?php

$letters = array("А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "К", "Л", "М", "Н", "О",
    "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Э", "Ю", "Я",);
$itemsLetter = array();
$tmp = array('label' => "А-Я",
    'url' => Yii::app()->createUrl('alumni/list'));
if ($faculty != 0) {
    $params['faculty'] = $faculty;
    $tmp = array('label' => "А-Я",
        'url' => Yii::app()->createUrl('alumni/list', $params));
}
if ($letter == '') {
    $tmp['active'] = true;
}
$itemsLetter[] = $tmp;

foreach ($letters as $l) {
    $params = array('letter' => $l);
    if ($faculty != null) {
        $params['faculty'] = $faculty;
    }
    $tmp = array('label' => $l,
        'url' => Yii::app()->createUrl('alumni/list', $params));
    if ($letter != null && $l == $letter) {
        $tmp ['active'] = true;
    }
    $itemsLetter[] = $tmp;
}

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => $itemsLetter,
    'htmlOptions'=>array('class'=>'letters-pills'),
));
?>