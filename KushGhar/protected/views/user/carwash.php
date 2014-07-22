<?php $NOCars ='';$CarServiceTime ='';$TCars='';$WeekDays='';$NOfServiceTime='';
    if((sizeof($getCarWashServiceDetails)>0)){ 
        foreach($getCarWashServiceDetails as $ee){
            $CarServiceTime = $ee['carservice_start_time'];
            $TCars = $ee['total_cars'];
            $WeekDays = $ee['week_days'];
            $NOfServiceTime = $ee['service_no_of_times'];
        }
    }
    if(sizeof($getCarWashServiceDetails)==0){$NOCars =1;}else{
        $NOCars = $TCars;
    } 
    
    $form = $this->beginWidget('CActiveForm', array(
    'id' => 'carwash-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));?> 
<?php echo $form->hiddenField($model, 'HouseCleaning', array('value' => $HouseCleaning)); ?>
<?php echo $form->hiddenField($model, 'CarCleaning', array('value' => $CarCleaning)); ?>
<?php echo $form->hiddenField($model, 'StewardCleaning', array('value' => $StewardCleaning)); ?>
<?php echo $form->hiddenField($model, 'PriceFlag', array('value'=>$PriceFlag)); ?> 
<?php echo $form->hiddenField($model, 'MakeOfCar'); ?> 
<?php echo $form->hiddenField($model, 'ExteriorColor'); ?> 
<?php echo $form->hiddenField($model, 'DifferentAddress'); ?>
<?php echo $form->hiddenField($model, 'Address1'); ?>
<?php echo $form->hiddenField($model, 'Address2'); ?>
<?php echo $form->hiddenField($model, 'AlternatePhone'); ?>
<?php echo $form->hiddenField($model, 'State'); ?>
<?php echo $form->hiddenField($model, 'City'); ?>
<?php echo $form->hiddenField($model, 'PinCode'); ?>


<fieldset>
    <div class=" row-fluid borderB">
        <div class="span12 ">
            <div class="carwash_title">
                Car Cleaning Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li style='float:none'>Brush, vacuum, and clean the interior</li><li style='float:none'>Clean wheels and tires</li><li style='float:none'>Wash exterior</li><li style='float:none'>Apply tire dressing</li><li style='float:none'>Polish wheels</li><li style='float:none'>Rinsing and drying</li></ul>" data-original-title="Car Cleaning" href="/site/carwash">(What is included <b>?</b>)</a>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class=" span3">
            <label><abbr title="required">*</abbr> # of Cars</label>
            <?php echo $form->textField($model, 'TotalCars', array('value'=>$NOCars, 'maxLength' => 3, 'class' => 'span6', 'onblur' => 'javascript:onTotalcars(this);','onkeypress' => 'return isNumberKey(event);')); ?>
            <?php echo $form->error($model, 'TotalCars'); ?>
        </div>
        <div class="span4" >
             <label><abbr title="required">*</abbr> Service Date</label>
             <?php echo $form->textField($model, 'ServiceStartTime', array('value'=>$CarServiceTime, 'class' => 'span8','readonly'=>'true')); ?>
             <?php echo $form->error($model, 'ServiceStartTime'); ?>
        </div>
        <div class=" span5" id="DifferentLocationDiv" style="display:none">
            <label>Are they at different Address</label>
            <div class="switch switch-large DifferentLocation" id="DifferentLocation" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'DifferentLocation'); ?>
            </div>
        </div>
    </div>
    <div class="newcars" id="newcars">
        <?php echo $html;?>
    </div>
    <div class="AddressFieldsOneCarDiv" style="display:block">
 	<div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Address Line1</label>
                <input type="text" class="span12" id="11_Address1" value="" maxLength="100">
                <div id="11_Address1_em" class="errorMessage" style="display:none"></div>
             </div>
             <div class=" span4">
                <label> Address Line2</label>
                <input type="text" class="span12" id="11_Address2" value="" maxLength="100">
             </div>
             <div class=" span4">
                <label> Alternate Phone</label><input type="text" value="+91" disabled="disabled" class="span3"/>
                <input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" onkeypress="return isNumberKey(event);">
                <div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>
             </div> 
        </div>
        <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> State</label>
                <select name="11_State" id="11_State" class="span12" >
                    <option value="">Select State</option>
                    <?php foreach ($States as $course) { ?>
                    <option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>
                    <?php } ?>
                    </select>
                    <div id="11_State_em" class="errorMessage" style="display:none"></div>
             </div>
             <div class=" span4">
                <label><abbr title="required">*</abbr> City</label>
                <input type="text" class="span12" id="11_City" value="" maxLength="25" >
                <div id="11_City_em" class="errorMessage" style="display:none"></div>
           </div>
           <div class=" span4">
                <label><abbr title="required">*</abbr> Pin Code</label>
                <input type="text" class="span12" id="11_PinCode" value="" maxLength="6"  onkeypress="return isNumberKey(event);" >
                <div id="11_PinCode_em" class="errorMessage" style="display:none"></div>
           </div>
           </div>
    </div>  
       
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
                <input type="button" value="Previous" id="CarWashCleaningPrevious" class="btn btn-primary" onclick="previousCarWashCleaning()" style="display:none;"/>
                <input type="button" value="Next" id="CarWashCleaningSubmit" class="btn btn-primary" onclick="submitCarWashCleaning()" />
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>

<script type="text/javascript">
   $(document).ready(function() {
       if( ($('#CarWashForm_HouseCleaning').val()==1) ||($('#CarWashForm_StewardCleaning').val()==1)){
            $('#CarWashCleaningPrevious').show();
        }
       if($('#CarWashForm_TotalCars').val()>1){
           $("#DifferentLocationDiv").show();
       }else{
           $("#DifferentLocationDiv").hide();
           $('#DifferentLocation').val('0');  
       };
    <?php if(isset($getCarWashServiceDetails) && sizeof($getCarWashServiceDetails)>0){ 
            $j=1; foreach($getCarWashServiceDetails as $rw){ ?>
            <?php if($rw['different_location']==1){?>
                $("#DifferentLocationDiv").show(); 
                $('#DifferentLocation').bootstrapSwitch('setState', true);
                $('#DifferentLocation').val('1');
                $('.AddressFieldsDiv').show();
                $('.AddressFieldsOneCarDiv').hide();
                $('.AddressFieldsOneCarDiv').hide();
                $('.AddressFieldsMultiCarDiv').show();
            <?}else{?>
                //$("#DifferentLocationDiv").show();    
                $('#DifferentLocation').val('0');  
                $('.AddressFieldsMultiCarDiv').hide();
                $('.AddressFieldsOneCarDiv').show();
                $('#11_Address1').val("<?php echo $rw['address_line1'];?>");
                $('#11_Address2').val("<?php echo $rw['address_line2'];?>");
                $('#11_AlternatePhone').val("<?php echo $rw['alternate_phone'];?>");
                $('#11_State').val("<?php echo $rw['address_state'];?>");
                $('#11_City').val("<?php echo $rw['address_city'];?>");
                $('#11_PinCode').val("<?php echo $rw['address_pin_code'];?>");
            <?php }?>
            <?php $j++;?>
            <?php }?>
    <?php }?>  
       
    $('#DifferentLocation').bootstrapSwitch();
      // $("#DifferentLocation").val('0');

    /*var currentDate=new Date.today().addDays(1);
   var currentDate=new Date.today().addDays(2);

    var maxdate=new Date();
    maxdate.setFullYear(maxdate.getFullYear()-19);
    var mindate=new Date();
    mindate.setFullYear(currentDate.getFullYear());
    mindate.setMonth(currentDate.getMonth());
    mindate.setDate(currentDate.getDate());
    $('#CarWashForm_ServiceStartTime').scroller({
        preset: 'date',
        theme: 'android', // for android set theme:'android'
        display: 'modal',
        mode: 'scroller',
        dateFormat:'dd-mm-yyyy',
        dateOrder: 'Md ddyy',
        minDate: mindate
    });*/

 });
        
    function onTotalcars(obj){
        if(isNaN(obj.value) || obj.value <= 0) { 
            $("#CarWashForm_TotalCars_em_").show();
            $("#CarWashForm_TotalCars_em_").addClass('errorMessage');
            $("#CarWashForm_TotalCars_em_").text("Please Enter +ve Number.");
            return false;
        }else{
            $("#CarWashForm_TotalCars_em_").hide();
        }
        if(obj.value > 1) {
            $("#DifferentLocationDiv").show();
            $('#DifferentLocation').bootstrapSwitch('setState', false);
            $("#DifferentLocation").val('0');
            var queryString = {TCars:obj.value};
            ajaxRequest('/user/TotalCars', queryString, totalcarsDivhandler);
        }else {
            $("#DifferentLocation").val('0');
            $("#DifferentLocationDiv").hide();
            $(".AddressFieldsOneCarDiv").show();
            var queryString = {TCars:obj.value};
            ajaxRequest('/user/TotalCars', queryString, totalcarsDivhandler);
        }
    }
   
    $("#DifferentLocation").on('switch-change', function (e, data) {
        var $el = $(data.el),
        value = data.value;
        if(value == true){
            $("#DifferentLocation").val('1');
            $(".AddressFieldsMultiCarDiv").show();
            $(".AddressFieldsOneCarDiv").hide();
        }else {
            $("#DifferentLocation").val('0');
            $(".AddressFieldsMultiCarDiv").hide();
            $(".AddressFieldsOneCarDiv").show();
        }
    });
            
    function totalcarsDivhandler(data) {
        if (data.status == 'success') {
            $('#newcars').html(data.html);            
        }
    }
    
    $(function () {

        var date=new Date.today().addDays(2);
        var cyear=date.getFullYear();
        var eyear=cyear+1;
       $('#CarWashForm_ServiceStartTime').datetimepicker({
            step:30,
            format:'d-m-Y',
            minDate:date,
            formatDate:'Y/m/d',
            scrollMonth:false,
            timepicker:false,
            closeOnDateSelect:true,
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

function checkBox(obj){
    //alert(obj.toSource());
} 
</script>