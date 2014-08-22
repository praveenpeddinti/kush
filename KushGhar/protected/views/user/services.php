                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'services-form',
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                            ));?>
                        <?php echo $form->hiddenField($model, 'HouseCleaning', array('value'=>$HouseCleaning)); ?>
                        <?php echo $form->hiddenField($model, 'CarCleaning', array('value'=>$CarCleaning)); ?>
                        <?php echo $form->hiddenField($model, 'StewardCleaning', array('value'=>$StewardCleaning)); ?>
                        <?php echo $form->hiddenField($model, 'PriceFlag', array('value'=>$PriceFlag)); ?> 
                        <?php echo $form->hiddenField($model, 'ContactAddress', array('value'=>$customerAddressDetails->address_line1)); ?> 
                        <?php echo $form->hiddenField($model,'state',array('value'=>$customerAddressDetails->address_state));?>
                        <?php echo $form->hiddenField($model,'city',array('value'=>$customerAddressDetails->address_city));?>


                            <!--<input type="hidden" id="HouseCleaning" value="<?php echo $HouseCleaning;?>" >-->
                            
                            <fieldset>
                                <div class=" row-fluid borderB">
                                    <div class="span12 ">
                                        <div class="housecleaning_title">
                                            House Cleaning Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li style='float:none'>Kitchen</li><li style='float:none'>Bedroom</li><li style='float:none'>Living room</li><li style='float:none'>Bathroom</li><li style='float:none'>Common areas</li></ul>" data-original-title="House Cleaning" href="/site/cleaning">(What is included <b>?</b>)</a>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="row-fluid">
                                    <div class=" span4">
                                        <?php echo $form->label($model, 'HouseType'); ?>
                                        <?php echo $form->dropDownList($model,'HouseType', array(''=>'Select House Type','Apartment' => 'Apartment', 'Villa'=>'Villa','Independent House' => 'Independent House', 'Commercial'=>'Commercial'), array('class' => 'span12','options' => array($getServiceDetails['house_type'] => array('selected' => 'selected'))));?>
                                    </div>  
                                    <div class=" span4">
                                        <?php echo $form->label($model, 'Square Feets'); ?>
                                        <?php echo $form->dropDownList($model,'SquareFeets', array(''=>'Select Range','500-750' => '500-750', '750-1000'=>'750-1000','1000-1500' => '1000-1500', '1500-2000'=>'1500-2000', '2000 and more'=>'2000 and more '), array('class' => 'span12','options' => array($getServiceDetails['squarefeets'] => array('selected' => 'selected'))));?>
                                    </div>
                                      <div class="span4">
                                        <label><abbr title="required">*</abbr> Service Date</label>
                                        <?php  echo $form->textField($model, 'ServiceStartTime', array('value'=>$getServiceDetails['houseservice_start_time'], 'class' => 'span8','readOnly'=>'true')); ?>
                                        <?php echo $form->error($model, 'ServiceStartTime'); ?>

                                    </div>
                                    
                                </div>
                                
                               
                                <div class="row-fluid">
                                    <div class=" span3">
                                        <?php $Rooms = array();
                                        for( $i = 0; $i <= 5; ++$i )
                                        $Rooms[ $i ] = $i;
                                        ?>
                                        <?php echo $form->label($model, 'Living room(s)'); ?>

                                        <?php //echo $form->dropDownList($model,'LivingRooms', $Rooms, array('options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>

                                        <?php echo $form->dropDownList($model,'LivingRooms', array('1' => '1', '0'=>'0','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span12','options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected'))));?>
                                        
                                    </div>
                                    <div class=" span3">

                                        <?php echo $form->label($model, 'Bedroom(s)'); ?>
                                        <?php //echo $form->dropDownList($model,'BedRooms', $Rooms, array('options'=>array($getServiceDetails['total_bedRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>

                                        <?php echo $form->dropDownList($model,'BedRooms', array('1' => '1', '0'=>'0','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span12','options' => array($getServiceDetails['total_bedRooms'] => array('selected' => 'selected'))));?>
                                        
                                    </div>
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Kitchen(s)'); ?>

                                        <?php //echo $form->dropDownList($model,'Kitchens', $Rooms, array('options' => array($getServiceDetails['total_kitchens'] => array('selected' => 'selected')), 'class' => 'span12'));?>

                                        <?php echo $form->dropDownList($model,'Kitchens', array('1' => '1', '0'=>'0','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span12','options' => array($getServiceDetails['total_kitchens'] => array('selected' => 'selected'))));?>
                                        
                                    </div>
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Bathroom(s)'); ?>

                                        <?php //echo $form->dropDownList($model,'BathRooms', $Rooms, array('options' => array($getServiceDetails['total_bathRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>

                                            <?php echo $form->dropDownList($model,'BathRooms', array('1' => '1', '0'=>'0','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span12','options' => array($getServiceDetails['total_bathRooms'] => array('selected' => 'selected'))));?>
                                        
                                    </div>
                                    
                                   <div class="row-fluid">
                                       <div class="span12">
                                         <?php echo $form->error($model, 'LivingRooms'); ?>  
                                       </div> </div>

                                </div>
                                <!--<div class="row-fluid">
                                    <div class="span12">
                                    <label>Pooja Room Cleaning</label>
                                    <div class="switch switch-large" id="PoojaRoom" data-on-label="Yes" data-off-label="No">
                                    <?php //echo $form->checkBox($model, 'PoojaRoom', array('id' => 'HouseCleaningForm_PoojaRoom')); ?>
                                    </div>
                                    </div>
                                </div>-->

                                <hr>
                                    <h4 class="paddingTop0 ">Additional Services</h4>
                                    <div class="Additional_S"> <div class="row-fluid">
                                            <div class="span3 window_cleaning" style="min-height: 121px"><?php echo $form->label($model, 'Window Grills Cleaning'); ?>
                                            <div class="switch switch-large" id="WindowGrills" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'WindowGrills', array('id' => 'HouseCleaningForm_WindowGrills')); ?>
                                            </div>
                                                <div id="WindowGrillsTooltip" class="Additional_S_price" style="display:none">Cost of Services is<br/> <b>Rs.<label>250</label>/-</b></div>
                                            </div>
                                            <div class="span3 cupboard dashed_left_border" style="min-height: 121px"><?php echo $form->label($model, 'Cupboard Interior Cleaning'); ?>
                                            <div class="switch switch-large" id="CupBoard" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'CupBoard', array('id' => 'HouseCleaningForm_CupBoard')); ?>
                                            </div>
                                                <div id="CupBoardTooltip" class="Additional_S_price" style="display:none">Cost of Services is<br/> <b>Rs.<label>250</label>/-</b></div>
                                            </div>
                                            <div class="span3 fridge dashed_left_border" style="min-height: 121px"><?php echo $form->label($model, 'Fridge Interior Cleaning'); ?>
                                            <div class="switch switch-large" id="FridgeInterior" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'FridgeInterior', array('id' => 'HouseCleaningForm_FridgeInterior')); ?>
                                            </div>
                                            <div id="FridgeInteriorTooltip" class="Additional_S_price" style="display:none">Cost of Services is <br/> <b>Rs.<label>250</label>/-</b></div>    
                                            </div>
                                            <div class="span3 woven dashed_left_border" style="min-height: 121px"><?php echo $form->label($model, 'Microwave Oven Interior'); ?>
                                             <div class="switch switch-large" id="MicroWaveOven" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'MicroWaveOven', array('id' => 'HouseCleaningForm_MicroWaveOven')); ?>
                                                </div>
                                                <div id="MicroWaveOvenTooltip" class="Additional_S_price" style="display:none">Cost of Services is<br/> <b>Rs.<label>250</label>/-</b></div>
                                            </div>
                                            <div class="span3 pooja" style="min-height: 121px">
                                                <label>Pooja Room Cleaning</label>
                                                <div class="switch switch-large" id="PoojaRoom" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'PoojaRoom', array('id' => 'HouseCleaningForm_PoojaRoom')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    
                                    <div class="row-fluid" id="diffDiv" style="display: none">
                                    <div class="span12">
                                        <div class="pull-right">
                                        <label>Same as Contact Info Address</label>
                                        <div class="switch switch-large" id="DifferentAddress" data-on-label="Yes" data-off-label="No">
                                        <?php echo $form->checkBox($model, 'DifferentAddress', array('id' => 'HouseCleaningForm_DifferentAddress')); ?>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Address Line1</label>
                <?php  echo $form->textField($model, 'Address1', array('value'=>$getServiceDetails['H_address1'],'maxLength'=>'100', 'class' => 'span12')); ?>
                <?php echo $form->error($model, 'Address1'); ?>
                
             </div>
             <div class=" span4">
                <label> Address Line2</label>
                <?php  echo $form->textField($model, 'Address2', array('value'=>$getServiceDetails['H_address2'],'maxLength'=>'100', 'class' => 'span12')); ?>
                <?php  echo $form->error($model, 'Address2'); ?>
             </div>
             <div class=" span4">
                <label> Alternate Phone</label><input type="text" value="+91" disabled="disabled" class="span3"/>
                <?php  echo $form->textField($model, 'AlternatePhone', array('value'=>$getServiceDetails['H_alternate_phone'],'maxLength'=>'10', 'class' => 'span9', 'onkeypress'=>'return isNumberKey(event);')); ?>
                <?php echo $form->error($model, 'AlternatePhone'); ?>
                
             </div> 
        </div>
        <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> City</label>
                <?php echo $form->dropDownList($model,'City', array(''=>'Select City','Hyderabad' => 'Hyderabad', 'Secunderabad'=>'Secunderabad'), array('class' => 'span12','options' => array($getServiceDetails['H_city'] => array('selected' => 'selected'))));?>       
                <?php echo $form->error($model, 'City'); ?>               
           </div>
            <div class=" span4">
                <label><abbr title="required">*</abbr> State</label>
                <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($getServiceDetails['H_state'] => array('selected' => 'selected')), 'class' => 'span12')); ?>
                <?php echo $form->error($model,'State'); ?>
                <!--<select name="State" id="State" class="span12" >
                    <option value="">Select State</option>
                    <?php //foreach ($States as $course) { ?>
                    <option  value="<?php //echo $course['Id']; ?>"><?php //echo $course['StateName']; ?></option>
                    <?php //} ?>
                    </select>
                    <div id="State_em" class="errorMessage" style="display:none"></div>-->
             </div>      
           <div class=" span4">
                <label><abbr title="required">*</abbr> Pin Code</label>
                <?php  echo $form->textField($model, 'PinCode', array('value'=>$getServiceDetails['H_pincode'],'maxLength'=>'6', 'class' => 'span12', 'onkeypress'=>'return isNumberKey(event);')); ?>
                <?php echo $form->error($model, 'PinCode'); ?>
           </div>
           </div>
                                    
                                   
                                

                                                                    
                                
                                <div class="row-fluid">
                                <div class=" span12">
                                  <div class="pull-right paddingT30">
                                        <?php   /*echo CHtml::ajaxButton('Next', array('user/services'), array(
                                                        'type' => 'POST',
                                                        'dataType' => 'json',
                                                        'beforeSend' => 'function(){
                                                                scrollPleaseWait("serviceSpinLoader","services-form");}',
                                                        'success' => 'function(data,status,xhr) { addHouseCleaningServicehandler(data,status,xhr);}'), array('class' => 'btn btn-primary','id'=>'HouseCleaningSubmit'));
                                         */?>
                                      
                                      <input type="button" value="Next" id="HouseCleaningSubmit" class="btn btn-primary" onclick="submitHouseCleaning()" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                        <?php $this->endWidget(); ?>


