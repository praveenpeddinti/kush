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
<?php echo $form->error($model1, 'error'); ?>
<fieldset>
    <div class=" row-fluid borderB">
        <div class="span12 ">
            <div class="stewards_title">
                Stewards / Stewardesses Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li>Supplies of food</li><li>Supplies of Wine / liquor</li><li>Assisting in seating the Guests</li><li>Re- filling of Food and Liquor</li><li>Garbage emptying</li></ul>" data-original-title="Stewards/Stewardesses" href="/site/stewards">(What is included<b>?</b>)</a>
            </div>
        </div>        
    </div>
    
    
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Type'); ?>
            <?php echo $form->dropDownList($model1, 'EventType', array('' => 'Select Event', '1' => 'Formal Party', '2' => 'Casual Party', '3' => 'Birthday Party', '4' => 'Anniversary', '5' => 'Funeral', '6' => 'Sporting Event', '7' => 'Other'), array('options' => array($getServiceDetails['event_type'] => array('selected' => 'selected')),'onchange' => 'javascript:onChangeProduto(this.value);', 'class' => 'span10')); ?>
<?php echo $form->error($model1, 'EventType'); ?>
        </div>
        <div class=" span4" id='otherDiv' style="display:none">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Name'); ?>
            <?php echo $form->textField($model1, 'EventName', array('maxLength' => 10, 'class' => 'span8')); ?>
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
            <?php echo $form->textField($model1, 'StartTime', array('value'=>$getServiceDetails['start_time'], 'onchange' => 'javascript:onChangeTime();', 'class' => 'span10')); ?>
<?php echo $form->error($model1, 'StartTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event End Time'); ?>
            <?php echo $form->textField($model1, 'EndTime', array('value'=>$getServiceDetails['end_time'], 'onchange' => 'javascript:onChangeTime();','class' => 'span10')); ?>
<?php echo $form->error($model1, 'EndTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, 'DurationHour(s)'); ?>
            <?php echo $form->textField($model1, 'DurationHours', array('value'=>$getServiceDetails['service_hours'], 'class' => 'span4', 'readonly'=>'true')); ?>

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
                    <?php echo $form->label($model1, 'Coffee/Tea'); ?>
                <div class="switch switch-large" id="PostDinner" data-on-label="Yes" data-off-label="No">
<?php echo $form->checkBox($model1, 'PostDinner', array('id' => 'StewardCleaningForm_PostDinner')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        
        
        <div class="span6">
            <label>Recommended # of Stewards</label>
            <?php echo $form->textField($model1, 'totalStewards', array('value'=>$getServiceDetails['no_of_stewards'],'maxLength' => 4, 'class' => 'span6','onkeypress' => 'return isNumberKey(event);')); ?>
            <?php echo $form->error($model1, 'totalStewards'); ?>
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
        Custom.init();
        $('#Appetizers').bootstrapSwitch();
        $('#Dinner').bootstrapSwitch();
        $('#Dessert').bootstrapSwitch();
        $('#Beverage').bootstrapSwitch();
        $('#PostDinner').bootstrapSwitch();
        if( ($('#StewardCleaningForm_HouseCleaning').val()==1) ||($('#StewardCleaningForm_CarCleaning').val()==1)){
            $('#StewardsCleaningPrevious').show();
        }
        <?php if($getServiceDetails['appetizers'] == 1){ ?>alert("------------------");
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
        //Date and Time start
        var currentDate=new Date();
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
                });   
        
        //Date and Time end
        
        
    });
    $(function () {
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


