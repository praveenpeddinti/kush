<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'steward-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php echo $form->hiddenField($model1, 'HouseCleaning', array('value'=>$HouseCleaning)); ?>
<?php echo $form->hiddenField($model1, 'CarCleaning', array('value'=>$CarCleaning)); ?>
<?php echo $form->hiddenField($model1, 'StewardCleaning', array('value'=>$StewardCleaning)); ?>
<?php echo $form->hiddenField($model1, 'PriceFlag', array('value'=>$PriceFlag)); ?> 
<?php echo $form->hiddenField($model1, 'ContactAddress', array('value'=>$customerAddressDetails->address_line1)); ?> 
<?php echo $form->hiddenField($model1,'state',array('value'=>$customerAddressDetails->address_state));?>
<?php echo $form->hiddenField($model1,'city',array('value'=>$customerAddressDetails->address_city));?>
<?php echo $form->error($model1, 'error'); ?>
<fieldset>
    <div class=" row-fluid borderB">
        <div class="span12 ">
            <div class="stewards_title">
                Stewards / Stewardesses Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li style='float:none'>Serving food</li><li style='float:none'>Serving beverages</li><li style='float:none'>Assisting in seating the guests</li><li style='float:none'>Refilling of food and beverage</li><li style='float:none'>Garbage emptying</li></ul>" data-original-title="Stewards / Stewardesses" href="/site/stewards">(What is included<b>?</b>)</a>
            </div>
        </div>        
    </div>
    
    
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Type'); ?>
            <?php echo $form->dropDownList($model1, 'EventType', array('' => 'Select Event Type', '1' => 'Formal Party', '2' => 'Casual Party', '3' => 'Birthday Party', '4' => 'Anniversary', '5' => 'Funeral', '6' => 'Sporting Event', '7' => 'Other'), array('options' => array($getServiceDetails['event_type'] => array('selected' => 'selected')),'onchange' => 'javascript:onChangeProduto(this.value);', 'class' => 'span10')); ?>
<?php echo $form->error($model1, 'EventType'); ?>
        </div>
        <div class=" span4" id='otherDiv' style="display:none">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Name'); ?>
            <?php echo $form->textField($model1, 'EventName', array('maxLength' => '10', 'class' => 'span8')); ?>
