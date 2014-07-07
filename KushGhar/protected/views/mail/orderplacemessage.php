
<html><body>
<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#262626" align="center">
   <tr>
            <td valign="top">
                <!-- START OF EMAIL WRAPPER -->
                <table width="650" cellspacing="0" cellpadding="0" border="0" bgcolor="#fcfcfc" align="center">
                    <tr>
                            <td>

                                <!-- START OF Header Table -->
                                <table width="650" cellspacing="0" cellpadding="0" border="0" bgcolor="#6CA050" >
                                 
                                        <tr><td colspan='2'>&nbsp;</td></tr>
                                        <tr>
                                            <td valign="top" bgcolor="#fffff" align="left" >
                                                
                                                <a href="#" target="_blank"><img alt="KushGhar" style="float:left" src="<?php echo $Logo;?>"/></a>
                                                
                                            </td>
                                            <td bgcolor="#fffff" valign="center" ><h3>Welcome to KushGhar</h3><br/><b>Toll Free Number:</b> 1-800-3070-6959</td>
                                        </tr>
                                        <tr><td colspan='2'>&nbsp;</td></tr>
                                   </table>
                                <!-- END OF Header Table -->
                                <!-- START OF full width Table --> 
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
                $priceAddServices = (($HouseService['window_grills'] + $HouseService['fridge_interior'] + $HouseService['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                $totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
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
                <td>Total Bed Room(s)</td>
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
                <td>Total Bath Room(s)</td>
                <td><?php echo "<b>" . $HouseService['total_bathRooms'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php if ($HouseService['pooja_room_cleaning'] != 0) { ?>
            <tr>
                <td>Pooja Room</td>
                <td><?php echo "<b>" . $HouseService['pooja_room_cleaning'] . "</b>"; ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td valign='top'>Additional Services are</td>
                <td><?php if ($HouseService['window_grills'] == 1) echo "Window grills cleaning</br>"; ?>
                <?php if ($HouseService['fridge_interior'] == 1) echo "Fridge interior cleaning</br>"; ?>
                <?php if ($HouseService['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning</br>"; ?>
                </td>
            </tr>
            <tr><td>Scheduled time</td>
                <td><?php if($HouseService['service_no_of_times']=='5'){echo $HouseService['week_days'];}else{echo $HouseService['houseservice_start_time'];}?></td>
            </tr>
            <?php }?>
            <?php if($CO!=0){?>
            <tr>
                <td>
                     Your Car wash service order number is <b><?php echo $CO;?></b>
                </td>
            </tr>
            <tr>
                <td><b>Car wash service cost :</b>  </td>
                <td><?php $totalcarPrice = 500*$getCars;
                    echo $totalcarPrice; ?>  
                </td>
            </tr>
            
            <tr>
                <td>Total Cars</td>
                <td><?php echo "<b>" . $getCars . "</b>"; ?></td>
            </tr>
            <?php $serviceTimes='';$weekdays='';$startTime='';foreach ($CarService as $cw) { 
                 $serviceTimes=$cw['service_no_of_times'];$weekdays=$cw['week_days'];$startTime=$cw['carservice_start_time'];             
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
            <?php if ($cw['shampoo_seats'] != 0) { ?>
            <tr>
                <td>Shampoo Seats</td>
                <td><?php echo "<b>Yes</b>"; ?></td>
            </tr>
            <?php } ?>
            <?php } ?>
            <tr><td>Scheduled time</td>
                <td><?php if($serviceTimes=='5'){echo $weekdays;}else{echo $startTime;}?></td>
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
                <td>Event durations hours</td>
                <td><?php echo "<b>" . $StewardService['service_hours'] . "</b>"; ?></td>
            </tr>
            <tr>
                <td>Recommanded # of Stewards</td>
                <td><?php echo "<b>" . $StewardService['no_of_stewards'] . "</b>"; ?></td>
            </tr>
            <?php if( ($StewardService['appetizers'] == 1) || ($StewardService['dinner'] == 1) || ($StewardService['dessert'] == 1) || ($StewardService['alcoholic'] == 1) || ($StewardService['post_dinner'] == 1) ) {?>
            <tr>
                <td valign='top'>Services Required</td>
                <td>
                    <?php if ($StewardService['appetizers'] == 1) echo "Appetizers</br>"; ?>
                    <?php if ($StewardService['dinner'] == 1) echo "Dinner</br>"; ?>
                    <?php if ($StewardService['dessert'] == 1) echo "Dessert</br>"; ?>
                    <?php if ($StewardService['alcoholic'] == 1) echo "Beverage</br>"; ?>
                    <?php if ($StewardService['post_dinner'] == 1) echo "Coffee / Tea</br>"; ?>
                </td>
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
                <h2> Thank you for your order, for any future communication. Please quote your order number (or) our executive will contact you shortly.</h2>
                </td></tr> 
                                </table>
                                        
                                       

                                    </td>
                        </tr>
                        <tr>
                            <td style="font-family: Helvetica, sans-serif; font-size: 13px; color: #373737; line-height: 16px;">&nbsp;</td>
                        </tr>
                    </table>
                <!-- END OF full width Table -->

                <!-- START OF FOOTER TABLE -->
                <table width="650" cellspacing="0" align="center" cellpadding="0" border="0" bgcolor="#fcfcfc">

                    <tbody><tr>
                            <td valign="top" bgcolor="#fcfcfc" align="left" height="26" colspan="4">&nbsp;</td>
                        </tr>


                        <tr>
                            <td width="10" valign="top" bgcolor="#ededed" align="left" height="58">&nbsp;</td>
                            <td  bgcolor="#ededed" align="left" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #757887; line-height: 16px;">Copyright &copy; 2014 <a href="{--SITEURL--}" target="_blank" style="text-decoration: none;"> KushGhar</a> All Rights Reserved.
                            </td>

                        </tr>

                    </tbody></table>
                <!-- END OF FOOTER TABLE -->



               




            </td>
        </tr>
   </table><!-- END OF EMAIL WRAPPER -->


    </body></html>







