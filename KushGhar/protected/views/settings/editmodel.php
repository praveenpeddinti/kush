<?php 
 $editModelForm=$this->beginWidget('CActiveForm', array(
        'id'=>'editModelForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $editModelForm->error($model, 'error',array('value'=>'Hide')); 
 echo $editModelForm->hiddenField($model,'makeId', array('value'=>$make));
 echo $editModelForm->hiddenField($model,'id',array('value'=>$getmodelDetails['id']));
?>
    <div class="row-fluid">
        <div class="span4">
        <?php echo $editModelForm->labelEx($model,'Make'); ?>
        <?php echo $editModelForm->dropDownList($model, 'make_name', CHtml::listData($makes, 'id', 'make_name'), array('prompt'=>'Select Make','options' => array($getmodelDetails['make_Id'] => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $editModelForm->error($model,'make_name'); ?>
        </div>
        <div class=" span4">
            <?php echo $editModelForm->label($model, '<abbr title="required">*</abbr> Model Name'); ?>
            <?php echo $editModelForm->textField($model, 'model_name', array('value'=>$getmodelDetails['model_name'] ,'class' => 'span10')); ?>
            <?php echo $editModelForm->error($model, 'model_name'); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'edit_save','class' => 'btn btn-primary','onclick'=>'saveChanges();')); ?>
         </div>
<script type="text/javascript">
    $(document).ready(function() { 
        if($('#SettingsForm_id').val()!='')
        $('#SettingsForm_make_name').attr('disabled', true);
    });
    function saveChanges(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","editModelForm")
            var data = $("#editModelForm").serialize();
            ajaxRequest('/settings/editModelSave', data, rescheduleHandler)
        }
    }
    function rescheduleHandler(data)
    { 
        if(data.status =='success'){
            $("#SettingsForm_error_em_").show(1000);
                    $("#SettingsForm_error_em_").removeClass('errorMessage');
                    $("#SettingsForm_error_em_").addClass('alert alert-success');
                    $("#SettingsForm_error_em_").text(data.error);
                    $("#SettingsForm_error_em_").fadeOut(20000, "");
                    setTimeout(function() {
	      window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/carModels?MakeId='+$('#SettingsForm_makeId').val();
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
        var prev="<?php echo isset($getmodelDetails['model_name'])?$getmodelDetails['model_name']:''?>";
        var present=$('#SettingsForm_model_name').val();
        if($('#SettingsForm_id').val()==''){
            if($('#SettingsForm_make_name').val()==''){
                $("#SettingsForm_make_name_em_").show();
            $("#SettingsForm_make_name_em_").addClass('errorMessage');
            $("#SettingsForm_make_name_em_").text("Please select the make");
            return false;
            }
        }
        if($('#SettingsForm_model_name').val()==''){
            $("#SettingsForm_make_name_em_").hide();
            $("#SettingsForm_model_name_em_").show();
            $("#SettingsForm_model_name_em_").addClass('errorMessage');
            $("#SettingsForm_model_name_em_").text("Please Enter the name");
            return false;
        }
       if(prev==present){
            $("#SettingsForm_model_name_em_").show();
            $("#SettingsForm_model_name_em_").addClass('errorMessage');
            $("#SettingsForm_model_name_em_").text("Please Modify the name and then click on save");
            return false;
        }
        else{
            $("#SettingsForm_make_name_em_").hide();
            $("#SettingsForm_model_name_em_").hide();
            return true;
        }
    }
</script>