<?php echo $form->error($model1, 'EventName'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> People Attending'); ?>
            <?php echo $form->textField($model1, 'AttendPeople', array('value'=>$getServiceDetails['attend_people'], 'onblur' => 'javascript:onTotalStewards(this);','maxLength' => 5, 'onkeypress' => 'return isNumberKey(event);', 'class' => 'span6')); ?>
            <?php echo $form->error($model1, 'AttendPeople'); ?>
        </div> 

    </div>
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Start Time'); ?>
            <?php echo $form->textField($model1, 'StartTime', array('value'=>$getServiceDetails['start_time'], 'onchange' => 'javascript:onChangeTime();', 'class' => 'span10','readonly'=>'true')); ?>
<?php echo $form->error($model1, 'StartTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event End Time'); ?>
            <?php echo $form->textField($model1, 'EndTime', array('value'=>$getServiceDetails['end_time'], 'onchange' => 'javascript:onChangeTime();','class' => 'span10','readonly'=>'true')); ?>
<?php echo $form->error($model1, 'EndTime'); ?>
        </div>
        <div class=" span4">
            <?php if($getServiceDetails['service_hours']==0){ $serviceHours='';}else{$serviceHours=$getServiceDetails['service_hours'];}?>
            <?php echo $form->label($model1, 'DurationHour(s)'); ?>
            <?php echo $form->textField($model1, 'DurationHours', array('value'=>$serviceHours, 'class' => 'span4', 'readonly'=>'true')); ?>

        </div> 
        
    </div>
    
    <hr><h4 class="paddingTop0 ">Services Required</h4>
    <div class="Additional_S">
          <div class="row-fluid">
            <div class="span4">
                    <?php echo $form->label($model1, 'Appetizers'); ?>
                <div class="switch switch-large" id="Appetizers" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'Appetizers', array('id' => 'StewardCleaningForm_Appetizers')); ?>
                </div>
            </div>
            <div class="span4">
                    <?php echo $form->label($model1, 'Dinner'); ?>
                <div class="switch switch-large" id="Dinner" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'Dinner', array('id' => 'StewardCleaningForm_Dinner')); ?>
                </div>
            </div>
            <div class="span4">
                    <?php echo $form->label($model1, 'Dessert'); ?>
                <div class="switch switch-large" id="Dessert" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'Dessert', array('id' => 'StewardCleaningForm_Dessert')); ?>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                    <?php echo $form->label($model1, 'Beverage '); ?>
                <div class="switch switch-large" id="Beverage" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'Beverage', array('id' => 'StewardCleaningForm_Alcoholic')); ?>
                </div>
            </div>
            <div class="span4">
                    <?php echo $form->label($model1, 'Coffee / Tea'); ?>
                <div class="switch switch-large" id="PostDinner" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'PostDinner', array('id' => 'StewardCleaningForm_PostDinner')); ?>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row-fluid">
        
        
        <div class="span6">
            <label>Recommended # of Stewards</label>
            <?php if($getServiceDetails['no_of_stewards']==0){ $TotalStewards='';}else{$TotalStewards=$getServiceDetails['no_of_stewards'];}?>
            <?php echo $form->textField($model1, 'totalStewards', array('value'=>$TotalStewards,'maxLength' => 4, 'class' => 'span6','onkeypress' => 'return isNumberKey(event);')); ?>
            <?php echo $form->error($model1, 'totalStewards'); ?>
        </div>
        <div class="span6" id="diffDiv">
                
                <label>Same as Contact Info Address</label><?php //echo $form->label($model1, 'DifferentAddress'); ?>
                <div class="switch switch-large" id="DifferentAddress" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model1, 'DifferentAddress', array('id' => 'StewardCleaningForm_DifferentAddress')); ?>
                
                </div>
            </div>
    </div>
    <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Address Line1</label>
                <?php  echo $form->textField($model1, 'Address1', array('value'=>$getServiceDetails['S_address1'],'maxLength'=>'100', 'class' => 'span12')); ?>
                <?php echo $form->error($model1, 'Address1'); ?>
                
             </div>
             <div class=" span4">
                <label> Address Line2</label>
                <?php  echo $form->textField($model1, 'Address2', array('value'=>$getServiceDetails['S_address2'],'maxLength'=>'100', 'class' => 'span12')); ?>
                <?php  echo $form->error($model1, 'Address2'); ?>
             </div>
             <div class=" span4">
                <label> Alternate Phone</label><input type="text" value="+91" disabled="disabled" class="span3"/>
                <?php  echo $form->textField($model1, 'AlternatePhone', array('value'=>$getServiceDetails['S_alternate_phone'],'maxLength'=>'10', 'class' => 'span9', 'onkeypress'=>'return isNumberKey(event);')); ?>
                <?php echo $form->error($model1, 'AlternatePhone'); ?>
                
             </div> 
        </div>
        <div class="row-fluid">
             <div class=" span4">
                <label><abbr title="required">*</abbr> City</label>
                <?php echo $form->dropDownList($model1,'City', array(''=>'Select City','Hyderabad' => 'Hyderabad', 'Secunderabad'=>'Secunderabad'), array('class' => 'span12','options' => array($getServiceDetails['S_city'] => array('selected' => 'selected'))));?>       
                <?php echo $form->error($model1, 'City'); ?>               
           </div>
            <div class=" span4">
                <label><abbr title="required">*</abbr> State</label>
                <?php echo $form->dropDownList($model1, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($getServiceDetails['S_state'] => array('selected' => 'selected')), 'class' => 'span12')); ?>
                <?php echo $form->error($model1,'State'); ?>
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
                <?php  echo $form->textField($model1, 'PinCode', array('value'=>$getServiceDetails['S_pincode'],'maxLength'=>'6', 'class' => 'span12', 'onkeypress'=>'return isNumberKey(event);')); ?>
                <?php echo $form->error($model1, 'PinCode'); ?>
           </div>
           </div>
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
                <input type="button" value="Previous" id="StewardsCleaningPrevious" class="btn btn-primary" onclick="previousStewardsCleaning()" style="display:none;"/>
                <input type="button" value="Submit" id="StewardsCleaningSubmit" class="btn btn-primary" onclick="submitStewardsCleaning()" />
                <?php
                //echo CHtml::ajaxButton('Submit', array('user/stewards'), array(
                //    'type' => 'POST',
                //    'dataType' => 'json',
                //   'beforeSend' => 'function(){
                //     scrollPleaseWait("serviceSpinLoader","services-form");}',
                //    'success' => 'function(data,status,xhr) { addStewardCleaningServicehandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'id' => 'stewardsSubmit'));
                ?>
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function() {
         if($("#StewardCleaningForm_State").val()=='')
        $("#StewardCleaningForm_State").val('35');
        Custom.init();
        $('#Appetizers').bootstrapSwitch();
        $('#Dinner').bootstrapSwitch();
        $('#Dessert').bootstrapSwitch();
        $('#Beverage').bootstrapSwitch();
        $('#PostDinner').bootstrapSwitch();
        $('#DifferentAddress').bootstrapSwitch();
        var eventType = $('#StewardCleaningForm_EventType').val();
        if(eventType=='7'){
           $("#otherDiv").show();
           $("#StewardCleaningForm_EventName").val("<?php echo $getServiceDetails['event_name'];?>");
           }else{
                $("#otherDiv").hide();
               
           }
           
        if(($('#StewardCleaningForm_ContactAddress').val()=='')||($('#StewardCleaningForm_StartTime').val()!='')){
            document.getElementById('diffDiv').style.display='none';
            $('#StewardCleaningForm_Address1').attr('readOnly', false);
            $('#StewardCleaningForm_Address2').attr('readOnly', false);
            $('#StewardCleaningFom_AlternatePhone').attr('readOnly', false);
            $('#StewardCleaningForm_State').attr('disabled', false);
            $('#StewardCleaningForm_City').attr('disabled', false);
            $('#StewardCleaningForm_PinCode').attr('readOnly', false);
            
        }else{
            document.getElementById('diffDiv').style.display='block';
            $('#DifferentAddress').bootstrapSwitch('setState', true);
            $('#StewardCleaningForm_Address1').attr('readOnly', true);
            $('#StewardCleaningForm_Address2').attr('readOnly', true);
            $('#StewardCleaningForm_AlternatePhone').attr('readOnly', true);
            $('#StewardCleaningForm_State').attr('disabled', true);
            $('#StewardCleaningForm_City').attr('disabled', true);
            $('#StewardCleaningForm_PinCode').attr('readOnly', true);
            $('#StewardCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
            $('#StewardCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
            $('#StewardCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
            $('#StewardCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');
            $('#StewardCleaningForm_state').val('<?php echo $customerAddressDetails->address_state;?>');
            $('#StewardCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
            $('#StewardCleaningForm_city').val('<?php echo $customerAddressDetails->address_city;?>');
            $('#StewardCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
        }
        if($('#StewardCleaningForm_StartTime').val()!=''){
            document.getElementById('diffDiv').style.display='none';
            $('#StewardCleaningForm_Address1').attr('readOnly', false);
            $('#StewardCleaningForm_Address2').attr('readOnly', false);
            $('#StewardCleaningFom_AlternatePhone').attr('readOnly', false);
            $('#StewardCleaningForm_State').attr('disabled', false);
            $('#StewardCleaningForm_City').attr('disabled', false);
            $('#StewardCleaningForm_PinCode').attr('readOnly', false);
            $('#StewardCleaningForm_Address1').val('<?php echo $getServiceDetails["S_address1"];?>');
            $('#StewardCleaningForm_Address2').val('<?php echo $getServiceDetails["S_address2"];?>');
            $('#StewardCleaningForm_AlternatePhone').val('<?php echo $getServiceDetails["S_alternate_phone"];?>');
            $('#StewardCleaningForm_State').val('<?php echo $getServiceDetails["S_state"]?>');
            $('#StewardCleaningForm_City').val('<?php echo $getServiceDetails["S_city"];?>');
            $('#StewardCleaningForm_PinCode').val('<?php echo $getServiceDetails["S_pincode"];?>');
        }
       
        if( ($('#StewardCleaningForm_HouseCleaning').val()==1) ||($('#StewardCleaningForm_CarCleaning').val()==1)){
            $('#StewardsCleaningPrevious').show();
        }
        <?php if($getServiceDetails['appetizers'] == 1){ ?>
        $('#Appetizers').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#Appetizers').bootstrapSwitch('setState', false);
        <?php } ?>
       
        <?php if($getServiceDetails['dinner'] == 1){ ?>
        $('#Dinner').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#Dinner').bootstrapSwitch('setState', false);
        <?php } ?>
        
        <?php if($getServiceDetails['dessert'] == 1){ ?>
        $('#Dessert').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#Dessert').bootstrapSwitch('setState', false);
        <?php } ?>
         
        <?php if($getServiceDetails['alcoholic'] == 1){ ?>
        $('#Beverage').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#Beverage').bootstrapSwitch('setState', false);
        <?php } ?>
            
        <?php if($getServiceDetails['post_dinner'] == 1){ ?>
        $('#PostDinner').bootstrapSwitch('setState', true);
        <?php } else {?>
        $('#PostDinner').bootstrapSwitch('setState', false);
        <?php } ?>
        $('#DifferentAddress').on('switch-change', function (e, data) {
            var $el = $(data.el);
            value = data.value;
            
            if(value == false){
                $('#StewardCleaningForm_DifferentAddress').val('0');
                $('#StewardCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
                $('#StewardCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
                $('#StewardCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
                $('#StewardCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');
                $('#StewardCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
                $('#StewardCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
                $('#StewardCleaningForm_Address1').attr('readOnly',false);
                $('#StewardCleaningForm_Address2').attr('readOnly', false);
                $('#StewardCleaningForm_AlternatePhone').attr('readOnly', false);
                $('#StewardCleaningForm_State').attr('disabled', false);
                $('#StewardCleaningForm_City').attr('disabled', false);
                $('#StewardCleaningForm_PinCode').attr('readOnly', false);
            }
            else{
                $('#StewardCleaningForm_DifferentAddress').val('1');
                $('#StewardCleaningForm_Address1').val('<?php echo $customerAddressDetails->address_line1;?>');
                $('#StewardCleaningForm_Address2').val('<?php echo $customerAddressDetails->address_line2;?>');
                $('#StewardCleaningForm_AlternatePhone').val('<?php echo $customerAddressDetails->alternate_phone;?>');
                $('#StewardCleaningForm_State').val('<?php echo $customerAddressDetails->address_state;?>');    
                $('#StewardCleaningForm_City').val('<?php echo $customerAddressDetails->address_city;?>');
                $('#StewardCleaningForm_PinCode').val('<?php echo $customerAddressDetails->address_pin_code;?>');
                $('#StewardCleaningForm_Address1').attr('readOnly', true);
                $('#StewardCleaningForm_Address2').attr('readOnly',  true);
                $('#StewardCleaningForm_AlternatePhone').attr('readOnly',  true);
                $('#StewardCleaningForm_State').attr('disabled',  true);
                $('#StewardCleaningForm_state').val('<?php echo $customerAddressDetails->address_state; ?>');
                $('#StewardCleaningForm_City').attr('disabled',  true);
                $('#StewardCleaningForm_city').val('<?php echo $customerAddressDetails->address_city; ?>');
                $('#StewardCleaningForm_PinCode').attr('readOnly',  true);
            }
         });
        //Date and Time start
        /*var currentDate=new Date();
                var maxdate=new Date();
                maxdate.setFullYear(maxdate.getFullYear()-19);
                var mindate=new Date();
                mindate.setFullYear(mindate.getFullYear()-100);
                mindate.setMonth(currentDate.getMonth()+2);
                mindate.setDate(currentDate.getDate()+2);
                $('#StewardCleaningForm_StartTime').scroller({
                    preset: 'datetime',
                    //timeFormat:'hh:ii A ',
                    timeFormat:'HH:ii',
                    theme: 'android', // for android set theme:'android'
                    display: 'modal',
                    mode: 'scroller',
                    //dateFormat:'yyyy-mm-dd',
                    dateFormat:'dd-mm-yyyy',
                    dateOrder: 'Md ddyy',
                    timeWheels:'HHii',
                    minDate:  new Date()
                });
                
                
             var currentDate=new Date();
                var maxdate=new Date();
                maxdate.setFullYear(maxdate.getFullYear()-19);
                var mindate=new Date();
                mindate.setFullYear(mindate.getFullYear()-100);
                mindate.setMonth(currentDate.getMonth()+2);
                mindate.setDate(currentDate.getDate()+2);
                $('#StewardCleaningForm_EndTime').scroller('minDate', $("#StewardCleaningForm_StartTime").val(), true);
                $('#StewardCleaningForm_EndTime').scroller({
                    preset: 'datetime',
                    timeFormat:'HH:ii',
                    theme: 'android', // for android set theme:'android'
                    display: 'modal',
                    mode: 'scroller',
                    dateFormat:'dd-mm-yyyy',
                    dateOrder: 'Md ddyy',
                    timeWheels:'HHii',
                    minDate:  new Date()
                }); */  
        
        //Date and Time end
        
        
    });
    $(function () {
        var date=new Date();
        var cyear=date.getFullYear();
        var eyear=cyear+1;
        $('#StewardCleaningForm_StartTime').datetimepicker({
            format:'d-m-Y H:i',
            step:30,
            minDate:date,
            scrollMonth:false,
            scrollInput:false,
            defaultDate:date,
            yearStart:cyear,
            yearEnd:eyear
        });
        $('#StewardCleaningForm_EndTime').datetimepicker({
            format:'d-m-Y H:i',
            step:30,
            yearStart:cyear,
            yearEnd:eyear,
            defaultDate:date,
            onShow:function( ct ){
                this.setOptions({
                minDate:$('#StewardCleaningForm_StartTime').val()?$('#StewardCleaningForm_StartTime').val():false
                })
            },
            scrollMonth:false,
            scrollInput:false
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


