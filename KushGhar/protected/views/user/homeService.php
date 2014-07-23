<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="" title="Account"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                            <li class="active" title="Services"><a href="/user/homeservice"  ><span class="KGservices"> </span></a></li>
                            <li class="" title="Payment"><a href="/user/paymentinfo" ><span class="KGpayment"> </span></a></li>
                        </ul>
                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            <ul class="l_menu_sub_menu">
                                <!--<li>                                    
                                    <div id="progressbar"></div>
                                </li>-->
                                <?php
                                if ((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))) {
                                    $statusClassForBasic = 'status_info2';
                                    $basicPercent = 35;
                                } else if ((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture)) && (empty($customerDetails->birth_date))) {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 15;
                                } else if ((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))) {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 20;
                                } else if ((empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))) {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 25;
                                } else if ((empty($customerDetails->profilePicture))) {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 30;
                                } else if ((empty($customerDetails->found_kushghar_by))) {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 30;
                                } else {
                                    $statusClassForBasic = 'status_info1';
                                    $basicPercent = 10;
                                }
                                if ((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))) {
                                    $statusClassForContact = 'status_info2';
                                    $contactPercent = 35;
                                } else if ((empty($customerAddressDetails->address_line1))) {
                                    $statusClassForContact = 'status_info1';
                                    $contactPercent = 20;
                                } else {
                                    $statusClassForContact = 'status_info1';
                                    $contactPercent = 10;
                                }
                                if ((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year)) && (!empty($customerPaymentDetails->first_name)) && (!empty($customerPaymentDetails->last_name)) && (!empty($customerPaymentDetails->phone)) && (!empty($customerPaymentDetails->address1)) && (!empty($customerPaymentDetails->address2))) {
                                    $statusClassForPayment = 'status_info2';
                                    $payPercent = 35;
                                } else if (empty($customerPaymentDetails->address2)) {
                                    $statusClassForPayment = 'status_info1';
                                    $payPercent = 20;
                                } else {
                                    $statusClassForPayment = 'status_info3';
                                    $payPercent = 0;
                                }
                                ?>
                                <li  class="active"><a href="homeService"> <i class="fa fa-wrench"></i> Services</a></li>
                                <li><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
<!--                                    <div class="<?php echo $statusClassForPayment; ?>"> </div>-->
                                </li>
                                <li><a href="basicinfo"> <i class="fa fa-file-text-o"></i> Basic Info</a>
<!--                                    <div class=<?php echo '"' . $statusClassForBasic . '"' ?>></div>-->
                                </li>
                                <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
