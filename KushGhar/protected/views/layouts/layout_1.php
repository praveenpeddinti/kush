<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" />
        
        <title>KushGhar</title>
        
        <style type="text/css">
            @media (max-width: 768px) {
    
    .collapse.in{overflow:hidden;float:none}
    .collapse.in .dropdown{float:right;}
   
}
        </style>
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

    <body id="layout_body">

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                    <div class="nav-collapse collapse" id="wholeDivID">
                        <div class="pull-left" id="menusdivId">
                            <div class="row-fluid">
                                <div class="span12">
                                 
                                </div>
                            </div>

                        </div> 

                      



                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
           
    

         

            <!-- registration modal -->
            <div id="registerModal"  class="modal fade">
            <div class="modal-dialog">
            <div class="alert_modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="registerModalLabel" ></h4>
                </div>
             
            </div>
            </div>
                </div>
            
            <!-- Reset modal -->
            <div id="resetModal"  class="modal fade">
            <div class="modal-dialog">
            <div  class="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="resetModalLabel" ></h4>
                </div>
                          
            </div>
            </div>
                </div>
            <!-- end Reset modal -->
            


            <?php echo $content; ?>


            <footer>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span8">

                            <div class="footerlinks"><a href="/user/aboutus" onclick="menuactive('dashboard');">About us </a> |  <a href="/user/news?type=1" onclick="menuactive('dashboard');">News</a>  |  <a href="/user/contactus" onclick="menuactive('dashboard');">Contact Us </a> |  <a onclick="menuactive('dashboard');" href="/user/privacyPolicy">Privacy Policy</a>  |  <a href="/user/termsofService" onclick="menuactive('dashboard');">Terms of Service</a> | <a href="/user/edit" onclick="menuactive('dashboard');">View</a></div>
                            © 2013 - <?php echo date('Y');?> KushGhar</div>
                              
                    </div>
                </div>
            </footer>

        </div> <!-- /container -->

      
       

<script type="text/javascript">
try{
 var trackId = '<?php echo Yii::app()->params['googleTrackId'];?>';
                var pageTracker = _gat._getTracker(trackId);
pageTracker._trackPageview();
} catch(err) {}</script>
    </body>
</html>
