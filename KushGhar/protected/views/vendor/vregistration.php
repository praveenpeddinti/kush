<script type="text/javascript">

     function addNewVendorhandler(data){
        scrollPleaseWaitClose('vendorRegistrationSpinLoader');
        if(data.status=='success'){
            window.location.href='vendorBasicInformation';
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

    function vendorloginhandler(data){
       
     
        if(data.status=='success'){
            window.location.href='vendorBasicInformation';
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

    /*function forgotPasswordhandler(data){
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
    }*/

    function validate_dropdown(id)
    {
        
        if(id==1){
            document.getElementById('Individual').style.display='block';
            document.getElementById('Agency').style.display='none';
        }
        else{
            document.getElementById('Agency').style.display='block';
            document.getElementById('Individual').style.display='none';
        }
       
    }
</script>


<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="paddinground">
                <div class="span6 paddingB20">
                    <div class="reg_div">
                        <div class="paddinground">
                            <h2 class="reg_title">Vendor Registration</h2>
                            <div id="vendorRegistrationSpinLoader"></div>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'vregistration-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    )); ?>
                            <?php echo $form->error($model, 'error'); ?>
                            <fieldset>
                                <?php //echo $form->hiddenField($model, 'Id'); ?>

                                <?php echo $form->label($model, 'Vendor Type'); ?>
                                <?php //echo $form->dropDownList($model,'vendorType', array('Individual' => 'Individual', 'Agency' => 'Agency' ,'onchange'=>'js:validate_dropdown(this.value)', 'class' => 'span12'));?>
                                <?php echo $form->dropDownList($model, 'vendorType', array('1' => 'Individual', '2' => 'Agency'), array('onchange'=>'validate_dropdown(this.value)','class' => 'span12'));?>
                                <?php echo $form->error($model,'vendorType'); ?>
                                <div id="Individual" style="display:block">
                                <?php echo $form->label($model, '<abbr title="required">*</abbr> first name'); ?>
                                <?php echo $form->textField($model, 'FirstName', array('class' => 'span12', 'placeholder' => 'First Name…')); ?>
                                <?php echo $form->error($model, 'FirstName'); ?>

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> last name') ?>
                                <?php echo $form->textField($model, 'LastName', array('class' => 'span12', 'placeholder' => 'Last Name…')); ?>
                                <?php echo $form->error($model, 'LastName'); ?>

                                
                                </div>
                                <div id="Agency" style="display:none">
                                <?php echo $form->label($model, '<abbr title="required">*</abbr> Agency Name'); ?>
                                <?php echo $form->textField($model, 'AgencyName', array('class' => 'span12', 'placeholder' => 'Agency Name…')); ?>
                                <?php echo $form->error($model, 'AgencyName'); ?>

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> Primary Contact First Name') ?>
                                <?php echo $form->textField($model, 'PrimaryContactFirstName', array('class' => 'span12', 'placeholder' => 'First Name…')); ?>
                                <?php echo $form->error($model, 'PrimaryContactFirstName'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Primary Contact Last Name'); ?></label>
                                <?php echo $form->textField($model, 'PrimaryContactLastName', array('class' => 'span12', 'placeholder' => 'Last Name…')); ?>
                                <?php echo $form->error($model, 'PrimaryContactLastName'); ?>
                                </div>
                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> email'); ?></label>
                                <?php echo $form->textField($model, 'Email', array('class' => 'span12', 'placeholder' => 'Email…')); ?>
                                <?php echo $form->error($model, 'Email'); ?>
                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> phone'); ?></label>
                                <?php echo $form->textField($model, 'Phone', array('class' => 'span12', 'placeholder' => 'Phone Number…', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                                <?php echo $form->error($model, 'Phone'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> password'); ?></label>
                                <?php echo $form->passwordField($model, 'Password', array('class' => 'span12', 'placeholder' => 'Password…')); ?>
                                <?php echo $form->error($model, 'Password'); ?>

                                <label> <?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Repeat Password'); ?></label>
                                <?php echo $form->passwordField($model, 'RepeatPassword', array('class' => 'span12', 'placeholder' => 'Repeat Password…')); ?>
                                <?php echo $form->error($model, 'RepeatPassword'); ?>
                                <center>
                                   
                                        <?php
                                        echo CHtml::ajaxButton('Submit', array('vendor/vregistration'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            'beforeSend' => 'function(){
                                                             scrollPleaseWait("vendorRegistrationSpinLoader","vregistration-form");}',
                                            'success' => 'function(data,status,xhr) { addNewVendorhandler(data,status,xhr);}'), array('class' => 'btn btn-primary'));
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
                            <h2 class="reg_title">Vendor Login</h2>
                            <?php $form = $this->beginWidget('CActiveForm', array(
                                  'id' => 'vendorLogin-form',
                                  'enableClientValidation' => true,
                                  'clientOptions' => array(
                                  'validateOnSubmit' => true,
                                  )
                            ));?>
                            <?php echo $form->error($modelLogin, 'error'); ?>
                            <fieldset>
                                <?php echo $form->label($modelLogin, 'user ID', array('class' => 'span12')); ?>
                                <?php echo $form->textField($modelLogin, 'UserId', array('class' => 'span12', 'placeholder' => 'Email / Phone Number…')); ?>
                                <?php echo $form->error($modelLogin, 'UserId'); ?>

                                <?php echo $form->labelEx($modelLogin, 'password'); ?>
                                <?php echo $form->passwordField($modelLogin, 'Password', array('class' => 'span12', 'placeholder' => 'Password…')); ?>
                                <?php echo $form->error($modelLogin, 'Password'); ?>
                                
                                <div class="row-fluid paddingT10">
                                    <div class="span6">
                                        <?php echo $form->label($modelLogin, 'Vendor type'); ?>
                                        <div class="switch switch-large" id="VendorType" data-on-label="Individual" data-off-label="Agency">
                                        <?php echo $form->checkBox($modelLogin, 'VendorType'); ?>
                                        </div>
                                       
                                    </div>
                                 
                                   
                                </div>

                                <center>

                                    <?php echo CHtml::ajaxButton('Login', array('vendor/login'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',

                                            'success' => 'function(data,status,xhr) { vendorloginhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?>

                                    <!--<button type="submit" class="login_fb"> </button>-->
                                </center>
                                    </fieldset>
                            <?php $this->endWidget(); ?>

                             
    

    


                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>