<div class="soc-buttons">
    <a href="#">
        <img src="img/soc/twitter.png">
    </a>
    <a href="http://www.facebook.com/bmstuclub">
        <img src="img/soc/facebook.png">
    </a>
    <a href="http://vk.com/bmstuclub">
        <img src="img/soc/vkontakte.png">
    </a>
    <a href="#">
        <img src="img/soc/linkedin.png">
    </a>
</div>
<?php
if ($this->loginform == true && Yii::app()->user->isGuest)
    $this->renderPartial("/site/loginform");
?>

<?php
if (!Yii::app()->user->isGuest)
    $this->renderPartial("/site/rightButtons");
?>
<a class="twitter-timeline" width="220px" style = "margin-bottom:20px;" data-dnt=true href="https://twitter.com/search?q=%23bmstu" data-widget-id="260000825034817536">Твиты о "#bmstu"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



<!--<img src ="http://dummyimage.com/220x700/888/fff&text=twitter">-->
