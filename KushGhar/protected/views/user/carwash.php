<?php 
$NOCars ='';$CarServiceTime ='';$TCars='';$WeekDays='';
        if((sizeof($getCarWashServiceDetails)>0)){ 
        foreach($getCarWashServiceDetails as $ee){
        
        $CarServiceTime = $ee['carservice_start_time'];
        $TCars = $ee['total_cars'];
        $WeekDays = $ee['week_days'];
        $NOfTimesServices = $ee['service_no_of_times'];

        }
        }
    
 if(sizeof($getCarWashServiceDetails)==0){$NOCars =1;}else{
        //$NOCars=sizeof($getCarWashServiceDetails);
         $NOCars = $TCars;
    }
    



?>
<?php //if(count($getCarWashServiceDetails)=='1'){$totalCars =1;}else if(count($getCarWashServiceDetails)=='0'){$totalCars =1;}else{$totalCars=count($getCarWashServiceDetails);};?>
<?php
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
<?php echo $form->hiddenField($model, 'InteriorCleaning'); ?> 
<?php echo $form->hiddenField($model, 'ShampooSeats'); ?>
<?php //echo $form->hiddenField($model, 'WaxCar'); ?>
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
                Car Wash Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li>Brush, vacuum, and clean the interior</li><li>Clean wheels and tires</li><li>Wash exterior</li><li>Apply tire dressing</li><li>Polish wheels</li><li>Rinsing and drying</li></ul>" data-original-title="Car Wash" href="/site/carwash">(What is included <b>?</b>)</a>
            </div>
        </div>

    </div>
    
    <div class="row-fluid">
        <div class=" span4">
            <label><abbr title="required">*</abbr> # of Cars</label>
            
            <?php echo $form->textField($model, 'TotalCars', array('value'=>$NOCars, 'maxLength' => 3, 'class' => 'span6', 'placeholder' => '','onblur' => 'javascript:onTotalcars(this);')); ?>
            <?php echo $form->error($model, 'TotalCars'); ?>
        </div>
        
        <div class=" span8" id="DifferentLocationDiv" style="display:none">
            <label>Are they at different Address</label>
            <div class="switch switch-large DifferentLocation" id="DifferentLocation" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'DifferentLocation'); ?>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
             <label>Frequency of cleaning</label>
             <?php echo $form->dropDownList($model,'NumberOfTimesServices', array('2'=>'Twice a Month', '5'=>'One time', '1' => 'Once a Month', '2' => 'Twice a Month', '3'=>'Every 3 Months', '4'=>'Every 6 Months'), array('options' => array($NOfTimesServices => array('selected' => 'selected')),'onchange' => 'javascript:onChangeFrequencyto(this.value);', 'class' => 'span12'));?>
             <?php echo $form->error($model, 'NumberOfTimesServices'); ?>
        </div>
        <div class="span5" id="otherFreqDiv">
             <label> When do you want service?</label>
             <?php echo $form->dropDownList($model,'WeekDays', array(''=>'Please Select Day','Sunday'=>'Sunday', 'Monday'=>'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 'Saturday'=>'Saturday'), array('options' => array($WeekDays => array('selected' => 'selected')), 'class' => 'span12'));?>
             <?php echo $form->error($model, 'WeekDays'); ?>
        </div>
        <div class="span5" id="oneTimeDiv" style="display:none;">
             <label>Select Date</label>
             <?php echo $form->textField($model, 'ServiceStartTime', array('value'=>$CarServiceTime,'class' => 'span10', 'placeholder' => 'Select Date...')); ?>
             <?php echo $form->error($model, 'ServiceStartTime'); ?>
        </div>
    </div>
    
<!--    <div class="row-fluid">
       <div class="span5">
            <label><abbr title="required">*</abbr> When do you want service?</label>
            <?php //echo $form->dropDownList($model,'WeekDays', array('Sunday'=>'Sunday', 'Monday'=>'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 'Saturday'=>'Saturday'), array('options' => array($WeekDays => array('selected' => 'selected')), 'class' => 'span12'));?>
            <?php //echo $form->error($model, 'WeekDays'); ?>
        </div> 
        <div class=" span7">
            <label>&nbsp;</label>
            <?php //echo $form->textField($model, 'ServiceStartTime', array('value'=>$CarServiceTime, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php //echo $form->error($model, 'ServiceStartTime'); ?>
        </div> 
    </div>-->
    <div class="newcars" id="newcars" style="display: none;">
        
    </div>
       
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
                <!--<input type="button" value="Previous" id="CarWashCleaningPrevious" class="btn btn-primary" onclick="buttonCarWashCleaningPrevious()" />-->
                <input type="button" value="Next" id="CarWashCleaningSubmit" class="btn btn-primary" onclick="submitCarWashCleaning()" />
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>


<script type="text/javascript">
    var MakeOC = new Array();
    var ExtClr = new Array();
    var mc = 0;

    $(document).ready(function(){
       var w = $('#CarWashForm_NumberOfTimesServices').val();
       if(w==5)
       {
           document.getElementById('otherFreqDiv').style.display='none';
           document.getElementById('oneTimeDiv').style.display='block';
       }
       else
       {
           document.getElementById('oneTimeDiv').style.display='none';
           document.getElementById('otherFreqDiv').style.display='block';
       }
   });

    $(document).ready(function() {
         var currentDate=new Date();
               var maxdate=new Date();
               maxdate.setFullYear(maxdate.getFullYear()-19);
               var mindate=new Date();
               mindate.setFullYear(mindate.getFullYear());
               mindate.setMonth(currentDate.getMonth());
               mindate.setDate(currentDate.getDate()+1);

               $('#CarWashForm_ServiceStartTime').scroller({
                   preset: 'date',
                   theme: 'android', // for android set theme:'android'
                   display: 'modal',
                   mode: 'scroller',
                   dateFormat:'dd-mm-yyyy',
                   dateOrder: 'Md ddyy',
                   minDate:  mindate
               });
//        var currentDate=new Date();
//                var maxdate=new Date();
//                maxdate.setFullYear(maxdate.getFullYear()-19);
//                var mindate=new Date();
//                mindate.setFullYear(mindate.getFullYear());
//                mindate.setMonth(currentDate.getMonth());
//                mindate.setDate(currentDate.getDate()+1);
//
//                $('#CarWashForm_ServiceStartTime').scroller({
//                    preset: 'time',
//                    timeFormat:'hh:ii A ',
//                    theme: 'android', // for android set theme:'android'
//                    display: 'modal',
//                    mode: 'scroller'
//                });
        $('#DifferentLocation').bootstrapSwitch();
        var html = "";
        var sHtml = "";
        
        
        <?php if(isset($getCarWashServiceDetails) && sizeof($getCarWashServiceDetails)>0){ 
            $j=1; foreach($getCarWashServiceDetails as $rw){ ?>
        
    //alert("edit form starting=====");
        sHtml +='<div class="cardetails" >'+
        '<div class=" row-fluid">'+
            '<div class="span12 ">'+
                '<h5 class="toggles">#<?php echo $j ?> details</h5>'+
            '</div> '+   
        '</div><hr style="margin: 0;" />'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Make / Model of the Car</label>'+
                '<input type="text" class="span12" maxLength="25" value="<?php echo $rw['make_of_car'] ?>" placeholder="Make of the Car..." id="<?php echo $j; ?>_MakeOfCar">'+
                '<div id="<?php echo $j; ?>_MakeOfCar_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+
            '<div class=" span4">'+
                '<label> Exterior Color</label>'+
                '<input type="text" class="span12" maxLength="25" value="<?php echo $rw['exterior_color']?>" placeholder="Exterior Color..." id="<?php echo $j; ?>_ExteriorColor">'+
                '<div id="<?php echo $j; ?>_ExteriorColor_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+

        '</div>'+
        '<div class="row-fluid">'+
            '<div class="span4">'+
                '<label> Interior Cleaning</label>'+
                    '<div class="switch switch-large InteriorCleaning" data-id="<?php echo $j; ?>" id="<?php echo $j; ?>_InteriorCleaning" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                '</div>'+
            '<div class="interiorDiv" id="<?php echo $j; ?>_interiorDiv" style="display:none">'+
            '<div class=" span4" >'+
                '<label> Shampoo Seats</label>'+
                    '<div class="switch switch-large ShampooSeats" data-id="<?php echo $j; ?>" id="<?php echo $j; ?>_ShampooSeats" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                    '<div id="<?php echo $j; ?>_ShampooSeatsTooltip" class="Additional_S_price" style="display:none">Cost of Services is <b>Rs.<label>400</label>/-</b></div>'+
             '</div>'+
        '</div>'+
        '</div>'+
        '<div class="AddressFieldsDiv" id="<?php echo $j; ?>_AddressFieldsDiv" Style="display:none">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="<?php echo $j; ?>_Address1" value="<?php echo $rw['address_line1']?>" maxLength="100" placeholder="Address Line1…">'+
                '<div id="<?php echo $j; ?>_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="<?php echo $j;?>_Address2" value="<?php echo $rw['address_line2']?>" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="<?php echo $j; ?>_AlternatePhone" value="<?php echo $rw['alternate_phone']?>" maxLength="10" placeholder="Alternate Phone…">'+
                '<div id="<?php echo $j; ?>_AlternatePhone_em" class="errorMessage" style="display:none"></div>'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="<?php echo $j; ?>_State" id="<?php echo $j; ?>_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option <?php if($rw['address_state']==$course['Id']) {echo 'selected';}else{echo '';}?> value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="<?php echo $j; ?>_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="<?php echo $j; ?>_City" value="<?php echo $rw['address_city']?>" maxLength="25" placeholder="City…">'+
                '<div id="<?php echo $j; ?>_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="<?php echo $j; ?>_PinCode" value="<?php echo $rw['address_pin_code']?>" maxLength="6" placeholder="Pin Code…">'+
                '<div id="<?php echo $j; ?>_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';
    
    
          
        
           
    
<? $j++;?>
        <?php } ?>
        sHtml+= '<div class="AddressFieldsDivWithSingle" id="1_AddressFieldsDivWithSingle" Style="display:block">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="11_Address1" value="" maxLength="100" placeholder="Address Line1…">'+
                '<div id="11_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="11_Address2" value="" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" placeholder="Alternate Phone…">'+
                '<div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="11_State" id="11_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="11_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="11_City" value="" maxLength="25" placeholder="City…">'+
                '<div id="11_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="11_PinCode" value="" maxLength="6" placeholder="Pin Code…">'+
                '<div id="11_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';
        
        
        <?php  }else {?>
            
            sHtml+= '<div class="cardetails" >'+
        '<div class=" row-fluid">'+
            '<div class="span12 ">'+
                '<h5 class="toggles">#1 details</h5>'+
            '</div> '+   
        '</div><hr style="margin: 0;" />'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Make / Model of the Car</label>'+
                '<input type="text" class="span12" maxLength="25" placeholder="Make of the Car..." id="1_MakeOfCar">'+
                '<div id="1_MakeOfCar_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+
            '<div class=" span4">'+
                '<label> Exterior Color</label>'+
                '<input type="text" class="span12" maxLength="25" placeholder="Exterior Color..." id="1_ExteriorColor">'+
                '<div id="1_ExteriorColor_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+

        '</div>'+
        '<div class="row-fluid">'+
            '<div class="span4">'+
                '<label> Interior Cleaning</label>'+
                    '<div class="switch switch-large InteriorCleaning" data-id="1" id="1_InteriorCleaning" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                '</div>'+
            '<div class="interiorDiv" id="_interiorDiv" style="display:none">'+
            '<div class=" span4" >'+
                '<label> Shampoo Seats</label>'+
                    '<div class="switch switch-large ShampooSeats" data-id="1" id="1_ShampooSeats" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                    '<div id="1_ShampooSeatsTooltip" class="Additional_S_price" style="display:none">Cost of Services is <b>Rs.<label>400</label>/-</b></div>'+
             '</div>'+
        '</div>'+
        '</div>'+
        '<div class="AddressFieldsDiv" id="1_AddressFieldsDiv" Style="display:block">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="11_Address1" maxLength="100" placeholder="Address Line1…">'+
                '<div id="11_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="11_Address2" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="11_AlternatePhone" maxLength="10" placeholder="Alternate Phone…">'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="11_State" id="11_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="11_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="11_City" maxLength="25" placeholder="City…">'+
                '<div id="11_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="11_PinCode" maxLength="6" placeholder="Pin Code…">'+
                '<div id="11_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';
            
        <?php }?>    
          
    //alert(sHtml);
    $(".newcars").html(sHtml).show();
    //var ssa =$(".newcars").html(sHtml); 
              //alert("====html con==="+$(".newcars").html())
             //$(ssa).append('<div>ffff</div>').show;
             //alert(sHtml);
    var totalcars1 =  $('#CarWashForm_TotalCars').val();   
    bindDiffEdit(totalcars1);
    //if(totalcars1>1){alert("noummmmm");}
    $('#DifferentLocation').on('switch-change', function (e, data) {
            html='';
            var $el = $(data.el),
            value = data.value;
            if(value == true){
                $('#CarWashForm_DifferentLocation').val('1');
                $('.AddressFieldsDivWithSingle').hide();
                $( ".AddressFieldsDivWithSingle" ).empty();
                $('.AddressFieldsDiv').show();
              //3alert($('#CarWashForm_TotalCars').val()+"===="+$('#CarWashForm_DifferentLocation').val());
                   
            }else{
            $('#CarWashForm_DifferentLocation').val('0');
            $('.AddressFieldsDiv').hide();
            $('.AddressFieldsDivWithSingle').show();
            var singleAddress1= '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="11_Address1" value="" maxLength="100" placeholder="Address Line1…">'+
                '<div id="11_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="11_Address2" value="" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" placeholder="Alternate Phone…">'+
                '<div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="11_State" id="11_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="11_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="11_City" value="" maxLength="25" placeholder="City…">'+
                '<div id="11_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="11_PinCode" value="" maxLength="6" placeholder="Pin Code…">'+
                '<div id="11_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>';  
            $(".AddressFieldsDivWithSingle").append(singleAddress1).show;
            

}


            
        });
        
        <?php //if($getCarWashServiceDetails['total_cars']>1){ ?>
           //alert("multiple");
           
           //$('#DifferentLocationDiv').show();
        <?php //}else{?>
            //$('#DifferentLocationDiv').hide();
        <?php //}?>
        
        //$('.DifferentAddress').bootstrapSwitch();
        
        //$('#CarWashForm_DifferentLocation').bootstrapSwitch();
        /*$('#CarWashForm_DifferentLocation').bootstrapSwitch('setState', false);
        $('#CarWashForm_DifferentLocation').val('0');
        $('#1_DifferentAddress').bootstrapSwitch();
        //$('#AlternatePhone').bootstrapSwitch();
        $('#1_InteriorCleaning').bootstrapSwitch();
        //$('#ExteriorCleaning').bootstrapSwitch();
        $('#1_ShampooSeats').bootstrapSwitch();*/
       
        $('#1_InteriorCleaning').on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){
                 $('#1_InteriorCleaning').val('1');
               $('.interiorDiv').show();
               $('#1_ShampooSeats').bootstrapSwitch('setState', true);
               $('#1_ShampooSeats').val('1');
            }
            else{
                 $('#1_InteriorCleaning').val('0');
                $('.interiorDiv').hide();
                $('#1_ShampooSeats').bootstrapSwitch('setState', false);
                $('#1_ShampooSeats').val('0');
            }
        });
        
        
        $('#1_ShampooSeats').on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){
               $('#1_ShampooSeats').val('1');
            }
            else{
               $('#1_ShampooSeats').val('0');
           }
        });
        
    });
    function onTotalcars(obj){
        $('#CarWashForm_DifferentLocation').val('0');
        //alert(obj.value);
        var html2='';
        if(obj.value>1){
            $('#DifferentLocationDiv').show();
            for(var i=1;i<=obj.value;i++){
                  
                  html2 += '<div class="cardetails" >'+
        '<div class=" row-fluid">'+
            '<div class="span12 ">'+
                '<h5 class="toggles">#'+i+' details</h5>'+
            '</div> '+   
        '</div><hr style="margin: 0;" />'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Make / Model of the Car</label>'+
                '<input type="text" class="span12" maxLength="25" placeholder="Make of the Car..." id="'+i+'_MakeOfCar">'+
                '<div id="'+i+'_MakeOfCar_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+
            '<div class=" span4">'+
                '<label> Exterior Color</label>'+
                '<input type="text" class="span12" maxLength="25" placeholder="Exterior Color..." id="'+i+'_ExteriorColor">'+
                '<div id="'+i+'_ExteriorColor_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+

        '</div>'+
        '<div class="row-fluid">'+
            '<div class="span4">'+
                '<label> Interior Cleaning</label>'+
                    '<div class="switch switch-large InteriorCleaning" data-id="'+i+'" id="'+i+'_InteriorCleaning" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                '</div>'+
            '<div class="interiorDiv" id="'+i+'_interiorDiv" style="display:none">'+
            '<div class=" span4" >'+
                '<label> Shampoo Seats</label>'+
                    '<div class="switch switch-large ShampooSeats" data-id="'+i+'" id="'+i+'_ShampooSeats" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                    '<div id="'+i+'_ShampooSeatsTooltip" class="Additional_S_price" style="display:none">Cost of Services is <b>Rs.<label>400</label>/-</b></div>'+
             '</div>'+
        '</div>'+
        '</div>'+
        '<div class="AddressFieldsDiv" id="'+i+'_AddressFieldsDiv" Style="display:none">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="'+i+'_Address1" maxLength="100" placeholder="Address Line1…">'+
                '<div id="'+i+'_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="'+i+'_Address2" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="'+i+'_AlternatePhone" maxLength="10" placeholder="Alternate Phone…">'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="'+i+'_State" id="'+i+'_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="'+i+'_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="'+i+'_City" maxLength="25" placeholder="City…">'+
                '<div id="'+i+'_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="'+i+'_PinCode" maxLength="6" placeholder="Pin Code…">'+
                '<div id="'+i+'_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';
    
              }
              //alert(html);
         var singleAddress= '<div class="AddressFieldsDivWithSingle" id="1_AddressFieldsDivWithSingle" Style="display:block">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="11_Address1" value="" maxLength="100" placeholder="Address Line1…">'+
                '<div id="11_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="11_Address2" value="" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" placeholder="Alternate Phone…">'+
                '<div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="11_State" id="11_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="11_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="11_City" value="" maxLength="25" placeholder="City…">'+
                '<div id="11_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="11_PinCode" value="" maxLength="6" placeholder="Pin Code…">'+
                '<div id="11_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';  
              var ss =$(".newcars").html(html2);
              //$(".newcars").html(html2).show();
              //alert("====html con==="+$(".newcars").html())
             $(ss).append(singleAddress).show;
                bindDiff(obj.value);
            
        }else{
            $('#DifferentLocationDiv').hide();
            sHtml ='<div class="cardetails" >'+
        '<div class=" row-fluid">'+
            '<div class="span12 ">'+
                '<h5 class="toggles"># details</h5>'+
            '</div> '+   
        '</div><hr style="margin: 0;" />'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Make / Model of the Car</label>'+
                '<input type="text" class="span12" maxLength="25" value="" placeholder="Make of the Car..." id="1_MakeOfCar">'+
                '<div id="1_MakeOfCar_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+
            '<div class=" span4">'+
                '<label> Exterior Color</label>'+
                '<input type="text" class="span12" maxLength="25" value="" placeholder="Exterior Color..." id="1_ExteriorColor">'+
                '<div id="1_ExteriorColor_em" class="errorMessage" style="display:none"></div>'+
            '</div>'+

        '</div>'+
        '<div class="row-fluid">'+
            '<div class="span4">'+
                '<label> Interior Cleaning</label>'+
                    '<div class="switch switch-large InteriorCleaning" data-id="1" id="1_InteriorCleaning" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                '</div>'+
            '<div class="interiorDiv" id="1_interiorDiv" style="display:none">'+
            '<div class=" span4" >'+
                '<label> Shampoo Seats</label>'+
                    '<div class="switch switch-large ShampooSeats" data-id="1" id="1_ShampooSeats" data-on-label="Yes" data-off-label="No">'+
                        '<input type="checkbox">'+
                    '</div>'+
                    '<div id="1_ShampooSeatsTooltip" class="Additional_S_price" style="display:none">Cost of Services is <b>Rs.<label>400</label>/-</b></div>'+
             '</div>'+
        '</div>'+
        '</div>'+
        '<div class="AddressFieldsDiv" id="1_AddressFieldsDiv" Style="display:block">'+
 	'<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Address Line1</label>'+
                '<input type="text" class="span12" id="11_Address1" value="" maxLength="100" placeholder="Address Line1…">'+
                '<div id="11_Address1_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+ 
             '<div class=" span4">'+
                '<label> Address Line2</label>'+
                '<input type="text" class="span12" id="11_Address2" value="" maxLength="100" placeholder="Address Line2…">'+
             '</div>'+
             '<div class=" span4">'+
                '<label> Alternate Phone</label>'+'<input type="text" value="+91" disabled="disabled" class="span3"/>'+' '+
                '<input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" placeholder="Alternate Phone…">'+
                '<div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>'+
             '</div> '+
        '</div>'+
        '<div class="row-fluid">'+
            '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> State</label>'+
                '<select name="11_State" id="11_State" class="span12" >'+
                    '<option value="">Select State</option>'+
                    '<?php foreach ($States as $course) { ?>'+
                    '<option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>'+

                    '<?php } ?>'+
                    '</select>'+
                    '<div id="11_State_em" class="errorMessage" style="display:none"></div>'+
             '</div>'+
             '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> City</label>'+
                '<input type="text" class="span12" id="11_City" value="" maxLength="25" placeholder="City…">'+
                '<div id="11_City_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '<div class=" span4">'+
                '<label><abbr title="required">*</abbr> Pin Code</label>'+
                '<input type="text" class="span12" id="11_PinCode" value="" maxLength="6" placeholder="Pin Code…">'+
                '<div id="11_PinCode_em" class="errorMessage" style="display:none"></div>'+
           '</div>'+
           '</div>'+
        '</div>'+
    '</div>';
          $(".newcars").html(sHtml).show(); 
           bindDiffEdit(1);
        }
    }
    
    
    
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

