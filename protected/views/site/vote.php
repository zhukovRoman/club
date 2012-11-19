
<div id="result">
    Эту идею поддержало: 
    <?php echo " <span id='cnt'>".Votes::getCount($vote_id)."</span>"; ?>
</div>  
<?php
if ((!Yii::app()->user->isGuest) && !Votes::alreadyVote($vote_id)) {

    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'warning',
        'label' => 'Поддержать идею!',
        'url' => '#',
        
        'htmlOptions' => array('onClick' => "js:vote('$vote_id')",'id'=>'vote_btn',),
    ));
}
?>
<script type="text/javascript" src="js/noty/jquery.noty.js"></script>

<script type="text/javascript" src="js/noty/layouts/top.js"></script>



<script type="text/javascript" src="js/noty/themes/default.js"></script>
<script>
    function vote(id)
    {
         
       
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('site/vote'); ?>",
            data: "vote_id="+id,
            success: function(data) {    
                var resp = $.parseJSON(data);
                if (resp.status=='error')
                {
                   notify('Произошла ошибка! Попробуйте позже!', 'error');
                }
                else 
                {
                    notify('Ваш голос принят!', 'success');
                    $("#vote_btn").hide();
                    $cnt = parseInt($("#cnt").text());
                    $("#cnt").text($cnt+1);
                }
                
            }
        });
    }
    // Настройка noty
    function notify(text, type) {
        var n = noty({
            text: text,
            type: type,
            dismissQueue: true,
            layout: 'top',
            theme: 'default',
            timeout: 5000
        });
    }
    
   
</script>