<script type="text/javascript">
    
    $(document).ready(function() {
        if($("#HouseCleaningForm_State").val()=='')
        $("#HouseCleaningForm_State").val('35');
        Custom.init();
        $('#WindowGrills').bootstrapSwitch();
        $('#CupBoard').bootstrapSwitch();
        $('#FridgeInterior').bootstrapSwitch();
        $('#MicroWaveOven').bootstrapSwitch();
        $('#PoojaRoom').bootstrapSwitch();
        $('#DifferentAddress').bootstrapSwitch();
        if(($('#HouseCleaningForm_ContactAddress').val()=='')||($('#HouseCleaningForm_ServiceStartTime').val()!='')){
            document.getElementById('diffDiv').style.display='none';
            $('#HouseCleaningForm_Address1').attr('readOnly', false);
            $('#HouseCleaningForm_Address2').attr('readOnly', false);
            $('#HouseCleaningForm_AlternatePhone').attr('readOnly', false);
            $('#HouseCleaningForm_State').attr('disabled', false);
            $('#HouseCleaningForm_City').attr('disabled', false);
            $('#HouseCleaningForm_PinCode').attr('readOnly', false);
        
            
        }else{
            document.getElementById('diffDiv').style.display='block';
            $('#DifferentAddress').bootstrapSwitch('setState', true);
            $('#HouseCleaningForm_Address1').attr('readOnly', true);
            $('#HouseCleaningForm_Address2').attr('readOnly', true);
            $('#HouseCleaningForm_AlternatePhone').attr('readOnly', true);
            $('#HouseCleaningForm_State').attr('disabled', true);
            $('#HouseCleaningForm_City').attr('disabled', true);
            $('#HouseCleaningForm_PinCode').attr('readOnly', true);
            $('#HouseCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
            $('#HouseCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
            $('#HouseCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
            $('#HouseCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');
            $('#HouseCleaningForm_state').val('<?php echo $customerAddressDetails->address_state;?>');
            $('#HouseCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
            $('#HouseCleaningForm_city').val('<?php echo $customerAddressDetails->address_city;?>');
            $('#HouseCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
        }
        if($('#HouseCleaningForm_ServiceStartTime').val()!=''){
            document.getElementById('diffDiv').style.display='none';
            $('#HouseCleaningForm_Address1').attr('readOnly', false);
            $('#HouseCleaningForm_Address2').attr('readOnly', false);
            $('#HouseCleaningForm_AlternatePhone').attr('readOnly', false);
            $('#HouseCleaningForm_State').attr('disabled', false);
            $('#HouseCleaningForm_City').attr('disabled', false);
            $('#HouseCleaningForm_PinCode').attr('readOnly', false);
            $('#HouseCleaningForm_Address1').val('<?php echo $getServiceDetails["H_address1"];?>');
            $('#HouseCleaningForm_Address2').val('<?php echo $getServiceDetails["H_address2"];?>');
            $('#HouseCleaningForm_AlternatePhone').val('<?php echo $getServiceDetails["H_alternate_phone"];?>');
            $('#HouseCleaningForm_State').val('<?php echo $getServiceDetails["H_state"]?>');
            $('#HouseCleaningForm_City').val('<?php echo $getServiceDetails["H_city"];?>');
            $('#HouseCleaningForm_PinCode').val('<?php echo $getServiceDetails["H_pincode"];?>');
        }
        <?php if($getServiceDetails['window_grills'] == 1){ ?>
        $('#WindowGrills').bootstrapSwitch('setState', true);
        $('#WindowGrillsTooltip').show();
        <?php } else {?>
        $('#WindowGrills').bootstrapSwitch('setState', false);
        <?php } ?>
            
        <?php if($getServiceDetails['cupboard_cleaning'] == 1){ ?>
        $('#CupBoard').bootstrapSwitch('setState', true);
        $('#CupBoardTooltip').show();
        <?php } else {?>
        $('#CupBoard').bootstrapSwitch('setState', false);
        <?php } ?>    
            
        <?php if($getServiceDetails['fridge_interior'] == 1){ ?>
        $('#FridgeInterior').bootstrapSwitch('setState', true);
        $('#FridgeInteriorTooltip').show();
        <?php } else {?>
        $('#FridgeInterior').bootstrapSwitch('setState', false);
        <?php } ?>
            
        <?php if($getServiceDetails['microwave_oven_interior'] == 1){ ?>
        $('#MicroWaveOven').bootstrapSwitch('setState', true);
        $('#MicroWaveOvenTooltip').show();
        <?php } else {?>
        $('#MicroWaveOven').bootstrapSwitch('setState', false);
        <?php } ?>
            <?php if($getServiceDetails['pooja_room_cleaning'] == 1){ ?>
        $('#PoojaRoom').bootstrapSwitch('setState', true);
         
        <?php } else {?>
        $('#PoojaRoom').bootstrapSwitch('setState', false);
        
        <?php } ?>
         $('#DifferentAddress').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            if(value == false){
                $('#HouseCleaningForm_DifferentAddress').val('0');
                $('#HouseCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
                $('#HouseCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
                $('#HouseCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
                $('#HouseCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');
                $('#HouseCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
                $('#HouseCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
                $('#HouseCleaningForm_Address1').attr('readOnly',false);
                $('#HouseCleaningForm_Address2').attr('readOnly', false);
                $('#HouseCleaningForm_AlternatePhone').attr('readOnly', false);
                $('#HouseCleaningForm_State').attr('disabled', false);
                $('#HouseCleaningForm_City').attr('disabled', false);
                $('#HouseCleaningForm_PinCode').attr('readOnly', false);
            }
            else{
                $('#HouseCleaningForm_DifferentAddress').val('1');
                $('#HouseCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
                $('#HouseCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
                $('#HouseCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
                $('#HouseCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');
                $('#HouseCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
                $('#HouseCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
                $('#HouseCleaningForm_Address1').attr('readOnly', true);
                $('#HouseCleaningForm_Address2').attr('readOnly',  true);
                $('#HouseCleaningForm_AlternatePhone').attr('readOnly',  true);
                $('#HouseCleaningForm_State').attr('disabled',  true);
                $('#HouseCleaningForm_state').val('<?php echo $customerAddressDetails->address_state; ?>');
                $('#HouseCleaningForm_City').attr('disabled',  true);
                $('#HouseCleaningForm_city').val('<?php echo $customerAddressDetails->address_city;?>');
                $('#HouseCleaningForm_PinCode').attr('readOnly',  true);
            }
         });   
         $('#WindowGrills').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            if(value == true){
                $('#WindowGrillsTooltip').show();
                //$("#WindowGrillsTooltip").fadeOut(10000, "");
            }
            else
                $('#WindowGrillsTooltip').hide();
        });
        $('#CupBoard').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            
            if(value == true){
                $('#CupBoardTooltip').show();
                //$("#CupBoardTooltip").fadeOut(10000, "");
            }
            else
                $('#CupBoardTooltip').hide();
        });
        $('#FridgeInterior').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            
            if(value == true){
                $('#FridgeInteriorTooltip').show();
                //$("#FridgeInteriorTooltip").fadeOut(10000, "");
            }
            else
                $('#FridgeInteriorTooltip').hide();
        });
        $('#MicroWaveOven').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            
            if(value == true){
                $('#MicroWaveOvenTooltip').show();
                //$("#MicroWaveOvenTooltip").fadeOut(10000, "");
            }
            else
                $('#MicroWaveOvenTooltip').hide();
        });
        
    });
    
   $(function () {
       var date=new Date.today().addDays(2);
       var cyear=date.getFullYear();
       var eyear=cyear+1;
       $('#HouseCleaningForm_ServiceStartTime').datetimepicker({
            step:30,
            format:'d-m-Y',
            minDate:date,
            formatDate:'Y/m/d',
            scrollMonth:false,
            timepicker:false,
            closeOnDateSelect:true,
            defaultDate:date,
            yearStart:cyear,
            yearEnd:eyear
        });

    var showPopover = function () {
        $(this).popover('show');
    }
    , hidePopover = function () {
        $(this).popover('hide');
    };


    $('.has-popover').popover({
        html:true,
        //content: 'Test1',
        //title: 'Title',
        trigger: 'manual'
    })


    .focus(showPopover)
    .blur(hidePopover)
    .hover(showPopover, hidePopover);
});

    </script>