function checkBox(obj){
    alert(obj.toSource());
}

function bindDiff(nValue){
   //alert("--bindDiff--"+nValue)
    
                    
    for(var k=1; k<=nValue; k++){
        
        //alert("for1----kkkkkkkkkkkkkkk---"+k+"===="+h);
       $("#"+k+"_DifferentAddress").bootstrapSwitch();
       $("#"+k+"_InteriorCleaning").bootstrapSwitch();
        //$('#ExteriorCleaning').bootstrapSwitch();
        $("#"+k+"_ShampooSeats").bootstrapSwitch();
        $("#"+k+"_DifferentAddress").val('0');
        $("#"+k+"_InteriorCleaning").val('0');
        $("#"+k+"_ShampooSeats").val('0');
   
            
      
    }

}
    $(".DifferentAddress").live('mouseenter',function(){
        var id = $(this).data('id');
        $("#"+id+"_DifferentAddress").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){//alert("yes"+id)
                 $("#"+id+"_DifferentAddress").val('1');
                $("#"+id+"_AddressFieldsDiv").show();
            }
            else{//alert("No"+id)
                 $("#"+id+"_DifferentAddress").val('0');
                $("#"+id+"_AddressFieldsDiv").hide();
            }
        });
    });
    
    $(".InteriorCleaning").live('mouseenter',function(){
        var id = $(this).data('id');
        $("#"+id+"_InteriorCleaning").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;//alert(value);
            if(value == true){//alert("yes"+id)
               $("#"+id+"_InteriorCleaning").val('1');
               $("#"+id+"_interiorDiv").show();
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', true);
               $("#"+id+"_ShampooSeats").val('1');
               $("#"+id+"_ShampooSeatsTooltip").show();
            }
            else{//alert("No"+id)
               $("#"+id+"_InteriorCleaning").val('0');
               $("#"+id+"_interiorDiv").hide();
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', false);
               $("#"+id+"_ShampooSeats").val('0');
               $("#"+id+"_ShampooSeatsTooltip").hide();

            }
        });
    });
    $(".ShampooSeats").live('mouseenter',function(){
        var id = $(this).data('id');
        $("#"+id+"_ShampooSeats").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){
              
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', true);
               
               $("#"+id+"_ShampooSeats").val('1');
               $("#"+id+"_ShampooSeatsTooltip").show();
            }
            else{//alert("No"+id)
               
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', false);
               
               $("#"+id+"_ShampooSeats").val('0');
               $("#"+id+"_ShampooSeatsTooltip").hide();
            }
        });
    });