<!--                                    <div class="<?php echo $statusClassForContact; ?>"> </div>-->
                                </li>
                                <li><a href="order"> <i class="fa fa-file-text"></i> Orders</a>
                                </li>
                                <li><a href="invitefriends"><i class="fa fa-users"></i> Invite Friends</a></li>
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
                <div id="homeServiceWithOrderDiv" class="row-fluid">
                    <div class="span12">
                        <h4 class="paddingL20">Services </h4> <hr>
                        <div class="paddinground paddingTop0">
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
                                ));
                                ?>
                                <?php echo $form->error($homeModel, 'error'); ?>
                                <fieldset>
                                    <div class="row-fluid">
                                        <div class=" span12">
                                            <div class="services_opts">
                                                <ul>
                                                    <li class="house_cleaning">
                                                        <div class="row-fluid">
                                                            <?php echo $form->radioButtonList($homeModel, 'HouseCleaning', array('1' => 'Please clean my house', '0' => 'Not Required'), array('separator' => '&nbsp; &nbsp; &nbsp;', 'class' => 'styled', 'id' => 'HomeServiceForm_HouseCleaning')); ?>
                                                        </div>
                                                    </li>
                                                    <li class="car_wash">
                                                        <div class="row-fluid">
                                                            <?php echo $form->radioButtonList($homeModel, 'CarCleaning', array('1' => 'I want my car to be washed', '0' => 'No car wash needed'), array('uncheckValue' => null, 'separator' => '&nbsp; &nbsp; &nbsp;', 'class' => 'styled', 'id' => 'HomeServiceForm_CarCleaning')); ?>
                                                        </div>
                                                    </li>
                                                    <li class="stewards">
                                                        <div class="row-fluid">
                                                            <?php echo $form->radioButtonList($homeModel, 'StewardCleaning', array('1' => 'I want stewards for my party', '0' => 'I am not having a party'), array('uncheckValue' => null, 'separator' => '&nbsp; &nbsp; &nbsp;', 'class' => 'styled', 'id' => 'HomeServiceForm_StewardCleaning')); ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>                                 
                                    </div>
                                    <div class="row-fluid">
                                        <div class=" span12">
                                            <div class="pull-right paddingT30">
                                                <?php
                                                echo CHtml::ajaxButton('Submit', array('user/homeService'), array(
                                                    'type' => 'POST',
                                                    'dataType' => 'json',
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
                <div id="ServiceMainDiv2" class="services" style="display: none">
                    <div id="mailSpinLoader" ></div>
                </div>
            </article>
        </div>
    </section>
</div>

<script type="text/javascript">
$(document).ready(function() {
    
        var radio1 = $('input[name="HomeServiceForm[HouseCleaning]"]');
        <?php if($HouseService=='Yes Service'){?>
        for (var i = 0; i < radio1.length; i++) {
            
            if (radio1[i].value == 1) {
                radio1[i].checked = true;
                $(".house_cleaning").addClass('select');
            }
        }
        <?php  }else {?>
            for (var i = 0; i < radio1.length; i++) {
            
            if (radio1[i].value == 0) {
                radio1[i].checked = true;
                $(".house_cleaning").addClass('not_required');
            }
        }
      <?php }?>
        var radio2 = $('input[name="HomeServiceForm[CarCleaning]"]');
        <?php if($CarService=='Yes Service'){?>
        for (var i = 0; i < radio2.length; i++) {
            if (radio2[i].value == 1) {
                radio2[i].checked = true;
                $(".car_wash").addClass('select');
            }
        }
        <?php  }else {?>
            for (var i = 0; i < radio2.length; i++) {
            
            if (radio2[i].value == 0) {
                radio2[i].checked = true;
                $(".car_wash").addClass('not_required');
            }
        }
      <?php }?>
        var radio3 = $('input[name="HomeServiceForm[StewardCleaning]"]');
        <?php if($StewardsService=='Yes Service'){?>
              
        for (var i = 0; i < radio3.length; i++) {
            
            if (radio3[i].value == 1) {
                radio3[i].checked = true;
                $(".stewards").addClass('select');
            }
        }
      <?php  }else {?>
          for (var i = 0; i < radio3.length; i++) {
            
            if (radio3[i].value == 0) {
                radio3[i].checked = true;
                $(".stewards").addClass('not_required');
            }
        }
      <?php }?>
        $('#HomeServiceForm_HouseCleaning').live('click', function() {
            var radiosH = $('input[name="HomeServiceForm[HouseCleaning]"]:checked').val();
            if (radiosH == "1") {
                $(".house_cleaning").removeClass('not_required');
                $(".house_cleaning").addClass('select');
            } else {
                $(".house_cleaning").removeClass('select');
                $(".house_cleaning").addClass('not_required');
            }

        });
        
        $('#HomeServiceForm_CarCleaning').live('click', function() {
            var radiosC = $('input[name="HomeServiceForm[CarCleaning]"]:checked').val();
            if (radiosC == "1") {
                $(".car_wash").removeClass('not_required');
                $(".car_wash").addClass('select');
            } else {
                $(".car_wash").removeClass('select');
                $(".car_wash").addClass('not_required');
            }
        });
        
        $('#HomeServiceForm_StewardCleaning').live('click', function() {
            var radiosC = $('input[name="HomeServiceForm[StewardCleaning]"]:checked').val();
            if (radiosC == "1") {
                $(".stewards").removeClass('not_required');
                $(".stewards").addClass('select');
            } else {
                $(".stewards").removeClass('select');
                $(".stewards").addClass('not_required');
            }
        });

    <?php $totalPercent = $basicPercent + $contactPercent + $payPercent; ?>
        $("#progressbar").progressbar({value: <?php echo $totalPercent; ?>});

    });


    /*
     * 
     * @param {type} data
     * @returns praveen main services (Select services 
     */
    function addAllServicehandler(data) {
        scrollPleaseWaitClose('serviceSpinLoader');
        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            
           
            if (globalspace.CarCleaning == 0 && globalspace.StewardCleaning == 0) {
                $('#HouseCleaningSubmit').val('Submit');
            }
            if (globalspace.HouseCleaning == 0 && globalspace.StewardCleaning == 0) {
                
                $('#CarWashCleaningSubmit').val('Submit');
                        
            }
            
        } else {
            var error = [];
            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $("#" + key).parent().addClass('error');
                }

            });
        }
    }
    /*
     * 
     * @returns Praveen House Cleaning service button start
     */
    function submitHouseCleaning() {
        var queryString = $('#services-form').serialize();
        if (($('#HouseCleaningForm_SquareFeets').val() == '0') || ($('#HouseCleaningForm_SquareFeets').val() == '00')) {
            $("#HouseCleaningForm_SquareFeets_em_").show();
            $("#HouseCleaningForm_SquareFeets_em_").addClass('errorMessage');
            $("#HouseCleaningForm_SquareFeets_em_").text("Please Enter Numbers only");
            return false;
        }
        if (isNaN($('#HouseCleaningForm_SquareFeets').val())) {
            $("#HouseCleaningForm_SquareFeets_em_").show();
            $("#HouseCleaningForm_SquareFeets_em_").addClass('errorMessage');
            $("#HouseCleaningForm_SquareFeets_em_").text("Please Enter Numbers only");
            return false;
        }
       if ($("#HouseCleaningForm_ServiceStartTime").val() == "") {
           $("#HouseCleaningForm_SquareFeets_em_").hide();
                $("#HouseCleaningForm_ServiceStartTime_em_").show();
                $("#HouseCleaningForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#HouseCleaningForm_ServiceStartTime_em_").text("Please Select Service Date.");
                return false;
       }
       if (($('#HouseCleaningForm_LivingRooms').val() == '0') && ($('#HouseCleaningForm_BedRooms').val() == '0') && ($('#HouseCleaningForm_Kitchens').val() == '0') && ($('#HouseCleaningForm_BathRooms').val() == '0')) {
            $("#HouseCleaningForm_ServiceStartTime_em_").hide();
            $("#HouseCleaningForm_WeekDays_em_").hide();
            $("#HouseCleaningForm_LivingRooms_em_").show();
            $("#HouseCleaningForm_LivingRooms_em_").addClass('errorMessage');
            $("#HouseCleaningForm_LivingRooms_em_").text("You have choosen 0 rooms at your house, Please choose atleast one kind of room.");
            return false;
        }
        if ($('#HouseCleaningForm_Address1').val()=='') {
            $("#HouseCleaningForm_Address1_em_").show();
            $("#HouseCleaningForm_Address1_em_").addClass('errorMessage');
            $("#HouseCleaningForm_Address1_em_").text("Please Enter Address Line1");
            return false;
        }
        if ( ($("#HouseCleaningForm_AlternatePhone").val() != "") && (!$("#HouseCleaningForm_AlternatePhone").val().match(/^[0-9]+$/)) ) {
                $("#HouseCleaningForm_Address1_em_").hide(); 
                $("#HouseCleaningForm_AlternatePhone_em_").show();
                $("#HouseCleaningForm_AlternatePhone_em_").addClass('errorMessage');
                $("#HouseCleaningForm_AlternatePhone_em_").text("Please Enter only numbers ");
                return false;
        }
        if ( ($("#HouseCleaningForm_AlternatePhone").val() != "") && ($("#HouseCleaningForm_AlternatePhone").val().length<='9') ) {alert("praveen");
                $("#HouseCleaningForm_AlternatePhone_em").show();
                $("#HouseCleaningForm_AlternatePhone").addClass('errorMessage');
                $("#HouseCleaningForm_AlternatePhone").text("Alternate Phone too short (minimum is 10 numbers).");
                return false;
            }
        //State validation start
            if ( ($("#HouseCleaningForm_State").val()=='') ) {
                $("#HouseCleaningForm_State_em_").show();
                $("#HouseCleaningForm_State_em_").addClass('errorMessage');
                $("#HouseCleaningForm_State_em_").text("Please Select State ");
                return false;
            } 
            //State validation end
            //City validation start
            
            if ( (!$("#HouseCleaningForm_City").val().match(/[A-Za-z0-9]$/)) ) {
                $("#HouseCleaningForm_Address1_em_").hide(); 
                $("#HouseCleaningForm_City_em_").show();
                $("#HouseCleaningForm_City_em_").addClass('errorMessage');
                $("#HouseCleaningForm_City_em_").text("Please Enter City ");
                return false;
            } 
            //City validation end
            //Pin code validation start
            if ( ($("#HouseCleaningForm_PinCode").val()=='') ) {
                $("#HouseCleaningForm_PinCode_em_").show();
                $("#HouseCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#HouseCleaningForm_PinCode_em_").text("Please Enter Pin Code ");
                return false;
            } 
            if ( (!$("#HouseCleaningForm_PinCode").val().match(/^[0-9]+$/)) ) {
                
                $("#HouseCleaningForm_PinCode_em_").show();
                $("#HouseCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#HouseCleaningForm_PinCode_em_").text("Please Enter only numbers ");
                return false;
            } 
            if ( ($("#HouseCleaningForm_PinCode").val().length<='5') ) {
                $("#HouseCleaningForm_PinCode_em_").show();
                $("#HouseCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#HouseCleaningForm_PinCode_em_").text("Pin Code too short (minimum is 6 numbers).");
                return false;
            }else {
            $("#HouseCleaningForm_PinCode_em_").hide();
            //$("#HouseCleaningForm_NumberOfTimesServices_em_").hide();
            var type = '';
            if ($('#HouseCleaningSubmit').val() == 'Submit') {
                type = 'submit';
            }
            if ($('#HouseCleaningSubmit').val() == 'Next') {
                type = 'next';
            }
            var r='';
            if ( ($('#HouseCleaningForm_DifferentAddress').val()=='0') && ($('#HouseCleaningForm_ContactAddress').val()=='')) {
            var statusData = 'Would you like to add Contact info details?';
            r = confirm(statusData);
            }else{
                r= false;
            }
            if(r==true){
                queryString += '&Type=' + type+'&ContactInfo=Yes';
            }else{
                queryString += '&Type=' + type+'&ContactInfo=No';
            } 
        
            
            ajaxRequest('/user/services', queryString, addHouseCleaningServicehandler);
        }
    }

    function addHouseCleaningServicehandler(data) {
        scrollPleaseWaitClose('serviceSpinLoader');
        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            if (globalspace.StewardCleaning == 0) {
                $('#CarWashCleaningSubmit').val('Submit');
            }
        }
    }

    /*
     * 
     * @returns Praveen Car Wash Cleaning service button start
     */

    function submitCarWashCleaning() { 
        var dumpcars='';
        var makeofcar = "";
        var color = "";
        var differentAddress = "";
        var address1 = "";
        var address2 = "";
        var alternate_phone = "";
        var state = "";
        var city = "";
        var pin_code = "";

        var dd='';
        var DL = $("#DifferentLocation").val();
        //alert("DL====="+DL);exit;
        if ($("#CarWashForm_TotalCars").val() == "") {
                $("#CarWashForm_TotalCars_em_").show();
                $("#CarWashForm_TotalCars_em_").addClass('errorMessage');
                $("#CarWashForm_TotalCars_em_").text("Please Enter # of Cars.");
                return false;
            }else{
              $("#CarWashForm_TotalCars_em_").hide();
            }
        if(isNaN($("#CarWashForm_TotalCars").val()) || ($("#CarWashForm_TotalCars").val() <= 0)) { 
                $("#CarWashForm_TotalCars_em_").show();
                $("#CarWashForm_TotalCars_em_").addClass('errorMessage');
                $("#CarWashForm_TotalCars_em_").text("Please Enter +ve Number.");
                return false;
            }else{
              $("#CarWashForm_TotalCars_em_").hide();
            }
        
        if ($("#CarWashForm_ServiceStartTime").val() == "") {
                $("#CarWashForm_ServiceStartTime_em_").show();
                $("#CarWashForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#CarWashForm_ServiceStartTime_em_").text("Please Select Service Date.");
                return false;
            }else{
              $("#CarWashForm_ServiceStartTime_em_").hide();
            }
            dumpcars=$('#CarWashForm_TotalCars').val();
        if($("#DifferentLocation").val()=='1'){
        for (var i = 1; i <= dumpcars; i++) {
            if ($("#" + i + "_MakeOfCar").val() == "") {
                $("#" + i + "_MakeOfCar_em").show();
                $("#" + i + "_MakeOfCar_em").addClass('errorMessage');
                $("#" + i + "_MakeOfCar_em").text("Please Enter Make / Model of the Car");
                return false;
            } else {
                $("#" + i + "_MakeOfCar_em").hide();
                
            }

            if (($("#" + i + "_ExteriorColor").val() != "") && (!$("#" + i + "_ExteriorColor").val().match(/^[a-zA-Z]+$/))) {
                $("#" + i + "_ExteriorColor_em").show();
                $("#" + i + "_ExteriorColor_em").addClass('errorMessage');
                $("#" + i + "_ExteriorColor_em").text("Please Enter only alphabets ");
                return false;
            } else {
                $("#" + i + "_ExteriorColor_em").hide();
                
            }
            //address line1 start
            if ( ($("#" + i + "_Address1").val() == "") ) {
                $("#" + i + "_Address1_em").show();
                $("#" + i + "_Address1_em").addClass('errorMessage');
                $("#" + i + "_Address1_em").text("Please Enter Address Line1 ");
                return false;
            } else {
                $("#" + i + "_Address1_em").hide();
            }
            //address line1 end
            //phone validation start
            if ( ($("#" + i + "_AlternatePhone").val() != "") && (!$("#" + i + "_AlternatePhone").val().match(/^[0-9]+$/)) ) {
                $("#" + i + "_AlternatePhone_em").show();
                $("#" + i + "_AlternatePhone_em").addClass('errorMessage');
                $("#" + i + "_AlternatePhone_em").text("Please Enter only numbers ");
                return false;
            } else {
                $("#" + i + "_AlternatePhone_em").hide();
            }
            if ( ($("#" + i + "_AlternatePhone").val() != "") && ($("#" + i + "_AlternatePhone").val().length<='9') ) {
                $("#" + i + "_AlternatePhone_em").show();
                $("#" + i + "_AlternatePhone_em").addClass('errorMessage');
                $("#" + i + "_AlternatePhone_em").text("Alternate Phone too short (minimum is 10 numbers).");
                return false;
            } else {
                $("#" + i + "_AlternatePhone_em").hide();
            }
            //phone validation end
            //State validation start
            if ( ($("#" + i + "_State").val()=='') ) {
                $("#" + i + "_State_em").show();
                $("#" + i + "_State_em").addClass('errorMessage');
                $("#" + i + "_State_em").text("Please Select State ");
                return false;
            } else {
                $("#" + i + "_State_em").hide();
            }
            //State validation end
            //City validation start
            if ( (!$("#" + i + "_City").val().match(/[A-Za-z0-9]$/)) ) {
                $("#" + i + "_City_em").show();
                $("#" + i + "_City_em").addClass('errorMessage');
                $("#" + i + "_City_em").text("Please Enter City ");
                return false;
            } else {
                $("#" + i + "_City_em").hide();
            }
            //City validation end
            //Pin code validation start
            if ( ($("#" + i + "_PinCode").val()=='') ) {
                $("#" + i + "_PinCode_em").show();
                $("#" + i + "_PinCode_em").addClass('errorMessage');
                $("#" + i + "_PinCode_em").text("Please Enter Pin Code ");
                return false;
            } else {
                $("#" + i + "_PinCode_em").hide();
            }
            if ( (!$("#" + i + "_PinCode").val().match(/^[0-9]+$/)) ) {
                
                $("#" + i + "_PinCode_em").show();
                $("#" + i + "_PinCode_em").addClass('errorMessage');
                $("#" + i + "_PinCode_em").text("Please Enter only numbers ");
                return false;
            } else {
                $("#" + i + "_PinCode_em").hide();
            }
            if ( ($("#" + i + "_PinCode").val().length<='5') ) {
                $("#" + i + "_PinCode_em").show();
                $("#" + i + "_PinCode_em").addClass('errorMessage');
                $("#" + i + "_PinCode_em").text("Pin Code too short (minimum is 6 numbers).");
                return false;
            } else {
                $("#" + i + "_PinCode_em").hide();
            }
            //Pin Code validation end
        
              if (makeofcar == "") {
                    makeofcar = $("#" + i + "_MakeOfCar").val();
                } else if (makeofcar != "") {
                    makeofcar = makeofcar+"," + $("#" + i + "_MakeOfCar").val();
                }
                //makeofcar = makeofcar+ $("#" + i + "_MakeOfCar").val()+",";
                $('#CarWashForm_MakeOfCar').val(makeofcar); 
                
                /*if (color == "") {
                    color = $("#" + i + "_ExteriorColor").val()+",";
                } else if (color != "") {
                    color =  color + $("#" + i + "_ExteriorColor").val();
                }*/
                color =  color + $("#" + i + "_ExteriorColor").val()+",";
                $('#CarWashForm_ExteriorColor').val(color); 
                /*if (differentAddress == "") {
                    differentAddress = $("#" + i + "_DifferentAddress").val();
                } else if (differentAddress != "") {
                    differentAddress = differentAddress + "," + $("#" + i + "_DifferentAddress").val();
                }*/
                differentAddress = differentAddress + "," + $("#" + i + "_DifferentAddress").val()+",";
                $('#CarWashForm_DifferentAddress').val(differentAddress);
               /*if (address1 == "") {
                        
                    address1 = $("#" + i + "_Address1").val()+",";
                    
                } else if (address1 != "") {
                  address1 = address1 + $("#" + i + "_Address1").val();
                }*/
                address1 = address1 + $("#" + i + "_Address1").val()+",";
                $('#CarWashForm_Address1').val(address1);

               /*if (address2 == "") {
                    address2 = $("#" + i + "_Address2").val()+",";
                } else if (address2 != "") {
                    address2 = address2 + $("#" + i + "_Address2").val();
                }*/
                address2 = address2 + $("#" + i + "_Address2").val()+",";
                $('#CarWashForm_Address2').val(address2);
                
                /*if (alternate_phone == "") {
                    alternate_phone = $("#" + i + "_AlternatePhone").val()+",";
                } else if (alternate_phone != "") {
                    alternate_phone = alternate_phone + $("#" + i + "_AlternatePhone").val();
                }*/
                alternate_phone = alternate_phone + $("#" + i + "_AlternatePhone").val()+",";
                $('#CarWashForm_AlternatePhone').val(alternate_phone);
                
                /*if (state == "") {
                    state = $("#" + i + "_State").val()+",";
                } else if (state != "") {
                    state = state  + $("#" + i + "_State").val();
                }*/
                state = state  + $("#" + i + "_State").val()+",";
                $('#CarWashForm_State').val(state);
                
                /*if (city == "") {
                    city = $("#" + i + "_City").val()+ ",";
                } else if (city != "") {
                    city = city  + $("#" + i + "_City").val();
                }*/
                city = city  + $("#" + i + "_City").val()+",";
                $('#CarWashForm_City').val(city);
                
                /*if (pin_code == "") {
                    pin_code = $("#" + i + "_PinCode").val()+",";
                } else if (pin_code != "") {
                    pin_code = pin_code  + $("#" + i + "_PinCode").val();
                }*/
                pin_code = pin_code  + $("#" + i + "_PinCode").val()+",";
                $('#CarWashForm_PinCode').val(pin_code);
        }
        
        
        }
        
        
        if($("#DifferentLocation").val()=='0'){
        for (var i = 1; i <= dumpcars; i++) {
            if ($("#" + i + "_MakeOfCar").val() == "") {
                $("#" + i + "_MakeOfCar_em").show();
                $("#" + i + "_MakeOfCar_em").addClass('errorMessage');
                $("#" + i + "_MakeOfCar_em").text("Please Enter Make / Model of the Car");
                return false;
            } else {
                $("#" + i + "_MakeOfCar_em").hide();
                
            }

            if (($("#" + i + "_ExteriorColor").val() != "") && (!$("#" + i + "_ExteriorColor").val().match(/^[a-zA-Z]+$/))) {
                $("#" + i + "_ExteriorColor_em").show();
                $("#" + i + "_ExteriorColor_em").addClass('errorMessage');
                $("#" + i + "_ExteriorColor_em").text("Please Enter only alphabets ");
                return false;
            } else {
                $("#" + i + "_ExteriorColor_em").hide();
                
            }
            //address line1 start
            if ( ($("#11_Address1").val() == "") ) {
                $("#11_Address1_em").show();
                $("#11_Address1_em").addClass('errorMessage');
                $("#11_Address1_em").text("Please Enter Address Line1 ");
                return false;
            } else {
                $("#11_Address1_em").hide();
            }
            //address line1 end
            //phone validation start
            if ( ($("#11_AlternatePhone").val()!='') && (!$("#11_AlternatePhone").val().match(/[0-9]$/)) ) {
                $("#11_AlternatePhone_em").show();
                $("#11_AlternatePhone_em").addClass('errorMessage');
                $("#11_AlternatePhone_em").text("Please Enter only numbers ");
                return false;
            } else {
                $("#11_AlternatePhone_em").hide();
            }
            if ( ($("#11_AlternatePhone").val()!='') && ($("#11_AlternatePhone").val().length<='9') ) {
                $("#11_AlternatePhone_em").show();
                $("#11_AlternatePhone_em").addClass('errorMessage');
                $("#11_AlternatePhone_em").text("Alternate Phone too short (minimum is 10 numbers).");
                return false;
            } else {
                $("#11_AlternatePhone_em").hide();
            }
            //phone validation end
            //State validation start
            if ( ($("#11_State").val()=='') ) {
                $("#11_State_em").show();
                $("#11_State_em").addClass('errorMessage');
                $("#11_State_em").text("Please Select State ");
                return false;
            } else {
                $("#11_State_em").hide();
            }
            //State validation end
            //City validation start
            if ( (!$("#11_City").val().match(/[A-Za-z0-9]$/)) ) {
                $("#11_City_em").show();
                $("#11_City_em").addClass('errorMessage');
                $("#11_City_em").text("Please Enter City ");
                return false;
            } else {
                $("#11_City_em").hide();
            }
           
            //City validation end
            //Pin code validation start
            if ( ($("#11_PinCode").val()=='') ) {
                $("#11_PinCode_em").show();
                $("#11_PinCode_em").addClass('errorMessage');
                $("#11_PinCode_em").text("Please Enter Pin Code ");
                return false;
            } else {
                $("#11_PinCode_em").hide();
            }
            if ( (!$("#11_PinCode").val().match(/^[0-9]+$/)) ) {
                
                $("#11_PinCode_em").show();
                $("#11_PinCode_em").addClass('errorMessage');
                $("#11_PinCode_em").text("Please Enter only numbers ");
                return false;
            } else {
                $("#11_PinCode_em").hide();
            }
            if ( ($("#11_PinCode").val().length<='5') ) {
                $("#11_PinCode_em").show();
                $("#11_PinCode_em").addClass('errorMessage');
                $("#11_PinCode_em").text("Pin Code too short (minimum is 6 numbers).");
                return false;
            } else {
                $("#11_PinCode_em").hide();
            }
            
        
              /*if (makeofcar == "") {
                    makeofcar = $("#" + i + "_MakeOfCar").val()+",";
                } else if (makeofcar != "") {
                    makeofcar = makeofcar + $("#" + i + "_MakeOfCar").val();
                }*/
                makeofcar = makeofcar + $("#" + i + "_MakeOfCar").val()+",";
                $('#CarWashForm_MakeOfCar').val(makeofcar); 
                
              /*if (color == "") {
                    color = $("#" + i + "_ExteriorColor").val()+",";
                } else if (color != "") {
                    color = color  + $("#" + i + "_ExteriorColor").val();
                }*/
                color = color  + $("#" + i + "_ExteriorColor").val()+",";
                $('#CarWashForm_ExteriorColor').val(color); 
              
               /*if (address1 == "") {
                        
                    address1 = $("#11_Address1").val()+",";
                    
                } else if (address1 != "") {
                  address1 = address1 + $("#11_Address1").val();
                }*/
                address1 = address1 + $("#11_Address1").val()+",";
                $('#CarWashForm_Address1').val(address1);

               /*if (address2 == "") {
                    address2 = $("#11_Address2").val()+",";
                } else if (address2 != "") {
                    address2 = address2 + $("#11_Address2").val();
                }*/
                address2 = address2 + $("#11_Address2").val()+",";
                $('#CarWashForm_Address2').val(address2);
               
                /*if (alternate_phone == "") {
                    alternate_phone = $("#11_AlternatePhone").val()+",";
                } else if (alternate_phone != "") {
                    alternate_phone = alternate_phone + $("#11_AlternatePhone").val();
                }*/
                alternate_phone = alternate_phone + $("#11_AlternatePhone").val()+",";
                $('#CarWashForm_AlternatePhone').val(alternate_phone);
                
                /*if (state == "") {
                    state = $("#11_State").val()+",";
                } else if (state != "") {
                    state = state  + $("#11_State").val();
                }*/
                state = state  + $("#11_State").val()+",";
                $('#CarWashForm_State').val(state);
                
                /*if (city == "") {
                    city = $("#11_City").val()+ ",";
                } else if (city != "") {
                    city = city  + $("#11_City").val();
                }*/
                city = city  + $("#11_City").val()+",";
                $('#CarWashForm_City').val(city);
                
                /*if (pin_code == "") {
                    pin_code = $("#11_PinCode").val()+",";
                } else if (pin_code != "") {
                    pin_code = pin_code  + $("#11_PinCode").val();
                }*/
                pin_code = pin_code  + $("#11_PinCode").val()+",";
                $('#CarWashForm_PinCode').val(pin_code);
        }
        
        
        }
         /*if ( ($("#11_Address1").val() == "") ) {
                $("#11_Address1_em").show();
                $("#11_Address1_em").addClass('errorMessage');
                $("#11_Address1_em").text("Please Enter oooAddress Line1 ");
                return false;
            } else {
                $("#11_Address1_em").hide();
            }*/
        var type = '';
        if ($('#CarWashCleaningSubmit').val() == 'Submit') {
            type = 'submit';
        }
        if ($('#CarWashCleaningSubmit').val() == 'Next') {
            type = 'next';
        }
        
        var queryString = $('#carwash-form').serialize();
        queryString += '&Type=' + type+'&DL='+DL;
        ajaxRequest('/user/carwash', queryString, addCarWashCleaningServicehandler);
    }
   

    function addCarWashCleaningServicehandler(data) {
        //scrollPleaseWaitClose('serviceSpinLoader');
        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            if (globalspace.StewardCleaning == 0) {
                $('#CarWashCleaningSubmit').val('Submit');
            }
        }
    }
    /*function buttonCarWashCleaningPrevious() {
        var queryString = $('#carwash-form').serialize();
        //var queryString = '';
        var type='previous';
        queryString += '&Type=' + type;
        ajaxRequest('/user/carwash', queryString, previousHouseCleaningServicehandler);
    }
    
    function previousHouseCleaningServicehandler(data) {
        //scrollPleaseWaitClose('serviceSpinLoader');

        if (data.status == 'success') {
            
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);

        }
    }*/
    function addPricehandler(data) {
        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);
            
        } else {
            var error = [];
            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }

            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $("#" + key).parent().addClass('error');
                }

            });
        }
    }

    //stewards code start---
    function onChangeProduto(value) {
        if (value == 7) {
            $("#otherDiv").show();
        } else {
            $("#otherDiv").hide();
        }
    }
    function onChangeTime() {
        
        var StartTimes = $("#StewardCleaningForm_StartTime").val();
        var EndTimes = $("#StewardCleaningForm_EndTime").val();
        if ((StartTimes != '') && (EndTimes != '')){
        var first=StartTimes.split(" ");
        var STimefirst=first[1].split(":");
        var SDate=first[0].split("-");
        var last=EndTimes.split(" ");
        var eTimeLast=last[1].split(":");
        var EDate=last[0].split("-");
        var sDateFinal=SDate[2]+"/"+SDate[1]+"/"+SDate[0];
        var eDateFinal=EDate[2]+"/"+EDate[1]+"/"+EDate[0];
        var sdate=new Date(sDateFinal);
        var edate=new Date(eDateFinal);
        var scmp=sdate.getTime();
        var ecmp=edate.getTime();
        var f=new Date(SDate[2], SDate[1]-1, SDate[0], STimefirst[0], STimefirst[1], 0, 0);
        var e=new Date(EDate[2], EDate[1]-1, EDate[0], eTimeLast[0], eTimeLast[1], 0, 0);
        if(scmp > ecmp)
        {
            $("#StewardCleaningForm_EndTime").val(StartTimes); 
            $("#StewardCleaningForm_DurationHours").val("1");
        }
        else
        {
            var thrs=Math.abs(e - f) / 36e5;
            var thrs1=Math.round(thrs);
            $("#StewardCleaningForm_DurationHours").val(thrs1);
        }
        if($("#StewardCleaningForm_DurationHours").val()==0)
            $("#StewardCleaningForm_DurationHours").val("1");
    }

//        if ((StartTimes != '') && (EndTimes != '')) {
//            if(StartTimes>EndTimes)
//            {
//                $("#StewardCleaningForm_EndTime").val(StartTimes); 
//                $("#StewardCleaningForm_DurationHours").val("1");
//            }
//        }
//        if ((StartTimes != '') && (EndTimes != '')) {
//            
//            var totalHours1 = '';
//            var stDateres1 = StartTimes.split(" ");
//            var enDateres1 = EndTimes.split(" ");
//
//            var sTime = stDateres1[0].split("-");
//            var stDateres = sTime[2]+"/"+sTime[1]+"/"+sTime[0];
//            var eTime = enDateres1[0].split("-");
//            var enDateres = eTime[2]+"/"+eTime[1]+"/"+eTime[0];
//            var stDate1 = new Date(stDateres);
//            var enDate1 = new Date(enDateres);
//             
//            var compDate = stDate1 - enDate1;
//
//            var startDateValuecmp = stDate1.getTime();
//            var endDateValuecmp = enDate1.getTime();
//            if (compDate == 0) {
//                           
//                var stTimeres = stDateres1[1].split(":");
//                var enTimeres = enDateres1[1].split(":");
//                if (Math.round(stTimeres[0]) < Math.round(enTimeres[0])) {
//
//                    totalHours1 = Math.round(enTimeres[0]) - Math.round(stTimeres[0]);
//                    $("#StewardCleaningForm_DurationHours").val(totalHours1);
//
//                }
//                else
//                {
//                    $("#StewardCleaningForm_DurationHours").val("1");
//                }
//            }
//            if (startDateValuecmp < endDateValuecmp) {
//                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
//                var STime = stDateres.replace(/\//g, ",");
//                var ETime = enDateres.replace(/\//g, ",");
//                var firstDate = new Date(STime);
//                var secondDate = new Date(ETime);
//
//                var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
//                var stTimeres = stDateres1[1].split(":");
//                var enTimeres = enDateres1[1].split(":");
//                var a = new Date(sTime[2], sTime[1]-1, sTime[0], stTimeres[0], stTimeres[1], 0, 0); // Now
//                var b = new Date(eTime[2], eTime[1]-1, eTime[0], enTimeres[0], enTimeres[1], 0, 0);
//                var seconds = Math.round((b-a)/1000);
//                var mm = Math.round(seconds/60);
//                var hr = Math.round(mm/60);
//                var hr1=Math.abs(b - a) / 36e5;
//                $("#StewardCleaningForm_DurationHours").val(hr1);
//            }
//
//        }
    }
    var noOfStewards;

