    <footer>
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="footer_links paddingT10">
                    <a href="#">Site Map</a> | <a href="/site/aboutus">About Us</a> | <a href="/site/press">Press</a> | <a href="/site/careers">Careers</a> | <a href="/site/mission">KushGhar's Mission</a> | <a href="/site/termsofService">Terms of Service </a> | <a href="/site/privacyPolicy">Privacy Notice</a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/login">Admin</a>
                </div>
            </div>
            
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="row-fluid">
                   <div class="fb_pr_div span2" >
                       <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fkushghar&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=143691012363705" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;" allowTransparency="true"></iframe>
                     </div>
                     <div class="twitter_follows span6">
                     <a href="https://twitter.com/kushghar" class="twitter-follow-button" data-dnt="true">Follow </a>
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
                     </div>
                    <div class="span3 social_div paddingT20 " ><a href="https://www.facebook.com/kushghar" target="_blank"><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/fb_icon.png'/></a>  <a href="https://twitter.com/kushghar"><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/twitter_icon.png'/></a></div>
                  
                </div>
                
                    <div class="copyrights">
                        
                    © <?php echo date('Y');?> KushGhar</br>
                    Making people's lives better, one home at a time
                </div>
               
             
            </div>
            <div class="span6">
                <div class="contact_info pull-right">
                    <div class="getintouch">
                        Get in touch
                        <p style=" margin-top:5px">040 233 52575</p>
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


/**
 * Description: To show the spinner when button is submit
 */

function scrollPleaseWait(spinnerId, divId){
   if(spinnerId=='inviteSpinLoader'){
    var loaderScript = '<div id="loader_'+spinnerId+'" style="z-index: 99999; left:0;right:0; text-align: center; top: 85px;bottom:0; position: absolute;display: none" ><div id="cl_spiral_'+spinnerId+'" class="loader" ><div id="SpinLoader"><img src="/images/spinner.gif"></div></div></div>';
       
   }else{
    var loaderScript = '<div id="loader_'+spinnerId+'" style="z-index: 99999; left:0;right:0; text-align: center; top: 350px;bottom:0; position: absolute;display: none" ><div id="cl_spiral_'+spinnerId+'" class="loader" ><div id="SpinLoader"><img src="/images/spinner.gif"></div></div></div>';
    }
    $("#"+spinnerId).html(loaderScript);
    $("#loader_"+spinnerId).show();

}
/**
 * Description: To hide the spinner after data in loaded
 */
function scrollPleaseWaitClose(spinnerId){
    $("#loader_"+spinnerId).hide();
}

   

    

    



</script>
</body>
</html>
