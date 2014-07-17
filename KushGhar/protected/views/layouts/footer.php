<footer>
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="footer_links paddingT10">
                    <div id="foot" style="display:none">
                        <a href="#" onclick="HomeClick();">Home</a> | <a href="/site/cleaning">Services</a> | <a href="/site/aboutus">About Us</a> | <a href="/site/press">Press</a> | <a href="/site/careers">Careers</a> | <a href="/site/mission">KushGhar's Mission</a> | <a href="/site/termsofService">Terms of Service </a> | <a href="/site/privacyPolicy">Privacy Notice</a>
                    </div>
                    <div id="sitefooter" style="display:none">
                      <a href="#" onclick="HomeClick();">Home</a> | <a href="/site/cleaning">Services</a> | <a href="/site/aboutus">About Us</a> | <a href="/site/press">Press</a> | <a href="/site/careers">Careers</a> | <a href="/site/mission">KushGhar's Mission</a> | <a href="/site/termsofService">Terms of Service </a> | <a href="/site/privacyPolicy">Privacy Notice</a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/login">Admin</a>  
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="row-fluid MarginT" >
                    <div class="span3 social_div paddingT20 " ><a href="https://www.facebook.com/kushghar" target="_blank"><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/fb_icon.png'/></a>  <a href="https://twitter.com/kushghar" target="_blank"><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/twitter_icon.png'/></a></div>
                    <div class="span9" style="position: relative" >
                        <div class="fb_pr_div" ><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fkushghar&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=143691012363705" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;" allowTransparency="true"></iframe>
                        </div>
                        <div class="twitter_follows " style="margin-left:70px;padding-left:20px;padding-right:0">
                            <a href="https://twitter.com/kushghar" class="twitter-follow-button" data-dnt="true">Follow </a>
                            <script>!function(d, s, id) {
                                     var js, fjs = d.getElementsByTagName(s)[0];
                                     if (!d.getElementById(id)) {
                                     js = d.createElement(s);
                                     js.id = id;
                                     js.src = "//platform.twitter.com/widgets.js";
                                     fjs.parentNode.insertBefore(js, fjs);
                                     }
                                     }(document, "script", "twitter-wjs");
                            </script> 
                        </div>  
                    </div>
                </div>
                <div class="copyrights">
                    © <?php echo date('Y'); ?> KushGhar</br>
                    Making people's lives better, one home at a time
                </div>
            </div>
            <div class="span6">
                <div class="contact_info pull-right">
                    <div class="getintouch">
                        Get in touch
                        <p style=" margin-top:5px">1-800-3070-6959</p>
                        <p>helpme@kushghar.com</p>
                        <p style="font-family: MuseoSlab500;font-size:10px;color:#FFF;font-weight: normal">Our services are currently available in Hyderabad. Launching Nationwide soon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<style type="text/css">
   .gsc-control-cse{ background-color: transparent;
    border-color: transparent;}


.cse .gsc-control-cse, .gsc-control-cse {
    border-radius:0px;
    padding: 0px;
   
}
.gsc-search-box-tools .gsc-search-box .gsc-input {
    padding-right: 0px;
}
input.gsc-search-button {
    margin-left: 0px;margin-top: 0px;
}
input.gsc-search-button, input.gsc-search-button:hover, input.gsc-search-button:focus {
    background-color: #EAEAEA;
    background-image: none;
    border-color: #CCCCCC;
    filter: none;
}
.cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
    
    padding: 11px 11px;
    border-radius:0px 10px 10px 0;
}

.gsib_a {
    padding: 0px;
    
}

.gsc-input-box {
    border-radius:10px 0px 0px 10px;
    border: 1px solid #CCCCCC;
    height: 25px;
    padding: 10px 0px 0 10px;
width:136px
}

input.gsc-input{height:30px}
.gsst_a {
    padding: 0px;
}
input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus{box-shadow: 0 0px 0px rgba(0, 0, 0, 0.075) inset;}
input[type="text"]:focus{box-shadow: 0 0px 0px rgba(0, 0, 0, 0.075) inset, 0 0 0px rgba(82, 168, 236, 0.6)}
input.gsc-input {
   
    font-size: 15px;
   
}
    </style>
<script type="text/javascript">
    try {
        var trackId = '<?php echo Yii::app()->params['googleTrackId']; ?>';
        var pageTracker = _gat._getTracker(trackId);
        pageTracker._trackPageview();
    } catch (err) {
    }</script>
<script type="text/javascript">
    /**
     * Description: To show the spinner when button is submit
     */

    function scrollPleaseWait(spinnerId, divId) {
        if (spinnerId == 'inviteSpinLoader') {
            var loaderScript = '<div id="loader_' + spinnerId + '" style="z-index: 99999; left:0;right:0; text-align: center; top: 85px;bottom:0; position: absolute;display: none" ><div id="cl_spiral_' + spinnerId + '" class="loader" ><div id="SpinLoader"><img src="/images/spinner.gif"></div></div></div>';
        } else {
            var loaderScript = '<div id="loader_' + spinnerId + '" style="z-index: 99999; left:0;right:0; text-align: center; top: 150px;bottom:0; position: absolute;display: none" ><div id="cl_spiral_' + spinnerId + '" class="loader" ><div id="SpinLoader"><img src="/images/spinner.gif"></div></div></div>';
        }
        $("#" + spinnerId).html(loaderScript);
        $("#loader_" + spinnerId).show();
    }
    /**
     * Description: To hide the spinner after data in loaded
     */
    function scrollPleaseWaitClose(spinnerId) {
        $("#loader_" + spinnerId).hide();
    }
    function HomeClick()
    {
        var sess= '<?php echo $this->session['Type']; ?>';
        if(sess=='Customer'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/user/homeService';
        }
        else if(sess=='Admin'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard';
        }
        else if(sess=='Vendor'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/vendor/vendorBasicInformation';
        }
        else{
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/site/index';
        }
    }
    $(document).ready(function() { 
    var sess= '<?php echo $this->session['UserId']; ?>';
    if(sess=='')
    {
        document.getElementById('sitefooter').style.display='block';
        document.getElementById('foot').style.display='none';
    }
    else
    {
        document.getElementById('sitefooter').style.display='none';
        document.getElementById('foot').style.display='block';
    }
    });
</script>
</body>
</html>