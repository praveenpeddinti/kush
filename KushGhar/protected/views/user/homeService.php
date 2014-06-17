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
                                <li  class="active"><a href="homeService"> <i class="fa fa-user"></i> Service Details</a></li>
                                <li><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
                                    <div class="<?php echo $statusClassForPayment; ?>"> </div>
                                </li>
                                <li><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a>
                                    <div class=<?php echo '"' . $statusClassForBasic . '"' ?>></div>
                                </li>
                                <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
                                    <div class="<?php echo $statusClassForContact; ?>"> </div>
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
                <div id="ServiceMainDiv2" class="services" style="display: none"></div>
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
        if ($('#HouseCleaningForm_ServiceStartTime').val() == '') {
            $("#HouseCleaningForm_SquareFeets_em_").hide();
            $("#HouseCleaningForm_ServiceStartTime_em_").show();
            $("#HouseCleaningForm_ServiceStartTime_em_").addClass('errorMessage');
            $("#HouseCleaningForm_ServiceStartTime_em_").text("Please Select When do you want service");
            return false;
        }
        if (($('#HouseCleaningForm_LivingRooms').val() == '0') && ($('#HouseCleaningForm_BedRooms').val() == '0') && ($('#HouseCleaningForm_Kitchens').val() == '0') && ($('#HouseCleaningForm_BathRooms').val() == '0')) {
            $("#HouseCleaningForm_ServiceStartTime_em_").hide();
            $("#HouseCleaningForm_LivingRooms_em_").show();
            $("#HouseCleaningForm_LivingRooms_em_").addClass('errorMessage');
            $("#HouseCleaningForm_LivingRooms_em_").text("Please Select Any One");
            return false;
        }
        if (($('#HouseCleaningForm_NumberOfTimesServices').val() == '')) {
            $("#HouseCleaningForm_LivingRooms_em_").hide();
            $("#HouseCleaningForm_NumberOfTimesServices_em_").show();
            $("#HouseCleaningForm_NumberOfTimesServices_em_").addClass('errorMessage');
            $("#HouseCleaningForm_NumberOfTimesServices_em_").text("Please Select Services in Number Of Times");
            return false;
        } else {
            $("#HouseCleaningForm_LivingRooms_em_").hide();
            $("#HouseCleaningForm_NumberOfTimesServices_em_").hide();
            var type = '';
            if ($('#HouseCleaningSubmit').val() == 'Submit') {//alert($('#HouseCleaningSubmit').val());
                type = 'submit';
            }
            if ($('#HouseCleaningSubmit').val() == 'Next') {
                type = 'next';
            }
            queryString += '&Type=' + type;
            //alert(queryString);
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
        var interiorCleaning = "";
        var shampooSeats = "";
        var shampooMats = "";
        var differentAddress = "";
        var address1 = "";
        var address2 = "";
        var alternate_phone = "";
        var state = "";
        var city = "";
        var pin_code = "";

        var dd='';
        var DL = $("#CarWashForm_DifferentLocation").val();
        //alert("===TC==="+$("#CarWashForm_TotalCars").val()+"==DL==="+$("#CarWashForm_DifferentLocation").val());
           // alert("DLasvar====="+DL);
        if ($("#CarWashForm_ServiceStartTime").val() == "") {
                $("#CarWashForm_ServiceStartTime_em_").show();
                $("#CarWashForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#CarWashForm_ServiceStartTime_em_").text("Please Select When do you want service");
                return false;
            }else{
              $("#CarWashForm_ServiceStartTime_em_").hide();  
            }
            dumpcars=$('#CarWashForm_TotalCars').val();
        //if($("#CarWashForm_DifferentLocation").val()=='0'){ dumpcars='1';}else{dumpcars=$('#CarWashForm_TotalCars').val();};
        if($("#CarWashForm_DifferentLocation").val()=='1'){//alert("1111111111111111111111111111");
        for (var i = 1; i <= dumpcars; i++) {
            //alert("================for loop====="+dumpcars+"======="+i);
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
             
             
            
            if (interiorCleaning == "") {
                interiorCleaning = $("#" + i + "_InteriorCleaning").val();
            } else if (interiorCleaning != "") {
                interiorCleaning = interiorCleaning + "," + $("#" + i + "_InteriorCleaning").val();
            }
            
            $('#CarWashForm_InteriorCleaning').val(interiorCleaning);
            if (shampooSeats == "") {
                shampooSeats = $("#" + i + "_ShampooSeats").val();
            } else if (shampooSeats != "") {
                shampooSeats = shampooSeats + "," + $("#" + i + "_ShampooSeats").val();

            }
            $('#CarWashForm_ShampooSeats').val(shampooSeats);
            /*if (shampooMats == "") {
                shampooMats = $("#" + i + "_WaxCar").val();
            } else if (shampooMats != "") {
                shampooMats = shampooMats + "," + $("#" + i + "_WaxCar").val();

            }
            $('#CarWashForm_WaxCar').val(shampooMats);*/
            
            //alert("different add===");
                
                //address line1 start
                if ( ($("#" + i + "_Address1").val() == "") ) {
                //alert("====ec==");
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
                //alert("====phone==");
                $("#" + i + "_AlternatePhone_em").show();
                $("#" + i + "_AlternatePhone_em").addClass('errorMessage');
                $("#" + i + "_AlternatePhone_em").text("Please Enter only numbers ");
                //alert("=phone=" + i);
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
                $("#" + i + "_PinCode_em").text("Please Pin Code ");
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
            //Pin Code validation end
        
              if (makeofcar == "") {
                    makeofcar = $("#" + i + "_MakeOfCar").val();
                } else if (makeofcar != "") {
                    makeofcar = makeofcar+"," + $("#" + i + "_MakeOfCar").val();
                }
                $('#CarWashForm_MakeOfCar').val(makeofcar); 
                
                if (color == "") {
                    color = $("#" + i + "_ExteriorColor").val()+",";
                } else if (color != "") {
                    color =  color + $("#" + i + "_ExteriorColor").val();
                }
                //alert("ma===="+color);
                $('#CarWashForm_ExteriorColor').val(color); 
              if (differentAddress == "") {
                    differentAddress = $("#" + i + "_DifferentAddress").val();
                } else if (differentAddress != "") {
                    differentAddress = differentAddress + "," + $("#" + i + "_DifferentAddress").val();
                }
                $('#CarWashForm_DifferentAddress').val(differentAddress);
               if (address1 == "") {
                        
                    address1 = $("#" + i + "_Address1").val()+",";
                    
                } else if (address1 != "") {
                  address1 = address1 + $("#" + i + "_Address1").val();
                }
                
                $('#CarWashForm_Address1').val(address1);

               if (address2 == "") {
                    address2 = $("#" + i + "_Address2").val()+",";
                } else if (address2 != "") {
                    address2 = address2 + $("#" + i + "_Address2").val();
                }
                $('#CarWashForm_Address2').val(address2);
                
                if (alternate_phone == "") {
                    alternate_phone = $("#" + i + "_AlternatePhone").val()+",";
                } else if (alternate_phone != "") {
                    alternate_phone = alternate_phone + $("#" + i + "_AlternatePhone").val();
                }
                $('#CarWashForm_AlternatePhone').val(alternate_phone);
                
                if (state == "") {
                    state = $("#" + i + "_State").val()+",";
                } else if (state != "") {
                    state = state  + $("#" + i + "_State").val();
                }
                $('#CarWashForm_State').val(state);
                
                if (city == "") {
                    city = $("#" + i + "_City").val()+ ",";
                } else if (city != "") {
                    city = city  + $("#" + i + "_City").val();
                }
                $('#CarWashForm_City').val(city);
                
                if (pin_code == "") {
                    pin_code = $("#" + i + "_PinCode").val()+",";
                } else if (pin_code != "") {
                    pin_code = pin_code  + $("#" + i + "_PinCode").val();
                }
                $('#CarWashForm_PinCode').val(pin_code);
        }
        
        
        }
        
        
        if($("#CarWashForm_DifferentLocation").val()=='0'){//alert("000000000000000000000000000000");
        for (var i = 1; i <= dumpcars; i++) {
            //alert("================for loop====="+dumpcars+"======="+i);
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
             
             
            
            if (interiorCleaning == "") {
                interiorCleaning = $("#" + i + "_InteriorCleaning").val();
            } else if (interiorCleaning != "") {
                interiorCleaning = interiorCleaning + "," + $("#" + i + "_InteriorCleaning").val();
            }
            
            $('#CarWashForm_InteriorCleaning').val(interiorCleaning);
            if (shampooSeats == "") {
                shampooSeats = $("#" + i + "_ShampooSeats").val();
            } else if (shampooSeats != "") {
                shampooSeats = shampooSeats + "," + $("#" + i + "_ShampooSeats").val();

            }
            $('#CarWashForm_ShampooSeats').val(shampooSeats);
            /*if (shampooMats == "") {
                shampooMats = $("#" + i + "_WaxCar").val();
            } else if (shampooMats != "") {
                shampooMats = shampooMats + "," + $("#" + i + "_WaxCar").val();

            }
            $('#CarWashForm_WaxCar').val(shampooMats);*/
            
            
                
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
            /*if ( ($("#11_AlternatePhone").val() != "") && (!$("11_AlternatePhone").val().match(/^[0-9]+$/)) ) {
                //alert("====phone==");
                $("#11_AlternatePhone_em").show();
                $("#11_AlternatePhone_em").addClass('errorMessage');
                $("#11_AlternatePhone_em").text("Please Enter only numbers ");
                //alert("=phone=" + i);
                return false;
            } else {
                $("#11_AlternatePhone_em").hide();
            }*/
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
                $("#11_PinCode_em").text("Please Pin Code ");
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
        
              if (makeofcar == "") {
                    makeofcar = $("#" + i + "_MakeOfCar").val()+",";
                } else if (makeofcar != "") {
                    makeofcar = makeofcar + $("#" + i + "_MakeOfCar").val();
                }
                $('#CarWashForm_MakeOfCar').val(makeofcar); 
                
              if (color == "") {
                    color = $("#" + i + "_ExteriorColor").val()+",";
                } else if (color != "") {
                    color = color  + $("#" + i + "_ExteriorColor").val();
                }
                $('#CarWashForm_ExteriorColor').val(color); 
              
               if (address1 == "") {
                        
                    address1 = $("#11_Address1").val()+",";
                    
                } else if (address1 != "") {
                  address1 = address1 + $("#11_Address1").val();
                }
                
                $('#CarWashForm_Address1').val(address1);

               if (address2 == "") {
                    address2 = $("#11_Address2").val()+",";
                } else if (address2 != "") {
                    address2 = address2 + $("#11_Address2").val();
                }
                $('#CarWashForm_Address2').val(address2);
                
                if (alternate_phone == "") {
                    alternate_phone = $("#11_AlternatePhone").val()+",";
                } else if (alternate_phone != "") {
                    alternate_phone = alternate_phone + $("#11_AlternatePhone").val();
                }
                $('#CarWashForm_AlternatePhone').val(alternate_phone);
                
                if (state == "") {
                    state = $("#11_State").val()+",";
                } else if (state != "") {
                    state = state  + $("#11_State").val();
                }
                $('#CarWashForm_State').val(state);
                
                if (city == "") {
                    city = $("#11_City").val()+ ",";
                } else if (city != "") {
                    city = city  + $("#11_City").val();
                }
                $('#CarWashForm_City').val(city);
                
                if (pin_code == "") {
                    pin_code = $("#11_PinCode").val()+",";
                } else if (pin_code != "") {
                    pin_code = pin_code  + $("#11_PinCode").val();
                }
                $('#CarWashForm_PinCode').val(pin_code);
        }
        
        
        }//alert("maafterfor===="+pin_code);
         /*if ( ($("#11_Address1").val() == "") ) {alert("differ=1===");
                alert("====ec=="+($("#11_Address1").val()));
                $("#11_Address1_em").show();
                $("#11_Address1_em").addClass('errorMessage');
                $("#11_Address1_em").text("Please Enter oooAddress Line1 ");
                return false;
            } else {
                $("#11_Address1_em").hide();
            }*/
        //alert("===color==="+color);
       //alert("===interior==="+interiorCleaning);
        var type = '';
        if ($('#CarWashCleaningSubmit').val() == 'Submit') {
            type = 'submit';
        }
        if ($('#CarWashCleaningSubmit').val() == 'Next') {
            type = 'next';
        }
        var queryString = $('#carwash-form').serialize();
        queryString += '&Type=' + type+'&DL='+DL;
        //alert("car wash Form Details=="+queryString);
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
        alert("privous---"+queryString);
        ajaxRequest('/user/carwash', queryString, previousHouseCleaningServicehandler);
    }
    
    function previousHouseCleaningServicehandler(data) {alert("previous button hand==="+data.status());
        //scrollPleaseWaitClose('serviceSpinLoader');

        if (data.status == 'success') {
            //alert("Added successfully");
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
        if ((StartTimes != '') && (EndTimes != '')) {
            var totalHours1 = '';
            var stDateres1 = StartTimes.split(" ");
            var enDateres1 = EndTimes.split(" ");
            
            var sTime = stDateres1[0].split("-");
            var stDateres = sTime[2]+"-"+sTime[1]+"-"+sTime[0];
            var eTime = enDateres1[0].split("-");
            var enDateres = eTime[2]+"-"+eTime[1]+"-"+eTime[0];
            var stDate1 = new Date(stDateres);
            var enDate1 = new Date(enDateres);

            var compDate = stDate1 - enDate1;

            var startDateValuecmp = stDate1.getTime();
            var endDateValuecmp = enDate1.getTime();
            if (compDate == 0) {

                var stTimeres = stDateres1[1].split(":");
                var enTimeres = enDateres1[1].split(":");
                if (Math.round(stTimeres[0]) < Math.round(enTimeres[0])) {

                    totalHours1 = Math.round(enTimeres[0]) - Math.round(stTimeres[0]);
                    $("#StewardCleaningForm_DurationHours").val(totalHours1);

                }
            }
            if (startDateValuecmp < endDateValuecmp) {
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var STime = stDateres.replace(/-/g, ",");
                var ETime = enDateres.replace(/-/g, ",");
                var firstDate = new Date(STime);
                var secondDate = new Date(ETime);

                var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
                 var stTimeres = stDateres[1].split(":");
                var enTimeres = enDateres[1].split(":");
                totalHours1 = ((diffDays * 24) + (Math.abs((Math.round(enTimeres[0]) - Math.round(stTimeres[0])))));
                $("#StewardCleaningForm_DurationHours").val(totalHours1);
                
            }

        }
    }
    function onTotalStewards(obj) {
       
        $("#StewardCleaningForm_totalStewards").val(Math.round(obj.value / 15));

    }
    function submitStewardsCleaning() {
        var queryString = $('#steward-form').serialize();
        var totalHours = '';
        var stDate = $('#StewardCleaningForm_StartTime').val();
        var enDate = $('#StewardCleaningForm_EndTime').val();
        /*var stDateres = stDate.split(" ");
        var enDateres = enDate.split(" ");
        var stDate1 = new Date(stDateres[0]);
        var enDate1 = new Date(enDateres[0]);
        var compDate = stDate1 - enDate1;
        var startDateValuecmp = stDate1.getTime();
        var endDateValuecmp = enDate1.getTime();*/
            var stDateres1 = stDate.split(" ");
            var enDateres1 = enDate.split(" ");
           var sTime = stDateres1[0].split("-");
            var stDateres = sTime[2]+"-"+sTime[1]+"-"+sTime[0];
            var eTime = enDateres1[0].split("-");
            var enDateres = eTime[2]+"-"+eTime[1]+"-"+eTime[0];
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
            $("#StewardCleaningForm_EndTime_em_").text("Please Select Start Time");
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
        if (startDateValuecmp > endDateValuecmp) {
            $("#StewardCleaningForm_EndTime_em_").show();
            $("#StewardCleaningForm_EndTime_em_").addClass('errorMessage');
            $("#StewardCleaningForm_EndTime_em_").text("End Date cannot be less than Start Date");
            return false;
        }

        if (($('#StewardCleaningForm_AttendPeople').val() == '0') || ($('#StewardCleaningForm_AttendPeople').val() == '00')) {
            $("#StewardCleaningForm_AttendPeople_em_").show();
            $("#StewardCleaningForm_AttendPeople_em_").addClass('errorMessage');
            $("#StewardCleaningForm_AttendPeople_em_").text("Please Enter Numbers only");
            return false;
        }
        if (isNaN($('#StewardCleaningForm_AttendPeople').val()) || ($('#StewardCleaningForm_AttendPeople').val() == '')) {
            $("#StewardCleaningForm_AttendPeople_em_").show();
            $("#StewardCleaningForm_AttendPeople_em_").addClass('errorMessage');
            $("#StewardCleaningForm_AttendPeople_em_").text("Please Enter Numbers only");
            return false;
        }

         else {

            $("#StewardCleaningForm_EndTime_em_").show();

            var type = '';
            if ($('#StewardsCleaningSubmit').val() == 'Submit') {//alert($('#HouseCleaningSubmit').val());
                type = 'submit';
            }
            if ($('#StewardsCleaningSubmit').val() == 'Next') {
                type = 'next';
            }
            queryString += '&Type=' + type;
            //alert("StewardsCleaning Form Details=="+queryString);

            ajaxRequest('/user/stewards', queryString, addStewardCleaningServicehandler);
        }
    }



    function addStewardCleaningServicehandler(data) {
        scrollPleaseWaitClose('serviceSpinLoader');

        if (data.status == 'success') {
            //alert("Added successfully");
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
        var queryString = '';

            ajaxRequest('/user/serviceOrder',queryString, addOrderhandler);
     }
     function addOrderhandler(data) {
        if (data.status == 'success') {
            alert("Added successfully");
            
            $('#homeServiceWithOrderDiv').hide();
            $('#ServiceMainDiv').hide();
            $('#ServiceMainDiv2').show();
            $('#ServiceMainDiv2').html(data.data);
            
        } 
    }
</script>