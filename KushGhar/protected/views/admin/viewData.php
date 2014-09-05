    <?php
        $address;
 if($customerAddressDetails['address_line1']=='')
     $addressline1="";
 else
     $addressline1=$customerAddressDetails['address_line1'].", ";
 if($customerAddressDetails['address_line2']=='')
     $addressline2="";
 else
     $addressline2=$customerAddressDetails['address_line2'].", ";
 if($customerAddressDetails['address_city']=='')
     $addresscity="";
 else
     $addresscity=$customerAddressDetails['address_city'].", ";
 if($customerAddressDetails['address_pin_code']=='')
     $addressPin="";
 else
     $addressPin=$customerAddressDetails['address_pin_code'];
 if($customerAddressDetails['address_landmark']=='')
     $addresslandmark="";
 else
     $addresslandmark="Landmark : ".$customerAddressDetails['address_landmark'];
  $address=$addressline1.$addressline2.$addresscity.$addressPin;
    ?>
  <div class="row-fluid">
        <div class="span12">
            <div style="text-align: center; background-color: #e5e5e5;">
                    <center><h3 style="padding: 0px">Customer Details</h3></center></div>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><b>Customer Name </b></td><td colspan="3"><?php echo $userDetails1['first_name']." ".$userDetails1['last_name'];?></td>
                </tr>
                <tr>
                <td><b>Contact No </b></td><td><?php echo $userDetails1['phone'];?></td>
                <td><b>Email ID </b></td><td><?php echo $userDetails1['email_address'];?></td></tr>
                <tr>
                    <td><b>Address</b></td>
                    <td colspan="3"><?php echo $address."\n".$addresslandmark;?></td>
                </tr>
            </table>
            
            
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <?php if($serviceId==1){ ?>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr><th align="left" colspan="4">No of Rooms</th><th align="left">Square feet area</th></tr>
                <tr>
                    <td><label>Bedroom <?php echo  "<b>" .$services['total_bedRooms'] . "</b>"; ?></label></td>
                    <td><label>Bathroom <?php echo "<b>" .$services['total_bathRooms']. "</b>"; ?></label></td>
                    <td><label>Living room <?php echo "<b>" .$services['total_livingRooms']. "</b>"; ?></label></td>
                    <td><label>Kitchen <?php echo "<b>" .$services['total_kitchens']. "</b>";?></label></td>
                    <td><?php echo "<b>" . $services['squarefeets'] . "</b>"; ?></td>
                </tr>
                
            </table>
            <?php }?>
            <?php if($serviceId==2){ ?>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr><td colspan="2">Total Cars</td>
                    <td><?php echo "<b>" . count($services) . "</b>"; ?></td>
                </tr>
                <?php foreach ($services as $cw) { ?>
                <tr><th>Make</th><th>Model</th><th>Exterior Color</th></tr>
                <tr><td style="text-align: center"><?php echo $cw['make_of_car']; ?></td>
                    <td style="text-align: center"><?php echo $cw['model_of_car']; ?></td>
                    <td style="text-align: center"><?php echo $cw['exterior_color']; ?></td>
                </tr>
                <?php }?>
            </table>
            <?php }?>
            <?php if($serviceId==3){ ?>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Event Name </td>
                    <td>
                        <?php if ($services['event_type'] == 1) { $EventName = 'Formal Party';}
                              if ($services['event_type'] == 2) { $EventName = 'Casual Party';}
                              if ($services['event_type'] == 3) { $EventName = 'Birthday Party';}
                              if ($services['event_type'] == 4) { $EventName = 'Anniversary';}
                              if ($services['event_type'] == 5) { $EventName = 'Funeral';}
                              if ($services['event_type'] == 6) { $EventName = 'Sporting Event';}
                              if ($services['event_type'] == 7) { $EventName = $services['event_name'];}
                              echo "<b>" . $EventName . "</b>";
                         ?>
                    </td>
                </tr>
                <tr>
                    <td>People Attending</td>
                    <td><?php echo "<b>" . $services['attend_people'] . "</b>"; ?></td>
                </tr>
                <tr>
                    <td>Event duration hour(s)</td>
                    <td><?php echo "<b>" . $services['service_hours'] . "</b>"; ?></td>
                </tr>
                <tr>
                    <td>Recommended # of Stewards</td>
                    <td><?php echo "<b>" . $services['no_of_stewards'] . "</b>"; ?></td>
                </tr>
                <?php if( ($services['appetizers'] == 1) || ($services['dinner'] == 1) || ($services['dessert'] == 1) || ($services['alcoholic'] == 1) || ($services['post_dinner'] == 1) ) {?>
                <tr>
                    <td valign='top'>Services Required</td>
                    <td><b><?php if ($services['appetizers'] == 1) echo "Appetizers</br>"; ?>
                        <?php if ($services['dinner'] == 1) echo "Dinner</br>"; ?>
                        <?php if ($services['dessert'] == 1) echo "Dessert</br>"; ?>
                        <?php if ($services['alcoholic'] == 1) echo "Beverage</br>"; ?>
                        <?php if ($services['post_dinner'] == 1) echo "Coffee/Tea</br>"; ?>

                   </b> </td>
                </tr>
                <?php }?>
                
            </table>
            <?php }?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div style="text-align: center; background-color: #e5e5e5;">
            <center><h3 style="padding: 0px">Service Schedule</h3></center></div>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr><td align="left" style="width: 30%"><b>Service requested date:</b></td><td><?php echo $ServiceDate;?></td></tr>
                <?php if($status==1||$status==3){ ?>
                <tr><td colspan="2" align="left"><b>Team members:</b></td></tr>
                <tr>
                    <td colspan="2">
                        <table border="0" style="width: 100%" cellpadding="0" cellspacing="0">
                    
                    <?php for($i=0;$i<count($Vendors);$i++){?>
                <?php if($i%3==0){?>    
                <tr>
                    <td style="width: 33.3%"><?php echo 1+$i.")&nbsp;&nbsp;".$Vendors[$i]['first_name']." ".$Vendors[$i]['last_name'];?></td>
                <?php } else {?>
                    <td style="width: 33.3%"><?php echo 1+$i.")&nbsp;&nbsp;".$Vendors[$i]['first_name']." ".$Vendors[$i]['last_name'];?></td>
                <?php }?>
               <?php  }?>
                   
                </tr>
           
            </table>
                </td>
                </tr>
                    <?php }?>
                </table>
        </div>
    </div>
