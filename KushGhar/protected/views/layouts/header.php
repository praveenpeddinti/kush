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
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrapSwitch.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/calendar_autocomplete.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/simplePagination.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5.js" type="text/javascript"></script>
           <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" rel="stylesheet">
        <![endif]-->
        <!-- Fav and touch icons -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"> </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"> </script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrapSwitch.js"> </script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.simplePagination.js"> </script>
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
        
    </head>
    <body>
       
<!-- Popup block Start -->
     <div id='myModal' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class="modal-header">
             <!--<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>-->
             <div class='row-fluid'>
                 <div class='span12'>
                      <center><h3>Thank you for your interest in KushGhar.</h3></center>
                 </div></div>
       </div>
         
         <div class='modal-body'>
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
         
     </div><!-- Popup block End -->
