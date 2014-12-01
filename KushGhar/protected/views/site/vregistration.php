<script type="text/javascript">

    function inviteCustomershandler(data) {
        //scrollPleaseWaitClose('registrationSpinLoader');
        if (data.status == 'success') {
            $("#InviteForm_error_em_").show();
            $("#InviteForm_error_em_").removeClass('errorMessage');
            $("#InviteForm_error_em_").addClass('alert alert-success');
            $("#InviteForm_error_em_").text(data.error);
            $("#InviteForm_error_em_").fadeOut(6000);
             setTimeout(function() {
	      window.location.href = '/';
	    }, 3000);
            
        } else {
            var error = [];
            $("#InviteForm_error_em_").removeClass('alert alert-success');
            $("#InviteForm_error_em_").addClass('errorMessage');
            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }
    function addNewVendorhandler(data) {
        scrollPleaseWaitClose('vendorRegistrationSpinLoader');
        if (data.status == 'success') {
            $("#VendorRegistrationForm_error_em_").show();
            $("#VendorRegistrationForm_error_em_").removeClass('errorMessage');
            $("#VendorRegistrationForm_error_em_").addClass('alert alert-success');
            $("#VendorRegistrationForm_error_em_").text("Vendor registered successfully");
            $("#VendorRegistrationForm_error_em_").fadeOut(6000);
            setTimeout(function() {
	      window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/site/index';
	    }, 3000);
        } else {
            var error = [];
            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }

    function vendorloginhandler(data) {
        if (data.status == 'success') {
            window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/vendor/vendorBasicInformation';
            
        } else {
            var error = [];
            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $('#error').show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }

    function isNumberKey(evt) {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;
        if (charCode > 31 && (charCode < 45 || charCode > 57))
            return false;
        if (e.shiftKey)
            return false;
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

    function validate_dropdown(id) {
        document.getElementById('VendorRegistrationForm_AgencyName_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_PrimaryContactFirstName_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_PrimaryContactLastName_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_FirstName_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_LastName_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_Email_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_Phone_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_Password_em_').innerHTML = '';
        document.getElementById('VendorRegistrationForm_ConfirmPassword_em_').innerHTML = '';
        if (id == 1) {
            document.getElementById('Individual').style.display = 'block';
            document.getElementById('Agency').style.display = 'none';
            document.getElementById('AgencyNameDiv').style.display='none';
        }
        else {
            document.getElementById('Agency').style.display = 'block';
            document.getElementById('AgencyNameDiv').style.display='block';
            document.getElementById('Individual').style.display = 'none';
        }
    }
    $(document).ready(function() { 
        $('#VendorType').bootstrapSwitch('setState', true);
    });
</script>


<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div  class="paddinground">
                <div class="span7 paddingB20">
                    <div class="reg_div">
                        <div class="paddinground">
                            <h2 class="reg_title">New Vendor Registration</h2>
                            <div id="vendorRegistrationSpinLoader"></div>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'vregistration-form',
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'error'); ?>
                            <?php echo $form->hiddenField($model, 'Identity_proof_document'); ?>
                            <?php echo $form->hiddenField($model, 'Address_proof_document'); ?>
                            <input type="hidden" id="VV" value="<?php echo $one; ?>" >
                            <fieldset>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <?php //echo $form->hiddenField($model, 'Id');  ?>
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> Vendor Type'); ?>
                                        <?php //echo $form->dropDownList($model,'vendorType', array('Individual' => 'Individual', 'Agency' => 'Agency' ,'onchange'=>'js:validate_dropdown(this.value)', 'class' => 'span12'));?>
                                        <?php echo $form->dropDownList($model, 'vendorType', array('' => 'Select Vendor Type', '1' => 'Individual', '2' => 'Agency'), array('onchange' => 'validate_dropdown(this.value)', 'class' => 'span12')); ?>
                                        <?php echo $form->error($model, 'vendorType'); ?>
                                    </div>
                                    <div class="span6" id="AgencyNameDiv" style="display:none">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> Agency Name'); ?>
                                        <?php echo $form->textField($model, 'AgencyName', array('class' => 'span12', 'maxLength' => 50)); ?>
                                        <?php echo $form->error($model, 'AgencyName'); ?>
                                    </div>
                                </div>
                                <div id="Individual" style="display:block">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> first name'); ?>
                                        <?php echo $form->textField($model, 'FirstName', array('class' => 'span12', 'maxLength' => 50)); ?>
                                        <?php echo $form->error($model, 'FirstName'); ?>
                                    </div>
                                    <div class="span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> last name') ?>
                                        <?php echo $form->textField($model, 'LastName', array('class' => 'span12', 'maxLength' => 50)); ?>
                                        <?php echo $form->error($model, 'LastName'); ?>
                                    </div>
                                </div>
                                </div>
                                <div id="Agency" style="display:none">
                                    <div class="span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> Primary Contact First Name') ?>
                                        <?php echo $form->textField($model, 'PrimaryContactFirstName', array('class' => 'span12', 'maxLength' => 50)); ?>
                                        <?php echo $form->error($model, 'PrimaryContactFirstName'); ?>
                                    </div>
                                    <div class="span6">
                                        <?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Primary Contact Last Name'); ?>
                                        <?php echo $form->textField($model, 'PrimaryContactLastName', array('class' => 'span12', 'maxLength' => 50)); ?>
                                        <?php echo $form->error($model, 'PrimaryContactLastName'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> email'); ?></label>
                                        <?php echo $form->textField($model, 'Email', array('class' => 'span12', 'maxLength' => 100)); ?>
                                        <?php echo $form->error($model, 'Email'); ?>
                                    </div>
                                    <div class="span6">
                                        <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> phone'); ?></label><input type="text" value="+91" disabled="disabled" class="span3"/>
                                        <?php echo $form->textField($model, 'Phone', array('class' => 'span9', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                                        <?php echo $form->error($model, 'Phone'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label><?php echo $form->labelEx($model, '<abbr title="required">*</abbr> password'); ?></label>
                                        <?php echo $form->passwordField($model, 'Password', array('class' => 'span12', 'maxLength' => 20)); ?>
                                        <?php echo $form->error($model, 'Password'); ?>
                                    </div>
                                    <div class="span6">
                                        <label> <?php echo $form->labelEx($model, '<abbr title="required">*</abbr> Confirm Password'); ?></label>
                                        <?php echo $form->passwordField($model, 'ConfirmPassword', array('class' => 'span12', 'maxLength' => 20)); ?>
                                        <?php echo $form->error($model, 'ConfirmPassword'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr>Proof of Identity'); ?>
                                        <?php echo $form->dropDownList($model,'Proof_of_Identity',array(''=>'Select Proof of Identity','PAN Card'=>'PAN Card','Driving License'=>'Driving License','Voter ID'=>'Voter ID'), array('class' => 'span12'));?>
                                        <?php echo $form->error($model, 'Proof_of_Identity'); ?>
                                    </div>
                                    <div class="span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr>Proof of Address'); ?>
                                        <?php echo $form->dropDownList($model,'Proof_of_Address',array(''=>'Select Proof of Address','Aadhar Card'=>'Aadhar Card','Bank Account'=>'Bank Account','Passport'=>'Passport','Ration Card'=>'Ration Card','Govt. Issued Card'=>'Govt. Issued Card'), array( 'class' => 'span12'));?>
                                        <?php echo $form->error($model, 'Proof_of_Address'); ?>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class=" span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr>Identity Proof Number'); ?>
                                        <?php echo $form->textField($model, 'Identity_proof_Number', array('class' => 'span12', 'maxLength' => 25)); ?>
                                        <?php echo $form->error($model, 'Identity_proof_Number'); ?>
                                    </div>
                                    <div class=" span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr>Address Proof Number'); ?>
                                        <?php echo $form->textField($model, 'Address_Proof_Number', array('class' => 'span12', 'maxLength' => 25)); ?>
                                        <?php echo $form->error($model, 'Address_Proof_Number'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class=" span6">
                                        <div class="form-group"><?php echo $form->label($model, 'Upload Identity Proof'); ?>
                                                <div class="control-group" style="position: relative">
                                                    <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="/images/profile/none.jpg"  id="uIdDocPreviewId"/>
                                                    </div>
                                                    <?php
                                                    $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                                        'id' => 'VendorRegistrationForm_uIdDocument',
                                                        'config' => array(
                                                            'multiple' => false,
                                                            'action' => Yii::app()->createUrl('site/docUpload',array('proof'=>'Identity')),
                                                            'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                                            'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//                                                          'minSizeLimit'=>10*1024,// minimum file size in bytes
                                                            'onComplete' => "js:function(id, fileName, responseJSON){
                                                             var data = eval(responseJSON);
                                                             globaluIdDocument = '/images/documents/'+data.filename;
                                                             $('#VendorRegistrationForm_uIdDocument').val('/images/documents/'+data.filename);
                                                             $('#VendorRegistrationForm_Identity_proof_document').val('/images/documents/'+data.filename);                                                             
                                                             $('#uIdDocPreviewId').attr('src',globaluIdDocument);
                                                              }",
                                                            'messages'=>array(
                                                                              'typeError'=>"Only {extensions} files are allowed.",
                                                                              'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                                              'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                                              'emptyError'=>"{file} is empty, please select files again without it.",
                                                                              'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                                             ),
                                                            'showMessage' => "js:function(message){ $('#upload_error_div').html(message);
                                                            $('#upload_error_div').show();}"
                                                        )
                                                    ));
                                                    ?>
                                                    <?php echo $form->error($model, 'Identity_proof_document'); ?>
                                                </div>
                                            </div>
                                    </div>
                                    <div class=" span6">
                                        <div class="form-group"><?php echo $form->label($model, 'Upload Address Proof'); ?>
                                                <div class="control-group" style="position: relative">
                                                    <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="/images/profile/none.jpg"  id="AddrPfDocPreviewId"/>
                                                    </div>
                                                    <?php
                                                    $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                                        'id' => 'VendorRegistrationForm_AddrPfDocument',
                                                        'config' => array(
                                                            'multiple' => false,
                                                            'action' => Yii::app()->createUrl('site/docUpload',array('proof'=>'Address')),
                                                            'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                                            'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//                                                          'minSizeLimit'=>10*1024,// minimum file size in bytes
                                                            'onComplete' => "js:function(id, fileName, responseJSON){
                                                             var data = eval(responseJSON);
                                                             globalAddrPfDocument = '/images/documents/'+data.filename;
                                                             $('#VendorRegistrationForm_AddrPfDocument').val('/images/documents/'+data.filename);
                                                             $('#VendorRegistrationForm_Address_proof_document').val('/images/documents/'+data.filename);        
                                                             $('#AddrPfDocPreviewId').attr('src',globalAddrPfDocument);
                                                              }",
                                                            'messages'=>array(
                                                                              'typeError'=>"Only {extensions} files are allowed.",
                                                                              'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                                              'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                                              'emptyError'=>"{file} is empty, please select files again without it.",
                                                                              'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                                             ),
                                                            'showMessage' => "js:function(message){ $('#upload_error_div').html(message);
                                                            $('#upload_error_div').show();}"
                                                        )
                                                    ));
                                                    ?>
                                                    <?php echo $form->error($model, 'Address_proof_document'); ?>
                                                    
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="span12">
                                    <div id="upload_error_div" class="errorMessage" style="display: none"></div>
                                </div>
                                <center>
                                 <?php
                                    echo CHtml::ajaxButton('Submit', array('site/vregistration'), array(
                                        'type' => 'POST',
                                        'dataType' => 'json',
                                        'beforeSend' => 'function(){
                                                             scrollPleaseWait("vendorRegistrationSpinLoader","vregistration-form");}',
                                        'success' => 'function(data,status,xhr) { addNewVendorhandler(data,status,xhr);}'), array('class' => 'btn btn-primary'));
                                    ?>
                                </center>
                            </fieldset>
<?php $this->endWidget(); ?>
                            <!--<button type="submit" class="reg_fb"> </button>-->
                        </div>
                    </div>
                </div>
                <div class="span5 paddingB20">
                    <div class="reg_div ">
                        <div class="paddinground">
                            <h2 class="reg_title">Existing Vendor Login</h2>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'vendorLogin-form',
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                )
                            ));
                            ?>
                            <?php echo $form->error($modelLogin, 'error', array('class' => 'errorMessageFont')); ?>
                            <fieldset>
                                <?php echo $form->label($modelLogin, '<abbr title="required">*</abbr> user ID'); ?>
                                <?php echo $form->textField($modelLogin, 'UserId', array('class' => 'span12',  'maxLength' => 100)); ?>
                                <?php echo $form->error($modelLogin, 'UserId'); ?>
                                <?php echo $form->labelEx($modelLogin, '<abbr title="required">*</abbr> password'); ?>
                                <?php echo $form->passwordField($modelLogin, 'Password', array('class' => 'span12', 'maxLength' => 20)); ?>
                                <?php echo $form->error($modelLogin, 'Password'); ?>
                                <div class="row-fluid paddingB20">
                                    <div class="span6">
                                    <?php echo $form->label($modelLogin, 'Vendor type'); ?>
                                        <div class="switch switch-large vender_type" id="VendorType" data-on-label="Individual" data-off-label="Agency">
                                        <?php echo $form->checkBox($modelLogin, 'VendorType'); ?>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <?php
                                    echo CHtml::ajaxButton('Login', array('site/vendorlogin'), array(
                                        'type' => 'POST',
                                        'dataType' => 'json',
                                        'success' => 'function(data,status,xhr) { vendorloginhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?>
                                    <!--<button type="submit" class="login_fb"> </button>-->
                                </center>
                            </fieldset>
    <?php $this->endWidget(); ?>
                            <!--<button type="submit" class="login_fb"> </button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>