function bindDiffEdit(nValue){
   //alert("--bindDiff-Edit-"+nValue+"===="+$('#CarWashForm_TotalCars').val())
   
        if($('#CarWashForm_TotalCars').val()=='1'){
  
   $('#CarWashForm_DifferentLocation').val('0');}else{ $('.AddressFieldsDiv').show();
   $('.AddressFieldsDivWithSingle').hide();
   //$('#DifferentLocation').bootstrapSwitch();
   }
   //alert("DL==1=="+$("#CarWashForm_DifferentLocation").val());
    //if($('#CarWashForm_TotalCars').val()>1){$("#CarWashForm_DifferentLocation").val("1");}else{$("#CarWashForm_DifferentLocation").val("0");}
     // alert("DL=2==="+$("#CarWashForm_DifferentLocation").val());
        for(var k=1; k<=nValue; k++){
        
        //alert("for1----kkkkkkkkkkkkkkk---"+k+"===="+h);
       $("#"+k+"_DifferentAddress").bootstrapSwitch();
       $("#"+k+"_InteriorCleaning").bootstrapSwitch();
        //$('#ExteriorCleaning').bootstrapSwitch();
        $("#"+k+"_ShampooSeats").bootstrapSwitch();
        $("#"+k+"_DifferentAddress").val('0');
        $("#"+k+"_InteriorCleaning").val('0');
        $("#"+k+"_ShampooSeats").val('0');
   
            
      
    }

}

