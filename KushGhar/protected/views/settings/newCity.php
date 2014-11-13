<?php 
 $newCityForm=$this->beginWidget('CActiveForm', array(
        'id'=>'newCityForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $newCityForm->error($model, 'error',array('value'=>'Hide')); 
?>
    <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <?php echo $newCityForm->labelEx($model,'State'); ?>
        <?php echo $newCityForm->dropDownList($model, 'StateId', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array('class' => 'span12'))); ?>
        <?php echo $newCityForm->error($model,'StateId'); ?>
        </div>
        <div class=" span6">
            <?php echo $newCityForm->label($model, '<abbr title="required">*</abbr> City Name'); ?>
            <?php echo $newCityForm->textField($model, 'CityName', array('class' => 'span12')); ?>
            <?php echo $newCityForm->error($model, 'CityName'); ?>
        </div>
            </div>
    </div>
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'edit_save','class' => 'btn btn-primary','onclick'=>'saveChanges();')); ?>
         </div>
<script type="text/javascript">
    function saveChanges(){
        if(validate()){
            var data = $("#newCityForm").serialize();
            ajaxRequest('/settings/newCitySave', data, newCityHandler)
        }
    }
    function newCityHandler(data)
    { 
        if(data.status =='success'){
            $("#CitiesForm_error_em_").show(1000);
                    $("#CitiesForm_error_em_").removeClass('errorMessage');
                    $("#CitiesForm_error_em_").addClass('alert alert-success');
                    $("#CitiesForm_error_em_").text(data.error);
                    $("#CitiesForm_error_em_").fadeOut(2000, "");
                    setTimeout(function() {
         	     window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/cities';
	    }, 3000);
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#CitiesForm_error_em_").removeClass('alert alert-success');
            $("#CitiesForm_error_em_").addClass('errorMessage');
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
            if($('#CitiesForm_StateId').val()==''){
            $("#CitiesForm_StateId_em_").show();
            $("#CitiesForm_StateId_em_").addClass('errorMessage');
            $("#CitiesForm_StateId_em_").text("Please select State");
            return false;
            }
        
        if($('#CitiesForm_CityName').val()==''){
            $("#CitiesForm_StateId_em_").hide();
            $("#CitiesForm_CityName_em_").show();
            $("#CitiesForm_CityName_em_").addClass('errorMessage');
            $("#CitiesForm_CityName_em_").text("Please enter a value for City Name.");
            return false;
        }
        else {
            $("#CitiesForm_StateId_em_").hide();
            $("#CitiesForm_CityName_em_").hide();
            return true;
        }
    }
</script>