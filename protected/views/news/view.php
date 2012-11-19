<h3 class="news-main-title">
    <?php echo CHtml::encode($model->title); ?>
</h3>
<div class="news-content"> 
    <?php echo CHtml::decode($model->text); ?>
    <div class="clearfix"></div>
    <div class="pull-right"><?php echo $model->date; ?></div>
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

