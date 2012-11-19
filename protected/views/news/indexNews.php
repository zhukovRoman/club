<?php 
    foreach ($news as $new)
        $this->renderPartial ('/news/_item', array ('model'=>$new));
?>
