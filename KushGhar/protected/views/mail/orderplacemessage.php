<html>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#262626" align="center">
            <tr>
                <td valign="top">
                <!-- START OF EMAIL WRAPPER -->
                    <table width="650" cellspacing="0" cellpadding="0" border="0" bgcolor="#fcfcfc" align="center">
                        <tr>
                            <td>
                                <!-- START OF Header Table -->
                                <table width="650" cellspacing="0" cellpadding="0" border="0" bgcolor="#6CA050" >
                                    <tr>
                                        <td colspan='2'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td valign="top" bgcolor="#fffff" align="left" >
                                            <a href="<?php echo YII::app()->params['SERVER_URL'];?>" target="_blank"><img alt="KushGhar" style="float:left" src="<?php echo $Logo;?>"/></a>
                                        </td>
                                        <td bgcolor="#fffff" valign="center" >
                                            <h3>Welcome to KushGhar</h3><br/><b>Toll Free Number:</b> 1-800-3070-6959
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>&nbsp;</td>
                                    </tr>
                                </table>
                                <!-- END OF Header Table -->
                                <!-- START OF full width Table --> 
                                <table width="650" cellspacing="0" cellpadding="0" border="0" align="center">
                                    <tr>
                                        <td colspan="2">Hi,</td>
                                    </tr> 
                                    <?php $totalRoomsPrice='0';$totalcarPrice='0';$Stotal='0';?>
                                    <?php if($HO!=0){?>
                                    <tr>
                                        <td colspan="2">
                                            Your House cleaning service order number is <b><?php echo $HO;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>House cleaning service cost :</b>  </td>
                                        <td>
                                            <?php $totalRoomsPrice='';
                                            if( ($HouseService['total_livingRooms']==1) && ($HouseService['total_bedRooms']==1) && ($HouseService['total_bathRooms']==1) && ($HouseService['total_kitchens']==1)) {
                                                $priceRoom1 = (($HouseService['total_livingRooms'] + $HouseService['total_bedRooms']) * 125);
                                                $priceRoom2 = (($HouseService['total_bathRooms'] + $HouseService['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                                //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                                                $totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                                            }else{ $LR='';$BedR='';$BathR='';$KR='';
                                                if($HouseService['total_livingRooms']>1){
                                                $LR = (($HouseService['total_livingRooms']-1)*125);
                                                }
                                                if($HouseService['total_bedRooms']>1){
                                                $BedR = (($HouseService['total_bedRooms']-1)*125);
                                                }
                                                if($HouseService['total_bathRooms']>1){
                                                $BathR = (($HouseService['total_bathRooms']-1)*250);
                                                }
                                                if($HouseService['total_kitchens']>1){
                                                $KR = (($HouseService['total_kitchens']-1)*250);
                                                }

                                                $priceRoom1  = $LR+$BedR;
                                                $priceRoom2 = $BathR+$KR;
                                                $totalRoomsPrice = $priceRoom1 + $priceRoom2 +750;
                                                //$totalRoomsPrice = 0 ;  
                                            }
                                            $priceAddServices = (($HouseService['window_grills'] + $HouseService['fridge_interior'] + $HouseService['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                            $totalRoomsPrice+= $priceAddServices;
                                            echo $totalRoomsPrice; ?>                 
                                        </td>
                                    </tr>
                                    <?php if ($getServiceDetails['house_type'] !='') { ?>
                                    <tr>
                                        <td>House Type </td>
                                        <td><?php echo "<b>" . $getServiceDetails['house_type'] . "</b>"; ?></td>
                                    </tr>
                                    <?php } ?>
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
                                    <?php if( ($HouseService['window_grills'] != 0) || ($HouseService['fridge_interior'] != 0) || ($HouseService['microwave_oven_interior'] != 0) || ($HouseService['pooja_room_cleaning'] != 0) ){?>
                                    <tr>
                                        <td valign='top'>Additional Services are</td>
                                        <td nowrap><b><?php if ($HouseService['window_grills'] == 1) echo "Window grills cleaning <br>"; 
                                                  if ($HouseService['fridge_interior'] == 1) echo "Fridge interior cleaning <br>"; 
                                                  if ($HouseService['microwave_oven_interior'] == 1) echo "Micro wave oven interior cleaning <br>"; 
                                                  if ($HouseService['pooja_room_cleaning'] == 1) echo "Pooja room cleaning ";?>
                                        </b></td>
                                    </tr><?php }?>
                                    <tr>
                                        <td>Scheduled time</td>
                                        <td><?php echo $HouseService['houseservice_start_time'];?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if($CO!=0){?>
                                    <tr>
                                        <td>Your Car cleaning service order number is <b><?php echo $CO;?></b></td>
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
                                            $startTime=$cw['carservice_start_time']; ?>
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
                                    <tr>
                                        <td>Scheduled time</td>
                                        <td><?php echo $startTime;?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if($SO!=0){?>
                                    <tr>
                                        <td>Your Stewards service order number is <b><?php echo $SO;?></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Stewards service cost :</b>  </td>
                                        <td><?php $Stotal = ($StewardService['service_hours'] * $StewardService['no_of_stewards'] * 200);
                                            echo $Stotal; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Event Name </td>
                                        <td><?php if ($StewardService['event_type'] == 1) { $EventName = 'Formal Party';}
                                                  if ($StewardService['event_type'] == 2) { $EventName = 'Casual Party';}
                                                  if ($StewardService['event_type'] == 3) { $EventName = 'Birthday Party'; }
                                                  if ($StewardService['event_type'] == 4) { $EventName = 'Anniversary'; }
                                                  if ($StewardService['event_type'] == 5) { $EventName = 'Funeral'; }
                                                  if ($StewardService['event_type'] == 6) { $EventName = 'Sporting Event'; }
                                                  if ($StewardService['event_type'] == 7) { $EventName = $StewardService['event_name']; }
                                                  echo "<b>" . $EventName . "</b>"; ?>
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
                                        <td nowrap><b><?php if ($StewardService['appetizers'] == 1) echo "Appetizers <br>"; 
                                                  if ($StewardService['dinner'] == 1) echo "Dinner <br>"; 
                                                  if ($StewardService['dessert'] == 1) echo "Dessert <br>"; 
                                                  if ($StewardService['alcoholic'] == 1) echo "Beverage <br>"; 
                                                  if ($StewardService['post_dinner'] == 1) echo "Coffee / Tea <br>"; ?>
                                        </b></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td>Scheduled time</td>
                                        <td><?php echo $StewardService['start_time'];?></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Cost(Service Tax Included) :</b></td>
                                        <td><b><?php // $serviceTax = ((($totalRoomsPrice + $totalcarPrice + $Stotal) * 12.36) / 100); 
                                                $serviceTax=0;
                                                echo $totalRoomsPrice + $totalcarPrice + $Stotal + $serviceTax;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h2> Thank you for your order. For any future communication, please quote your order number. Our executive will contact you shortly.</h2>
                                        </td>
                                    </tr> 
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
                    <tbody>
                        <tr>
                            <td valign="top" bgcolor="#fcfcfc" align="left" height="26" colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="10" valign="top" bgcolor="#ededed" align="left" height="58">&nbsp;</td>
                            <td  bgcolor="#ededed" align="left" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #757887; line-height: 16px;">Copyright &copy; 2014 <a href="<?php echo YII::app()->params['SERVER_URL'];?>" target="_blank" style="text-decoration: none;"> KushGhar</a> All Rights Reserved.</td>
                        </tr>
                    </tbody>
                </table>
                <!-- END OF FOOTER TABLE -->
            </td>
            </tr>
        </table><!-- END OF EMAIL WRAPPER -->
    </body>
</html>