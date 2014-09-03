<?php 
$newMakeForm=$this->beginWidget('CActiveForm', array(
        'id'=>'newMakeForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $newMakeForm->error($model, 'error',array('value'=>'Hide')); 
?>
    <div class="row-fluid">
        <div class=" span12">
            <?php echo $newMakeForm->label($model, '<abbr title="required">*</abbr> Make Name'); ?>
            <?php echo $newMakeForm->textField($model, 'model_name', array('class' => 'span5','maxlength' => 25)); ?>
            <?php echo $newMakeForm->error($model, 'model_name'); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'edit_save','class' => 'btn btn-primary','onclick'=>'saveChanges();')); ?>
         </div>
<script type="text/javascript">
    function saveChanges(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","editMakeForm")
            var data = $("#newMakeForm").serialize();
            ajaxRequest('/settings/newMakeSave', data, rescheduleHandler)
        }
    }
    function rescheduleHandler(data)
    { 
        if(data.status =='success'){
            $("#SettingsForm_error_em_").show();
            $("#SettingsForm_error_em_").removeClass('errorMessage');
            $("#SettingsForm_error_em_").addClass('alert alert-success');
            $("#SettingsForm_error_em_").text(data.error);
            $("#SettingsForm_error_em_").fadeOut(3000);
            setTimeout(function() {
         	     window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/carMakes';
	    }, 3000);
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#SettingsForm_error_em_").removeClass('alert alert-success');
            $("#SettingsForm_error_em_").addClass('errorMessage');
            if(typeof(data.error)== 'string') {
                    var error = eval("(" + data.error.toString() + ")");
                } else {
                    var error = eval(data.error);
                }
                $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }
            });
        }
    } 
    function validate(){
        if($('#SettingsForm_model_name').val()==''){
            $("#SettingsForm_model_name_em_").show();
            $("#SettingsForm_model_name_em_").addClass('errorMessage');
            $("#SettingsForm_model_name_em_").text("Please enter Make Name.");
            return false;
        }   
        else{
            $("#SettingsForm_model_name_em_").hide();
            return true;
        }
    }
</script>