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
    <label>Kushghar Management Services Private Limited</label>
    <div class="row-fluid">
        <div class="span12">
            <h2>Customer Details</h2>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><label><b>Customer Name </b></td><td colspan="3"><?php echo $userDetails1['first_name']." ".$userDetails1['last_name'];?></label></td>
                </tr>
                <tr>
                <td><label><b>Contact No </b></td><td><?php echo $userDetails1['phone'];?></label></td>
                <td><label><b>Email ID </b></td><td><?php echo $userDetails1['email_address'];?></label></td></tr>
                <tr>
                    <td><label><b>Address</b></label></td>
                    <td colspan="3"><label><?php echo $address."\n".$addresslandmark;?></label></td>
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
                <tr><th colspan="2">Total Cars</th>
                    <td><?php echo "<b>" . count($services) . "</b>"; ?></td>
                </tr>
                <?php foreach ($services as $cw) { ?>
                <tr><th>Make</th><th>Model</th><th>Exterior Color</th></tr>
                <tr><td><?php echo "<b>" . $cw['make_of_car'] . "</b>"; ?></td>
                    <td><?php echo "<b>" . $cw['model_of_car'] . "</b>"; ?></td>
                    <td><?php echo "<b>" . $cw['exterior_color'] . "</b>"; ?></td>
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
            <h2>Service Schedule</h2>
            <label>Service requested date:<?php echo $ServiceDate;?></label>
            <?php if(!empty($Vendors)){ ?>
            <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                <tr><th align="left">Team members:</th></tr>
                <tr>
               <?php for($i=0;$i<count($Vendors);$i++){?>
                    
                    <td><?php echo 1+$i.")&nbsp;&nbsp;".$Vendors[$i]['first_name']." ".$Vendors[$i]['last_name'];?></td>
                   
                   
               <?php  }?>
                    </tr> 
            </table>
            <?php }?>
        </div>
    </div>
  
                                    