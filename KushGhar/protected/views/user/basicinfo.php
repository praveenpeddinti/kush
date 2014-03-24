<div class="container">
    <div id="instant_notifications" class="instant_notification">Basic Information</div>
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            <ul class="l_menu_sub_menu">
                                <?php
                                 if((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))){
                                     $statusClassForBasic = 'status_info2';
                                 }else{
                                     $statusClassForBasic = 'status_info1';
                                 }
                                 if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                                     
                                     $statusClassForContact = 'status_info2';
                                 }else{
                                     
                                     $statusClassForContact = 'status_info1';
                                 }
                                 if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year))){
                                     $statusClassForPayment = 'status_info2';
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                 }
                                 ?>
                                <li class="active"><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a>
                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>
                                </li>
                                <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
                                    <div class="<?php echo $statusClassForContact;?>"> </div>
                                </li>
                                <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
                                    <div class="<?php echo $statusClassForPayment;?>"> </div>
                                </li>
                            </ul>
                        </div>
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                        <div id="services" class="collapse">
                            <div class="selected_tab">services</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <h4>Basic Information</h4>
                        <hr>
                        <div class="paddinground">
                            <div id="basicInfoSpinLoader"></div>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'basicinfo-form',
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                            ));?>
                            <fieldset>
                                
                                <div class="row-fluid">
                                    <div class=" span6">
                                        <?php echo $form->label($model, '<abbr title="required">*</abbr> first name'); ?>
                                        <?php echo $form->textField($model, 'FirstName', array('value' => $customerDetails->first_name, 'maxLength' => 50, 'class' => 'span12', 'placeholder' => 'First Name…')); ?>
                                        <?php echo $form->error($model, 'FirstName'); ?>
                                    </div>
                                    <div class=" span6">
                                        <?php echo $form->label($model, 'middle name'); ?>
                                        <?php echo $form->textField($model, 'MiddleName', array('value' => $customerDetails->middle_name, 'class' => 'span12', 'maxLength' => 50, 'placeholder' => 'Middle Name…')); ?>
                                        <?php echo $form->error($model, 'MiddleName'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class=" span12">
                                        <div class=" span6">
                                            <?php echo $form->label($model, '<abbr title="required">*</abbr> last name'); ?>
                                            <?php echo $form->textField($model, 'LastName', array('value' => $customerDetails->last_name, 'maxLength' => 50, 'class' => 'span12', 'placeholder' => 'Last Name…')); ?>
                                            <?php echo $form->error($model, 'LastName'); ?>
                                            </div>
                                        
                                    </div>
                                </div>
                                <!--<div class=" span6">
                                        <?php echo $form->label($model, 'Update Password'); ?>
                                        <?php echo $form->passwordField($model, 'Password', array('class' => 'span12')); ?>
                                        <?php echo $form->error($model, 'Password'); ?>
                                    </div>
                                    <div class=" span6">
                                        <?php echo $form->label($model, 'Repeat Password'); ?>
                                        <?php echo $form->passwordField($model, 'RepeatPassword', array('class' => 'span12')); ?>
                                        <?php echo $form->error($model, 'RepeatPassword'); ?>
                                    </div>
                                </div>-->
                                <!--<div class="row-fluid">
                                    <div class=" span6">
                                        <?php echo $form->label($model, 'Proof of Identify'); ?>
                                        <?php echo $form->dropDownList($model, 'IdentityProof', CHtml::listData($IdentityProof, 'Id', 'identifiability'), array('prompt'=>'Select Proof of Identify','options' => array($customerDetails->uId => array('selected' => 'selected')), 'class' => 'span12')); ?>
                                        <?php echo $form->error($model, 'IdentityProof'); ?>
                                        <?php //echo $form->label($model, 'Proof of Identify'); ?>
                                        <?php //echo $form->dropDownList($model, 'IdentityProof', CHtml::listData($IdentityProof, 'Id', 'identifiability'), array('options' => array($customerDetails->uId => array('selected' => 'selected')), 'class' => 'span12')); ?>
                                    </div>
                                    <div class=" span6">
                                        <?php echo $form->label($model, 'ID Number'); ?>
                                        
                                        <?php echo $form->textField($model, 'Number', array('value' => $customerDetails->uIdNumber, 'class' => 'span12', 'placeholder' => 'ID Number…', 'maxLength' => 25)); ?>
                                        <?php echo $form->error($model, 'Number'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="span6">
                                            <div class="form-group"><?php echo $form->label($model, 'Upload ID Proof'); ?>
                                                <div class="control-group" style="position: relative">
                                                    <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="<?php if (!empty($this->session['UserId'])) {
                                                        echo $customerDetails->uIdDocument;
                                                     } else {
                                                        echo '/images/profile/none.jpg';
                                                    } ?>"  id="uIdDocPreviewId"/>
                                                    </div>
                                                    <?php
                                                    /*$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                                        'id' => 'BasicinfoForm_uIdDocument',
                                                        'config' => array(
                                                            'multiple' => false,
                                                            'action' => Yii::app()->createUrl('user/docUpload'),
                                                            'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                                            'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//                                                          'minSizeLimit'=>10*1024,// minimum file size in bytes
                                                            'onComplete' => "js:function(id, fileName, responseJSON){
                                                             var data = eval(responseJSON);
                                                             globaluIdDocument = '/images/documents/'+data.filename;
                                                             $('#BasicinfoForm_uIdDocument').val('/images/documents/'+data.filename);
                                                             $('#uIdDocPreviewId').attr('src',globaluIdDocument);
                                                              }",
                                                            //'messages'=>array(
                                                            //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                            //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                            //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                            //                  'emptyError'=>"{file} is empty, please select files again without it.",
                                                            //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                            //                 ),
                                                            'showMessage' => "js:function(message){  commonErrorDiv(message,'common_error');}"
                                                        )
                                                    ));*/
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="row-fluid paddingT10">
                                    <div class="span6">
                                        <?php echo $form->label($model, 'Gender'); ?>
                                        <div class="switch switch-large" id="Gender" data-on-label="Male" data-off-label="Female">
                                        <?php echo $form->checkBox($model, 'Gender', array('id' => 'BasicInfoForm_Gender')); ?>
                                        </div>
                                       
                                    </div>
<?php if(($customerDetails->birth_date=='0000-00-00') || (empty($customerDetails->birth_date))){ $birthdata ='';}else{$birthdata =date('d-m-Y', strtotime($customerDetails->birth_date));}?>
                                    
                                    <div class="span6">
                                        <?php echo $form->label($model, 'Date of Birth'); ?>
                                        <?php echo $form->textField($model, 'dateOfBirth', array('value' => $birthdata, 'class' => 'span10', 'placeholder' => 'Date of Birth…')); ?>
                                        <?php echo $form->error($model, 'dateOfBirth'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="form-group">
                                            <div class="form-group"><?php echo $form->label($model, 'Profile Picture'); ?>
                                                <div class="control-group" style="position: relative">
                                                    <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="<?php if (!empty($this->session['UserId'])) {
                                                        echo $customerDetails->profilePicture;
                                                    } else {
                                                        echo '/images/profile/none.jpg';
                                                    } ?>"  id="profilePicPreviewId"/></div>
                                                    <?
                                                    $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                                        'id' => 'BasicinfoForm_profilePicture',
                                                        'config' => array(
                                                            'multiple' => false,
                                                            'action' => Yii::app()->createUrl('user/fileUpload'),
                                                            'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...

                                                            'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//                                                          'minSizeLimit'=>10*1024,// minimum file size in bytes
                                                            'onComplete' => "js:function(id, fileName, responseJSON){
                                    var data = eval(responseJSON);

                                    globalProfilePic = '/images/profile/'+data.filename;
                                    $('#BasicinfoForm_ProfilePic').val('/images/profile/'+data.filename);
                                    $('#profilePicPreviewId').attr('src',globalProfilePic);
                                    }
                                    ",
                                                            //'messages'=>array(
                                                            //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                            //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                            //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                            //                  'emptyError'=>"{file} is empty, please select files again without it.",
                                                            //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                            //                 ),
                                                            'showMessage' => "js:function(message){  commonErrorDiv(message,'common_error');}"
                                                        )
                                                    ));
                                                    ?>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                               <div class="row-fluid">
                                <div class=" span12">
                                <?php echo $form->label($model, 'How do you know KushGhar ?'); ?>
                                    <?php echo $form->dropDownList($model,'foundKushgharBy', array(''=>'Select One','friend' => 'Friend', 'mail' => 'Mail'), array('options' => array($customerDetails->found_kushghar_by => array('selected' => 'selected')), 'class' => 'span12'));?>
                                    <?php echo $form->error($model,'foundKushgharBy'); ?>
                                    <?php //echo $form->dropDownList($model, 'cardType', CHtml::listData(array('prompt'=>'Select Card Type','options' => ('Visa''Visa', 'Master' => 'Master')), 'Id', 'identifiability'), array('options' => array($customerPaymentDetails->card_type => array('selected' => 'selected')), 'class' => 'span12')); ?>
                                </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12 ">
                                        <div class="pull-right">
                                        <?php   echo CHtml::ajaxButton('Continue', array('user/basicinfo'), array(
                                                        'type' => 'POST',
                                                        'dataType' => 'json',
                                                        'beforeSend' => 'function(){
                                                                scrollPleaseWait("basicInfoSpinLoader","basicinfo-form");}',
                                                        'success' => 'function(data,status,xhr) { addBasicInformationhandler(data,status,xhr);}'), array('class' => 'btn btn-primary'));
                                         ?>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                        <?php $this->endWidget(); ?>


                            
                                    <?php $form = $this->beginWidget('CActiveForm', array(
                                  'id' => 'update-form',
                                  'enableClientValidation' => true,
                                  'clientOptions' => array(
                                  'validateOnSubmit' => true,
                                  )
                            ));?>
                            <?php echo $form->error($updatedPassword, 'error'); ?>
                            <hr> 
                            <fieldset>
                                <div class="row-fluid">
                                    <div class=" span4">
                                       <?php echo $form->label($updatedPassword, 'Update Password'); ?>
                                <?php echo $form->passwordField($updatedPassword, 'Password', array('maxLength' => 50, 'class' => 'span12', 'placeholder' => 'Update Password…')); ?>
                                <?php echo $form->error($updatedPassword, 'Password'); ?>
                                    </div>
                                    <div class=" span4">
                                        <?php echo $form->label($updatedPassword, 'Repeat Password'); ?>
                                        <?php echo $form->passwordField($updatedPassword, 'RepeatPassword', array('maxLength' => 50, 'class' => 'span12', 'placeholder' => 'Repeat Password…')); ?>
                                        <?php echo $form->error($updatedPassword, 'RepeatPassword'); ?>
                                    </div>
                                    <div class=" span4">
                                        <div  class=" paddingT30">
                                       <?php echo CHtml::ajaxButton('Update Password', array('user/updatedPsw'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            
                                            'success' => 'function(data,status,xhr) { updatePasswordhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?></div>
                                    </div>
                                </div>
                                


                                    </fieldset>
                            <?php $this->endWidget(); ?>
                                
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<script type="text/javascript">
    

    $(document).ready(function() { $("#instant_notifications").fadeOut(6000, "");

    <?php if($customerDetails->customer_gender == 1){ ?>
        $('#Gender').bootstrapSwitch('setState', true);
    <?php } else {?>
        $('#Gender').bootstrapSwitch('setState', false);
    <?php } ?>
    <?php if($customerDetails->found_kushghar_by == ''){ ?>
        //document.getElementById('BasicinfoForm_foundKushgharBy').disabled = false;
        //document.getElementById('BasicinfoForm_foundKushgharBy').selected = false;
    <?php } else { ?>
       //document.getElementById('BasicinfoForm_foundKushgharBy').disabled = true;
    <?php } ?>
        $.datepicker.setDefaults({
            showOn: "button",
            buttonImage: "/images/calendar.gif",
            buttonImageOnly: true,
            dateFormat:"dd-mm-yy",
            changeMonth:true,
            buttonText: '',
            changeYear: true,
            changeMonth: true
        });
        document.getElementById('BasicinfoForm_dateOfBirth').readOnly = true;
        $("#BasicinfoForm_dateOfBirth").datepicker({
            yearRange: "-100:-14",
            changeMonth: true,
            changeYear:true,
            defaultDate:"-14y-m-d"
        });
    });

    $(document).ready(function(){
        $('#Gender').on('switch-change', function (e, data) {
            var $el = $(data.el)
            , value = data.value;
            if(value == true)
                $("#BasicInfoForm_Sex").val('1');
            else
                $("#BasicInfoForm_Sex").val('0');
        });
        $("[rel=tooltip]").tooltip();

    });

/*dropdown box */
/*$('#BasicinfoForm_IdentityProof').change(function(){alert("change1");

if($('#BasicinfoForm_IdentityProof').val() != '')
{alert("change2");
    //$('#dti').show();
    if($('#BasicinfoForm_Number').val()==''){
        $('#BasicinfoForm_Number_em_').show();
        $('#BasicinfoForm_Number_em_').text('Please enter a value for Id Number');
        
    }else{
      alert("please entdder number");
    }
    
    //$('#cda').hide();
    //$('#sec').hide();

}
/*if(($('#orgType').val() == 'Partnership') || ($('#orgType').val() == 'Corporation'))
{
    $('#sec').show();
    $('#secField').addClass('required');
    $('#dti').hide();
    $('#cda').hide();
}
if($('#orgType').val() == 'Cooperative')
{
    $('#cda').show();
    $('#cdaField').addClass('required');
    $('#dti').hide();
    $('#sec').hide();
}
return false;
});*/

//dropdown box


    function addBasicInformationhandler(data){
        scrollPleaseWaitClose('basicInfoSpinLoader');
        if(data.status=='success'){
            window.location.href='contactInfo';
        }else{
            //alert("No");
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

    function updatePasswordhandler(data){
        if(data.status=='success'){
            $("#updatedPasswordForm_error_em_").show();
            $("#updatedPasswordForm_error_em_").removeClass('errorMessage');
            $("#updatedPasswordForm_error_em_").addClass('alert alert-success');
            $("#updatedPasswordForm_error_em_").text('Password is updated successfully');
            $("#updatedPasswordForm_error_em_").fadeOut(6000, "");
            $("#updatedPasswordForm_Password").val('');
            $("#updatedPasswordForm_RepeatPassword").val('');
      
            //window.location.href='contactInfo';
        }else{
            //alert("No");
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

    function isNumberKey(evt)
    {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;

        if (charCode > 31 && (charCode < 45 || charCode > 57 ) )
            return false;
        if (e.shiftKey) return false;
        return true;
    }

    function UserProfilefiles(obj,errId)
    {
        if ($.browser.msie) {
            UserProfilefilesIE(obj,errId);
            return;
        }
        var fup = obj;
        var fileName = fup.value;
        var id = fup.id;
        var msg = "";

        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png" || ext=='pdf' || ext=='PDF'|| ext=='ppt' || ext=='PPT'|| ext=='PPTX'|| ext=='pptx')
        {
            msg = GetFileSize(id);
            if(msg == ""){
                $("#"+errId).text();
                $("#"+errId).hide();
                $("#"+id).parent().removeClass('error');

                if (obj.files && obj.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                           $('#userProfile_previewPicId').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(obj.files[0]);
                }
            //return true;
            }else if(msg != ""){
                setErrorMsg(id,errId,msg);
                fup.focus();
                return false;
            }
        }
        else
        {msg = "Invalid file format. Only JPG, GIF, PNG are allowed";
            setErrorMsg(id,errId,msg);
            // document.getElementById('error').style.display="block";
            $("#error").text(msg);
            $("#error").fadeOut(6600, "linear")
            fup.focus();
            return false;
        }

        RegisteruserProfile_ajaxProfilePicUpload();

    }

    function GetFileSize(fileid) {

        try {
            var fileSize = 0;
            var errMsg = "";
            //for IE
            if ($.browser.msie) {
                //before making an object of ActiveXObject,
                //please make sure ActiveX is enabled in your IE browser
                var objFSO = new ActiveXObject("Scripting.FileSystemObject");
                var filePath = $("#" + fileid)[0].value;
                var objFile = objFSO.getFile(filePath);
                var fileSize = objFile.size; //size in kb
                fileSize = fileSize / 1048576; //size in mb
            }
            //for FF, Safari, Opeara and Others
            else {
                fileSize = $("#" + fileid)[0].files[0].size //size in kb
                fileSize = fileSize / 1048576; //size in mb
            }

            if(fileSize > 1){

                errMsg = "file size is too large max file upload size is 10MB";
            }else if(fileSize < 0){
                errMsg = "file size is too large";
            }
        }
        catch (e) {
            errMsg = "Error MSG: "+e;
        }

        return errMsg;
    }

    function UserProfilefilesIE(obj,errId){

        RegisteruserProfile_ajaxProfilePicUpload();
    }

    function RegisteruserProfile_ajaxProfilePicUpload(){
        alert("enter file");
        $.ajaxFileUpload(
        {
            type:'POST',
            data :{},
            url:'/user/ProfilePicUpload?max_size=100&videoSize=5024&accepted_formats=jpeg,jpg,png&max_width=200&max_height=200&auto_resize=true',
            secureuri:false,
            dataType:'json',
            fileElementId:'userProfilefile',
            success: function (data1)
            {
                var img=data1.data;
                $('#userProfile_previewPicId').attr('src',img);
                //    var imgId = $("#userProfile_previewPicId").attr('src');
                // $("#profilepic_imgId").attr('src',imgId+"?v=" + new Date().getTime());
                 
                //   $('#updateBtnId').button('reset');
                //  alert(data1.toSource());
                //                    $("#previewPicDiv").html("");
                //                     var imagePath = "<img src='/images/userPics/"+data1+"' style='width: 100px;height: 100px'/>";
                //                   //  alert(imagePath);
                //                     $("#previewPicDiv").html(imagePath);
                //alert( $("#previewPicDiv").html());
                //  alert(data1);
                // $("#previewPicId").attr("src","/images/userPics/"+data1);

            },
            error: function (data)
            {

            }
        }
    );
    }

    function userProfile_picPreview(ele){
        //  $("#previewPicId").attr("src","file:///"+value);
        // alert("profile pic priview");
        if (ele.files && ele.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('#userProfile_previewPicId').attr('src', e.target.result);
            }

            reader.readAsDataURL(ele.files[0]);
        }
    }


</script>