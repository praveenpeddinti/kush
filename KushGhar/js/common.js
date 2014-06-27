
    

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


function inviteMail() {
        scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#invite-form").serialize();
         ajaxRequest('/user/inviteregistration', data, inviteMailHandler)
        
}





function inviteMailHandler(data)
    { scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status =='success'){
            document.cookie="Invited=Invite";
            $("#InviteForm_error_em_").show(1000);
                    $("#InviteForm_error_em_").removeClass('errorMessage');
                    $("#InviteForm_error_em_").addClass('alert alert-success');
                    $("#InviteForm_error_em_").text(data.error);
                    $("#InviteForm_error_em_").fadeOut(20000, "");
                    window.location.href = '/';
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#InviteForm_error_em_").removeClass('alert alert-success');
            $("#InviteForm_error_em_").addClass('errorMessage');
            if(typeof(data.error)== 'string') {

                    var error = eval("(" + data.error.toString() + ")");

                } else {

                    var error = eval(data.error);
                }


                $.each(error, function(key, val) {
                    if ($("#" + key + "_em_")) {
                        $("#"+key+"_em_").text(val);
                        $("#"+key+"_em_").show();
                        $("#"+key).parent().addClass('error');
                       
                    }

                });
            }
            
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