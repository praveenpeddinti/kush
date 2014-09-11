
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
                                                
                                                <a href="<?php echo YII::app()->params['SERVER_URL'];?>" target="_blank"><img alt="KushGhar" style="float:left" src="<?php echo $Logo;?>"/></a>
                                                
                                            </td>
                                            <td bgcolor="#fffff" valign="center" ><h3>Welcome to KushGhar</h3><br/><b>Toll Free Number:</b> 1-800-3070-6959</td>
                                        </tr>
                                        <tr><td colspan='2'>&nbsp;</td></tr>
                                   </table>
                                <!-- END OF Header Table -->
                                <!-- START OF full width Table --> 
                                <table width="650" cellspacing="0" cellpadding="0" border="0" align="center">
                                    <tr><td width="630" valign="top" align="left" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px;">
                                            <table><?php $totalRoomsPrice='0';$totalcarPrice='0';$Stotal='0';?>
                                                 <tr><td colspan="2">Hi,</td></tr>
                                                 <tr><td colspan="2">&nbsp;</td></tr>
                                    <tr><td colspan="2">Customer Order details as follows:</td></tr>
                                    <tr><td><b>Customer :</b></td><td><?php echo $Message['first_name'];?></td></tr>
                                    <tr><td><b>Phone :</b></td><td><?php echo $Message['phone'];?></td></tr>
                                    <tr><td><b>Email :</b></td><td><?php echo $Message['email_address'];?></td></tr>
                                    <tr><td><b>Services :</b></td><td><?php if($HouseService!=0){echo "House cleaning, ";}?><?php if($CarService!=0){echo "Car wash, ";}?><?php if($StewardService!=0){echo "Stewards";}?></td></tr>
                                    <tr><td colspan="2">&nbsp;</td></tr>
                                    <?php if($HouseService!=0){?>
                                    <tr><td><b>House cleaning service cost :</b>  </td>
                                    <td><?php $totalRoomsPrice='';
                                    if( ($HouseService['total_livingRooms']==1) && ($HouseService['total_bedRooms']==1) && ($HouseService['total_bathRooms']==1) && ($HouseService['total_kitchens']==1))
                                    {
                                    $priceRoom1 = (($HouseService['total_livingRooms'] + $HouseService['total_bedRooms']) * 125);
                                    $priceRoom2 = (($HouseService['total_bathRooms'] + $HouseService['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                    //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                                    $otherRoomsCost = ($HouseService['other_rooms']*125);
                                    $totalRoomsPrice = $priceRoom1 + $priceRoom2 + $otherRoomsCost;
                                    }else{$LR='';$BedR='';$BathR='';$KR='';
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
                                    $otherRoomsCost = ($HouseService['other_rooms']*125);
                                    $totalRoomsPrice = $priceRoom1 + $priceRoom2 + $otherRoomsCost +750;
                                    //$totalRoomsPrice = 0 ;  
                                    }
                                    $priceAddServices = (($HouseService['window_grills'] + $HouseService['cupboard_cleaning'] + $HouseService['fridge_interior'] + $HouseService['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                                    $totalRoomsPrice+= $priceAddServices;
                                    echo $totalRoomsPrice; ?>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <?php if($CarService!=0){?>
                                            <tr><td><b>Car cleaning service cost :</b>  </td>
                                                <td><?php $totalcarPrice = 500*$getCars;;
                                                    echo $totalcarPrice; ?>
                                            
                                                    
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <?php if($StewardService!=0){?>
                                            <tr><td><b>Stewards service cost :</b>  </td>
                                                <td><?php 
                                                    $Stotal = ($StewardService['service_hours'] * $StewardService['no_of_stewards'] * 200);
                                                    echo $Stotal; ?>
                                            
                                                    
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <tr><td><b>Total Cost(Service Tax Included) :</b></td><td><b>
                                                <?php // $serviceTax = ((($totalRoomsPrice + $totalcarPrice + $Stotal) * 12.36) / 100); 
                                                $serviceTax = 0;
                                                echo $totalRoomsPrice + $totalcarPrice + $Stotal + $serviceTax;?>
                                                    </b></td></tr>
                                             <tr><td colspan="2">
                                                     <p style="font-size:14px;line-height:1.7;">We will contact you as soon as possible.</p>
                                        <p style="font-size:16px;line-height:1.7;">
                                            Regards,<br>
                                            KushGhar.</p>
                                                 </td></tr>
                                        </table>
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
                            <td  bgcolor="#ededed" align="left" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #757887; line-height: 16px;">Copyright &copy; 2014 <a href="<?php echo YII::app()->params['SERVER_URL'];?>" target="_blank" style="text-decoration: none;"> KushGhar</a> All Rights Reserved.
                            </td>

                        </tr>

                    </tbody></table>
                <!-- END OF FOOTER TABLE -->



               




            </td>
        </tr>
   </table><!-- END OF EMAIL WRAPPER -->


    </body></html>







