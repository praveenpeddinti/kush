<div id="employersPopupId"  class="modal fade">
      <div class="modal-dialog">
<div class="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="employersPopupTitle" class="popuptitle">New Employer</h3>
    </div>
    <div id="employersFormDiv">
    <div class="modal-body" style="padding-top: 0;padding-bottom: 0;" >
        <div class="form"  >
            
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'employers-form',
                'enableClientValidation' => true
                    ));
            ?>
            <div class="alert-error fade in" id="employers_error" style='position: relative;'>
<!--                <button  class='close' onclick="closeErrorMessage('reg_error');" type='button'>x</button>-->
                <?php echo $form->error($commonModel, 'error'); ?> 
                <?php echo $form->error($commonModel, 'CompanyName', array("inputID" => "CommonContactForm_CompanyName")); ?>  
                <?php echo $form->error($commonModel, 'Name', array("inputID" => "CommonContactForm_Name")); ?>  
                <?php echo $form->error($commonModel, 'Address1', array("inputID" => "CommonContactForm_Address1")); ?>
                <?php echo $form->error($commonModel, 'Email', array("inputID" => "CommonContactForm_Email")); ?>                   
                <?php echo $form->error($commonModel, 'City', array("inputID" => "CommonContactForm_City")); ?>  
                <?php echo $form->error($commonModel, 'State', array("inputID" => "CommonContactForm_State")); ?>
                <?php echo $form->error($commonModel, 'PhoneNumber', array("inputID" => "CommonContactForm_PhoneNumber")); ?> 
                <?php echo $form->error($commonModel, 'PhoneExt', array("inputID" => "CommonContactForm_PhoneExt")); ?>  
                <?php echo $form->error($commonModel, 'FaxNumber', array("inputID" => "CommonContactForm_FaxNumber")); ?>  
                <?php echo $form->error($commonModel, 'Zip', array("inputID" => "CommonContactForm_Zip")); ?>  

            </div>
            
                        
            <div class="alert-error" id="common_employer_error" style="list-style: none; padding-left: 10px;">
            
            </div>
           <?php echo $form->hiddenField($commonModel, 'EmployerId', array('id' => 'CommonContactForm_EmployerId')); ?> 
            <?php echo $form->hiddenField($commonModel, 'Logo', array('id' => 'CommonContactForm_Logo')); ?> 
            <?php echo $form->hiddenField($commonModel, 'UserId', array('id' => 'CommonContactForm_UserId')); ?> 
            <?php echo $form->hiddenField($commonModel, 'RegistredOn', array('id' => 'CommonContactForm_RegistredOn')); ?> 
            <?php echo $form->hiddenField($commonModel, 'IsEmployer', array('id' => 'CommonContactForm_IsEmployer')); ?> 
            <?php echo $form->hiddenField($commonModel, 'PrimaryContractId', array('id' => 'CommonContactForm_PrimaryContractId')); ?> 
            
            <fieldset class="fieldsetform">
                <legend>
                    Company
                </legend>
                 <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <div class="control-group">

                        <?php echo $form->label($commonModel, 'Company Name'); ?>                            
                        <?php echo $form->textField($commonModel, 'CompanyName', array('id' => 'CommonContactForm_CompanyName', 'maxlength' => 50, 'class' => 'span12')); ?>

                    </div>
                    </div>
                    <div class="span6" id="partnerType">
                        <div class="control-group">

                        <?php echo $form->label($commonModel, 'Partner Type'); ?>       
                            <?php echo $form->dropDownList($commonModel, 'PartnerType', CHtml::listData($PartnerTypes,'Id','Type'),array('class'=>'span12')); ?>
                        <?php // echo $form->textField($commonModel, 'PartnerType', array('id' => 'CommonContactForm_PartnerType', 'maxlength' => 50, 'class' => 'span12')); ?>

                    </div>
                    </div>
                     
                </div>
            </div>
            </fieldset>
               <fieldset class="fieldsetform ">
                <legend>
                    Primary
                </legend>  
                     <div class="row-fluid">
                <div class="span12">
                   
                     <div class="span4">
                         <div class="control-group">
                             <?php echo $form->label($commonModel, 'Name'); ?>   

                        <?php echo $form->textField($commonModel, 'Name', array('id' => 'CommonContactForm_Name', 'class' => 'span12',"maxlength"=>100)); ?>
                        
                    </div>
                     </div>
                    
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'Address1'); ?>                            
                        <?php echo $form->textField($commonModel, 'Address1', array('id' => 'CommonContactForm_Address1', 'maxlength' => 100, 'class' => 'span12')); ?>

                             
                        </div>
                        </div>
                    
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'Address2'); ?>                            
                        <?php echo $form->textField($commonModel, 'Address2', array('id' => 'CommonContactForm_Address2', 'maxlength' => 100, 'class' => 'span12')); ?>

                             
                        </div>
                        </div>
                </div>
            </div>
           
                        
           <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'Email'); ?>                            
                        <?php echo $form->textField($commonModel, 'Email', array('id' => 'CommonContactForm_Email', 'maxlength' => 50, 'class' => 'span12')); ?>

                        </div>
                    </div>
                    
                    
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'City'); ?>   
                        <?php echo $form->textField($commonModel, 'City', array('id' => 'CommonContactForm_City', 'class' => 'span12',"maxlength"=>"40")); ?>

                        </div>
                        </div>
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'State'); ?>                            
                        <?php echo $form->dropDownList($commonModel, 'State', CHtml::listData($States,'StateName','StateName'),array('class'=>'span12')); ?>
                                
                        </div>
                    </div>
                    
                </div>
            </div>
            
                        
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'Phone'); ?>   

                        <?php echo $form->textField($commonModel, 'PhoneNumber', array('id' => 'CommonContactForm_PhoneNumber', 'class' => 'span12','maxLength'=>14,'onkeypress'=>'return isNumberKey(event);')); ?>

                        </div>
                        </div>
                    
                    <div class="span2">
                         <div class="control-group">

                        <?php echo $form->label($commonModel, 'Phone Ext'); ?>   

                        <?php echo $form->textField($commonModel, 'PhoneExt', array('id' => 'CommonContactForm_PhoneExt', 'class' => 'span12','maxLength'=>4,'onkeypress'=>'return isNumberKey(event);')); ?>

                    </div>
                    </div>
                    
                    
                    
                     <div class="span4">
                        <div class="control-group">
                            <?php echo $form->label($commonModel, 'Fax'); ?>   

                        <?php echo $form->textField($commonModel, 'FaxNumber', array('id' => 'CommonContactForm_FaxNumber', 'class' => 'span12','maxLength'=>14,'onkeypress'=>'return isNumberKey(event);')); ?>

                        </div>
                        </div>
                    <div class="span2">
                         <div class="control-group">

                        <?php echo $form->label($commonModel, 'Zip code'); ?>   

                        <?php echo $form->textField($commonModel, 'Zip', array('id' => 'CommonContactForm_Zip', 'class' => 'span12','maxLength'=>14,'onkeypress'=>'return isNumberKey(event);')); ?>

                    </div>
                    </div>
                </div>
            </div>
                        
        </fieldset>                
                </div>
            </div>
                        


                    
  <div class="modal-footer">
                <div  class="row-fluid">
                    <div class="span12" style="padding:5px;text-align:right">
    <!--                                                <input type="button" class="btn btn-success  btn-large btn-block r_login" onclick="clicksub()"/>-->
                        <?php echo CHtml::Button('Save', array('onclick' => 'saveEmployerForm();', 'class' => 'btn btn-warning', 'id' => 'employerButtonId')); ?> 
                        <?php echo CHtml::resetButton('Clear', array("id" => 'employerResetId', "style" => 'display:none;')); ?>

                        

                    </div>	
                </div>      

	

            </div>
      
      <?php $this->endWidget(); ?> 
            </div>
</div>
   

</div>
      </div>          
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.modal-body_nicescroll').perfectScrollbar({
          wheelSpeed: 80,
          wheelPropagation: false
   });       
       $("[rel=tooltip]").tooltip(); 
    
    });
   
    function saveEmployerForm(){
        if($("#CommonContactForm_IsEmployer").val() == 2){
            $("#CommonContactForm_PartnerType").val("");
        }
        var data=$("#employers-form").serialize();
        $("#employerButtonId").val("Please wait...");
        scrollPleaseWait();
        $.ajax({
                type: 'POST',
                dataType:'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/saveEmployersData"); ?>',
                data:data,
                success:employersFormHandler,
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                
                }
            });
//            }
    }
    function employersFormHandler(data){  
        scrollPleaseWaitClose();
         if($("#CommonContactForm_EmployerId").val() == ""){
                $("#employerButtonId").val("Save");
            }else{
                $("#employerButtonId").val("Update");
            }
        if(data.status=='success'){
            getEmployers(0);
            $("#employersPopupId").modal('hide');
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
                    $("#"+key).parent().addClass('error');
                }
                
            }); 
            
        }
    }    

   
</script>
