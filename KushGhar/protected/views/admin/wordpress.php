
<div id="adminLayoutContent" class="row-fluid">

<!--    <div class="alert alert-info" id="notification">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Notification Pending!</strong> Hope you like the theme!
    </div>-->

    <div id="adminContent">
        
    </div>
</div>

<script type="text/javascript">
    
    getWordPressData(<?php echo $data;?>);
    
 
    
    function getWordPressData(data){
    
        scrollPleaseWait();
        $('#adminContent').html(data.status)
        $('#adminLayoutTitle').html("<i class='icon-wordpress48'></i>Content Management");
         scrollPleaseWaitClose();
       // resizeFrame(document.getElementById('wordpressIframe')) 
   
    }
     $('a[href="#setup-menu"]').trigger('customCollapse',['toggle=collapse']);
     $('a[href="/admin/wordpress"]').addClass('aactive');

/*to get iframe height dynamically-Suresh Reddy*/

function getDocHeight(doc) {
    

doc = doc || document || body;
var height =600;
if(doc){
    try{

var body = doc.body, html = doc.documentElement;
 height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    }catch(err){
      height=600;  
    }
}else{
    height=600;
}
return height;
}

function setIframeHeight(id) {
   

var ifrm = document.getElementById(id);
var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;

ifrm.style.visibility = 'visible';
ifrm.style.height = "500px"; // reset to minimal height in case going from longer to shorter doc







var i_height=1200;
try{
    i_height=getDocHeight( doc );
}catch(err){
   
   i_height=1200;  
}

ifrm.style.height =i_height + 5+"px";
ifrm.style.visibility = 'visible';
}

    </script>