$(".DifferentAddress").live('mouseenter',function(){
        //var id = $(this).data('id');alert("default 1==="+id);
        $("#1_DifferentAddress").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){//alert("yes"+id)
                 $("#1_DifferentAddress").val('1');
                $("#1_AddressFieldsDiv").show();
            }
            else{//alert("No"+id)
                 $("#1_DifferentAddress").val('0');
                $("#1_AddressFieldsDiv").hide();
            }
        });
    });

/*$(".InteriorCleaning").live('mouseenter',function(){
        var id = $(this).data('id');
        $("#1_InteriorCleaning").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){alert("true");
               $("#1_InteriorCleaning").val('1');
               $(".interiorDiv").show();
               //$("#1_interiorDiv").show();
               $("#1_ShampooSeats").bootstrapSwitch('setState', true);
               $("#1_ShampooSeats").val('1');
            }
            else{//alert("No"+id)
               $("#1_InteriorCleaning").val('0');
               $(".interiorDiv").hide();
               $("#1_ShampooSeats").bootstrapSwitch('setState', false);
               $("#1_ShampooSeats").val('0');
            }
        });
    });
    
    $(".ShampooSeats").live('mouseenter',function(){
        var id = $(this).data('id');
        $("#"+id+"_ShampooSeats").on('switch-change', function (e, data) {
            var $el = $(data.el),
            value = data.value;
            if(value == true){alert("fddd==="+id);
              
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', true);
               
               $("#"+id+"_ShampooSeats").val('1');
               $("#"+id+"_ShampooSeatsTooltip").show();
            }
            else{//alert("No"+id)
               
               $("#"+id+"_ShampooSeats").bootstrapSwitch('setState', false);
               
               $("#"+id+"_ShampooSeats").val('0');
               $("#"+id+"_ShampooSeatsTooltip").hide();
            }
        });
    });*/

