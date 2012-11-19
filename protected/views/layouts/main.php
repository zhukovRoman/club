<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Le styles -->
            <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/mystyle.css" rel="stylesheet">

                    <?php Yii::app()->getClientScript()->registerCoreScript('jquery.js', CClientScript::POS_HEAD); ?>
                    <?php //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.js', CClientScript::POS_HEAD); ?>
                    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/bootstrap.js', CClientScript::POS_HEAD); ?>


<!--<script type="text/javascript" src="js/bootstrap.js"></script>
                    <script type="text/javascript" src="js/cssrefresh.js"></script>--> 
                    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
                    </head>

                    <body>
                        <div class="container wrap content-border" >
                            <!--        <div class="row" style="margin:0px">
                                        <div class="span12" style="margin: 0px; ">
                                            <img src="img/top.jpg" class='span12 content-border' style="margin: 0px; ">
                                        </div>
                                    </div>-->
                            <div class ="row">
                                <div class ="span12">
                                    <?php $this->renderPartial("/site/navbar"); ?>
                                </div>
                            </div>
                            <div class="row content-row" >
                                <div class="span3 sidebar">
                                    <?php $this->renderPartial("/site/sidebar"); ?>
                                </div>
                                <div class="span9 mainspan">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                            <div style="clearfix"></div>
                            <div class="row">
                                <div class="span12 footer">
                                    <?php $this->renderPartial("/site/footer"); ?>
                                </div>
                            </div>

                        </div>

                    </body>
                    </html>
