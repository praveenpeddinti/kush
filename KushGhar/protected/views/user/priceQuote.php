<?php
    $totalRoomsPrice = 0;
    $Htotal = 0;
    $Ctotal = 0;
    $Stotal = 0;
    if ($PriceFlag == '0') { ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="panel-group" id="accordion">
                <?php
                    if ($HouseCleaning == 1) {
                        if (($getServiceDetails['total_livingRooms'] == 1) && ($getServiceDetails['total_bedRooms'] == 1) && ($getServiceDetails['total_bathRooms'] == 1) && ($getServiceDetails['total_kitchens'] == 1)) {
                            $priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
                            $priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                            //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                            $totalRoomsPrice = $priceRoom1 + $priceRoom2;
                        } else {
                            $LR = '';
                            $BedR = '';
                            $BathR = '';
                            $KR = '';
                            if ($getServiceDetails['total_livingRooms'] > 1) {
                                $LR = (($getServiceDetails['total_livingRooms'] - 1) * 125);
                            }
                            if ($getServiceDetails['total_bedRooms'] > 1) {
                                $BedR = (($getServiceDetails['total_bedRooms'] - 1) * 125);
                            }
                            if ($getServiceDetails['total_bathRooms'] > 1) {
                                $BathR = (($getServiceDetails['total_bathRooms'] - 1) * 250);
                            }
                            if ($getServiceDetails['total_kitchens'] > 1) {
                                $KR = (($getServiceDetails['total_kitchens'] - 1) * 250);
                            }

                            $priceRoom1 = $LR + $BedR;
                            $priceRoom2 = $BathR + $KR;
                            $totalRoomsPrice = $priceRoom1 + $priceRoom2 + 750;
                            //$totalRoomsPrice = 0 ;  
                        }
                        $priceAddServices = (($getServiceDetails['window_grills'] + $getServiceDetails['fridge_interior'] + $getServiceDetails['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                        $totalRoomsPrice+= $priceAddServices;?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title housecleaning_title2">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" style="display:block">
                                <span class="pull-left">House Cleaning Service</span>
                                <span class="serviceprice"> Rs. <?php echo $totalRoomsPrice; ?></span>
                                <div class="count"></div>           
                            </a>
                        </div>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body paddinground">
                            <table class="table price">
                                <?php if ($getServiceDetails['squarefeets'] != 0) { ?>
                                <tr>
                                    <td>Square Feet </td>
                                    <td><?php echo "<b>" . $getServiceDetails['squarefeets'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if (!empty($getServiceDetails['total_livingRooms'])) { ?>
                                <tr>
                                    <td>Total Living Room(s) </td>
                                    <td><?php echo "<b>" . $getServiceDetails['total_livingRooms'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if (!empty($getServiceDetails['total_bedRooms'])) { ?>
                                <tr>
                                    <td>Total Bedroom(s)</td>
                                    <td><?php echo "<b>" . $getServiceDetails['total_bedRooms'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if (!empty($getServiceDetails['total_kitchens'])) { ?>
                                <tr>
                                    <td>Total Kitchen(s)</td>
                                    <td><?php echo "<b>" . $getServiceDetails['total_kitchens'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if (!empty($getServiceDetails['total_bathRooms'])) { ?>
                                <tr>
                                    <td>Total Bathroom(s)</td>
                                    <td><?php echo "<b>" . $getServiceDetails['total_bathRooms'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                
                                <?php if( ($getServiceDetails['window_grills'] != 0) || ($getServiceDetails['fridge_interior'] != 0) || ($getServiceDetails['microwave_oven_interior'] != 0) || ($getServiceDetails['pooja_room_cleaning'] != 0) ){?>
                                <tr>
                                    <td valign='top'>Additional Services are</td>
                                    <td><?php if ($getServiceDetails['window_grills'] == 1) echo "Window grills cleaning</br>"; 
                                              if ($getServiceDetails['fridge_interior'] == 1) echo "Fridge interior cleaning</br>"; 
                                              if ($getServiceDetails['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning</br>"; 
                                              if ($getServiceDetails['pooja_room_cleaning'] == 1) echo "Pooja room cleaning";?>
                                    </td>
                                </tr><?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                    if ($CarCleaning == 1) {
                        $seatAmt = $totalSeats * 400;
                        $Ctotal = (count($getCarWashServiceDetails) * 500) + $seatAmt; ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title carwash_title2">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" style="display:block">
                                <span class="pull-left">Car Cleaning Service</span>
                                <span class="serviceprice"> Rs. <?php echo $Ctotal; ?></span>
                                <div class="count"></div>          
                            </a>
                        </div>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body paddinground">
                            <table class="table price">
                                <tr>
                                    <td>Total Cars</td>
                                    <td><?php echo "<b>" . count($getCarWashServiceDetails) . "</b>"; ?></td>
                                </tr>
                                <?php foreach ($getCarWashServiceDetails as $cw) { ?>
                                <tr>
                                    <td>Make / Model of the Car</td>
                                    <td><?php echo "<b>" . $cw['make_of_car'] . "</b>"; ?></td>
                                </tr>
                                <?php if ($cw['exterior_cleaning'] != 0) { ?>
                                <tr>
                                    <td>Exterior Color</td>
                                    <td><?php echo "<b>" . $cw['exterior_color'] . "</b>"; ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if ($StewardsCleaning == 1) {
                    $Stotal = ($getStewardsServiceDetails['service_hours'] * $getStewardsServiceDetails['no_of_stewards'] * 200);
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title stewards_title2">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" style="display:block">
                                <span class="pull-left">Stewards / Stewardesses Service</span>
                                <span class="serviceprice"> Rs. <?php echo $Stotal; ?></span>
                                <div class="count"></div>          
                            </a>
                        </div>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body paddinground">
                            <table class="table price">
                                <tr>
                                    <td>Event Name </td>
                                    <td><?php if ($getStewardsServiceDetails['event_type'] == 1) {
                                                $EventName = 'Formal Party';
                                              }
                                              if ($getStewardsServiceDetails['event_type'] == 2) {
                                                $EventName = 'Casual Party';
                                              }
                                              if ($getStewardsServiceDetails['event_type'] == 3) {
                                                $EventName = 'Birthday Party';
                                              }
                                              if ($getStewardsServiceDetails['event_type'] == 4) {
                                                $EventName = 'Anniversary';
                                             }
                                             if ($getStewardsServiceDetails['event_type'] == 5) {
                                                $EventName = 'Funeral';
                                             }
                                             if ($getStewardsServiceDetails['event_type'] == 6) {
                                                $EventName = 'Sporting Event';
                                             }
                                             if ($getStewardsServiceDetails['event_type'] == 7) {
                                                $EventName = $getStewardsServiceDetails['event_name'];
                                             }
                                            echo "<b>" . $EventName . "</b>";
                                            ?>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>People Attending</td>
                                        <td><?php echo "<b>" . $getStewardsServiceDetails['attend_people'] . "</b>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Event durations hours</td>
                                        <td><?php echo "<b>" . $getStewardsServiceDetails['service_hours'] . "</b>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Recommended # of Stewards</td>
                                        <td><?php echo "<b>" . $getStewardsServiceDetails['no_of_stewards'] . "</b>"; ?></td>
                                    </tr>
                                            <?php if (($getStewardsServiceDetails['appetizers'] == 1) || ($getStewardsServiceDetails['dinner'] == 1) || ($getStewardsServiceDetails['dessert'] == 1) || ($getStewardsServiceDetails['alcoholic'] == 1) || ($getStewardsServiceDetails['post_dinner'] == 1)) { ?>
                                        <tr>
                                            <td valign='top'>Services Required</td>
                                            <td>
                                                <?php if ($getStewardsServiceDetails['appetizers'] == 1) echo "Appetizers</br>"; ?>
                                                <?php if ($getStewardsServiceDetails['dinner'] == 1) echo "Dinner</br>"; ?>
            <?php if ($getStewardsServiceDetails['dessert'] == 1) echo "Dessert</br>"; ?>
                                        <?php if ($getStewardsServiceDetails['alcoholic'] == 1) echo "Beverage</br>"; ?>
                                        <?php if ($getStewardsServiceDetails['post_dinner'] == 1) echo "Coffee / Tea</br>"; ?>
                                            </td>
                                        </tr>
        <?php } ?>

                                </table>    
                            </div>
                        </div>
                    </div>
    <?php } ?>
                <div class="panel-heading">
                    <div class="panel-title servicetax_title2">
                        <a data-toggle="collapse" data-parent="#" href="#" class="collapsed" style="display:block">
                            <span class="pull-left">Service Tax</span>
                            <span class="serviceprice">Rs. 0</span>
                            <!--                                                                <div class="count"></div>-->
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row-fluid">
    <?php
    //$serviceTax = ((($totalRoomsPrice + $Ctotal + $Stotal) * 12.36) / 100); 
    $serviceTax = 0;
    ?>
        <div class="span6"><label>Total Price (Service Tax Included)</label><input type="text" value="<?php echo $totalRoomsPrice + $Ctotal + $Stotal + $serviceTax; ?>" id="price" readonly="true" /></div>
        <div class="span6">
            <div class="pull-right paddingT30">
                <input type="button" class="btn btn-primary" value="Place Order" onclick="submitServiceOrder();">
            </div>
        </div>
    </div>


<?php }else { ?>
    <div class="container">
        <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
        <section>
            <div class="container minHeight">
                <aside>
                    <div class="asideBG">
                        <div class="left_nav">
                            <ul class="main">
                                <li class="active" title="Account"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                                <li class="" title="Services"><a href="/user/homeservice"  ><span class="KGservices"> </span></a></li>
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
                                    <li><a href="homeService"> <i class="fa fa-wrench"></i> Services</a></li>
                                    <li class="active"><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                    <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
    <!--                                        <div class="<?php echo $statusClassForPayment; ?>"> </div>-->
                                    </li>
                                    <li><a href="basicinfo"> <i class="fa fa-file-text-o"></i> Basic Info</a>
    <!--                                        <div class=<?php echo '"' . $statusClassForBasic . '"' ?>></div>-->
                                    </li>
                                    <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
    <!--                                        <div class="<?php echo $statusClassForContact; ?>"> </div>-->
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
                    <div id="orderPlaceDiv" style="display:none">

                        <div class="row-fluid">
                            <div class="span12">
                                <h2 class="paddingL20">Place order</h2> <hr>
                            </div>
                        </div>
                    </div>               
                    <div id="priceQuoteDiv" class="row-fluid">
                        <div class="span12">
                            <h2 class="paddingL20">Price Quote </h2> <hr>
                            <div id="mailSpinLoader" ></div>
                            <div class="paddinground paddingTop0">

                                <div id="serviceSpinLoader"></div>

                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="panel-group" id="accordion">
                                            <?php
                                            if ($HouseCleaning == 1) {
                                                if (($getServiceDetails['total_livingRooms'] == 1) && ($getServiceDetails['total_bedRooms'] == 1) && ($getServiceDetails['total_bathRooms'] == 1) && ($getServiceDetails['total_kitchens'] == 1)) {
                                                    $priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
                                                    $priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                                    //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                                                    $totalRoomsPrice = $priceRoom1 + $priceRoom2;
                                                } else {
                                                    $LR = '';
                                                    $BedR = '';
                                                    $BathR = '';
                                                    $KR = '';
                                                    if ($getServiceDetails['total_livingRooms'] > 1) {
                                                        $LR = (($getServiceDetails['total_livingRooms'] - 1) * 125);
                                                    }
                                                    if ($getServiceDetails['total_bedRooms'] > 1) {
                                                        $BedR = (($getServiceDetails['total_bedRooms'] - 1) * 125);
                                                    }
                                                    if ($getServiceDetails['total_bathRooms'] > 1) {
                                                        $BathR = (($getServiceDetails['total_bathRooms'] - 1) * 250);
                                                    }
                                                    if ($getServiceDetails['total_kitchens'] > 1) {
                                                        $KR = (($getServiceDetails['total_kitchens'] - 1) * 250);
                                                    }

                                                    $priceRoom1 = $LR + $BedR;
                                                    $priceRoom2 = $BathR + $KR;
                                                    $totalRoomsPrice = $priceRoom1 + $priceRoom2 + 750;
                                                    //$totalRoomsPrice = 0 ;  
                                                }
                                                $priceAddServices = (($getServiceDetails['window_grills'] + $getServiceDetails['fridge_interior'] + $getServiceDetails['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                                //$serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;

                                                /* if($totalRoomsPrice < 750)
                                                  {
                                                  $totalRoomsPrice = 750;
                                                  } */
                                                $totalRoomsPrice+= $priceAddServices;
                                                ?>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="panel-title housecleaning_title2">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" style="display:block">
                                                                <span class="pull-left">House Cleaning Service</span>
                                                                <span class="serviceprice">Rs. <?php echo $totalRoomsPrice; ?></span>
                                                                <div class="count"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse">
                                                        <div class="panel-body paddinground">
                                                            <table class="table price">

                                                                <?php if ($getServiceDetails['squarefeets'] != 0) { ?>
                                                                    <tr>
                                                                        <td>Square Feets </td>
                                                                        <td><?php echo "<b>" . $getServiceDetails['squarefeets'] . "</b>"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php if (!empty($getServiceDetails['total_livingRooms'])) { ?>
                                                                    <tr>
                                                                        <td>Total Living Room(s) </td>
                                                                        <td><?php echo "<b>" . $getServiceDetails['total_livingRooms'] . "</b>"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php if (!empty($getServiceDetails['total_bedRooms'])) { ?>
                                                                    <tr>
                                                                        <td>Total Bedroom(s)</td>
                                                                        <td><?php echo "<b>" . $getServiceDetails['total_bedRooms'] . "</b>"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php if (!empty($getServiceDetails['total_kitchens'])) { ?>
                                                                    <tr>
                                                                        <td>Total Kitchen(s)</td>
                                                                        <td><?php echo "<b>" . $getServiceDetails['total_kitchens'] . "</b>"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php if (!empty($getServiceDetails['total_bathRooms'])) { ?>
                                                                    <tr>
                                                                        <td>Total Bathroom(s)</td>
                                                                        <td><?php echo "<b>" . $getServiceDetails['total_bathRooms'] . "</b>"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
        
                                                                <?php if( ($getServiceDetails['window_grills'] != 0) || ($getServiceDetails['fridge_interior'] != 0) || ($getServiceDetails['microwave_oven_interior'] != 0) || ($getServiceDetails['pooja_room_cleaning'] != 0) ){?>
                                <tr>
                                    <td valign='top'>Additional Services are</td>
                                    <td><?php if ($getServiceDetails['window_grills'] == 1) echo "Window grills cleaning</br>"; 
                                              if ($getServiceDetails['fridge_interior'] == 1) echo "Fridge interior cleaning</br>"; 
                                              if ($getServiceDetails['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning</br>"; 
                                              if ($getServiceDetails['pooja_room_cleaning'] == 1) echo "Pooja room cleaning";?>
                                        </td>
                                </tr><?php }?>


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
    <?php } ?>
    <?php
    if ($CarCleaning == 1) {
        $seatAmt = $totalSeats * 400;
        $Ctotal = (count($getCarWashServiceDetails) * 500) + $seatAmt;
        ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="panel-title carwash_title2">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" style="display:block">
                                                                <span class="pull-left">Car Cleaning Service</span>
                                                                <span class="serviceprice">Rs. <?php echo $Ctotal; ?></span>
                                                                <div class="count"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body paddinground">
                                                            <table class="table price">
                                                                <tr>
                                                                    <td>Total Cars</td>
                                                                    <td><?php echo "<b>" . count($getCarWashServiceDetails) . "</b>"; ?></td>
                                                                </tr>
        <?php foreach ($getCarWashServiceDetails as $cw) { ?>

                                                                    <tr>
                                                                        <td>Make / Model of the Car</td>
                                                                        <td><?php echo "<b>" . $cw['make_of_car'] . "</b>"; ?></td>
                                                                    </tr>
                                                                    <?php if ($cw['exterior_cleaning'] != 0) { ?>
                                                                        <tr>
                                                                            <td>Exterior Color</td>
                                                                            <td><?php echo "<b>" . $cw['exterior_color'] . "</b>"; ?></td>
                                                                        </tr>
                                                                    <?php } ?>


            <?php if ($cw['shampoo_seats'] != 0) { ?>
                                                                        <tr>
                                                                            <td>Shampoo Seats</td>
                                                                            <td><?php echo "<b>Yes</b>"; ?></td>
                                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
    <?php } ?>            
    <?php
    if ($StewardsCleaning == 1) {
        $Stotal = $getStewardsServiceDetails['service_hours'] * $getStewardsServiceDetails['no_of_stewards'] * 200;
        ?>          
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="panel-title stewards_title2">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" style="display:block">
                                                                <span class="pull-left">Stewards / Stewardesses Service</span>
                                                                <span class="serviceprice">Rs. <?php echo $Stotal; ?></span>
                                                                <div class="count"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                        <div class="panel-body paddinground">
                                                            <table class="table price">
                                                                <tr>
                                                                    <td>Event Name </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($getStewardsServiceDetails['event_type'] == 1) {
                                                                            $EventName = 'Formal Party';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 2) {
                                                                            $EventName = 'Casual Party';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 3) {
                                                                            $EventName = 'Birthday Party';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 4) {
                                                                            $EventName = 'Anniversary';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 5) {
                                                                            $EventName = 'Funeral';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 6) {
                                                                            $EventName = 'Sporting Event';
                                                                        }
                                                                        if ($getStewardsServiceDetails['event_type'] == 7) {
                                                                            $EventName = $getStewardsServiceDetails['event_name'];
                                                                        }

                                                                        echo "<b>" . $EventName . "</b>";
                                                                        ?>
                                                                </tr>

                                                                <tr>
                                                                    <td>People Attending</td>
                                                                    <td><?php echo "<b>" . $getStewardsServiceDetails['attend_people'] . "</b>"; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Event durations hours</td>
                                                                    <td><?php echo "<b>" . $getStewardsServiceDetails['service_hours'] . "</b>"; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Recommended # of Stewards</td>
                                                                    <td><?php echo "<b>" . $getStewardsServiceDetails['no_of_stewards'] . "</b>"; ?></td>
                                                                </tr>
                                                                        <?php if (($getStewardsServiceDetails['appetizers'] == 1) || ($getStewardsServiceDetails['dinner'] == 1) || ($getStewardsServiceDetails['dessert'] == 1) || ($getStewardsServiceDetails['alcoholic'] == 1) || ($getStewardsServiceDetails['post_dinner'] == 1)) { ?>
                                                                    <tr>
                                                                        <td valign='top'>Services Required</td>
                                                                        <td>
                                                                    <?php if ($getStewardsServiceDetails['appetizers'] == 1) echo "Appetizers</br>"; ?>
            <?php if ($getStewardsServiceDetails['dinner'] == 1) echo "Dinner</br>"; ?>
            <?php if ($getStewardsServiceDetails['dessert'] == 1) echo "Dessert</br>"; ?>
            <?php if ($getStewardsServiceDetails['alcoholic'] == 1) echo "Beverage</br>"; ?>
                                                    <?php if ($getStewardsServiceDetails['post_dinner'] == 1) echo "Coffee / Tea</br>"; ?>
                                                                        </td>
                                                                    </tr>
        <?php } ?>
                                                            </table>    
                                                        </div>
                                                    </div>
                                                </div>
                                <?php } ?>

                                        </div>

                                    </div>
                                </div>

    <?php if (($HouseCleaning == 0) && ($CarCleaning == 0) && ($StewardsCleaning == 0)) { ?>
                                    <div class="row-fluid">

                                        <div class="span12"><label>No Orders Found.</label></div>
                                    </div>       
    <?php } else { ?> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title servicetax_title2">
                                                <a data-toggle="collapse" data-parent="#" href="#" class="collapsed" style="display:block">
                                                    <span class="pull-left">Service Tax</span>
                                                    <span class="serviceprice">Rs. 0</span>
                                                    <!--                                                                <div class="count"></div>-->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                                    <?php
                                                    //$serviceTax = ((($totalRoomsPrice + $Ctotal + $Stotal) * 12.36) / 100);
                                                    $serviceTax = 0;
                                                    ?>
                                            <div class="span6"><label>Total Price (Service Tax Included)</label><input type="text" value="<?php echo $totalRoomsPrice + $Ctotal + $Stotal + $serviceTax; ?>" id="price" readonly="true"/></div>
                                            <div class="span6">
                                                <div class="pull-right paddingT30">
        <?php
        //echo CHtml::ajaxButton('Place Order', array('user/serviceOrder'), array(
        //       'type' => 'POST',
        //       'dataType' => 'json',
        //'beforeSend' => 'function(){
        //        scrollPleaseWait("serviceSpinLoader","services-form");}',
        //       'success' => 'function(data,status,xhr) { addServiceOrderhandler(data,status,xhr);}'), array('class' => 'btn btn-primary','id'=>'HouseCleaningSubmit'));
        ?>
                                                    <input type="button" class="btn btn-primary" value="Place Order" onclick="submitServiceOrder()">
                                                </div>
                                            </div>
                                        </div> 
    <?php } ?>      
                                </div>
                            </div>
                        </div>
                </article>
            </div>
        </section>
    </div>  
    <script type="text/javascript">
        $(document).ready(function() {

    <?php $totalPercent = $basicPercent + $contactPercent + $payPercent; ?>
            $("#progressbar").progressbar({value: <?php echo $totalPercent; ?>});

        });
        function submitServiceOrder() {

            var queryString = '';

            ajaxRequest('/user/serviceOrder', queryString, addServiceOrderhandler);

            scrollPleaseWait("mailSpinLoader", "");

        }
        function addServiceOrderhandler(data) {
               scrollPleaseWaitClose('mailSpinLoader');
            if (data.status == 'success') {
                $('#priceQuoteDiv').hide();
                $('#orderPlaceDiv').show();
                $('#orderPlaceDiv').html(data.data);
                var queryString = '';
                ajaxRequest('/user/mailSendData', queryString, addMailSendhandler);
                
            }
        }
        function addMailSendhandler(data) {
           if (data.status == 'success') {
           }
        }
    </script>
<?php } ?>