<?php if($Type=='review'){ 
    if($reviewDetails['Team_Arrive_Time']=='1'){$Team_Arrive_Time = 'Yes';}else{$Team_Arrive_Time = 'No';} 
    if($reviewDetails['Team_Professional_Appearance']=='1'){$Team_Professional_Appearance = 'Yes';}else{$Team_Professional_Appearance = 'No';} 
    ?>
<div class="row-fluid">
        <div class="span12">
            <div style="text-align: center; background-color: #e5e5e5;">
            <center><h3 style="padding: 0px">Service Feedback</h3></center></div>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="4">Did our team arrive on time? <b><?php echo $Team_Arrive_Time;?></b></td>
                </tr>
                <tr>
                    <td colspan="4">Did our team members have a professional appearance?<b> <?php echo $Team_Professional_Appearance;?></b></td>
                </tr>
                <tr>
                    <td colspan="4"><b>How would you rate us?</b></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table style="width:100%" cellpadding="0" cellspacing="0">
                            <tr><td style="border-right:1px solid #000;">Office staff</td><td style="border-right:1px solid #000;"><b><?php echo $reviewDetails['Office_Staff_Rating'];?></b></td>
                            <td style="border-right:1px solid #000;">Home Service</td><td style="border-right:1px solid #000;"><b><?php echo $reviewDetails['Home_Service_Rating'];?></b></td>
                            <td style="border-right:1px solid #000;">Overall Experience</td><td><b><?php echo $reviewDetails['Overall_Experience'];?></b></td>
                            </tr>
                        </table>                          
                    </td>
                </tr>
                <?php if($serviceId==1) {?>
                <tr>
                    <td colspan="4"><b>How would you rate the quality of the services you have received from KushGhar housemen?</b></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table style="width:100%" cellpadding="0" cellspacing="0">
                            <tr ><td style="border-right:1px solid #000;border-bottom:1px solid #000;">Vacuuming</td><td style="border-right:1px solid #000;border-bottom:1px solid #000;"><b><?php echo $reviewDetails['Service_Vacuuming_Rating'];?></b></td>
                            <td style="border-right:1px solid #000;border-bottom:1px solid #000;">Dusting</td><td style="border-right:1px solid #000;border-bottom:1px solid #000;"><b><?php echo $reviewDetails['Service_Dusting_Rating'];?></b></td>
                            <td style="border-right:1px solid #000;border-bottom:1px solid #000;">Mopping</td><td style="border-right:1px solid #000;border-bottom:1px solid #000;"><b><?php echo $reviewDetails['Service_Moping_Rating'];?></b></td>
                            </tr><tr border="1">
                            <td style="border-right:1px solid #000;">Trash Disposal</td><td style="border-right:1px solid #000;"><b><?php echo $reviewDetails['Service_TrashDisposal_rating'];?></b></td>
                            <td style="border-right:1px solid #000;">Additional services(If Any)</td><td colspan="3" style="border-right:1px solid #000;"><b><?php if($reviewDetails['Service_Addional_Rating']==-1) echo "No Additional services took";else echo $reviewDetails['Service_Addional_Rating'];?></b></td>
                            </tr>
                        </table>                          
                    </td>
                </tr> 
                <?php }?>
            </table>
                       
        </div>
    </div>
<?php }?>