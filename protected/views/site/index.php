<?php $this->renderPartial('/site/_carusel');?>
<legend>Новости</legend>
<?php $this->renderPartial ('/news/indexNews', array ('news'=>$news)); ?>