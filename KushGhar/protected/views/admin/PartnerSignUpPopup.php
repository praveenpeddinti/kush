<div id="partnerSignUp" class="modal alert_modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:580px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="partnerSignUpTitle" class="popuptitle">Partner Sign Up</h3>
    </div>
    
  
    <div id="enrollmentFormDiv" style="overflow: auto">
    <div class="modal-body modal-body_nicescroll" style="padding-top: 0;padding-bottom: 0;" >
        <div class="form"  >
            
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'partnersignup-form',
                'enableClientValidation' => false
                    ));
            ?>
            <div class="alert-error fade in" id="reg_error" style='position: relative'>
<!--                <button  class='close' onclick="closeErrorMessage('reg_error');" type='button'>x</button>-->
                <?php echo $form->error($this->partnerModel, 'error'); ?> 
                <?php echo $form->error($this->partnerModel, 'UserName', array("inputID" => "PartnerSignUpForm_UserName")); ?>  
                <?php echo $form->error($this->partnerModel, 'Email', array("inputID" => "PartnerSignUpForm_Email")); ?>  
                <?php echo $form->error($this->partnerModel, 'DOB', array("inputID" => "PartnerSignUpForm_DOB")); ?>

            </div>

            <?php echo $form->hiddenField($this->partnerModel, 'Id', array('id' => 'PartnerSignUpForm_Id')); ?>                                               
           
            <div class="row-fluid">
                <div class="span12">                   
              
                        
                            <?php echo $form->label($this->partnerModel, 'User Name'); ?>                            
                        <?php echo $form->textField($this->partnerModel, 'UserName', array('id' => 'PartnerSignUpForm_UserName', 'maxlength' => 50, 'class' => 'span6')); ?>


            </div>
            </div>
                  <div class="row-fluid">
                    <div class="span12">
                   
                       <?php echo $form->label($this->partnerModel, 'Email'); ?>   
                            <?php echo $form->textField($this->partnerModel, 'Email', array('id' => 'PartnerSignUpForm_Email', 'maxlength' => 50, 'class' => 'span6')); ?>                      
                         </div>
                       
                   
            </div>
            <div class="row-fluid">
                 <div class="span12">
               
                        <?php echo $form->label($this->partnerModel, 'Organisation held on'); ?>   
                        <?php echo $form->textField($this->partnerModel, 'DOB', array('id' => 'PartnerSignUpForm_DOB', 'maxlength' => 4, 'class' => 'span6')); ?>                      

                     
                </div>
            </div>
            
   
           
      
     
   <div class="modal-footer">
                <div  class="row-fluid">
                    <div class="span12" style="padding:5px;text-align:right">
    <!--                                                <input type="button" class="btn btn-success  btn-large btn-block r_login" onclick="clicksub()"/>-->
                        <?php echo CHtml::Button('Save', array('onclick' => 'savePartnerSignup()', 'class' => 'btn btn-warning', 'id' => 'enrollmentButtonId')); ?> 
                        <?php //echo CHtml::ajaxSubmitButton('Save', '/employers/saveEnrollmentData', array('type' => 'POST', 'dataType' => 'json', 'success' => 'function(data,status,xhr) { enrollmentHandler(data,status,xhr);}'), array('type' => 'submit', 'class' => 'btn btn-warning', 'id' => 'enrollmentButtonId', 'data-loading-text' => 'please wait...')); ?>
                        <?php echo CHtml::resetButton('Clear', array("id" => 'partnerResetId', 'class' => 'btn btn-primary btn-info', "style" => 'display:none;')); ?>

                    </div>	
                </div>
            </div>
            
 <?php $this->endWidget(); ?> 
        </div>
        </div>
     
         
           
</div>
   

