<div class="paddinground">
    <div class="row-fluid">
        
        <div class="span6">
            <div class="pull-right">
                <table border="0">
                <tr><th colspan="2">Service Details</th></tr>
               <?php if($serviceId==1){ 
                 if ($services['squarefeets'] != 0) { ?>
                <tr>
                    <td>Square Feet </td>
                    <td><?php echo "<b>" . $services['squarefeets'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <?php if (!empty($services['total_livingRooms'])) { ?>
                <tr>
                    <td>Total Living Room(s) </td>
                    <td><?php echo "<b>" . $services['total_livingRooms'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <?php if (!empty($services['total_bedRooms'])) { ?>
                <tr>
                    <td>Total Bed Room(s)</td>
                    <td><?php echo "<b>" . $services['total_bedRooms'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <?php if (!empty($services['total_kitchens'])) { ?>
                <tr>
                    <td>Total Kitchen(s)</td>
                    <td><?php echo "<b>" . $services['total_kitchens'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <?php if (!empty($services['total_bathRooms'])) { ?>
                <tr>
                    <td>Total Bath Room(s)</td>
                    <td><?php echo "<b>" . $services['total_bathRooms'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <?php if ($services['pooja_room_cleaning'] != 0) { ?>
                <tr>
                    <td>Pooja Room</td>
                    <td><?php echo "<b>" . $services['pooja_room_cleaning'] . "</b>"; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td valign='top'>Additional Services are</td>
                </tr>
                <tr>
                    <td><b><?php if ($services['window_grills'] == 1) echo "Window grills cleaning</br>"; ?>
                        <?php if ($services['fridge_interior'] == 1) echo "Fridge interior cleaning</br>"; ?>
                        <?php if ($services['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning</br>"; ?>
                    </b></td>
                </tr>
               <?php }?>
                <?php if($serviceId==2){?> 
                <tr>
                    <td>Total Cars</td>
                    <td><?php echo "<b>" . count($services) . "</b>"; ?></td>
                </tr>
                <?php foreach ($services as $cw) { ?>
                <tr>
                    <td>Make / Model of the Car</td>
                    <td><?php echo "<b>" . $cw['make_of_car'] . "</b>"; ?></td>
                </tr>
                <?php if ($cw['exterior_cleaning'] != 0) { ?>
                <tr>
                    <td>Exterior Color</td>
                    <td><?php echo "<b>" . $cw['exterior_color'] . "</b>"; ?></td>
                </tr>
                <?php } } }?>
                <?php if($serviceId==3){?> 
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
                        <?php if ($services['post_dinner'] == 1) echo "Coffee / Tea</br>"; ?>
                   </b> </td>
                </tr>
                <?php }}?>
                </table> 
            </div>
        </div>
        <div class=" span6 pull-right">
            <table border="0">
                <tr><th colspan="2">Customer Details</th></tr>
                <tr><td>Name:<td><?php echo $userDetails1['first_name']." ".$userDetails1['last_name'];?></td></tr>
                <tr><td>Email:<td><?php echo $userDetails1['email_address'];?></td></tr>
                <tr><td>Phone:<td><?php echo $userDetails1['phone'];?></td></tr>
            </table>
        </div>
    </div>    
</div>
                                    