function onTotalStewards(obj) {
       
        if(obj.value<15)
        {
            $("#StewardCleaningForm_totalStewards").val("1");
            noOfStewards=1;
        }
        else
        {
            var stewards=Math.round(obj.value / 15);
            $("#StewardCleaningForm_totalStewards").val(stewards);
            noOfStewards=stewards;
        }
    }
    function submitStewardsCleaning() {
        noOfStewards=Math.round(($('#StewardCleaningForm_AttendPeople').val())/15);
        var queryString = $('#steward-form').serialize();
        var totalHours = '';
        var stDate = $('#StewardCleaningForm_StartTime').val();
        var enDate = $('#StewardCleaningForm_EndTime').val();
            var stDateres1 = stDate.split(" ");
            var enDateres1 = enDate.split(" ");
           var sTime = stDateres1[0].split("-");
            var stDateres = sTime[2]+"/"+sTime[1]+"/"+sTime[0];
            var eTime = enDateres1[0].split("-");
            var enDateres = eTime[2]+"/"+eTime[1]+"/"+eTime[0];
            var stDate1 = new Date(stDateres);
            var enDate1 = new Date(enDateres);

            var compDate = stDate1 - enDate1;
            
            var startDateValuecmp = stDate1.getTime();
            var endDateValuecmp = enDate1.getTime();

        if ($('#StewardCleaningForm_EventType').val() == '') {
            $("#StewardCleaningForm_EventType_em_").show();
            $("#StewardCleaningForm_EventType_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EventType_em_").text("Please Select Event Type");
            return false;
        }
        if (($('#StewardCleaningForm_EventType').val() == '7') && (($('#StewardCleaningForm_EventName').val() == ''))) {
            $("#StewardCleaningForm_EventType_em_").hide();
            $("#StewardCleaningForm_EventName_em_").show();
            $("#StewardCleaningForm_EventName_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EventName_em_").text("Please Enter Event Name");
            return false;
        }
        if ( ($('#StewardCleaningForm_EventType').val() == '7') && (!$("#StewardCleaningForm_EventName").val().match(/[A-Za-z]$/)) ) {
                $("#StewardCleaningForm_EventName_em_").show();
                $("#StewardCleaningForm_EventName_em_").addClass('errorMessage');
                $("#StewardCleaningForm_EventName_em_").text("Please Enter only alphabets ");
                return false;
            }

        if (isNaN($('#StewardCleaningForm_AttendPeople').val()) || ($('#StewardCleaningForm_AttendPeople').val() == '')) {
            $("#StewardCleaningForm_AttendPeople_em_").show();
            $("#StewardCleaningForm_AttendPeople_em_").addClass('errorMessage');
            $("#StewardCleaningForm_AttendPeople_em_").text("Please Enter Attend People");
            return false;
        }

        if (($('#StewardCleaningForm_AttendPeople').val() == '0') || ($('#StewardCleaningForm_AttendPeople').val() == '00')) {
            $("#StewardCleaningForm_AttendPeople_em_").show();
            $("#StewardCleaningForm_AttendPeople_em_").addClass('errorMessage');
            $("#StewardCleaningForm_AttendPeople_em_").text("You have entered '0' please enter the people attending the event");
            return false;
        }
        

        if ($('#StewardCleaningForm_StartTime').val() == '') {
            $("#StewardCleaningForm_EventType_em_").hide();
            $("#StewardCleaningForm_EventName_em_").hide();
            $("#StewardCleaningForm_StartTime_em_").show();
            $("#StewardCleaningForm_StartTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_StartTime_em_").text("Please Select Start Time");
            return false;
        }
        if ($('#StewardCleaningForm_EndTime').val() == '') {
            $("#StewardCleaningForm_StartTime_em_").hide();
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("Please Select End Time");
            return false;
        }
        if (compDate == 0) {

            var stTimeres = stDateres1[1].split(":");
            var enTimeres = enDateres1[1].split(":");
            if (Math.round(stTimeres[0]) > Math.round(enTimeres[0])) {
                $("#StewardCleaningForm_EndTime_em_").show();
                $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
                $("#StewardCleaningForm_EndTime_em_").text("End Time cannot be less than Start Time");
                return false;
            }
        }
        if($("#StewardCleaningForm_totalStewards").val()<noOfStewards)
        {
            $("#StewardCleaningForm_totalStewards_em_").show();
            $("#StewardCleaningForm_totalStewards_em_").addClass('errorMessage');
            $("#StewardCleaningForm_totalStewards_em_").text("Recommended # of Stewards should not be less than "+noOfStewards);
            return false;
        }
        if(isNaN($("#StewardCleaningForm_totalStewards").val()))
        {
            $("#StewardCleaningForm_totalStewards_em_").show();
            $("#StewardCleaningForm_totalStewards_em_").addClass('errorMessage');
            $("#StewardCleaningForm_totalStewards_em_").text("Recommended # of Stewards should be Number ");
            return false;
        }
        if (startDateValuecmp > endDateValuecmp) {
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("End Date cannot be less than Start Date");
            return false;
        }
        if ($('#StewardCleaningForm_Address1').val()=='') {
            $("#StewardCleaningForm_EndTime_em_").hide();
            $("#StewardCleaningForm_Address1_em_").show();
            $("#StewardCleaningForm_Address1_em_").addClass('errorMessage');
            $("#StewardCleaningForm_Address1_em_").text("Please Enter Address Line1");
            return false;
        }
        if ( ($("#StewardCleaningForm_AlternatePhone").val() != "") && (!$("#StewardCleaningForm_AlternatePhone").val().match(/^[0-9]+$/)) ) {
                $("#StewardCleaningForm_Address1_em_").hide(); 
                $("#StewardCleaningForm_AlternatePhone_em_").show();
                $("#StewardCleaningForm_AlternatePhone_em_").addClass('errorMessage');
                $("#StewardCleaningForm_AlternatePhone_em_").text("Please Enter only numbers ");
                return false;
            }
            if ( ($("#StewardCleaningForm_AlternatePhone").val() != "") && ($("#StewardCleaningForm_AlternatePhone").val().length<='9') ) {
                $("#StewardCleaningForm_AlternatePhone_em").show();
                $("#StewardCleaningForm_AlternatePhone").addClass('errorMessage');
                $("#StewardCleaningForm_AlternatePhone").text("Alternate Phone too short (minimum is 10 numbers).");
                return false;
            }
        //State validation start
            if ( ($("#StewardCleaningForm_State").val()=='') ) {
                $("#StewardCleaningForm_State_em_").show();
                $("#StewardCleaningForm_State_em_").addClass('errorMessage');
                $("#StewardCleaningForm_State_em_").text("Please Select State ");
                return false;
            } 
            //State validation end
            //City validation start
            
            if ( (!$("#StewardCleaningForm_City").val().match(/[A-Za-z0-9]$/)) ) {
                $("#StewardCleaningForm_Address1_em_").hide(); 
                $("#StewardCleaningForm_City_em_").show();
                $("#StewardCleaningForm_City_em_").addClass('errorMessage');
                $("#StewardCleaningForm_City_em_").text("Please Enter City ");
                return false;
            } 
            //City validation end
            //Pin code validation start
            if ( ($("#StewardCleaningForm_PinCode").val()=='') ) {
                $("#StewardCleaningForm_PinCode_em_").show();
                $("#StewardCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#StewardCleaningForm_PinCode_em_").text("Please Enter Pin Code ");
                return false;
            } 
            if ( (!$("#StewardCleaningForm_PinCode").val().match(/^[0-9]+$/)) ) {
                
                $("#StewardCleaningForm_PinCode_em_").show();
                $("#StewardCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#StewardCleaningForm_PinCode_em_").text("Please Enter only numbers ");
                return false;
            } 
            if ( ($("#StewardCleaningForm_PinCode").val().length<='5') ) {
                $("#StewardCleaningForm_PinCode_em_").show();
                $("#StewardCleaningForm_PinCode_em_").addClass('errorMessage');
                $("#StewardCleaningForm_PinCode_em_").text("Pin Code too short (minimum is 6 numbers).");
                return false;
            }
        

         else {
             $("#StewardCleaningForm_PinCode_em_").hide();
            

            var type = '';
            if ($('#StewardsCleaningSubmit').val() == 'Submit') {
                type = 'submit';
            }
            if ($('#StewardsCleaningSubmit').val() == 'Next') {
                type = 'next';
            }
            var r='';
            if ( ($('#StewardCleaningForm_DifferentAddress').val()=='0') && ($('#StewardCleaningForm_ContactAddress').val()=='')) {
            var statusData = 'Do you want to Add this adress to Contact details?';
            r = confirm(statusData);
            }else{
                r= false;
            }
            if(r==true){
                queryString += '&Type=' + type+'&ContactInfo=Yes';
            }else{
                queryString += '&Type=' + type+'&ContactInfo=No';
            } 
            //queryString += '&Type=' + type;
            
            ajaxRequest('/user/stewards', queryString, addStewardCleaningServicehandler);
        }
    }



    function addStewardCleaningServicehandler(data) {
        scrollPleaseWaitClose('serviceSpinLoader');

        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);

        }
    }
     function submitServiceOrder(){
         $('#homeServiceWithOrderDiv').hide();
          $('#ServiceMainDiv2').show();
          scrollPleaseWait("mailSpinLoader","");
        var queryString = '';

            ajaxRequest('/user/serviceOrder',queryString, addOrderhandler);
           
            
     }
     function addOrderhandler(data) {scrollPleaseWaitClose('mailSpinLoader');
        if (data.status == 'success') {
            $('#homeServiceWithOrderDiv').hide();
            $('#ServiceMainDiv').hide();
            $('#ServiceMainDiv2').show();
            $('#ServiceMainDiv2').html(data.data);
            //var queryString = '';
            //ajaxRequest('/user/mailSendData', queryString, addMailSendhandler);
        } 
    }
    function addMailSendhandler(data) {
           if (data.status == 'success') {
           }
        }
    
    
    //Previous button purpose----------------------------
    function previousStewardsCleaning(){
        var queryString = $('#steward-form').serialize();
        type = 'Previous';
        queryString +='&Type='+type;
        ajaxRequest('/user/stewards', queryString, previousStewardsCleaningehandler);
    }
    
    function previousStewardsCleaningehandler(data) {
        

        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);

        }
    }
    
    
    function previousCarWashCleaning(){
        var queryString = $('#carwash-form').serialize();
        var DL = $("#CarWashForm_DifferentLocation").val();
        type = 'Previous';
        queryString += '&Type=' + type+'&DL='+DL;
        ajaxRequest('/user/carwash', queryString, previousCarWashCleaninghandler);
        
    }
    
    function previousCarWashCleaninghandler(data) {
        if (data.status == 'success') {
            globalspace.HouseCleaning = Number(data.HouseCleaning);
            globalspace.CarCleaning = Number(data.CarCleaning);
            globalspace.StewardCleaning = Number(data.StewardCleaning);
            $('#homeServicesMainDiv').hide();
            $('#ServiceMainDiv').show();
            $('#ServiceMainDiv').html(data.data);

        }
    }
</script>