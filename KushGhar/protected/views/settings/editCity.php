<?php 
 $editCityForm=$this->beginWidget('CActiveForm', array(
        'id'=>'editCityForm',
        'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        )
    )); 
 echo $editCityForm->error($model, 'error',array('value'=>'Hide')); 
 echo $editCityForm->hiddenField($model,'Id', array('value'=>$getCityDetails['Id'])); 
?>
<div class="row-fluid">
    <div class=" span12">
            <?php echo $editCityForm->label($model, '<abbr title="required">*</abbr> City Name'); ?>
            <?php echo $editCityForm->textField($model, 'CityName', array('value'=>$getCityDetails['CityName'] ,'class' => 'span5','maxlength' => 25)); ?>
            <?php echo $editCityForm->error($model, 'CityName'); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'edit_save','class' => 'btn btn-primary','onclick'=>'saveChanges();')); ?>
         </div>
<script type="text/javascript">
    function saveChanges(){
        if(validate()){
            var data = $("#editCityForm").serialize();
            ajaxRequest('/settings/editCitySave', data, editCityHandler)
        }
    }
    function editCityHandler(data)
    { 
        if(data.status =='success'){
            $("#CitiesForm_error_em_").show();
            $("#CitiesForm_error_em_").removeClass('errorMessage');
            $("#CitiesForm_error_em_").addClass('alert alert-success');
            $("#CitiesForm_error_em_").text(data.error);
            $("#CitiesForm_error_em_").fadeOut(3000);
            activeFormHandler2($("#CitiesForm_CityName").val(), $("#CitiesForm_Id").val(),'Edit');
            setTimeout(function() {
                $('#myModalforgot1').modal('hide');
                $('#myModalforgot').modal('hide');
	      //window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/carMakes';
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
    function activeFormHandler2(data, rowNos,value) {
        if (value == 'Edit') {
            $('#city_' + rowNos).text(data);
        } 
    }
    function validate(){
        var prev="<?php echo isset($getCityDetails['CityName'])?$getCityDetails['CityName']:''?>";
        var present=$('#CitiesForm_CityName').val();
        if($('#CitiesForm_CityName').val()==''){
            $("#CitiesForm_CityName_em_").show();
            $("#CitiesForm_CityName_em_").addClass('errorMessage');
            $("#CitiesForm_CityName_em_").text("Please enter City Name.");
            return false;
        }   
        if(prev==present){
            $("#CitiesForm_CityName_em_").show();
            $("#CitiesForm_CityName_em_").addClass('errorMessage');
            $("#CitiesForm_CityName_em_").text("Please modify the City Name and then click on save");
            return false;
        }
        else{
            $("#CitiesForm_CityName_em_").hide();
            return true;
        }
    }
</script>