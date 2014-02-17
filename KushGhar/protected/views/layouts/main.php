<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>KushGhar</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
<script src="http://jwpsrv.com/library/lTLXvre_EeKQUxIxOQulpA.js"></script>
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" rel="stylesheet">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    	<script src="js/html5.js" type="text/javascript"></script>
       <link href="css/ie.css" rel="stylesheet">
    <![endif]-->
    <!-- Fav and touch icons -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"> </script>
    <script>
    // tooltip demo
    $('.tooltiplink').tooltip({

    })
    </script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js"> </script>
   <!--[if lte IE 9]>
  <style type="text/css">
    .gradient {
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
        
 </header>
<div>
    <section class="slidersection">
   <div class="container">
     <div class="row-fluid">
       <div class="span12">
         <div class="slider">
       <div id="container">


 </div>

         </div>
       </div>
     </div>
     <div class="row-fluid" >
       <div class="span12">
         <div class="easy_steps">
           <div class="easy_steps_title" >Making your home happier is only 3 easy steps</div>
         </div>

       </div>
     </div>
   </div>
 </section>
 <section class="easy_3_steps">
 <div class="container">

 <div >
  <div class="row-fluid" >
  	<div class="span4">
           <a href="/user/registration" class="steps"><p>Getting Started</p></a>
           </div>
           <div class="span4 ">
            <a href="#" class="steps"><p>Getting Started</p></a>
           </div>
           <div class="span4"><a href="#" class="steps"><p>Taking care of you and your family</p></a>
           </div>
       </div>
       </div>
  </div>
 </section>
  <section class="SatisfactionPoints">
  <div class="container">
  <div class="our_services">
   <div class="row-fluid paddingT10" >
   	<div class="span2 left0">
        <div class="services">
            <a href="#" class="housecleaning">
             <span>Cleaning</span>
             <i>&nbsp;&nbsp;&nbsp;</i>
            </a>
        </div>
    </div>

    <div class="span2 left0">
        <div class="services">
            <a href="#" class="gardening">
             <span>Gardening</span>
             <i>&nbsp;&nbsp;&nbsp;</i>
            </a>
        </div>
    </div>

    <div class="span2 left0">
        <div class="services">
            <a href="#" class="laundry">
             <span>Laundry</span>
             <i>&nbsp;&nbsp;&nbsp;</i>
            </a>
        </div>
    </div>

    <div class="span2 left0">
        <div class="services">
            <a href="#" class="driver">
             <span>Driver</span>
             <i> &nbsp;&nbsp;&nbsp;</i>
            </a>
        </div>
    </div>
     <div class="span2 left0">
        <div class="services ">
            <a href="#" class="chef">
             <span>Chef</span>
             <i> &nbsp;&nbsp;&nbsp;</i>
            </a>
        </div>
    </div>
     <div class="span2 left0">
        <div class="services ">
            <a href="#" class="more">

            </a>
        </div>
    </div>

   </div>
   </div>

  <div class="row-fluid">
  <div class="span3" >
  <div class="SatisfactionPoints_img"></div>
  </div>
  <div class="span9">
  <div class=" SatisfactionPoints_list">
  <ul>
    <li>Easy online scheduling</li>
  	<li>100% Satisfaction Guarantee</li>
    <li>Service providers are insured</li>
    <li>Service providers bring all supplies and equipment</li>
   	<li>Service providers are background checked and certified</li>
    </ul>
    </div>

  </div>
  	</div>
  </div>

</section>
 </div>
 
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

<script type="text/javascript">
    jwplayer('container').setup({
        file: 'images/KushgharIntro-360p.mp4',
        width: '100'+"%",
        aspectratio: '10:3',
        height:'250'
    });
</script>

</body>
</html>
