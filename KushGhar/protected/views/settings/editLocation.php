<?php 
 $editLocationForm=$this->beginWidget('CActiveForm', array(
        'id'=>'editLocationForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $editLocationForm->error($model, 'error',array('value'=>'Hide')); 
 echo $editLocationForm->hiddenField($model,'CityId', array('value'=>$city));
 echo $editLocationForm->hiddenField($model,'Id',array('value'=>$getLocationDetails['Id']));
?>
    <div class="row-fluid">
        <div class="span4">
        <?php echo $editLocationForm->labelEx($model,'City'); ?>
        <?php echo $editLocationForm->dropDownList($model, 'CityName', CHtml::listData($cities, 'Id', 'CityName'), array('prompt'=>'Select City','options' => array($city => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $editLocationForm->error($model,'CityName'); ?>
        </div>
        <div class=" span4">
            <?php echo $editLocationForm->label($model, '<abbr title="required">*</abbr> Location Name'); ?>
            <?php echo $editLocationForm->textField($model, 'LocationName', array('value'=>$getLocationDetails['LocationName'] ,'class' => 'span10')); ?>
            <?php echo $editLocationForm->error($model, 'LocationName'); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'edit_save','class' => 'btn btn-primary','onclick'=>'saveChanges();')); ?>
         </div>
<script type="text/javascript">
    $(document).ready(function() { 
        if($('#LocationsForm_id').val()!='')
        $('#LocationsForm_CityName').attr('disabled', true);
    });
    function saveChanges(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","editLocationForm");
            var data = $("#editLocationForm").serialize();
            ajaxRequest('/settings/editLocationSave', data, locationHandler)
        }
    }
    function locationHandler(data)
    {
        if(data.status =='success'){
            $("#LocationsForm_error_em_").show(1000);
                    $("#LocationsForm_error_em_").removeClass('errorMessage');
                    $("#LocationsForm_error_em_").addClass('alert alert-success');
                    $("#LocationsForm_error_em_").text(data.error);
                    $("#LocationsForm_error_em_").fadeOut(2000, "");
                    setTimeout(function() {
	      window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/Locations?CityId='+$('#LocationsForm_CityId').val();
	    }, 3000);
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#LocationsForm_error_em_").removeClass('alert alert-success');
            $("#LocationsForm_error_em_").addClass('errorMessage');
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
        var prev="<?php echo isset($getLocationDetails['LocationName'])?$getLocationDetails['LocationName']:''?>";
        var present=$('#LocationsForm_LocationName').val();
        if($('#LocationsForm_id').val()==''){
            if($('#LocationsForm_CityName').val()==''){
                $("#LocationsForm_CityName_em_").show();
            $("#LocationsForm_CityName_em_").addClass('errorMessage');
            $("#LocationsForm_CityName_em_").text("Please select City");
            return false;
            }
        }
        if($('#LocationsForm_LocationName').val()==''){
            $("#SettingsForm_CityName_em_").hide();
            $("#LocationsForm_LocationName_em_").show();
            $("#LocationsForm_LocationName_em_").addClass('errorMessage');
            $("#LocationsForm_LocationName_em_").text("Please enter a value for Location Name.");
            return false;
        }
       if(prev==present){
            $("#LocationsForm_LocationName_em_").show();
            $("#LocationsForm_LocationName_em_").addClass('errorMessage');
            $("#LocationsForm_LocationName_em_").text("Please Modify the Location name and then click on save");
            return false;
        }
        else{
            $("#LocationForm_CityName_em_").hide();
            $("#LocationsForm_LocationName_em_").hide();
            return true;
        }
    }
</script>