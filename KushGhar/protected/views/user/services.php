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


                            <!--<input type="hidden" id="HouseCleaning" value="<?php echo $HouseCleaning;?>" >-->
                            
                            <fieldset>
                                <div class=" row-fluid borderB">
                                    <div class="span8 ">
                                        <div class="housecleaning_title">
                                            House leaning Service
                                        </div>
                                    </div>
                                    <div class="span4 ">
                                        <div class="pull-right">
                                            <a class="details" href="/site/cleaning">Service Details</a>
                                        </div>
                                    </div>
                                </div>
       
                                <div class="row-fluid">
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Square Feets'); ?>
                                        <?php echo $form->textField($model, 'SquareFeets', array('value'=>$getServiceDetails['squarefeets'],'maxLength' => 10, 'class' => 'span12', 'placeholder' => 'Square Feets…')); ?>
                                        <?php echo $form->error($model, 'SquareFeets'); ?>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row-fluid">
                                    <div class=" span3">
                                        <?php $Rooms = array();
                                        for( $i = 1; $i <= 5; ++$i )
                                        $Rooms[ $i ] = $i;
                                        ?>
                                        <?php echo $form->label($model, 'Living Room(s)'); ?>
                                        <?php echo $form->dropDownList($model,'LivingRooms', $Rooms, array('options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>
                                        <?php //echo $form->dropDownList($model,'LivingRooms', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('options' => array($getServiceDetails['total_livingRooms'] => array('selected' => 'selected'))),array('class' => 'span6'));?>
                                        
                                    </div>
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Bed Room(s)'); ?>
                                        <?php echo $form->dropDownList($model,'BedRooms', $Rooms, array('options' => array($getServiceDetails['total_bedRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>
                                        <?php //echo $form->dropDownList($model,'BedRooms', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span6'));?>
                                        
                                    </div>
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Kitchen(s)'); ?>
                                        <?php echo $form->dropDownList($model,'Kitchens', $Rooms, array('options' => array($getServiceDetails['total_kitchens'] => array('selected' => 'selected')), 'class' => 'span12'));?>
                                        <?php //echo $form->dropDownList($model,'Kitchens', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span6'));?>
                                        
                                    </div>
                                    <div class=" span3">
                                        <?php echo $form->label($model, 'Bath Room(s)'); ?>
                                        <?php echo $form->dropDownList($model,'BathRooms', $Rooms, array('options' => array($getServiceDetails['total_bathRooms'] => array('selected' => 'selected')), 'class' => 'span12'));?>
                                            <?php //echo $form->dropDownList($model,'BathRooms', array('1' => '1', '2' => '2', '3'=>'3', '4'=>'4', '5'=>'5'), array('class' => 'span6'));?>
                                        
                                    </div>
                                    
                                    
                                </div><hr>
                               
                                    <h4 class="paddingTop0 ">Additional Services</h4>
                                    <div class="Additional_S"> <div class="row-fluid">
                                            <div class="span4 window_cleaning  "><label>Window Grills Cleaning</label>
                                            <div class="switch switch-large" id="WindowGrills" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'WindowGrills', array('id' => 'HouseCleaningForm_WindowGrills')); ?>
                                                </div>
                                            </div>
                                            <div class="span4 fridge dashed_left_border  "><label>Fridge Interior Cleaning</label>
                                            <div class="switch switch-large" id="FridgeInterior" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'FridgeInterior', array('id' => 'HouseCleaningForm_FridgeInterior')); ?>
                                                </div>
                                            </div>
                                            <div class="span4 woven dashed_left_border "><label>Micro woven Cleaning</label>
                                             <div class="switch switch-large" id="MicroWaveOven" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'MicroWaveOven', array('id' => 'HouseCleaningForm_MicroWaveOven')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    
                                    
                                   <!--<div class="row-fluid">
                                            <div class="span6">
                                                <?php echo $form->label($model, 'Window Grills Cleaning'); ?>
                                                <div class="switch switch-large" id="WindowGrills" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'WindowGrills', array('id' => 'HouseCleaningForm_WindowGrills')); ?>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <?php echo $form->label($model, 'Fridge Interior Cleaning'); ?>
                                                <div class="switch switch-large" id="FridgeInterior" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'FridgeInterior', array('id' => 'HouseCleaningForm_FridgeInterior')); ?>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row-fluid">
                                            <div class="span6">
                                                <?php echo $form->label($model, 'Micro Wave Oven Interior'); ?>
                                                <div class="switch switch-large" id="MicroWaveOven" data-on-label="Yes" data-off-label="No">
                                                <?php echo $form->checkBox($model, 'MicroWaveOven', array('id' => 'HouseCleaningForm_MicroWaveOven')); ?>
                                                </div>
                                            </div>
                                            
                                    </div>-->
                                
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
        $('#WindowGrills').bootstrapSwitch();
        $('#FridgeInterior').bootstrapSwitch();
        $('#MicroWaveOven').bootstrapSwitch();
        <?php if($getServiceDetails['window_grills'] == 1){ ?>
        $('#WindowGrills').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#WindowGrills').bootstrapSwitch('setState', false);
        <?php } ?>
        <?php if($getServiceDetails['fridge_interior'] == 1){ ?>
        $('#FridgeInterior').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#FridgeInterior').bootstrapSwitch('setState', false);
        <?php } ?>
            <?php if($getServiceDetails['microwave_oven_interior'] == 1){ ?>
        $('#MicroWaveOven').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#MicroWaveOven').bootstrapSwitch('setState', false);
        <?php } ?>
        
    });
    </script>