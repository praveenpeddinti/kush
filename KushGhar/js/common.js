
function ajaxRequest(url, queryString,callback,dataType,beforeSendCallback) {
    var data = queryString;
    if(dataType==null || dataType==undefined){
        dataType = "json";
    }
    $.ajax({
        dataType: dataType,
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function(data) { 
            if(callback!=null && callback!=undefined){
            callback(data);
            }
        },
        error: function(data) {            
            //alert('in error==='+data.toSource());
        },
         beforeSend: function() {
             if(beforeSendCallback!=null && beforeSendCallback!=undefined){
                   beforeSendCallback();
             }
            }
    });
}
    function homePage(){
        window.location.href='/site/index';
    } 
    function isNumberKey(evt)
    {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;
        if (charCode > 31 && (charCode < 45 || charCode > 57 ) )
            return false;
        if (e.shiftKey) return false;
            return true;
    }