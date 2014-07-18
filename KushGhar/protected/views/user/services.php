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
                                        <?php echo $form->label($model, 'Square Feet'); ?>
                                        <?php if($getServiceDetails['squarefeets']=='0') {$squareFeetsValue='';}else{ $squareFeetsValue=$getServiceDetails['squarefeets'];} echo $form->textField($model, 'SquareFeets', array('value'=>$squareFeetsValue,'maxLength' => 5, 'class' => 'span12')); ?>
                                        <?php echo $form->error($model, 'SquareFeets'); ?>
                                    </div>
                                      <div class="span8">
                                        <label><abbr title="required">*</abbr> Service Date</label>
                                        <?php  echo $form->textField($model, 'ServiceStartTime', array('value'=>$getServiceDetails['houseservice_start_time'], 'class' => 'span5','readOnly'=>true)); ?>
                                        <?php echo $form->error($model, 'ServiceStartTime'); ?>

                                    </div>
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
                                    <?php echo $form->checkBox($model, 'PoojaRoom', array('id' => 'HouseCleaningForm_PoojaRoom')); ?>
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
                                            <div class="span3 pooja dashed_left_border" style="min-height: 121px">
                                                <label>Pooja Room Cleaning</label>
                                                <div class="switch switch-large" id="PoojaRoom" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'PoojaRoom', array('id' => 'HouseCleaningForm_PoojaRoom')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    
                                    
                                   
                                

                                                                    
                                
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
         Custom.init();
         
         //Date and Time start
        var currentDate=new Date.today().addDays(1);
                var maxdate=new Date();
                maxdate.setFullYear(maxdate.getFullYear()-19);
                var mindate=new Date();
                mindate.setFullYear(currentDate.getFullYear());
                mindate.setMonth(currentDate.getMonth());
                mindate.setDate(currentDate.getDate());
               
                $('#HouseCleaningForm_ServiceStartTime').scroller({
                    preset: 'date',
                    theme: 'android', // for android set theme:'android'
                    display: 'modal',
                    mode: 'scroller',
                    dateFormat:'dd-mm-yyyy',
                    dateOrder: 'Md ddyy',
                    minDate:  mindate
                });
        
                <?php //if(!empty($getServiceDetails['houseservice_start_time']) ){ ?>
                //$('#HouseCleaningForm_ServiceStartTime').handleDtpicker('setDate', new Date(2014, 04, 25, 0, 0, 0));
                <?php //}?>
        $('#WindowGrills').bootstrapSwitch();
        $('#FridgeInterior').bootstrapSwitch();
        $('#MicroWaveOven').bootstrapSwitch();
        $('#PoojaRoom').bootstrapSwitch();
        <?php if($getServiceDetails['window_grills'] == 1){ ?>
        $('#WindowGrills').bootstrapSwitch('setState', true);
        $('#WindowGrillsTooltip').show();
        <?php } else {?>
        $('#WindowGrills').bootstrapSwitch('setState', false);
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
                /*var currentDate=new Date();
                var maxdate=new Date();
                maxdate.setFullYear(maxdate.getFullYear()-19);
                var mindate=new Date();
                mindate.setFullYear(mindate.getFullYear()-100);
                mindate.setMonth(currentDate.getMonth()+2);
                mindate.setDate(currentDate.getDate()+2);
                var currentDate=new Date.today().addDays(2);
    var maxdate=new Date();
    maxdate.setFullYear(maxdate.getFullYear()-19);
    var mindate=new Date();
    mindate.setFullYear(currentDate.getFullYear());
    mindate.setMonth(currentDate.getMonth());
    mindate.setDate(currentDate.getDate());
            alert(mindate); 
            //$('#HouseCleaningForm_ServiceStartTime').handleDtpicker('minDate', new Date(2014, 07, 25, 0, 0, 0));
       $('#HouseCleaningForm_ServiceStartTime').appendDtpicker({
            //'dateFormat':'DD-MM-YYYY h:m',
            //'dateOnly':true,
            //'minuteInterval' : 30,
            //'futureOnly': true,
            //'autodateOnStart':false,
            //'closeonSelected':true,
            'minDate':  new Date(2014, 07, 25, 0, 0, 0)
            
       });*/
   
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