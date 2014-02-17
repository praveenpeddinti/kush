<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="language" content="en" />
<meta name="description" content="" />
<meta name="author" content="" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    	<script src="js/html5.js" type="text/javascript"></script>
       <link href="css/ie.css" rel="stylesheet">
    <![endif]-->
    <!-- Fav and touch icons -->
     
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"> </script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js"> </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajaxfileupload.js"> </script>
    

   
  
   <!--[if lte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
  <!--[if gte IE 9]>
 <style type="text/css">
  .navbar-inner, .navbar-inverse .navbar-inner {
      filter: none;
   }
 </style>
<![endif]-->


<!--[if gte IE 8]>
 <style type="text/css">
   .navbar-inner, .navbar-inverse .navbar-inner {
      filter: none;
   }
 </style>
<![endif]-->
</head>
<body>
<header class="inner_header">
	<div class="container">
    	<div class="row-fluid">
            <div class="span3">
                <a href="http://localhost:6060"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>   
            </div>
         </div>
    </div>
  </header>
<section>
    
    <div id="container">
<?php echo $content; ?></div>
   
</section>
<footer>
	<div class="container">
    <div class="row-fluid">
    	<div class="span12">
        <div class="footer_links paddingT10">
          <a href="#">Site Map</a> | <a href="/user/aboutus">About Us</a> | <a href="#">Press</a> | <a href="#">Careers</a> | <a href="#">Kushghar's Mission</a> | <a href="/user/termsofService">Terms of Service </a> | <a href="/user/privacyPolicy">Privacy Notice</a>
          </div>
        </div>
    </div>
     	<div class="row-fluid">
    	<div class="span6">
        	<div class="copyrights">
            © 2014 KushGhar </br>
Making peoples lives better, one home at a time
            </div>
        </div>
        <div class="span6">
        	<div class="contact_info pull-right">
             <div class="getintouch">
             Get in touch
             <p style=" margin-top:5px">040 234 56789</p>
			 <p>helpme@kushghar.com</p>
             </div>
            </div>
            </div>
            </div>
      </div>
</footer>




    <script type="text/javascript">
        try{
            var trackId = '<?php echo Yii::app()->params['googleTrackId']; ?>';
            var pageTracker = _gat._getTracker(trackId);
            pageTracker._trackPageview();
        } catch(err) {}</script>
</body>
</html>
