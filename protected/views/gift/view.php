<div class="gift span8">
    <div class="gift-info span8 content-border">
        <div>
            <?php //echo CHtml::image($model->imagePath) ; ?>
            <img src="http://dummyimage.com/200x200/888/fff&text=image" 
                 class ="gift-picture pull-left content-border">
        </div>

        <div class="gift-title">
            <?php echo CHtml::encode($model->title); ?>
        </div>
        <div class="gift-status pull-right">
            Статус - 
            <?php
            if ($model->status == Gift::STATUS_ACTIVE)
                echo "В процессе";
            if ($model->status == Gift::STATUS_DONE)
                echo "Собрано";
            if ($model->status == Gift::STATUS_REPORT)
                echo "Заверешено";
            ?>
        </div>
        <div class="bars-and-buttons">

            <?php
            if ($model->status == Gift::STATUS_ACTIVE) {
                echo "<div>";
                $this->widget('bootstrap.widgets.TbProgress', array(
                    'type' => 'info', // 'info', 'success' or 'danger'
                    'percent' => ($model->current / $model->amount) * 100, // the progress
                    'striped' => false,
                    'animated' => false,
                    'htmlOptions' => array('class' => 'gift-bar'),
                ));
                echo " </div>";
            }
            if ($model->status == Gift::STATUS_DONE) {
                echo "<div>";
                $this->widget('bootstrap.widgets.TbProgress', array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => ($model->current / $model->amount) * 100, // the progress
                    'striped' => false,
                    'animated' => false,
                    'htmlOptions' => array('class' => 'gift-bar'),
                ));
                echo " </div>";
            }
            ?>

            <div class="gift-button pull-right">
                <?php
                if ($model->status == Gift::STATUS_ACTIVE) {
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'info',
                        'label' => 'Принять участие',
                        'url' => Yii::app()->createUrl('gift/pay1', array('id' => $model->Id)),
                        'htmlOptions' => array('class' => 'gift-pay1')
                    ));
                }
                if ($model->status == Gift::STATUS_REPORT) {
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'success',
                        'label' => 'Постмотреть отчет',
                        'htmlOptions' => array(
                            'class' => 'gift-report-button',
                            'onclick' => 'js: $("#report").toggle("slow");')
                    ));
                }
                ?>
            </div>

        </div>
    </div>
    <div class="span8 gift-report content-border" id="report">
        <div class="gift-text-inner">
            <?php echo CHtml::decode($model->report); ?>
        </div>
    </div>
    <div class="span8 gift-text content-border">
        <div class="gift-text-inner">
<?php echo CHtml::decode($model->descrip); ?>
        </div>
    </div>
	<div><div id="hypercomments_widget"></div>
<script type="text/javascript">
var _hcp = _hcp || {};_hcp.widget_id = 3517;_hcp.widget = "Stream";
(function() { 
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://widget.hypercomments.com/apps/js/hc.js";
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hcc, s.nextSibling); 
})();
</script>
</div>
</div>