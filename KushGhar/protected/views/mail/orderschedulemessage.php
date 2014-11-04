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
                                <table width="650" cellspacing="0" cellpadding="0" border="0" bgcolor="#6CA050">
                                    <tr>
                                        <td colspan='3'>&nbsp;</td>
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
                                        <td colspan='3'>&nbsp;</td>
                                    </tr>
                                </table>
                                <!-- END OF Header Table -->
                                      
                                <!-- START OF full width Table --> 
                                <table width="650" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 10px;">
                                    <tr>
                                        <td colspan="3">Hi,</td>  
                                    </tr> 
                                    <tr>
                                        <td colspan="3">Your Order with <?php echo $orderDetails['order_number'];?> is scheduled for date <?php echo $orderDetails['service_date'];?></td>
                                    </tr>     
                                    <tr>
                                        <td colspan="3">The following vendors will visit for the service</td>
                                    </tr>
                                    <?php $vendorslist=$Vendors;
                                    $individualVendor= explode(",", $vendorslist);
                                    $count=count($individualVendor); ?>
                                    <tr>
                                    <?php for($i=0; $i<$count; $i++){ ?>  
                                        <?php $vendorDetails=$this->kushGharService->getVendorDetailsWithIndividual($individualVendor[$i]); ?>
                                        
                                        <td>
                                            <table>
                                                <tr><td><?php echo $vendorDetails['first_name'].$vendorDetails['middle_name'].$vendorDetails['last_name']; ?></td></tr>
                                                <tr><td><?php echo $vendorDetails['phone']?></td></tr>
                                                <tr><td><div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px">
                                                    <img style="width:150px;height:150px" src="<?php echo $vendorDetails['profilePicture'];  ?>" /></div></td></tr>
                                            </table>
                                           <?php if(($i+1)%3==0){ ?>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                                    <tr>
                                        <td>Pro forma Invoice</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                    <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td><b>S.No</b></td>
                                            <td><b>Service Type</b></td>
                                            <td><b>Service Date</b></td>
                                            <td><b>Amount</b></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <?php if($orderDetails['ServiceId']==1) $type="House Cleaning";
                                            if($orderDetails['ServiceId']==2) $type="Car Wash";
                                            if($orderDetails['ServiceId']==3) $type="Stewards Services";
                                            ?>
                                            <td><?php echo $type;?></td>
                                            <td><?php echo $orderDetails['service_date'];?></td>
                                            <td><?php echo $orderDetails['amount'];?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Grand total</b></td>
                                            <td><b>1500</b></td>
                                        </tr>
                                    </table>
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