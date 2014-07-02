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
                                <li><a href="<?php echo YII::app()->params['SERVER_URL'];?>/user/homeService"> <i class="fa fa-user"></i> Service Details</a></li>
                                <li><a href="<?php echo YII::app()->params['SERVER_URL'];?>/user/priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="<?php echo YII::app()->params['SERVER_URL'];?>/user/paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
                                    <div class="<?php echo $statusClassForPayment;?>"> </div>
                                </li>
                                <li><a href="<?php echo YII::app()->params['SERVER_URL'];?>/user/basicinfo"> <i class="fa fa-user"></i> Basic Info</a>
                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>
                                </li>
                                <li><a href="<?php echo YII::app()->params['SERVER_URL'];?>/user/contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
                                    <div class="<?php echo $statusClassForContact;?>"> </div>
                                </li>
                                <li class="active"><a href="#"> <i class="fa fa-phone"></i> Orders</a>
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
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Customer Order Details</h4>
                        
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th>Service Name</th><th>Order Number</th><th>Status</th><th>Amount</th></tr></thead>
                                    <tbody id="abusedWords_tbody">
                                    <?php for($i=0;$i<sizeof($orderDetails);$i++){
                                        $serviceName='';
                                    ?>
                                    <tr>
                                        <td>
                                            <?php if($orderDetails[$i]['ServiceId']=='1'){$serviceName='House Cleaning';}
                                            if($orderDetails[$i]['ServiceId']=='2'){$serviceName='Car Wash';}
                                            if($orderDetails[$i]['ServiceId']=='3'){$serviceName='Stewards Services';}
                                            echo $serviceName;
                                           ?>
                                        </td>
                                        <td><?php echo $orderDetails[$i]['order_number'];?></td>
                                        <td><?php echo 'Open'?></td>
                                        <td><?php echo $orderDetails[$i]['amount'];?></td>
                                    </tr>
                                            
                                    <?php }?>    
                                    </tbody>
                                </table>
                                <div class="pagination pagination-right">
                                    <div id="pagination"></div>  

                                </div>
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
        $("#instant_notifications").fadeOut(6000, "");

    


</script>