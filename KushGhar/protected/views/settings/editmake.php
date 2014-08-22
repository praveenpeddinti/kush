<?php 
 $editMakeForm=$this->beginWidget('CActiveForm', array(
        'id'=>'editMakeForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $editMakeForm->error($model, 'error',array('value'=>'Hide')); 
 echo $editMakeForm->hiddenField($model,'makeId', array('value'=>$getmakeDetails['id'])); 
?>
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $editMakeForm->label($model, '<abbr title="required">*</abbr> Make Name'); ?>
            <?php echo $editMakeForm->textField($model, 'make_name', array('value'=>$getmakeDetails['make_name'] ,'class' => 'span10')); ?>
            <?php echo $editMakeForm->error($model, 'make_name'); ?>
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
            var data = $("#editMakeForm").serialize();
            ajaxRequest('/settings/editMakeSave', data, rescheduleHandler)
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
        var prev="<?php echo isset($getmakeDetails['make_name'])?$getmakeDetails['make_name']:''?>";
        var present=$('#SettingsForm_make_name').val();
        if($('#SettingsForm_make_name').val()==''){
            $("#SettingsForm_make_name_em_").show();
            $("#SettingsForm_make_name_em_").addClass('errorMessage');
            $("#SettingsForm_make_name_em_").text("Please enter a value for Make Name.");
            return false;
        }   
        if(prev==present){
            $("#SettingsForm_make_name_em_").show();
            $("#SettingsForm_make_name_em_").addClass('errorMessage');
            $("#SettingsForm_make_name_em_").text("Please Modify the Make name and then click on save");
            return false;
        }
        else{
            $("#SettingsForm_make_name_em_").hide();
            return true;
        }
    }
</script>