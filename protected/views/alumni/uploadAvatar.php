<? $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('alumni/upload'),
               'allowedExtensions'=>array("jpg", "jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>5*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10*1024,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ showimages(responseJSON.filename); }",
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               //'showMessage'=>"js:function(message){ alert(message); }"
              )
)); ?>
<script>
function showimages (path)
{
    var end = path.indexOf('.');
   var src = path.substr(0, end);
   var ext = path.substr(end);
   
   $("#full-avatar").attr('src',src+'_250'+ext);
   $("#crop-avatar").attr('src',src+'_100'+ext);
   $("#preview").show();
   
}
</script>
<div id="preview" class="hide preview-block">
<img src="" id="full-avatar" class="avatar-preview content-border" width="250" height="250"> 
<img src='' id="crop-avatar" class="avatar-preview content-border" width="100" height="100">
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    
    'type' => 'info',
    'label' => 'Сохранить',
    'size' => 'small',
    'url'=>Yii::app()->createUrl('alumni/profile'),
    'htmlOptions' => array('class' => 'pull-right right-button ')
));
?>
</div>