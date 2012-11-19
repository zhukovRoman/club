<div class="soc-buttons"><img src="img/soc/twitter.png"> 
    <img src="img/soc/facebook.png">
    <img src="img/soc/vkontakte.png">
    <img src="img/soc/linkedin.png">
</div>
<?php if ($this->loginform == true && Yii::app()->user->isGuest)
    $this->renderPartial("/site/loginform");
?>

<?php if (!Yii::app()->user->isGuest)
    $this->renderPartial("/site/rightButtons");
?>
<a class="twitter-timeline" width="220px" style = "margin-bottom:20px;" data-dnt=true href="https://twitter.com/search?q=%23bmstu" data-widget-id="260000825034817536">Твиты о "#bmstu"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



<!--<img src ="http://dummyimage.com/220x700/888/fff&text=twitter">-->
