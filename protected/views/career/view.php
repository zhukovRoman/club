<?php
if ($model->user_id == Yii::app()->user->getId()) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Редактировать',
        'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'small', // null, 'large', 'small' or 'mini'
        'url' => Yii::app()->createUrl("career/update", array('id'=>$model->id)),
        'htmlOptions' => array('style' => 'float:right; margin-right:30px'),
    ));
}
?>

<h3 class="news-main-title">
<?php echo CHtml::encode($model->title); ?>
</h3>
<div class="news-content"> 
<?php echo CHtml::decode($model->text); ?>
    <div class="clearfix"></div>
    <div class="pull-left">
<?php echo CHtml::link($model->user->name . " " . $model->user->surname, Yii::app()->createUrl("alumni/view", array('id' => $model->user_id)));
?>
    </div>
    <div class="pull-right"><?php echo $model->create_date; ?></div>
</div>
<hr>
<div class="news-comment">

    <div id="hypercomments_widget"></div>
    <script type="text/javascript">
        var _hcp = _hcp || {};_hcp.widget_id = 3517;_hcp.widget = "Stream";
        (function() { 
            var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
            hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://widget.hypercomments.com/apps/js/hc.js";
            var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hcc, s.nextSibling); 
        })();
    </script>

</div>
