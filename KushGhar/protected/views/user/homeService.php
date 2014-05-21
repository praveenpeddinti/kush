<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                            <li class=""><a href="/site/cleaning"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="/user/paymentinfo" ><span class="KGpayment"> </span></a></li>
                            
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            
                            <ul class="l_menu_sub_menu">
                                <li>
                                    
                                    <div id="progressbar"></div>
                                </li>
                                <?php
                                 if((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))){
                                     $statusClassForBasic = 'status_info2';
                                     $basicPercent = 35;
                                     error_log("1point----".$basicPercent);
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture)) && (empty($customerDetails->birth_date))){
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 15;
                                     error_log("2point----".$basicPercent);
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 20;
                                     error_log("3point----".$basicPercent);
                                 }else if((empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 25;
                                     error_log("5point----".$basicPercent);
                                 }else if((empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                     error_log("6point----".$basicPercent);
                                 }else if((empty($customerDetails->found_kushghar_by))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                     error_log("6point----".$basicPercent);
                                 }else {
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 10;
                                     error_log("4point----".$basicPercent);
                                     
                                 }
                                 if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                                     
                                     $statusClassForContact = 'status_info2';
                                     $contactPercent = 35;
                                 }else if((empty($customerAddressDetails->address_line1))){
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 20;
                                     error_log("6point----".$contactPercent);
                                 }else{
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 10;
                                     error_log("elsepoint----".$contactPercent);
                                 }
                                 if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year)) && (!empty($customerPaymentDetails->first_name)) && (!empty($customerPaymentDetails->last_name))&& (!empty($customerPaymentDetails->phone)) && (!empty($customerPaymentDetails->address1)) && (!empty($customerPaymentDetails->address2))){
                                     $statusClassForPayment = 'status_info2';
                                     $payPercent = 35;
                                 }else if (empty($customerPaymentDetails->address2)){
                                     $statusClassForPayment = 'status_info1';
                                     $payPercent = 20;
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                     $payPercent = 0;
                                 }
                                 ?>
                                <li  class="active"><a href="homeService"> <i class="fa fa-user"></i> Service Details</a></li>
                                <li><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
                                    <div class="<?php echo $statusClassForPayment;?>"> </div>
                                </li>
                                <li><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a>
                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>
                                </li>
                                <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
                                    <div class="<?php echo $statusClassForContact;?>"> </div>
                                </li>
                                
                            </ul>
                        </div>
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                        <div id="services" class="collapse">
                            <div class="selected_tab">services</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                
                
                <div class="row-fluid">
                    <div class="span12">
                        
                        
                        <div class="paddinground">
                            
                            <div id="serviceSpinLoader"></div>
                            
                           <div id="homeServicesMainDiv">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'homeservices-form',
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                            ));?>
                            <?php echo $form->error($homeModel, 'error'); ?>
                               
                        
                            <fieldset>
                                
                                <div class="row-fluid">
                                    <div class=" span12">
                                        
                                        <?php //echo $form->radioButton($model, 'HouseCleaning', array('value'=>1, 'uncheckValue'=>null)); ?>
                                    <?php echo  $form->radioButtonList($homeModel,'HouseCleaning',array('1'=>'Please clean my house','0'=>'Not Required'),array('separator'=>'', 'labelOptions'=>array('style'=>'display:inline'))); ?>
                                        <?php echo $form->error($homeModel, 'HouseCleaning'); ?>    
                                    </div>                                 
                                </div>
                                <div class="row-fluid">
                                    <div class=" span12">
                                        <?php echo  $form->radioButtonList($homeModel,'CarCleaning',array('1'=>'I want my car to be wash','0'=>'No car wash'),array('separator'=>'', 'labelOptions'=>array('style'=>'display:inline'))); ?>
                                     </div>                                 
                                </div>
                                <div class="row-fluid">
                                    <div class=" span12">
                                        <?php echo  $form->radioButtonList($homeModel,'StewardCleaning',array('1'=>'I want stewards for my party','0'=>'Not Required'),array('separator'=>'', 'labelOptions'=>array('style'=>'display:inline'))); ?>
                                     </div>                                 
                                </div>
                                <div class="row-fluid">
                                <div class=" span12">
                                  <div class="pull-right paddingT30">
                                      <?php   echo CHtml::ajaxButton('Submit', array('user/homeService'), array(
                                                        'type' => 'POST',
                                                        'dataType' => 'json',
                                          //'error'=>'function(data){alert(data.toSource());}',
                                                        'beforeSend' => 'function(){
                                                                scrollPleaseWait("serviceSpinLoader","homeservices-form");}',
                                                        'success' => 'function(data,status,xhr) { addAllServicehandler(data,status,xhr);}'), array('class' => 'btn btn-primary'));
                                         ?>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                        <?php $this->endWidget(); ?>
                            </div>
                            
                            <div id="ServiceMainDiv" class="services" style="display: none">
                             
                            </div>
                            
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() { 
        <?php $totalPercent = $basicPercent+$contactPercent+$payPercent;?>
        $( "#progressbar" ).progressbar({value: <?php echo $totalPercent;?>});
        
    });
    /*
     * 
     * @param {type} data
     * @returns praveen main services (Select services 
     */
    function addAllServicehandler(data){//alert(data.status);
        scrollPleaseWaitClose('serviceSpinLoader');
        if(data.status=='success'){
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            //alert(globalspace.HouseCleaning+"=="+globalspace.CarCleaning+"=="+globalspace.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            if(globalspace.CarCleaning==0 && globalspace.StewardCleaning==0){
                $('#HouseCleaningSubmit').val('Submit');
            }
            if(globalspace.HouseCleaning==0 && globalspace.StewardCleaning==0){
                $('#CarWashCleaningSubmit').val('Submit');
            }
        }else{
            //alert("No");
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
        }
    }
    /*
     * 
     * @returns Praveen House Cleaning service button start
     */
    function submitHouseCleaning(){//alert($('#HouseCleaningSubmit').val());
        var queryString = $('#services-form').serialize();
        var type='';
        if($('#HouseCleaningSubmit').val()=='Submit'){//alert($('#HouseCleaningSubmit').val());
            type='submit';
        }
        if($('#HouseCleaningSubmit').val()=='Next'){
            type='next';
        }
        queryString+='&Type='+type;
        //alert("HouseCleaning Form Details=="+queryString);
        ajaxRequest('/user/services', queryString,addHouseCleaningServicehandler);
    }
    
    
    function addHouseCleaningServicehandler(data){//alert("enter function===");alert(data.data);
        scrollPleaseWaitClose('serviceSpinLoader');
        if(data.status=='success'){
            //alert("Added successfully");
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            if(globalspace.StewardCleaning==0){
                $('#CarWashCleaningSubmit').val('Submit');
            }
        }else{
            //alert("No");
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
        }
    }
    
    /*
     * 
     * @returns Praveen Car Wash Cleaning service button start
     */
    
    function submitCarWashCleaning(){//alert($('#CarWashCleaningSubmit').val());
        
        if($('#HouseCleaningSubmit').val()=='Submit'){
            var queryString = $('#services-form').serialize();
            
            ajaxRequest('/user/priceQuote',queryString, addPricehandler);
        }
        if($('#CarWashCleaningSubmit').val()=='Next'){
            var queryString = $('#carwash-form').serialize();
            //alert(queryString);
        ajaxRequest('/user/carwash', queryString,addCarWashCleaningServicehandler);
        }
    }
    
    function addCarWashCleaningServicehandler(data){//alert("enter car function===");alert(data.data);
        scrollPleaseWaitClose('serviceSpinLoader');
        if(data.status=='success'){
            //alert("Added successfully");
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            if(globalspace.StewardCleaning==0){
                $('#CarWashCleaningSubmit').val('Submit');
            }
        }else{
            //alert("No");
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
        }
    }
    function buttonCarWashCleaningPrevious(){//alert("privous");
        var queryString = $('#services-form').serialize();
        ajaxRequest('/user/services', queryString,addHouseCleaningServicehandler);
    }
    function addPricehandler(data){alert(data.status);
        //alert("enter price Quote");
        if(data.status=='success'){
            //alert("Added successfully");
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            /*if(globalspace.StewardCleaning==0){
                $('#HouseCleaningSubmit').val('Submit');
            }*/
        }else{
            //alert("No");
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
        }
    }
    
    //stewards code start---
    function onChangeProduto(value){
        //alert("praveen"+value);
        if(value==7){
            $("#otherDiv").show();
        }else{
           $("#otherDiv").hide(); 
        }
    }
    function onChangeTime(){
        
        var StartTimes= $("#StewardCleaningForm_StartTime").val();
        var EndTimes = $("#StewardCleaningForm_EndTime").val();
        if( (StartTimes!='') && (EndTimes!='') ){
            var totalHours1='';
            var stDateres = StartTimes.split(" "); 
            var enDateres = EndTimes.split(" "); 
            var stDate1 = new Date(stDateres[0]);
            var enDate1 = new Date(enDateres[0]);
        
            var compDate = stDate1 - enDate1;
            
        var startDateValuecmp = stDate1.getTime();
            var endDateValuecmp = enDate1.getTime();
            if(compDate==0){
            
            var stTimeres = stDateres[1].split(":"); 
            var enTimeres = enDateres[1].split(":");
            if(Math.round(stTimeres[0])<Math.round(enTimeres[0])){
            
            totalHours1 =Math.round(enTimeres[0])-Math.round(stTimeres[0]);
            //alert("same date==="+totalHours1);
                $("#StewardCleaningForm_DurationHours").val(totalHours1);  
                
            }
        }
        if( startDateValuecmp < endDateValuecmp ){
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var STime = stDateres[0].replace(/-/g, ","); 
            var ETime = enDateres[0].replace(/-/g, ","); 
            var firstDate = new Date(STime);
            var secondDate = new Date(ETime);

            var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
            //alert("okdiff days=="+diffDays*24);
            var stTimeres = stDateres[1].split(":"); 
        var enTimeres = enDateres[1].split(":");
        //alert("time==="+Math.round(stTimeres[0])+"==="+Math.round(enTimeres[0]));
        //alert("Total Time===="+Math.abs((Math.round(enTimeres[0])-Math.round(stTimeres[0]))));
        totalHours1=((diffDays*24)+(Math.abs((Math.round(enTimeres[0])-Math.round(stTimeres[0])))));
        //alert(totalHours1);
        $("#StewardCleaningForm_DurationHours").val(totalHours1); 
            //$("#StewardCleaningForm_AttendPeople").val();
            
        //return false;
        }
          
        }
    }
    function onTotalStewards(obj){
        //alert(obj.id);
        //alert(obj.value);
        
        $("#StewardCleaningForm_totalStewards").val(Math.round(obj.value/5));
        
    }
    function submitStewardsCleaning(){//alert($('#HouseCleaningSubmit').val());
        
        
        
        
        var queryString = $('#steward-form').serialize();
        var totalHours='';
        var stDate = $('#StewardCleaningForm_StartTime').val();
        var enDate = $('#StewardCleaningForm_EndTime').val();
        //var stDateh = new Date($('#StewardCleaningForm_StartTime').val());
        //var enDateh = new Date($('#StewardCleaningForm_EndTime').val());
        var stDateres = stDate.split(" "); 
        var enDateres = enDate.split(" "); 
        var stDate1 = new Date(stDateres[0]);
        var enDate1 = new Date(enDateres[0]);
        
        var compDate = stDate1 - enDate1;
        //alert(compDate);
        

        var startDateValuecmp = stDate1.getTime();
        var endDateValuecmp = enDate1.getTime();
               
        //different days start code
        /*var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var STime = stDateres[0].replace(/-/g, ","); 
        var ETime = enDateres[0].replace(/-/g, ","); 
       
        var firstDate = new Date(STime);
        var secondDate = new Date(ETime);
        alert("full date without time==="+STime+"==="+ETime);
        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
        alert("diff days=="+diffDays);*/
        //different daysend code
         
        
        if( $('#StewardCleaningForm_EventType').val()=='' ){
            
            $("#StewardCleaningForm_EventType_em_").show();
            $("#StewardCleaningForm_EventType_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EventType_em_").text("Please Select Event Type");
            //alert("Event=="+$('#StewardCleaningForm_EventType').val()); 
        return false;
        }
        if( ($('#StewardCleaningForm_EventType').val()=='7') && (($('#StewardCleaningForm_EventName').val()==''))){
            $("#StewardCleaningForm_EventType_em_").hide();
            $("#StewardCleaningForm_EventName_em_").show();
            $("#StewardCleaningForm_EventName_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EventName_em_").text("Please Enter Event Name");
            //alert("Event=="+$('#StewardCleaningForm_EventType').val()); 
        return false;
        }
        if( $('#StewardCleaningForm_StartTime').val()=='' ){
            $("#StewardCleaningForm_EventType_em_").hide();
            $("#StewardCleaningForm_EventName_em_").hide();
            $("#StewardCleaningForm_StartTime_em_").show();
            $("#StewardCleaningForm_StartTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_StartTime_em_").text("Please Select Start Time");
            //alert("Event=="+$('#StewardCleaningForm_StartTime').val()); 
        return false;
        }
        if( $('#StewardCleaningForm_EndTime').val()=='' ){
            $("#StewardCleaningForm_StartTime_em_").hide();
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("Please Select Start Time");
            //alert("Event=="+$('#StewardCleaningForm_EndTime').val()); 
        return false;
        }
        if(compDate==0){
            
        var stTimeres = stDateres[1].split(":"); 
        var enTimeres = enDateres[1].split(":");
        //alert("time==="+Math.round(stTimeres[0])+"==="+Math.round(enTimeres[0]));
        //alert("Total Time===="+(Math.round(enTimeres[0])-Math.round(stTimeres[0])));
        if(Math.round(stTimeres[0])>Math.round(enTimeres[0])){
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("End Time cannot be less than Start Time");
            return false;
        }
       }
        if( startDateValuecmp > endDateValuecmp ){
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("End Date cannot be less than Start Date");
        //alert("End Date cannot be less than Start Date");
        return false;
        }
        
        //if(( $('#StewardCleaningForm_StartTime').val()!='' ) && ($('#StewardCleaningForm_EndTime').val()!='' )){
        //alert("same date==="+totalHours);
        //    $("#StewardCleaningForm_AttendPeople").val(totalHours);
        //}
        
        else{
             
              $("#StewardCleaningForm_EndTime_em_").show();
            
        //alert("else---------");
        //$("#StewardCleaningForm_error_em_").hidden();
        var type='';
        if($('#StewardsCleaningSubmit').val()=='Submit'){//alert($('#HouseCleaningSubmit').val());
            type='submit';
        }
        if($('#StewardsCleaningSubmit').val()=='Next'){
            type='next';
        }
        queryString+='&Type='+type;
         //alert("StewardsCleaning Form Details=="+queryString);
         
        ajaxRequest('/user/stewards', queryString,addStewardCleaningServicehandler);
    }
    }
    
    
    
    function addStewardCleaningServicehandler(data){
        scrollPleaseWaitClose('serviceSpinLoader');
        
        if(data.status=='success'){
            //alert("Added successfully");
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            
            }/*else{
            //alert("No");
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {alert("key==="+key+"==value=="+val);
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
        }*/
    }
    
</script>