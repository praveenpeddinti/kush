<?php $totalRoomsPrice=0;$Htotal = 0; $Ctotal = 0; $Stotal = 0;?>
<?php if($PriceFlag=='0'){error_log("eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee".$HouseCleaning."==CC=".$CarCleaning."==SC===".$StewardsCleaning);?>

<div class="row-fluid">
   <div class="span12">
   	<div class="panel-group" id="accordion">
                <?php if($HouseCleaning==1){
                    $Htotal=500;
                    
                    
                    $priceRoom1 = (($getServiceDetails['total_livingRooms']+$getServiceDetails['total_bedRooms'])*125);
                    $priceRoom2 = (($getServiceDetails['total_bathRooms']+$getServiceDetails['total_kitchens'])*YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    $priceAddServices = (($getServiceDetails['window_grills']+$getServiceDetails['fridge_interior']+$getServiceDetails['microwave_oven_interior'])*YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    $serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;
                    $totalRoomsPrice = $priceRoom1+$priceRoom2+$priceAddServices+$serviceTaxPrice;
                    
                    error_log("price in =======1=====".$priceRoom1."=====2=====".$priceRoom2."=====total====".$totalRoomsPrice);
                    
                    ?>

            <div class="panel panel-default">
   <div class="panel-heading">
      <div class="panel-title housecleaning_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" style="display:block">
          <span class="pull-left">House Cleaning Service</span>
          <span class="serviceprice"> Rs. <?php echo $totalRoomsPrice;?></span>
          <div class="count"></div>           
        </a>
      </div>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body paddinground">
        <table class="table price">
        		
                                <?php if($getServiceDetails['squarefeets']!=0){?>
                                <tr>
                                    <td>Square Feets </td>
                                    <td><?php echo "<b>".$getServiceDetails['squarefeets']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if(!empty($getServiceDetails['total_livingRooms'])){?>
                                <tr>
                                    <td>Total Living Room(s) </td>
                                    <td><?php echo "<b>".$getServiceDetails['total_livingRooms']."</b>";?></td>
                                </tr>
                                <?php }?>
                               <?php if(!empty($getServiceDetails['total_bedRooms'])){?>
                                <tr>
                                    <td>Total Bed Room(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bedRooms']."</b>";?></td>
                                </tr>
                               <?php }?>
                                <?php if(!empty($getServiceDetails['total_kitchens'])){?>
                                <tr>
                                    <td>Total Kitchen(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_kitchens']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if(!empty($getServiceDetails['total_bathRooms'])){?>
                                <tr>
                                    <td>Total Bath Room(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bathRooms']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if($getServiceDetails['pooja_room_cleaning']!=0){?>
                                <tr>
                                    <td>Pooja Room</td>
                                    <td><?php echo "<b>".$getServiceDetails['pooja_room_cleaning']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td valign='top'>Additional Services are</td>
                                    <td>
                                        <?php if($getServiceDetails['window_grills']==1) echo "Window grills cleaning</br>" ;?>
                                        <?php if($getServiceDetails['fridge_interior']==1) echo "Fridge interior cleaning</br>" ;?>
                                        <?php if($getServiceDetails['microwave_oven_interior']==1) echo "Micro wave oven interior cleaning</br>" ;?>
                                        <?php //if($getServiceDetails['pooja_room_cleaning']==1) echo "Pooja room cleaning</br>" ;?>
                                    </td>
                                </tr>
                                
                                     
        </table>
      </div>
    </div>
  </div>
            <?php }?>
            <?php if($CarCleaning==1){
                $Ctotal=500;?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title carwash_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" style="display:block">
          <span class="pull-left">Car Wash Service</span>
          <span class="serviceprice"> Rs. <?php echo $Ctotal;?></span>
          <div class="count"></div>          
        </a>
      </div>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body paddinground">
             <table class="table price">
                 <tr>
                        <td>Total Cars</td>
                        <td><?php echo "<b>".count($getCarWashServiceDetails)."</b>";?></td>
                    </tr>
                <?php foreach($getCarWashServiceDetails as $cw){?>
                    
                    <tr>
                        <td>Make / Model of the Car</td>
                        <td><?php echo "<b>".$cw['make_of_car']."</b>";?></td>
                    </tr>
                    <?php if($cw['exterior_cleaning']!=0){?>
                 <tr>
                     <td>Exterior Color</td>
                     <td><?php echo "<b>".$cw['exterior_color']."</b>";?></td>
                 </tr>
                 <?php }?>
                 
                 <?php if($cw['wax_car']!=0){?>
                 <tr>
                     <td>Wax / Polish Car</td>
                     <td><?php echo "<b>Yes</b>";?></td>
                 </tr>
                 <?php }?>
                 <?php if($cw['shampoo_seats']!=0){?>
                 <tr>
                     <td>Shampoo Seats</td>
                     <td><?php echo "<b>Yes</b>";?></td>
                 </tr>
                <?php }	?>
                 <?php }	?>
             </table>
      </div>
    </div>
  </div>
  <?php }?>
  <?php if($StewardsCleaning==1){ 
      $Stotal = ($getStewardsServiceDetails['service_hours']*$getStewardsServiceDetails['no_of_stewards']*200);
      
       ?>          
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title stewards_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" style="display:block">
          <span class="pull-left">Stewards /Stewardess Service</span>
          <span class="serviceprice"> Rs. <?php echo $Stotal;?></span>
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
                                        if($getStewardsServiceDetails['event_type']==1){$EventName= 'Formal Party';}
                                        if($getStewardsServiceDetails['event_type']==2){$EventName= 'Casual Party';}
                                        if($getStewardsServiceDetails['event_type']==3){$EventName= 'Birthday Party';}
                                        if($getStewardsServiceDetails['event_type']==4){$EventName= 'Anniversary';}
                                        if($getStewardsServiceDetails['event_type']==5){$EventName= 'Funeral';}
                                        if($getStewardsServiceDetails['event_type']==6){$EventName= 'Sporting Event';}
                                        if($getStewardsServiceDetails['event_type']==7){$EventName= $getStewardsServiceDetails['event_name'];}
                                        
                                        echo "<b>".$EventName."</b>";?>
                                </tr>
                                    
                                <tr>
                                    <td>People Attending</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['attend_people']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>Event durations hours</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['service_hours']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td># of Stewards</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['no_of_stewards']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td valign='top'>Services Required</td>
                                    <td>
                                        <?php if($getStewardsServiceDetails['appetizers']==1) echo "Appetizers</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dinner']==1) echo "Dinner</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dessert']==1) echo "Dessert</br>" ;?>
                                        <?php if($getStewardsServiceDetails['alcoholic']==1) echo "Beverage</br>" ;?>
                                        <?php if($getStewardsServiceDetails['post_dinner']==1) echo "Coffee / Tea</br>" ;?>
                                    </td>
                                </tr>

          </table>    
      </div>
    </div>
  </div>
  <?php }?>
</div>

   </div>
   </div>
   <div class="row-fluid">
                                <div class="span6"><label>Total Price</label><input type="text" value="<?php echo $totalRoomsPrice+$Ctotal+$Stotal;?>" id="price" readonly="true" /></div>
                                <div class="span6">
                                    <div class="pull-right paddingT30">
                                        
                                        <input type="button" class="btn btn-primary" value="Place Order" onclick="submitServiceOrder();">
                                    </div>
                                </div>
                            </div>
                
                
 <?php }else{     ?>
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
                                <li><a href="homeService"> <i class="fa fa-user"></i> Service Details</a></li>
                                <li class="active"><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
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
                <div id="orderPlaceDiv" style="display:none">
                    <div class="row-fluid">
                    <div class="span12">
                        <h2 class="paddingL20">Order Place</h2> <hr>
                    </div>
                    </div>
                </div>               
                <div id="priceQuoteDiv" class="row-fluid">
                    <div class="span12">
                        <h2 class="paddingL20">Price Quote </h2> <hr>
                        
                        <div class="paddinground paddingTop0">
                            
                            <div id="serviceSpinLoader"></div>
                            
                           <div class="row-fluid">
   <div class="span12">
   	<div class="panel-group" id="accordion">
                <?php if($HouseCleaning==1){
                    $Htotal=500;
                    $priceRoom1 = (($getServiceDetails['total_livingRooms']+$getServiceDetails['total_bedRooms'])*125);
                    $priceRoom2 = (($getServiceDetails['total_bathRooms']+$getServiceDetails['total_kitchens'])*YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    $priceAddServices = (($getServiceDetails['window_grills']+$getServiceDetails['fridge_interior']+$getServiceDetails['microwave_oven_interior'])*YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    $serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;
                    $totalRoomsPrice = $priceRoom1+$priceRoom2+$priceAddServices+$serviceTaxPrice;
                    
                    error_log("price in =======1=====".$priceRoom1."=====2=====".$priceRoom2."=====total====".$totalRoomsPrice);
                    ?>

            <div class="panel panel-default">
   <div class="panel-heading">
      <div class="panel-title housecleaning_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" style="display:block">
          <span class="pull-left">House Cleaning Service</span>
          <span class="serviceprice">Rs. <?php echo $totalRoomsPrice;?></span>
          <div class="count"></div>
        </a>
      </div>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body paddinground">
        <table class="table price">
        		
                                <?php if($getServiceDetails['squarefeets']!=0){?>
                                <tr>
                                    <td>Square Feets </td>
                                    <td><?php echo "<b>".$getServiceDetails['squarefeets']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if(!empty($getServiceDetails['total_livingRooms'])){?>
                                <tr>
                                    <td>Total Living Room(s) </td>
                                    <td><?php echo "<b>".$getServiceDetails['total_livingRooms']."</b>";?></td>
                                </tr>
                                <?php }?>
                               <?php if(!empty($getServiceDetails['total_bedRooms'])){?>
                                <tr>
                                    <td>Total Bed Room(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bedRooms']."</b>";?></td>
                                </tr>
                               <?php }?>
                                <?php if(!empty($getServiceDetails['total_kitchens'])){?>
                                <tr>
                                    <td>Total Kitchen(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_kitchens']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if(!empty($getServiceDetails['total_bathRooms'])){?>
                                <tr>
                                    <td>Total Bath Room(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bathRooms']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <?php if($getServiceDetails['pooja_room_cleaning']!=0){?>
                                <tr>
                                    <td>Pooja Room</td>
                                    <td><?php echo "<b>".$getServiceDetails['pooja_room_cleaning']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td valign='top'>Additional Services are</td>
                                    <td>
                                        <?php if($getServiceDetails['window_grills']==1) echo "Window grills cleaning</br>" ;?>
                                        <?php if($getServiceDetails['fridge_interior']==1) echo "Fridge interior cleaning</br>" ;?>
                                        <?php if($getServiceDetails['microwave_oven_interior']==1) echo "Micro wave oven interior cleaning</br>" ;?>
                                        <?php //if($getServiceDetails['pooja_room_cleaning']==1) echo "Pooja room cleaning</br>" ;?>
                                    </td>
                                </tr>
                                
                                     
        </table>
      </div>
    </div>
  </div>
            <?php }?>
            <?php if($CarCleaning==1){
                $Ctotal=500;?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title carwash_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" style="display:block">
          <span class="pull-left">Car Wash Service</span>
          <span class="serviceprice">Rs. <?php echo $Ctotal;?></span>
          <div class="count"></div>
        </a>
      </div>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body paddinground">
             <table class="table price">
                <?php foreach($getCarWashServiceDetails as $cw){?>
                    <tr>
                        <td>Total Cars</td>
                        <td><?php echo "<b>".$cw['total_cars']."</b>";?></td>
                    </tr>
                    <tr>
                        <td>Make / Model of the Car</td>
                        <td><?php echo "<b>".$cw['make_of_car']."</b>";?></td>
                    </tr>
                    <?php if($cw['exterior_cleaning']!=0){?>
                 <tr>
                     <td>Exterior Color</td>
                     <td><?php echo "<b>".$cw['exterior_color']."</b>";?></td>
                 </tr>
                 <?php }?>
                 
                 <?php if($cw['wax_car']!=0){?>
                 <tr>
                     <td>Wax / Polish Car</td>
                     <td><?php echo "<b>Yes</b>";?></td>
                 </tr>
                 <?php }?>
                 <?php if($cw['shampoo_seats']!=0){?>
                 <tr>
                     <td>Shampoo Seats</td>
                     <td><?php echo "<b>Yes</b>";?></td>
                 </tr>
                <?php }	?>
                 <?php }	?>
             </table>
      </div>
    </div>
  </div>
  <?php }?>            
  <?php if($StewardsCleaning==1){
      $Stotal= $getStewardsServiceDetails['service_hours']*$getStewardsServiceDetails['no_of_stewards']*200;
      ?>          
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title stewards_title2">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" style="display:block">
          <span class="pull-left">Stewards /Stewardess Service</span>
          <span class="serviceprice">Rs. <?php echo $Stotal;?></span>
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
                                        if($getStewardsServiceDetails['event_type']==1){$EventName= 'Formal Party';}
                                        if($getStewardsServiceDetails['event_type']==2){$EventName= 'Casual Party';}
                                        if($getStewardsServiceDetails['event_type']==3){$EventName= 'Birthday Party';}
                                        if($getStewardsServiceDetails['event_type']==4){$EventName= 'Anniversary';}
                                        if($getStewardsServiceDetails['event_type']==5){$EventName= 'Funeral';}
                                        if($getStewardsServiceDetails['event_type']==6){$EventName= 'Sporting Event';}
                                        if($getStewardsServiceDetails['event_type']==7){$EventName= $getStewardsServiceDetails['event_name'];}
                                        
                                        echo "<b>".$EventName."</b>";?>
                                </tr>
                                    
                                <tr>
                                    <td>People Attending</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['attend_people']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>Event durations hours</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['service_hours']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td># of Stewards</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['no_of_stewards']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td valign='top'>Services Required</td>
                                    <td>
                                        <?php if($getStewardsServiceDetails['appetizers']==1) echo "Appetizers</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dinner']==1) echo "Dinner</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dessert']==1) echo "Dessert</br>" ;?>
                                        <?php if($getStewardsServiceDetails['alcoholic']==1) echo "Beverage</br>" ;?>
                                        <?php if($getStewardsServiceDetails['post_dinner']==1) echo "Coffee / Tea</br>" ;?>
                                    </td>
                                </tr>

          </table>    
      </div>
    </div>
  </div>
  <?php }?>
</div>

   </div>
   </div>
   <div class="row-fluid">
       <div class="span6"><label>Total Price</label><input type="text" value="<?php echo $totalRoomsPrice+$Ctotal+$Stotal;?>" id="price" readonly="true"/></div>
                                <div class="span6">
                                    <div class="pull-right paddingT30">
                                        <?php   //echo CHtml::ajaxButton('Order Place', array('user/serviceOrder'), array(
                                                 //       'type' => 'POST',
                                                 //       'dataType' => 'json',
                                                        //'beforeSend' => 'function(){
                                                        //        scrollPleaseWait("serviceSpinLoader","services-form");}',
                                                 //       'success' => 'function(data,status,xhr) { addServiceOrderhandler(data,status,xhr);}'), array('class' => 'btn btn-primary','id'=>'HouseCleaningSubmit'));
                                         ?>
                                        <input type="button" class="btn btn-primary" value="Order Place" onclick="submitServiceOrder()">
                                    </div>
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
         
    });
    function submitServiceOrder(){
         alert("enter submitServiceOrder==========");
         var queryString = '';

            ajaxRequest('/user/serviceOrder',queryString, addServiceOrderhandler);
     }
    function addServiceOrderhandler(data){
        alert("enter ownorder===="+data.data);
        if(data.status=='success'){
            $('#priceQuoteDiv').hide();
            $('#orderPlaceDiv').show();
            $('#orderPlaceDiv').html(data.data);}
    }
    </script>
 <?php }?>
