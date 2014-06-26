<script src="../../../js/common.js" type="text/javascript"></script>
<script type="text/javascript">
        $( document ).ready(function() {
            var qString= '<?php echo empty($_REQUEST['ClickBy'])? NULL : $_REQUEST['ClickBy'];?>';
            if(readCookie("Invited")==null && qString=='')
            {
                $("#myModal").modal({ backdrop: 'static', keyboard: false,show:false });
                //alert("enter site index==="+document.getElementById('VV').value);
                //alert(document.getElementById('VV').value);
                if(document.getElementById('VV').value!='inviteToEmail'){
                //ajaxRequest("/user/inviteregistration", "",loginPopupCallback,'html');
                $("#modelBodyDiv").load("/user/inviteregistration",{},""); 
                $('#myModal').modal('show');
                }
            }
            if(qString!="SignIn")
            {
                document.getElementById("ModalDiv").style.display = "none";
            }
        });
        function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0)  return c.substring(nameEQ.length,c.length);
	}
	return null;
}
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
    
//$("#reg_div").attr('disabled','disabled');   
</script>


<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="paddinground">
                <div class="span6 paddingB20">
                    
                    <div class="reg_div" id="RegDiv">
                        <div class="paddinground">
                            <h2 class="reg_title">New User Registration</h2>
                            <div id="ModalDiv" style="position: absolute;left:0;right: 0;top:0;bottom: 0;background: #fff;opacity: 0.5;"></div>
                            
                            <div id="registrationSpinLoader" style="top:26px"></div>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'registration-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    )); ?>
                            <?php echo $form->error($model, 'error'); ?>
                            <fieldset>
                                <?php echo $form->hiddenField($model, 'Id'); ?>
                                <input type="hidden" id="VV" value="<?php echo $one;?>" >

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> first name'); ?>
                                <?php echo $form->textField($model, 'FirstName', array('class' => 'span12', 'placeholder' => 'First Name…', 'maxLength' => 50)); ?>
                                <?php echo $form->error($model, 'FirstName'); ?>

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> last name') ?>
                                <?php echo $form->textField($model, 'LastName', array('class' => 'span12', 'placeholder' => 'Last Name…', 'maxLength' => 50)); ?>
                                <?php echo $form->error($model, 'LastName'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> email'); ?></label>
                                <?php echo $form->textField($model, 'Email', array('class' => 'span12', 'placeholder' => 'Email…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($model, 'Email'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> phone'); ?></label><input type="text" value="+91" disabled="disabled" class="span2"/>
                                <?php echo $form->textField($model, 'Phone', array('id' => 'RegistrationForm_Phone', 'class' => 'span10', 'placeholder' => 'Phone…', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                                <?php echo $form->error($model, 'Phone'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> password'); ?></label>
                                <?php echo $form->passwordField($model, 'Password', array('class' => 'span12', 'placeholder' => 'Password…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($model, 'Password'); ?>

                                <label> <?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Repeat Password'); ?></label>
                                <?php echo $form->passwordField($model, 'RepeatPassword', array('class' => 'span12', 'placeholder' => 'Repeat Password…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($model, 'RepeatPassword'); ?>
                                <center>
                                   
                                        <?php
                                        echo CHtml::ajaxButton('Submit', array('user/registration'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            'beforeSend' => 'function(){
                                                             scrollPleaseWait("registrationSpinLoader","registration-form");}',
                                            'success' => 'function(data,status,xhr) { addNewUserhandler(data,status,xhr);}'), array('class' => 'btn btn-primary'));
                                        ?>
                                    
                                    
                                </center>
                            </fieldset>
                           <?php $this->endWidget(); ?>
                            <!--<button type="submit" class="reg_fb"> </button>-->
                        </div>
                    </div>
                </div>
                <div class="span6 paddingB20">
                    <div class="reg_div ">
                        <div class="paddinground">
                            <h2 class="reg_title">Existing User Login</h2>
                            <?php $form1 = $this->beginWidget('CActiveForm', array(
                                  'id' => 'login-form',
                                  'enableClientValidation' => true,
                                  'clientOptions' => array(
                                  'validateOnSubmit' => true,
                                  )
                            ));?>
                            <?php echo $form1->error($modelLogin, 'error', array('class'=>'errorMessageFont')); ?>
                            <fieldset>
                                <?php echo $form1->label($modelLogin, '<abbr title="required">*</abbr> user ID'); ?>
                                <?php echo $form1->textField($modelLogin, 'UserId', array('class' => 'span12', 'placeholder' => 'Email / Phone Number…', 'maxLength' => 100)); ?>
                                <?php echo $form1->error($modelLogin, 'UserId'); ?>

                                <?php echo $form1->labelEx($modelLogin, '<abbr title="required">*</abbr> password'); ?>
                                <?php echo $form1->passwordField($modelLogin, 'Password', array('class' => 'span12', 'placeholder' => 'Password…', 'maxLength' => 100)); ?>
                                <?php echo $form1->error($modelLogin, 'Password'); ?>
                                <center>
                                    
                                    <?php echo CHtml::ajaxButton('Login', array('user/login'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',

                                            'success' => 'function(data,status,xhr) { loginhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?>
                                   
                                    
                                </center>
                                    </fieldset>
                            <?php $this->endWidget(); ?>
                            <!--<button type="submit" class="login_fb"> </button>-->
                              <!-- Button to trigger modal -->
    <center><a href="#myModalforgot" role="button" class="" data-toggle="modal">forgot your password?</a></center>
    
    
    
    <div id="myModalforgot" class="modal fade" id='myModal'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Forgot Password</h3>
    </div>
      <div class="modal-body">
        <?php $form=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'forgot-form',
                                                                'enableClientValidation'=>true,
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); ?>
                                                        <?php echo $form->error($modelSample,'error'); ?>
                                            <div class="logindiv">
                                            <div class="row-fluid">
                                            <div class="span12">
                                              <?php echo $form->label($modelSample,'Email'); ?>
   <?php echo $form->textField($modelSample,'Email', array( 'class'=>'span12','placeholder'=>'Email…')); ?>
   <?php echo $form->error($modelSample,'Email'); ?>
                                             </div>
                                            </div>
                                             
                    <div class="headerbuttonpopup" style="text-align: right">
                        
                        <?php echo CHtml::ajaxButton('Send',array('user/forgot'), array(
            'type' => 'POST',
            'dataType' => 'json',
            'success' => 'function(data,status,xhr) { forgotPasswordhandler(data,status,xhr);}'), array('class'=>'btn btn-primary','type'=>'submit')); ?>

                    </div>
               </div>
<?php $this->endWidget(); ?>
      </div>
      <div class="modal-footer" style="display:none">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
    
    
    
    
    


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