</div>
<script type="text/javascript">
    $(function(){
        //        $('.selectpicker').selectpicker();
        var currentDate=new Date();
        var maxdate=new Date();
        maxdate.setFullYear(maxdate.getFullYear()-19);
          var mindate=new Date();
        mindate.setFullYear(mindate.getFullYear()-100);
           mindate.setMonth(currentDate.getMonth()+2);
           mindate.setDate(currentDate.getDate()+2);
        $('#PartnerSignUpForm_DOB').scroller({
            preset: 'date',
            timeFormat:'H:i',	
            invalid: { daysOfWeek: [0, 6], daysOfMonth: ['5/1', '12/24', '12/25'] },
            theme: 'android', // for android set theme:'android'
            display: 'modal',
            mode: 'scroller',
            dateFormat:'yyyy-mm-dd',
            dateOrder: 'Md ddyy',
            maxDate:  maxdate,   
            minDate:mindate
	
        });
    });
    $(document).ready(function(){
        $('.modal-body_nicescroll').perfectScrollbar({
          wheelSpeed: 80,
          wheelPropagation: false
   });
        $('#sex').on('switch-change', function (e, data) {
            var $el = $(data.el)
            , value = data.value;
            
    
        });
       $("[rel=tooltip]").tooltip(); 
    
    });

    function saveEnrollmentForm(){
        if($("#PartnerSignUpForm_MemberType").val() == 1){
            if($("#PartnerSignUpForm_Email").val() == ""){
                $("#PartnerSignUpForm_Email_em_").text("Please Enter value for Email");                                                    
                $("#PartnerSignUpForm_Email_em_").show();           
                $("#PartnerSignUpForm_Email").parent().removeClass('success');
                $("#PartnerSignUpForm_Email").parent().addClass('error');
                return;
            }
        }else{            
            $("#PartnerSignUpForm_Email_em_").text("");                                                    
            $("#PartnerSignUpForm_Email_em_").hide();                        
            $("#PartnerSignUpForm_Email").parent().removeClass('error');
            
        }
        
        if($("#PartnerSignUpForm_MemberType").val() == 2){
            if($("#PartnerSignUpForm_RelatedTo").val() == ""){
                $("#PartnerSignUpForm_RelatedTo_em_").text("Please Enter value for Related To");                                                    
                $("#PartnerSignUpForm_RelatedTo_em_").show();                        
                $("#PartnerSignUpForm_RelatedTo").parent().addClass('error');
                return;
            }           
        }else{
            $("#PartnerSignUpForm_RelatedTo_em_").text("");                                                    
            $("#PartnerSignUpForm_RelatedTo_em_").hide();                        
            $("#PartnerSignUpForm_RelatedTo").parent().removeClass('error'); 
                     
        }
        formSubmit();
    }
    function savePartnerSignup(){
        scrollPleaseWait();
        var data=$("#partnersignup-form").serialize();
//        return;
        $.ajax({
                type: 'POST',
                dataType:'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/saveNewPartner"); ?>',
                data:data,
                success:enrollmentFormHandler,
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                
                }
            });
    }
    function enrollmentFormHandler(data){  
        scrollPleaseWaitClose();
        if(data.status=='success'){
            //            window.location.href='/';
            getEnrollments(0);
            $("#enrollmentPopupId").modal('hide');
        }else{
            
            //                    $("#forgotReset").click();
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
                    if(key == "PartnerSignUpForm_Email")
                        $("#"+key).parent().removeClass('success');
                    $("#"+key).parent().addClass('error');
                }
                
            }); 
            if($("#PartnerSignUpForm_MemberType").val() == 2){
                if($("#PartnerSignUpForm_RelatedTo").val() == ""){
                    $("#PartnerSignUpForm_RelatedTo_em_").text("Please Enter value for Related To");                                                    
                    $("#PartnerSignUpForm_RelatedTo_em_").show();                        
                    $("#PartnerSignUpForm_RelatedTo").parent().addClass('error');
                }
                
            }else{
                $("#PartnerSignUpForm_RelatedTo_em_").text("");                                                    
                $("#PartnerSignUpForm_RelatedTo_em_").hide();                        
                $("#PartnerSignUpForm_RelatedTo").parent().removeClass('error');
                
            }
            if($("#PartnerSignUpForm_MemberType").val() == 1){
                if($("#PartnerSignUpForm_Email").val() == ""){
                    $("#PartnerSignUpForm_Email_em_").text("Please Enter value for Email");                                                    
                    $("#PartnerSignUpForm_Email_em_").show();           
                    $("#PartnerSignUpForm_Email").parent().removeClass('success');
                    $("#PartnerSignUpForm_Email").parent().addClass('error');
                }
            }else{
                $("#PartnerSignUpForm_Email_em_").text("");                                                    
                $("#PartnerSignUpForm_Email_em_").hide();                        
                $("#PartnerSignUpForm_Email").parent().removeClass('error');
            }
        }
    }      

    
    function importCSVFile(){
        var data=$("#CSV-form").serialize();
        $("#csv_error").html("");
        $("#csv_error").hide();
        var queryString = "file"
        
        $.ajax({
            type: 'POST',
            dataType:'json',
            url: '<?php echo Yii::app()->createAbsoluteUrl("/employers/manageFile"); ?>',
            data:data,
            success:CSVFileHandler,
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                //                alert(data.toSource());
            }
        });
    }
    function CSVFileHandler(data){
        //        alert(data.toSource())
    }
    
    function checkCSVFile(obj,errId)
    {
        $("#"+errId).html("");
        var fup = obj;
        var fileName = fup.value;
        var id = fup.id;
        var msg = "";
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "csv" || ext == "CSV")
        {
            msg = GetFileSize(id);
            if(msg == ""){
                $("#"+errId).text();                                    
                $("#"+errId).hide();
                $("#"+id).parent().removeClass('error');  
                return true;
            }else if(msg != ""){
                setErrorMsg(id,errId,msg);
                fup.focus();
                return false;
            }
        } 
        else
        {msg = "Invalid file format. Only CSV is allowed";     
            setErrorMsg(id,errId,msg); 
            $("#csvResetId").click();
            fup.focus();
            return false;
        }
    
    }
    
    function ajaxCSVUpload(){ 
        
        var fileId = "csvfiletype";
        var delimiter = $("#CSVForm_delimeter").val();
        //        alert($("#"+fileId).val())
        if($("#"+fileId).val() != "" && delimiter != ""){
            scrollPleaseWait();
            $.ajaxFileUpload(
            {
                type:'POST',
                data :{},
                url:'/employers/manageFile?max_size=100&delimiter='+delimiter,
                secureuri:false,
                dataType:'json',
                fileElementId:fileId,
                success: function(data1){
                    //                    alert(data1.toSource())
                    if(data1.status == "success"){
                        $("#csvResetId").click();
                        $("#enrollmentPopupId").modal('hide');
                        getEnrollments(0);
                    }else{
                        scrollPleaseWaitClose();
                        $(".fileupload").fileupload('reset');
                        $("#csvResetId").click();
                        var error = [];
                        if(typeof(data1.error)=='string'){
                            var error=eval("("+data1.error.toString()+")");
                        }else{
                            var error=eval(data1.error);
                        }
                        //                    for(var i=0; i<(data1.error).length;i++){
                        //                        
                        //                    }
                        $("#csv_error").html("<b>Error(s) while uploading csv file.</b> <br/> ");
                        $.each(error, function(key, val) {
//                            commonErrorDiv(val,'csv_error')
                            $("#csv_error").append(val+'<br/><br/>');
                            $("#csv_error").show();                        
                            $("#csv_error").parent().addClass('error');

                        }); 
                        // error section..
                    }
                
                },
                error: function (data)
                {
                    alert('error');
                }
            }
        );
        }else{
            $("#csv_error").html("Please choose .csv file");
            $("#csv_error").show();                        
            $("#csv_error").parent().addClass('error');
        }
        
           
    }
    
    function showFields(obj){
        if($("#"+obj.id).val() == 2){
            $("#familyFields").show();
            $("#employeeM").hide();
        }else{
            $("#familyFields").hide();
            $("#employeeM").show();
            $("#PartnerSignUpForm_RelatedTo_em_").text("");                                                    
            $("#PartnerSignUpForm_RelatedTo_em_").hide();                        
            $("#PartnerSignUpForm_RelatedTo").parent().removeClass('error');
            $("#PartnerSignUpForm_Email_em_").text("");                                                    
            $("#PartnerSignUpForm_Email_em_").hide();                        
            $("#PartnerSignUpForm_Email").parent().removeClass('error'); 
        }
        
    }
//    function closeErrorMessage(id){
//        
//        $("#"+id).html("");
//        $("#"+id).html('<button  class="close" onclick="closeErrorMessage(\'reg_error\');" type="button">x</button>')
//    }
   
</script>