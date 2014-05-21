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
<?php echo $form->error($model1, 'error'); ?>
<fieldset>
    <div class="row-fluid">
        <div class=" span12">
            Stewards / Stewardess Service
        </div>
    </div>
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $form->label($model1, '<abbr title="required">*</abbr> Event Type'); ?>
            <?php echo $form->dropDownList($model1, 'EventType', array('' => 'Select Event', '1' => 'Formal Party', '2' => 'Casual Party', '3' => 'Birthday Party', '4' => 'Anniversary', '5' => 'Funeral', '6' => 'Sporting Event', '7' => 'Other'), array('onchange' => 'javascript:onChangeProduto(this.value);', 'class' => 'span8')); ?>
<?php echo $form->error($model1, 'EventType'); ?>
        </div>
        <div class=" span4" id='otherDiv' style="display:none">
            <?php echo $form->label($model1, 'Event Name'); ?>
            <?php echo $form->textField($model1, 'EventName', array('maxLength' => 10, 'class' => 'span8', 'placeholder' => 'Event Name…')); ?>
<?php echo $form->error($model1, 'EventName'); ?>
        </div>
        <div class=" span4">
            <label>&nbsp;</label>
            <a href="/site/stewards" target="_blank">Stewards Details</a>
        </div>

    </div>
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $form->label($model1, 'Start Time'); ?>
            <?php echo $form->textField($model1, 'StartTime', array('onchange' => 'javascript:onChangeTime();', 'class' => 'span10', 'placeholder' => 'Start Time…')); ?>
<?php echo $form->error($model1, 'StartTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, 'End Time'); ?>
            <?php echo $form->textField($model1, 'EndTime', array('onchange' => 'javascript:onChangeTime();','class' => 'span10', 'placeholder' => 'End Time…')); ?>
<?php echo $form->error($model1, 'EndTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $form->label($model1, 'People Attend'); ?>
            <?php echo $form->textField($model1, 'AttendPeople', array('onblur' => 'javascript:onTotalStewards(this);','maxLength' => 5, 'class' => 'span6')); ?>
<?php echo $form->error($model1, 'AttendPeople'); ?>
        </div> 
        
    </div>
    <div class="dontOffer">
        <div class="row-fluid">
            <div class="span12"><h5>Services Required</h5></div>
        </div>
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
        <div class=" span4">
            <?php echo $form->label($model1, 'DurationHour(s)'); ?>
            <?php echo $form->textField($model1, 'DurationHours', array('class' => 'span4')); ?>

        </div> 
        <div class="span4">
            <label>How long do you want KushGhar to provide services</label>
            <?php echo $form->textField($model1, 'ServiceHours', array('maxLength' => 10, 'class' => 'span6')); ?>
<?php echo $form->error($model1, 'ServiceHours'); ?>

        </div>
        <div class="span4">
            <label>No of Stewards</label>
            <?php echo $form->textField($model1, 'totalStewards', array('class' => 'span6')); ?>
<?php echo $form->error($model1, 'totalStewards'); ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
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
                    dateFormat:'yyyy-mm-dd',
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
                $('#StewardCleaningForm_EndTime').scroller({
                    preset: 'datetime',
                    timeFormat:'HH:ii',
                    theme: 'android', // for android set theme:'android'
                    display: 'modal',
                    mode: 'scroller',
                    dateFormat:'yyyy-mm-dd',
                    dateOrder: 'Md ddyy',
                    timeWheels:'HHii',
                    minDate:  new Date()
                });   
        
        //Date and Time end
        $('#Appetizers').bootstrapSwitch();
        $('#Dinner').bootstrapSwitch();
        $('#Dessert').bootstrapSwitch();
        $('#Beverage').bootstrapSwitch();
        $('#PostDinner').bootstrapSwitch();
        
    });
</script>


