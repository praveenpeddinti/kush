<?php 
 $form=$this->beginWidget('CActiveForm', array(
     'id'=>'updateorderdetails-form',
     'enableClientValidation'=>true,
     'clientOptions'=>array('validateOnSubmit'=>true,)
     )); 
 ?>
<?php //echo $form->hiddenField($model, 'error',array('value'=>'Hide')); ?>
<?php echo $form->hiddenField($model, 'WindowGrills', array('value'=>$getServiceDetails['window_grills'])); ?> 
<?php echo $form->hiddenField($model, 'CupBoard', array('value'=>$getServiceDetails['cupboard_cleaning'])); ?> 
<?php echo $form->hiddenField($model,'FridgeInterior',array('value'=>$getServiceDetails['fridge_interior']));?>
<?php echo $form->hiddenField($model,'MicroWaveOven',array('value'=>$getServiceDetails['microwave_oven_interior']));?>
<?php echo $form->hiddenField($model, 'Status', array('value'=>$Status)); ?> 
<?php echo $form->hiddenField($model, 'CustId', array('value'=>$OrderNo)); ?> 
<?php echo $form->error($model, 'error'); ?>
    <div class="row-fluid">
        <div class=" span2">
            <?php $Rooms = array(); 
            for( $i = 0; $i <= 5; ++$i ) $Rooms[ $i ] = $i; ?>
            <?php echo $form->label($model, 'Kitchen(s)'); ?>
            <?php echo $form->dropDownList($model,'Kitchens', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeKitchen(this.value);','options' => array($getServiceDetails['total_kitchens'] => array('selected' => 'selected'))));?>
            <div id="KitchenTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span2">
            <?php echo $form->label($model, 'Bathroom(s)'); ?>
            <?php echo $form->dropDownList($model,'BathRooms', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeBathRoom(this.value);','options' => array($getServiceDetails['total_bathRooms'] => array('selected' => 'selected'))));?>
            <div id="BathRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>                                    
        <div class=" span2">
            <?php echo $form->label($model, 'Bedroom(s)'); ?>
            <?php echo $form->dropDownList($model,'BedRooms', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeBedRoom(this.value);','options' => array($getServiceDetails['total_bedRooms'] => array('selected' => 'selected'))));?>
            <div id="BedRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span3">                                           
            <?php echo $form->label($model, 'Living room(s)'); ?>
            <?php echo $form->dropDownList($model,'LivingRooms', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '0'=>'None'), array('class' => 'span10','onchange' => 'javascript:onChangeLivingRoom(this.value);','options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected'))));?>
            <div id="LivingRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span2">
            <?php echo $form->label($model, 'Other'); ?>
            <?php echo $form->dropDownList($model,'OtherRooms', array('0'=>'None','1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10'), array('class' => 'span12','onchange' => 'javascript:onChangeOther(this.value);','options' => array($getServiceDetails['other_rooms'] => array('selected' => 'selected'))));?>
            <div id="OtherTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class="row-fluid">
            <div class="span12">
            <?php echo $form->error($model, 'LivingRooms'); ?>  
            </div> 
        </div>
    </div>
<?php $this->endWidget(); ?>
    <div style="text-align: right">
             <?php echo CHtml::Button('Update Order',array('id' => 'orderCancel','class' => 'btn btn-primary','onclick'=>'orderUpdate();')); ?>
         </div>

<script type="text/javascript">
    function orderUpdate(){
        var queryString = $("#updateorderdetails-form").serialize();
        if(orderValidate()){
         ajaxRequest('/admin/updateorderstatus', queryString, updateorderHandler)
    }
    }
    function orderValidate(){
        
        if (($('#HouseCleaningForm_LivingRooms').val() == '0') && ($('#HouseCleaningForm_BedRooms').val() == '0') && ($('#HouseCleaningForm_Kitchens').val() == '0') && ($('#HouseCleaningForm_BathRooms').val() == '0')) {
            $("#HouseCleaningForm_LivingRooms_em_").show();
            $("#HouseCleaningForm_LivingRooms_em_").addClass('errorMessage');
            $("#HouseCleaningForm_LivingRooms_em_").text("You have choosen 0 rooms at your house, Please choose atleast one kind of room.");
            return false;
        }else {
            $("#HouseCleaningForm_LivingRooms_em_").hide();
            return true;
        }
    }
    
    function updateorderHandler(data)
    { 
        if(data.status =='success'){
            $("#HouseCleaningForm_error_em_").show();
            $("#HouseCleaningForm_error_em_").removeClass('errorMessage');
            $("#HouseCleaningForm_error_em_").addClass('alert alert-success');
            $("#HouseCleaningForm_error_em_").text(data.error);
            $("#HouseCleaningForm_error_em_").fadeOut(3000, "");
            $('#amount_'+data.amt).text(data.data);
            setTimeout(function() {
                $('#myModalUpdateOrder').modal('hide');
            }, 3000);
            
        }
    } 
    
    
</script>