<script type="text/javascript">
    function addNewUserhandler(data){
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
                            <h2 class="reg_title">Registration</h2>
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

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> first name', array('class' => 'span12')); ?>
                                <?php echo $form->textField($model, 'FirstName', array('class' => 'span12', 'placeholder' => 'First Name…')); ?>
                                <?php echo $form->error($model, 'FirstName'); ?>

                                <?php echo $form->label($model, '<abbr title="required">*</abbr> last name', array('class' => 'span12')) ?>
                                <?php echo $form->textField($model, 'LastName', array('class' => 'span12', 'placeholder' => 'Last Name…')); ?>
                                <?php echo $form->error($model, 'LastName'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> email'); ?></label>
                                <?php echo $form->textField($model, 'Email', array('class' => 'span12', 'placeholder' => 'Email…')); ?>
                                <?php echo $form->error($model, 'Email'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> phone'); ?></label>
                                <?php echo $form->textField($model, 'Phone', array('id' => 'RegistrationForm_Phone', 'class' => 'span12', 'placeholder' => 'Phone Number…', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                                <?php echo $form->error($model, 'Phone'); ?>

                                <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> password'); ?></label>
                                <?php echo $form->passwordField($model, 'Password', array('class' => 'span12', 'placeholder' => 'Password…')); ?>
                                <?php echo $form->error($model, 'Password'); ?>

                                <label> <?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Repeat Password'); ?></label>
                                <?php echo $form->passwordField($model, 'RepeatPassword', array('class' => 'span12', 'placeholder' => 'Repeat Password…')); ?>
                                <?php echo $form->error($model, 'RepeatPassword'); ?>
                                <center>
                                   
                                        <?php
                                        echo CHtml::ajaxButton('Submit', array('user/registration'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            'success' => 'function(data,status,xhr) { addNewUserhandler(data,status,xhr);}'), array('class' => 'btn btn-large'));
                                        ?>
                                    
                                    <button type="submit" class="reg_fb"> </button>
                                </center>
                            </fieldset>
                           <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="reg_div">
                        <div class="paddinground">
                            <h2 class="reg_title">Login</h2>
                            <?php $form = $this->beginWidget('CActiveForm', array(
                                  'id' => 'login-form',
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
                                <center>
                                    
                                    <?php echo CHtml::ajaxButton('Login', array('user/login'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            'success' => 'function(data,status,xhr) { loginhandler(data,status,xhr);}'), array('class' => 'btn btn-large', 'type' => 'submit'));
                                    ?>
                                   
                                    <button type="submit" class="login_fb"> </button></center>
                                    </fieldset>
                            <?php $this->endWidget(); ?>

                              <!-- Button to trigger modal -->
    <center><a href="#myModal" role="button" class="" data-toggle="modal">forgot your password?</a></center>

    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
