<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;"/>
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.datetimepicker.css" rel="stylesheet"> 
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrapSwitch.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/calendar_autocomplete.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/simplePagination.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/mobiscroll.custom-2.4.4.min.css" rel="stylesheet">
          
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.js" type="text/javascript"></script>
           <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" rel="stylesheet">
        <![endif]-->
        <!-- Fav and touch icons -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.datetimepicker.js"></script>
        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"> </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"> </script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrapSwitch.js"> </script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.simplePagination.js"> </script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mobiscroll.custom-2.4.4.min.js"> </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date.js"></script>
         <script>
            // tooltip demo
            $('.tooltiplink').tooltip({

            })
        </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js"> </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"> </script>
        
        <script src="http://jwpsrv.com/library/lTLXvre_EeKQUxIxOQulpA.js"></script>
        
       

        <!--[if lte IE 9]>
       <style type="text/css">
         .gradient {
            filter: none;
         }
       </style>
     <![endif]-->
        <script>
            var globalspace = new Object();
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-50452416-1', 'kushghar.com');
ga('send', 'pageview');

</script> 
    </head>
    <body>
       
<!-- Popup block Start -->
     <div  class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style="display: none">
         <div class="modal-header">
             <!--<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>-->
            
       </div>
         
         <div class='modal-body'>
             
            
     </div>
         
     </div><!-- Popup block End -->

     
     
     <div class="modal fade" id='myModal'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
         <div class='row-fluid'>
                 <div class='span12'>
                      <center><h3>Thank you for your interest in KushGhar.</h3></center>
                 </div></div>
      </div>
      <div class="modal-body">
        <div class="paddinground">
             <div class='row-fluid'>
                 <div class='span12'>
                     <div class='span3'>
                         <a href='/'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/color_logo.png' alt='logo' class='logo' /></a>
                     </div>
                     <div class='span9'>
                        
             <p class='t_left'>In order to meet all our customers needs we are only taking people by invite at this time.We will send you an email that contains a link to register very soon.
             <br/>If you have a friend who is a member of the KushGhar family, they can invite you today. </p>
                     </div>
                 </div>
                     
             </div>
             <div id='modelBodyDiv' >
                 
             </div>
             </div>
      </div>
      <div class="modal-footer" style="display:none">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id='myModalnews'>
  <div class="modal-dialog" style="width:70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <div class='row-fluid'>
                 <div class='span12'>
                     <div class="span2">
                         <a href='/'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/color_logo.png' alt='logo' class='logo' /></a>
                     </div>
                     <div class="span10">
                         <h3>NDTV published below article about KushGhar on 24<sup>th</sup> June 2014</h3>
                     </div>
                      
                 </div></div>
      </div>
      <div class="modal-body">
        <div class="paddinground">
             
             <div id='modelBodyDiv' >
                 <iframe src="http://gadgets.ndtv.com/internet/features/kushghar-household-help-is-only-a-click-away-547111" style="width:100%;height:600px;border:0"></iframe>
             </div>
             </div>
      </div>
      <div class="modal-footer" style="display:none">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


