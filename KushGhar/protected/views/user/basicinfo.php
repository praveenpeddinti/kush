<h1>Basic Information</h1>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('basic'); ?>
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basicinfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        //'action'=>"/user/basicinfo"
)); ?>

    <?php echo $form->hiddenField($model,'Id'); ?>
    


    <div class="row">
	<?php echo $form->labelEx($model,'first name'); ?>
	<?php echo $form->textField($model,'FirstName',array('value'=>$customerDetails->firstName)); ?>
	<?php echo $form->error($model,'FirstName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'middle name'); ?>
        <?php echo $form->textField($model,'MiddleName'); ?>
        <?php echo $form->error($model,'MiddleName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'last name'); ?>
        <?php echo $form->textField($model,'LastName',array('value'=>$customerDetails->lastName)); ?>
        <?php echo $form->error($model,'LastName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'Password',array('value'=>$customerDetails->password)); ?>
        <?php echo $form->error($model,'Password'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'Rewrite Password'); ?>
        <?php echo $form->passwordField($model,'RewritePassword',array('value'=>$customerDetails->password)); ?>
        <?php echo $form->error($model,'RewritePassword'); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model, 'Proof of Identify'); ?>
        <?php echo $form->dropDownList($model, 'IdentityProof', CHtml::listData($IdentityProof,'Id','identifiability')); ?>

    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'Number'); ?>
        <?php echo $form->textField($model,'Number'); ?>
        <?php echo $form->error($model,'Number'); ?>
    </div>
    <div class="row">
   <?php echo $form->radioButtonList($model,'Gender',array('M'=>'Male', 'F'=>'Female'),
         array('uncheckValue'=>null,'separator'=>'&nbsp;    '), array('uncheckValue'=>null,'onchange' => 'displayPharmacist(this)'), array("id"=>"UserRegistrationForm_isPharmacist")); ?>
    </div>
    <div class="row">
        <div class="control-group" style="position: relative">
                        <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="/images/profile/none.jpg"  id="profilePicPreviewId"/></div>
                        <?
                        $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                            'id' => 'BasicinfoForm_profilePicture',
                            'config' => array(
                                'multiple'=>false,
                                'action' => Yii::app()->createUrl('user/fileUpload'),
                                'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...

                                'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//               'minSizeLimit'=>10*1024,// minimum file size in bytes
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
                            'showMessage'=>"js:function(message){  commonErrorDiv(message,'common_error');}"
                            )
                        ));
                        ?>
                    </div>
    </div>

    
	<div class="row buttons">
		<?php echo CHtml::ajaxButton('Continue',array('user/basicinfo'), array(
            'type' => 'POST',
                    'dataType' => 'json',
'success' => 'function(data,status,xhr) { samplehandler1(data,status,xhr);}')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

<script type="text/javascript">
function samplehandler1(data){
    //alert(data.status);
    if(data.status=='success'){
window.location.href='contactInfo';
    }else{
        alert("No");
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