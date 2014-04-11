<script type="text/javascript">
        $( document ).ready(function() {
            $("#myModal").modal({ backdrop: 'static', keyboard: false,show:false });
//alert("enter site index==="+document.getElementById('VV').value);
 //alert(document.getElementById('VV').value);
 if(document.getElementById('VV').value!='inviteToEmail')
        $('#myModal').modal('show');
        

});



     function inviteCustomershandler(data){//alert("enter site index==="+data.status);
        scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status=='success'){//alert("success==="+data.error);
            $("#InviteForm_error_em_").show();
            $("#InviteForm_error_em_").removeClass('errorMessage');
            $("#InviteForm_error_em_").addClass('alert alert-success');
            $("#InviteForm_error_em_").text(data.error);
            $("#InviteForm_error_em_").fadeOut(6000, "");
            window.location.href='/';
            
        }else{//alert("else");alert("error==="+data.error);
            var error=[];
            
            $("#InviteForm_error_em_").removeClass('alert alert-success');
            $("#InviteForm_error_em_").addClass('errorMessage');
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
    
    function homePage(){
        window.location.href=<?php echo Yii::app()->request->baseUrl; ?>'/site/index';
    }
</script>


<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="paddinground">
                <div class="span6 paddingB20">
                    <div class="reg_div">
                        <div class="paddinground">
                            <h2 class="reg_title">New User Registration</h2>
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

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> phone'); ?></label>
                                <?php echo $form->textField($model, 'Phone', array('id' => 'RegistrationForm_Phone', 'class' => 'span12', 'placeholder' => 'Phone…', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
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
                                    
                                    <!--<button type="submit" class="reg_fb"> </button>-->
                                </center>
                            </fieldset>
                           <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
                <div class="span6 paddingB20">
                    <div class="reg_div ">
                        <div class="paddinground">
                            <h2 class="reg_title">Existing User Login</h2>
                            <?php $form = $this->beginWidget('CActiveForm', array(
                                  'id' => 'login-form',
                                  'enableClientValidation' => true,
                                  'clientOptions' => array(
                                  'validateOnSubmit' => true,
                                  )
                            ));?>
                            <?php echo $form->error($modelLogin, 'error', array('class'=>'errorMessageFont')); ?>
                            <fieldset>
                                <?php echo $form->label($modelLogin, '<abbr title="required">*</abbr> user ID'); ?>
                                <?php echo $form->textField($modelLogin, 'UserId', array('class' => 'span12', 'placeholder' => 'Email / Phone Number…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($modelLogin, 'UserId'); ?>

                                <?php echo $form->labelEx($modelLogin, '<abbr title="required">*</abbr> password'); ?>
                                <?php echo $form->passwordField($modelLogin, 'Password', array('class' => 'span12', 'placeholder' => 'Password…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($modelLogin, 'Password'); ?>
                                <center>
                                    
                                    <?php echo CHtml::ajaxButton('Login', array('user/login'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',

                                            'success' => 'function(data,status,xhr) { loginhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?>
                                   
                                    <!--<button type="submit" class="login_fb"> </button>-->
                                </center>
                                    </fieldset>
                            <?php $this->endWidget(); ?>

                              <!-- Button to trigger modal -->
    <center><a href="#myModalforgot" role="button" class="" data-toggle="modal">forgot your password?</a></center>

    <!-- Modal -->
    <div id="myModalforgot" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    <!--<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
    </div>-->
    </div><!-- button forgot-->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popup block Start -->
     <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-header">
             <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
             <div class="row-fluid">
                 <div class="span12">
                      <center><h3>Thank you for your interest in KushGhar.</h3></center>
                 </div></div>
                 <div class="row-fluid">
                 <div class="span12">
                     <div class="span3">
                         <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/color_logo.png" alt="logo" class="logo" /></a>
                     </div>
                     <div class="span9">
                        
             <p class="t_left">In order to meet all our customers needs we are only taking people by invite at this time.We will send you an email that contains a link to register very soon.
             <br/>If you have a friend who is a member of the KushGhar family, they can invite you today. </p>
                     </div>
                 </div>
                     
             </div>
             
             
             
         </div>
         <div id="inviteSpinLoader"></div>
         <div class="modal-body">
             <?php $form=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'invite-form',
                                                                'enableClientValidation'=>true,
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); ?>
                                                        
                                            <?php echo $form->error($inviteModel, 'error'); ?>
             
             <?php echo $form->hiddenField($inviteModel,'InviteType', array('value'=>'0')); ?>
             <div class="row-fluid">
                                            <div class="span12">
                                              <?php echo $form->label($inviteModel,'<abbr title="required">*</abbr> Email'); ?>
   <?php echo $form->textField($inviteModel,'Email', array( 'class'=>'span12','placeholder'=>'Email…')); ?>
   <?php echo $form->error($inviteModel,'Email'); ?>
                                             </div>
                                                
                                            </div>
        
            
         <div style="text-align: right">
             <?php echo CHtml::ajaxButton('Request an Invite',array('user/invite'), array(
            'type' => 'POST',
            'dataType' => 'json',
            'beforeSend' => 'function(){
                             scrollPleaseWait("inviteSpinLoader","invite-form");}',
            'success' => 'function(data,status,xhr) { inviteCustomershandler(data,status,xhr);}'), array('class'=>'btn btn-primary','type'=>'submit')); ?>

           <button class="btn btn-primary" onclick="homePage();">Home</button>
         </div>
            
             <?php $this->endWidget(); ?>
            
     </div>
     </div><!-- Popup block End -->
