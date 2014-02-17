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
                'id' => 'keyword-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                  
                    ));
            ?>
            <div id="reg_error" class="alert-error">
                <?php echo $form->error($this->keywords, 'error'); ?> 

                
                <?php echo $form->error($this->keywords, 'KeyWord', array("inputID" => "KeyWordsForm_KeyWord", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  


            </div>
         
        <?php echo $form->hiddenField($this->keywords, 'Id', array('id' => 'KeyWordsForm_Id')); ?>    
            
            
            
               <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
          <?php echo $form->label($this->keywords, 'KeyWord'); ?>    
               <?php echo $form->textField($this->keywords, 'KeyWord', array('id' => 'KeyWordsForm_KeyWord', 'maxlength' => 50, 'class' => 'span12')); ?>        
                        
                        
                        
                    </div>
                </div>
            </div>
            
 

        </div>
        </div>     
        <div class="modal-footer">
            <div  class="row-fluid">
                <div class="span12" style="padding:5px;text-align:right">
<!--                                                <input type="button" class="btn btn-success  btn-large btn-block r_login" onclick="clicksub()"/>-->
                    <?php echo CHtml::Button('Save', array('onclick' => 'saveKeyWordsForm();', 'class' => 'btn btn-warning',  'id' => 'KeyWordsFormButtonId')); ?> 

                    <?php echo CHtml::resetButton('Clear', array("id" => 'messageResetId', 'class'=>'btn btn-primary btn-info',"style"=>'display:none;'));  ?>

                </div>	
            </div>	
            <?php $this->endWidget(); ?> 
        </div>





                   



</div>
      </div>
    </div>
<script type="text/javascript">

    
    function saveKeyWordsForm(){
      
        
        $("#KeyWordsFormButtonId").val('Please wait..');
          var data=$("#keyword-form").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/saveKeyWords"); ?>',
            data:data,
            success:saveKeyWordsFormFormHandler,
            error: function(data) { // if error occured
                alert("Error occured.please try again==="+data.toSource());
                // alert(data.toSource());
            },
            
            dataType:'json'
        }); 
    }

    function saveKeyWordsFormFormHandler(data){        
    if(data.data.data=="success"){
      $('#messageResetId').trigger('click');
        $("#AdminMessagePopup").modal('hide');   
         getKeywords(0,'','');   
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
     $("#KeyWordsFormButtonId").val('Save');
    }
  
     $("#AdminMessagePopup").on('hidden',function(){
        addClass2Body("admin_layout_body", "remove");
}); 

    



</script>
