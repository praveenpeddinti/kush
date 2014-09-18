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
            <?php echo $form->dropDownList($model,'Kitchens', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeOrder(this.value);','options' => array($getServiceDetails['total_kitchens'] => array('selected' => 'selected'))));?>
            <div id="KitchenTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span2">
            <?php echo $form->label($model, 'Bathroom(s)'); ?>
            <?php echo $form->dropDownList($model,'BathRooms', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeOrder(this.value);','options' => array($getServiceDetails['total_bathRooms'] => array('selected' => 'selected'))));?>
            <div id="BathRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>                                    
        <div class=" span2">
            <?php echo $form->label($model, 'Bedroom(s)'); ?>
            <?php echo $form->dropDownList($model,'BedRooms', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10', '0'=>'None'), array('class' => 'span12','onchange' => 'javascript:onChangeOrder(this.value);','options' => array($getServiceDetails['total_bedRooms'] => array('selected' => 'selected'))));?>
            <div id="BedRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span3">                                           
            <?php echo $form->label($model, 'Living room(s)'); ?>
            <?php echo $form->dropDownList($model,'LivingRooms', array('1' => '1','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '0'=>'None'), array('class' => 'span10','onchange' => 'javascript:onChangeOrder(this.value);','options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected'))));?>
            <div id="LivingRoomTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class=" span2">
            <?php echo $form->label($model, 'Other'); ?>
            <?php echo $form->dropDownList($model,'OtherRooms', array('0'=>'None','1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6','7' => '7', '8'=>'8', '9'=>'9', '10'=>'10'), array('class' => 'span12','onchange' => 'javascript:onChangeOrder(this.value);','options' => array($getServiceDetails['other_rooms'] => array('selected' => 'selected'))));?>
            <div id="OtherTooltip" class="Additional_S_price" style="display:none"></div>
        </div>
        <div class="row-fluid">
            <div class="span12">
            <?php echo $form->error($model, 'LivingRooms'); ?>  
            </div> 
        </div>
    </div>
    <div class="row-fluid">
            <div class="span4">
                <table><tr><th>Order Total: </th><td><?php echo $Amt;?></td></tr>
                </table>
            </div>
            <div id="updateCost" class="span8" style="display:none">
                <table><tr><th>Updated Order Total: </th><td id="UTotalTd"></td></tr></table>
            </div>
            <!--<div id="updateCost" class="span6" style="display:block">
            Updated Order Total 
            </div>-->
        </div>
<?php $this->endWidget(); ?>
    <div style="text-align: right">
             <?php echo CHtml::Button('Update Order',array('id' => 'orderCancel','class' => 'btn btn-primary','onclick'=>'orderUpdate();')); ?>
         </div>

<script type="text/javascript">
    function onChangeOrder(value){
        //var r1 = Number(value);
        var r1 = Number($("#HouseCleaningForm_Kitchens").val());
        var r2 = Number($("#HouseCleaningForm_BathRooms").val());
        var r3 = Number($("#HouseCleaningForm_BedRooms").val());
        var r4 = Number($("#HouseCleaningForm_LivingRooms").val());
        var r5 = Number($("#HouseCleaningForm_OtherRooms").val());
        
        var a1 = Number(<?php echo $getServiceDetails['window_grills'];?>);
        var a2 = Number(<?php echo $getServiceDetails['cupboard_cleaning'];?>);
        var a3 = Number(<?php echo $getServiceDetails['fridge_interior'];?>);
        var a4 = Number(<?php echo $getServiceDetails['microwave_oven_interior'];?>);
        
        //alert("---K---"+r1+"---Bath---"+r2+"---Bed---"+r3+"---Liv---"+r4+"---Other---"+r5);
        var priceRoom1 = ''; 
                //Number(r1+r2);
        var priceRoom2 = '';
                //Number(r3+r4+r5);
        var totalRoomsPrice='';
        if ((r1 == 1) && (r2 == 1) && (r3 == 1) && (r4 == 1)) {
        priceRoom1 = Number((r1+r2) * 250);
        priceRoom2 = Number((r3+r4+r5) * 125);
        totalRoomsPrice = Number(priceRoom1 + priceRoom2);
        
    } else {
        var LR = '';
        var BedR = '';
        var BathR = '';
        var KR = '';
        if (r4 > 1) {
            LR = Number((r4 - 1) * 125);
        }
        if (r3 > 1) {
            BedR = Number((r3 - 1) * 125);
        }
        if (r2 > 1) {
            BathR = Number((r2 - 1) * 250);
        }
        if (r1 > 1) {
            KR = Number((r1 - 1) * 250);
        }
                            
        priceRoom1 = Number(LR + BedR);
        priceRoom2 = Number(BathR + KR);
        var otherRoomsCost = Number(r5*125);
        totalRoomsPrice = Number(otherRoomsCost+priceRoom1 + priceRoom2 + 750);
       
    }
    var priceAddServices = Number((a1 + a2 + a3 + a4) * 250);
    totalRoomsPrice= Number(totalRoomsPrice+priceAddServices);
    $("#updateCost").show();
    $("#UTotalTd").text(totalRoomsPrice);
    }
    function orderUpdate(){
        var queryString = $("#updateorderdetails-form").serialize();
        /*var UOrder='Yes';
        
        
        var r1 = Number($("#HouseCleaningForm_Kitchens").val());
        var r2 = Number($("#HouseCleaningForm_BathRooms").val());
        var r3 = Number($("#HouseCleaningForm_BedRooms").val());
        var r4 = Number($("#HouseCleaningForm_LivingRooms").val());
        var r5 = Number($("#HouseCleaningForm_OtherRooms").val());
        var a1 = Number(<?php //echo $getServiceDetails['window_grills'];?>);
        var a2 = Number(<?php //echo $getServiceDetails['cupboard_cleaning'];?>);
        var a3 = Number(<?php //echo $getServiceDetails['fridge_interior'];?>);
        var a4 = Number(<?php //echo $getServiceDetails['microwave_oven_interior'];?>);
        var priceOne = Number(r1+r2);
        var priceTwo = Number(r3+r4+r5);
        var priceThree = Number(a1+a2+a3+a4);
        var total = Number(((priceThree+priceOne)*250)+(priceTwo*125));*/
        if(orderValidate()){
             /*$("#updateCost").show();
             $("#UTotalTd").text(total);
             if(UOrder=="Yes"){
                var r=confirm("Updated Order Total is Rs. "+total+". Are you sure want to continue");
            }else {
                r=true;
            }
         if(r==true){*/   
         ajaxRequest('/admin/updateorderstatus', queryString, updateorderHandler)
        //}else{
        //  $("#updateCost").hide(); 
          
        //}
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
             window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/admin/order';    
            
        }
    } 
    
    
</script>