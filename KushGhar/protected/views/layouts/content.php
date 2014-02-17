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
<title>KushGhar</title>
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    	<script src="js/html5.js" type="text/javascript"></script>
       <link href="css/ie.css" rel="stylesheet">
    <![endif]-->
    <!-- Fav and touch icons -->

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"> </script>

   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js"> </script>
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
<header>
	<div class="container">
    	<div class="row-fluid">
        	<div class="span12">
            <!--header logo start-->
            	<div class="span3">
                	<a href="http://localhost:6060"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/top_logos.png" alt="logo" class="logo" /></a>
                </div>
             <!--header logo end -->
             <!--h_right start -->
            	<div class="span9">
                	<div class=" mobilerightclear">
                   		<div class="header_contact_info pull-right">
                        	<ul>
                            	<li class="phone">040 234 56789</li>
                                <li class="email">helpme@kushghar.com</li>
                            </ul>
                        </div>
                        </div>
                        	<div class="header_menu_items">
                           <ul role="navigation" class="nav">
                            	<li class="dropdown ">
                                	<div class="btn-group">
                                	<button class="btn btn-large dropdown-toggle getaService_dd" data-toggle="dropdown">														   									Get a Service <span class="caret">&nbsp;</span>
								 	</button>
                                    <div class="dropdown-menu getStarted_dd_div " role="menu" aria-labelledby="dLabel">
                                         <div class="headerpoptitle">Sevices</div>
                                         <ul>
                                            <li><a href="#" >Sevice 1</a></li>
                                            <li><a href="#" >Sevice 2</a></li>
                                            <li><a href="#" >Sevice 3</a></li>
                                            <li><a href="#" >Sevice 4</a></li>
                                            <li><a href="#" >Sevice 5</a></li>
                                            <li><a href="#" >Sevice 6</a></li>
                                        </ul>
                                    </div>
                               		</div>
 							    </li>
                                <li class="mobilemiddle">
                                	<div class="input-append search">
    									<input class="serachInput" id="appendedInputButton" type="text" placeholder="Search...">
   										<button class="btn btn-large btn-search" type="button"><i class="fa fa-search"></i></button>
    								</div>
                                </li>
                                <li class="dropdown ">
                                	<div class="btn-group">

                                        <button class="btn btn-large dropdown-toggle Login_button" data-toggle="dropdown">
                                           Login <span class="caret">&nbsp;</span>
                                        </button>
                               				<div class="dropdown-menu Login_dd_div " role="menu" aria-labelledby="dLabel">
                                            <form style="margin: 0px" accept-charset="UTF-8" action="/sessions" method="post">
                                            <div class="headerpoptitle">Login</div>
                                            <div class="logindiv">
                                            <div class="row-fluid">
                                            <div class="span12">
                                              <label>User ID</label>
                                           <input  type="text"   class="span12 email " />
                                             </div>
                                            </div>
                                             <div class="row-fluid">
                                            <div class="span12">
                                               <label>Password</label>
                                                    <input  type="password"   class="span12 pwd " />
                                               </div>
                                            </div>
                    <div class="headerbuttonpopup">
                        <div class="pull-left padding8top lineheight25">
                           <a href="#">forgot your password?</a>
                        </div>
                        <input class="btn btn-2 btn-2a pull-right" name="commit" type="submit" value="Login" />
                    </div>
               </div>
             </form>
                                            </div>

                                            </div>

                                </li>
                            </ul>


                            </div>
                        </div>
                    </div>
                </div>
             <!--h_right end -->

            </div>
        </div>
     </div>
 </header>
<div id="container">

    <?php echo $content; ?></div>

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
