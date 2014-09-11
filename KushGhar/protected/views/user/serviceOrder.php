     
<div class="row-fluid">
    <div class="span12">
        <h4 class="paddingL20">Order Confirmation</h4> <hr>
    </div>
</div>
<div class="row-fluid paddingL20">
    <div class="span12">
    <table width="650" cellspacing="0" cellpadding="0" border="0" align="center">
       <?php $totalRoomsPrice='0';$totalcarPrice='0';$Stotal='0';?>
            
            <?php if($HO!=0){?>
            <tr>
                <td>
                     Your House cleaning service order number is <b><?php echo $HO;?></b>
                </td>
            </tr>
            <tr>
                <td><b>House cleaning service cost :</b>  </td>
                <td><?php
                $priceRoom1 = (($HouseService['total_livingRooms'] + $HouseService['total_bedRooms']) * 125);
                $priceRoom2 = (($HouseService['total_bathRooms'] + $HouseService['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                $priceAddServices = (($HouseService['window_grills'] + $HouseService['cupboard_cleaning'] + $HouseService['fridge_interior'] + $HouseService['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                $otherRoomsCost = ($HouseService['other_rooms']*125);
                $totalRoomsPrice = $priceRoom1 + $priceRoom2 + $otherRoomsCost;
                if($totalRoomsPrice < 750) {$totalRoomsPrice = 750;}
                $totalRoomsPrice+= $priceAddServices;
                echo $totalRoomsPrice; ?>
                </td>
            </tr>
            
            <?php if ($HouseService['squarefeets'] != 0) { ?>
            <tr>
                <td>Square Feets </td>
                <td><?php echo "<b>" . $HouseService['squarefeets'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if (!empty($HouseService['total_livingRooms'])) { ?>
            <tr>
                <td>Total Living Room(s) </td>
                <td><?php echo "<b>" . $HouseService['total_livingRooms'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if (!empty($HouseService['total_bedRooms'])) { ?>
            <tr>
                <td>Total Bedroom(s)</td>
                <td><?php echo "<b>" . $HouseService['total_bedRooms'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if (!empty($HouseService['total_kitchens'])) { ?>
            <tr>
                <td>Total Kitchen(s)</td>
                <td><?php echo "<b>" . $HouseService['total_kitchens'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if (!empty($HouseService['total_bathRooms'])) { ?>
            <tr>
                <td>Total Bathroom(s)</td>
                <td><?php echo "<b>" . $HouseService['total_bathRooms'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if (!empty($HouseService['other_rooms'])) { ?>
            <tr>
                <td>Other Room(s)</td>
                <td><?php echo "<b>" . $HouseService['other_rooms'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            
            <?php if( ($HouseService['window_grills'] != 0) || ($HouseService['cupboard_cleaning'] != 0) || ($HouseService['fridge_interior'] != 0) || ($HouseService['microwave_oven_interior'] != 0) || ($HouseService['pooja_room_cleaning'] != 0) ){?>
            <tr>
                <td valign='top'>Additional Services are</td>
                <td><b><?php if ($HouseService['window_grills'] == 1) echo "Window grills cleaning<br>"; 
                          if ($HouseService['cupboard_cleaning'] == 1) echo "Cupboard cleaning<br>"; 
                          if ($HouseService['fridge_interior'] == 1) echo "Fridge interior cleaning<br>"; 
                          if ($HouseService['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning<br>"; 
                          if ($HouseService['pooja_room_cleaning'] == 1) echo "Pooja room cleaning";?>
               </b> </td>
            </tr><?php }?>
            <tr><td>Scheduled time</td>
                <td><?php echo $HouseService['houseservice_start_time'];?></td>
            </tr>
            <?php }?>
            <?php if($CO!=0){?>
            <tr>
                <td>
                     Your Car cleaning service order number is <b><?php echo $CO;?></b>
                </td>
            </tr>
            <tr>
                <td><b>Car cleaning service cost :</b>  </td>
                <td><?php $totalcarPrice = 500*$getCars;
                    echo $totalcarPrice; ?>  
                </td>
            </tr>
            
            <tr>
                <td>Total Cars</td>
                <td><?php echo "<b>" . $getCars . "</b>"; ?></td>
            </tr>
            <?php $serviceTimes='';$weekdays='';$startTime='';foreach ($CarService as $cw) { 
                 $startTime=$cw['carservice_start_time'];             
                ?>
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
            <tr><td>Scheduled time</td>
                <td><?php echo $startTime;?></td>
            </tr>
            <?php }?>
            <?php if($SO!=0){?>
            <tr>
                <td>
                     Your Stewards service order number is <b><?php echo $SO;?></b>
                </td>
            </tr>
            <tr>
                <td><b>Stewards service cost :</b>  </td>
                <td><?php 
                    $Stotal = ($StewardService['service_hours'] * $StewardService['no_of_stewards'] * 200);
                    echo $Stotal; ?>
                </td>
            </tr>
            <tr>
                <td>Event Name </td>
                <td>
                    <?php
                    if ($StewardService['event_type'] == 1) { $EventName = 'Formal Party';}
                    if ($StewardService['event_type'] == 2) { $EventName = 'Casual Party';}
                    if ($StewardService['event_type'] == 3) { $EventName = 'Birthday Party'; }
                    if ($StewardService['event_type'] == 4) { $EventName = 'Anniversary'; }
                    if ($StewardService['event_type'] == 5) { $EventName = 'Funeral'; }
                    if ($StewardService['event_type'] == 6) { $EventName = 'Sporting Event'; }
                    if ($StewardService['event_type'] == 7) { $EventName = $StewardService['event_name']; }
                    echo "<b>" . $EventName . "</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>People Attending</td>
                <td><?php echo "<b>" . $StewardService['attend_people'] . "</b>"; ?></td>
            </tr>
            <tr>
                <td>Event duration hour(s)</td>
                <td><?php echo "<b>" . $StewardService['service_hours'] . "</b>"; ?></td>
            </tr>
            <tr>
                <td>Recommended # of Stewards</td>
                <td><?php echo "<b>" . $StewardService['no_of_stewards'] . "</b>"; ?></td>
            </tr>
            <?php if( ($StewardService['appetizers'] == 1) || ($StewardService['dinner'] == 1) || ($StewardService['dessert'] == 1) || ($StewardService['alcoholic'] == 1) || ($StewardService['post_dinner'] == 1) ) {?>
            <tr>
                <td valign='top'>Services Required</td>
                <td><b>
                    <?php if ($StewardService['appetizers'] == 1) echo "Appetizers<br>"; ?>
                    <?php if ($StewardService['dinner'] == 1) echo "Dinner<br>"; ?>
                    <?php if ($StewardService['dessert'] == 1) echo "Dessert<br>"; ?>
                    <?php if ($StewardService['alcoholic'] == 1) echo "Beverage<br>"; ?>
                    <?php if ($StewardService['post_dinner'] == 1) echo "Coffee / Tea<br>"; ?>
                </b></td>
            </tr>
            <?php }?>
            <tr><td>Scheduled time</td>
                <td><?php echo $StewardService['start_time'];?></td>
            </tr>
            <?php }?>
            <tr><td colspan="2"></td></tr>
            <tr>
                <td><b>Total Cost(Service Tax Included) :</b></td>
                <td><b>
                    <?php // $serviceTax = ((($totalRoomsPrice + $totalcarPrice + $Stotal) * 12.36) / 100); 
                     $serviceTax=0;
                    echo $totalRoomsPrice + $totalcarPrice + $Stotal + $serviceTax;?>
                    </b>
                </td>
            </tr>
            <tr><td colspan="2">
                <h4> Thank you for your order. For any future communication, please quote your order number. Our executive will contact you shortly.</h4>
                </td></tr>
            </table>
            
                    
                </div>
            </div>
            
          
      


   