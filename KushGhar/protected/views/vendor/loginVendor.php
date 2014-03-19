<script type="text/javascript">

     function addNewUserhandler(data){
        scrollPleaseWaitClose('registrationSpinLoader');
        if(data.status=='success'){
            window.location.href='basicinfo';
        }else{
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }
            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }
            });
        }
    }

    function loginhandler(data){
       
     
        if(data.status=='success'){
            window.location.href='basicinfo';
        }else{
            var error=[];
        
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }
            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $('#error').show();
                    $("#"+key).parent().addClass('error');
                }
            });
        }
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

    function forgotPasswordhandler(data){
        if(data.status=='success'){
            //window.location.href='basicinfo';
            $("#SampleForm_error_em_").show();
            $("#SampleForm_error_em_").removeClass('errorMessage');
            $("#SampleForm_error_em_").addClass('alert alert-success');
            $("#SampleForm_error_em_").text(data.error);
            
        }else{
            var error=[];
           $("#SampleForm_error_em_").removeClass('alert alert-success');
            $("#SampleForm_error_em_").addClass('errorMessage');
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }
            
            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $('#error').show();
                    $("#"+key).parent().addClass('error');
                }
            });
        }
    }
</script>


<div class="container">
     <div class="row-fluid">
       <div class="span12">
       	<div class="paddinground">

        <div class="span6">
        	<div class="reg_div">
            <div class="paddinground">
                    <h2 class="reg_title">Vendor Login</h2>
                        <form>
    <fieldset>

    <label><abbr title="required">*</abbr> User ID</label>
   <input type="text" placeholder="Email / Phone Number…" class="span12">


    <label><abbr title="required">*</abbr> Password</label>
   <input type="password" placeholder="Password…" class="span12">
    <div class="span12 pull-left padding8top lineheight25">
       <a href="#" >forgot your password?</a>
     </div>


    <center>
    <button type="submit" class="btn btn-large">Login</button></center>

    </fieldset>
    </form>
                </div>
            </div>
        </div>
        <div class="span6 paddingT40">
         <form class=" paddingT10 ">
         <fieldset>
         <div class="row-fluid">
         	<div class="span12">
            <center>
               <button type="submit" class="login_fb span12"> </button>
             </center>
            </div>
         </div>
         <div class="row-fluid">
         	<div class="span12 paddingT30">
            <center>
              <div class=" newuser"> New User ?<a href="/vendor/registration"> Register</a> / </div>
                <button class="reg_fb" type="submit"> </button>

    		</center>
            </div>
         </div>

    	</fieldset>
    	</form>
        </div>
        </div>
      </div>
     </div>
   </div>
