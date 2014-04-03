<footer>
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="footer_links paddingT10">
                    <a href="#">Site Map</a> | <a href="/site/aboutus">About Us</a> | <a href="/site/press">Press</a> | <a href="/site/careers">Careers</a> | <a href="/site/mission">Kushghar's Mission</a> | <a href="/site/termsofService">Terms of Service </a> | <a href="/site/privacyPolicy">Privacy Notice</a>| <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/login">Admin</a>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
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
    var loaderScript = '<div id="loader_'+spinnerId+'" style="z-index: 99999; left:0;right:0; text-align: center; top: 350px;bottom:0; position: absolute;display: none" ><div id="cl_spiral_'+spinnerId+'" class="loader" ><div id="SpinLoader"><img src="/images/spinner.gif"></div></div></div>';
    $("#"+spinnerId).html(loaderScript);
    $("#loader_"+spinnerId).show();

}
/**
 * Description: To hide the spinner after data in loaded
 */
function scrollPleaseWaitClose(spinnerId){
    $("#loader_"+spinnerId).hide();
}


    jwplayer('container').setup({
        file: '/images/KushgharIntro-360p.mp4',
        image : '/images/video_img.png',
        
        width: '100'+"%"
        /*aspectratio: '10:3',
        height:'250'*/
       
    });

    

    



</script>
</body>
</html>
