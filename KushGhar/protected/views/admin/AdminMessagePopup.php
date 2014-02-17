<div id="AdminMessagePopup" class="modal fade">
      <div class="modal-dialog">
<div  class="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:580px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="MessageTitle" class="popuptitle">New Messages </h3>
    </div>
    <div class="modal-body">
        <div class="form" action="#" id="breathwellstoriesFormDiv">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'message-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                  
                    ));
            ?>
            <div id="reg_error" class="alert-error">
                <?php echo $form->error($this->adminMessages, 'error'); ?> 
<?php echo $form->error($this->adminMessages, 'isClose', array("inputID" => "AdminMessages_isClose", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  
                <?php echo $form->error($this->adminMessages, 'MessageText', array("inputID" => "AdminMessages_MessageText", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  

                <?php echo $form->error($this->adminMessages, 'MessageTo', array("inputID" => "AdminMessages_MessageTo", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  

            </div>
         
        <?php echo $form->hiddenField($this->adminMessages, 'Id', array('id' => 'AdminMessages_Id')); ?>    
            <?php echo $form->hiddenField($this->adminMessages, 'IsEmployer', array('id' => 'AdminMessages_IsEmployer')); ?> 
            
            
               <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
          <?php echo $form->label($this->adminMessages, 'MessageTo'); ?>    
                         <div class="span5">
                    <div class="control-group">
              
                        <select id="AdminMessages_MessageToselect">
                            <option value="0">Select</option>
                            <option value="1">All Employer</option>
                            <option value="2">All Partners</option>
                            <option value="3">Specific Employer</option>
                            <option value="4">Specific Partner</option>
                        </select>                        
                    </div>
                         </div>
                          <div class="span5" id="messageto_div">
                              <div class="control-group">
                                  
                                <?php echo $form->dropDownList($this->adminMessages, 'MessageTo', array(),array('id' => 'AdminMessages_MessageTo')); ?>   
                              </div>
                              </div>
                                                  
                    </div>
                </div>
            </div>
            
               <div class="row-fluid">
                <div class="span10">
                    <div class="control-group">
                          <div class="span5">
                    <div class="control-group">
                          <?php echo $form->label($this->adminMessages, 'Alert Message?'); ?>    
                    </div>
                          </div>
                          <div class="span5">
                    <div class="control-group">
                        <?php echo $form->checkBox($this->adminMessages, 'isClose', array('id' => 'AdminMessages_isClose')); ?>
                    </div>
                          </div>
                    </div>
                </div>
            </div>
            
           
            
            
  
            
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">

                        <?php echo $form->label($this->adminMessages, 'MessageText'); ?>   

                        <?php echo $form->textArea($this->adminMessages, 'MessageText', array('id' => 'AdminMessages_MessageText','class'=>'span12',"style"=>"height:116px")); ?>
                                                  
                    </div>
                </div>
            </div>




        </div>
        </div>     
        <div class="modal-footer">
            <div  class="row-fluid">
                <div class="span12" style="padding:5px;text-align:right">
<!--                                                <input type="button" class="btn btn-success  btn-large btn-block r_login" onclick="clicksub()"/>-->
                    <?php echo CHtml::Button('Save', array('onclick' => 'saveAdminMessagesForm();', 'class' => 'btn btn-warning',  'id' => 'AdminMessagesButtonId')); ?> 

                    <?php echo CHtml::resetButton('Clear', array("id" => 'messageResetId', 'class'=>'btn btn-primary btn-info',"style"=>'display:none;'));  ?>

                </div>	
            </div>	
            <?php $this->endWidget(); ?> 
        </div>





                   



</div>
      </div>
    </div>
<script type="text/javascript">
   
  $('#messageto_div').hide();
    function getAllEmployers(type){
        var queryString="isEmployer="+type
            ajaxRequest("/admin/getEmployers", queryString, getToAddressHandler);
    }
    function getToAddressHandler(data){
  
        $('#AdminMessages_MessageTo option').remove();
        var dataArr=data.data.data;

        $.each(dataArr, function(i){
           
            $('#AdminMessages_MessageTo').append($("<option></option>")
           
            .attr("value",dataArr[i]['UserId']+'_'+dataArr[i]['EmployerName'])
            .text(dataArr[i]['EmployerName']));
        });
        $('#messageto_div').show();    
    }
       
       function AllEmployersandPartners(type){
          
          if(type==2){
              $('#AdminMessages_IsEmployer').val(3);
            var dataArr = [{'value':'allPartners','text':'allPartners'}];   
          }
           if(type==1){
               $('#AdminMessages_IsEmployer').val(2);
              var dataArr = [{'value':'allEmployers','text':'allEmployers'}]; 
          }
         

// Removes all options for the select box
$('#AdminMessages_MessageTo option').remove();
        $.each(dataArr, function(i){
             $('#AdminMessages_MessageTo').append($("<option></option>")
            .attr("value",dataArr[i]['value'])
            .text(dataArr[i]['value']));
        });
        $('#messageto_div').hide();    
    }
    
    
$('#AdminMessages_MessageToselect').on('change', function() {
    
    if(this.value==3){
        getAllEmployers(2);  
        $('#AdminMessages_IsEmployer').val(2);
    }
    
    if(this.value==2){
        AllEmployersandPartners(this.value);  
    }
    if(this.value==1){
        AllEmployersandPartners(this.value);  
    }
    
    if(this.value==4){
        $('#AdminMessages_IsEmployer').val(3);
        getAllEmployers(3); 
    }
});
  
    function saveAdminMessagesForm(){
      
        
        $("#AdminMessagesButtonId").val('Please wait..');
          var data=$("#message-form").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/saveAdminMessage"); ?>',
            data:data,
            success:saveAdminMessagesFormHandler,
            error: function(data) { // if error occured
                alert("Error occured.please try again==="+data.toSource());
                // alert(data.toSource());
            },
            
            dataType:'json'
        }); 
    }

    function saveAdminMessagesFormHandler(data){
        
    if(data.data.data=="success"){
      $('#messageResetId').trigger('click');
        $("#AdminMessagePopup").modal('hide');   
         getAdminMessages(0,'','');   
    }else{
           var lengthvalue=data.error.length;
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }
            var j=0;
            var erVal = "";
//            $("#reg_error").removeClass();
//            $("#reg_error").addClass("alert alert-danger");
            $.each(error, function(key, val) {
           
                if($("#"+key+"_em_")){                     
                  // alert(val)
                    $("#"+key+"_em_").text(val); 
                    erVal = val;                    
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                    j++;
                }             
               
            });
    }
     $("#AdminMessagesButtonId").val('Save');
       
    }
  
     $("#AdminMessagePopup").on('hidden',function(){
        addClass2Body("admin_layout_body", "remove");
}); 

    



</script>