<?php if(isset($getCarWashServiceDetails) && sizeof($getCarWashServiceDetails)>0){ 
    $j=1; foreach($getCarWashServiceDetails as $rw){ ?>
         <?php if($rw['different_location']==1){?>
           $('#CarWashForm_DifferentLocation').val('1');  
           $('.AddressFieldsDiv').show();
   $('.AddressFieldsDivWithSingle').hide();
           //alert("for cond in=="+$('#CarWashForm_DifferentLocation').val());
         <?}else{?>
              $('#CarWashForm_DifferentLocation').val('0');  
              $('.AddressFieldsDiv').hide();
   $('.AddressFieldsDivWithSingle').show();
    $('#11_Address1').val("<?php echo $rw['address_line1'];?>");
    $('#11_Address2').val("<?php echo $rw['address_line2'];?>");
    $('#11_AlternatePhone').val("<?php echo $rw['alternate_phone'];?>");
    $('#11_State').val("<?php echo $rw['address_state'];?>");
    $('#11_City').val("<?php echo $rw['address_city'];?>");
    $('#11_PinCode').val("<?php echo $rw['address_pin_code'];?>");
           //alert("for else cond in=="+$('#CarWashForm_DifferentLocation').val());
         <?php }?>
         <?php if($rw['different_number'] == 1){ ?>
          
        //$('#DifferentLocationDiv').show();
        //$('#DifferentLocation').bootstrapSwitch();
        //$('#DifferentLocation').bootstrapSwitch('setState', true);
        //$('#DifferentLocation').val('1');
        $('#<?php echo $j; ?>_DifferentAddress').bootstrapSwitch('setState', true);
        $('#<?php echo $j; ?>_AddressFieldsDiv').show();
        $('#<?php echo $j; ?>_DifferentAddress').val('1');
        <?php } else {   ?>
           
        //$('#<?php echo $j; ?>_DifferentAddress').bootstrapSwitch();
        $('#<?php echo $j; ?>_DifferentAddress').bootstrapSwitch('setState', false);
        $('#<?php echo $j; ?>_DifferentAddress').val('0');
        <?php } ?> 
        
        <?php if($rw['interior_cleaning'] == 1){ ?>
        $('#<?php echo $j; ?>_InteriorCleaning').bootstrapSwitch('setState', true);
        $('#<?php echo $j; ?>_interiorDiv').show();
        $('#<?php echo $j; ?>_ShampooSeats').bootstrapSwitch('setState', true);
         $('#<?php echo $j; ?>_InteriorCleaning').val('1');
        <?php } else {?>
            
        $('#<?php echo $j; ?>_InteriorCleaning').bootstrapSwitch('setState', false);
        $('#<?php echo $j; ?>_InteriorCleaning').val('0');
        $('#<?php echo $j; ?>_ShampooSeats').bootstrapSwitch('setState', false);
        $('#<?php echo $j; ?>_interiorDiv').hide();
        <?php } ?>
            
        
        <?php if($rw['shampoo_seats'] == 1){ ?>
        $('#<?php echo $j; ?>_ShampooSeats').bootstrapSwitch('setState', true);
        $('#<?php echo $j; ?>_ShampooSeats').val('1');
        $("#<?php echo $j; ?>_ShampooSeatsTooltip").show();
        
        <?php } else {?>
        $('#<?php echo $j; ?>_ShampooSeats').bootstrapSwitch('setState', false);
        $('#<?php echo $j; ?>_ShampooSeats').val('0');
        $("#<?php echo $j; ?>_ShampooSeatsTooltip").hide();
        <?php } ?> 
            <?php $j++;?>
    <?php }?>
<?php }?>    
function onChangeFrequencyto(value) {
       if (value == '5') {
           document.getElementById('otherFreqDiv').style.display='none';
           document.getElementById('oneTimeDiv').style.display='block';
       } else {
           document.getElementById('oneTimeDiv').style.display='none';
           document.getElementById('otherFreqDiv').style.display='block';
       }
   }

</script>