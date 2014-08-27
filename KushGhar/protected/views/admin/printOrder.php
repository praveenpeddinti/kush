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
<html>
    <body>
        <div id="print">
            <div class="container">
                <section>
                    <h3 align="center" style="padding: 0px">Kushghar Management Services Private Limited</h3>
                    <div style="text-align: center; background-color: #e5e5e5;">
                    <center><label style="padding: 0px;font-weight:bold;font-size: 18px;">Customer Details</label></center></div> 
                    <table border="1" style="width: 100%;" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width: 20%;padding-left:5px"><label><b>Customer Name</b></label></td>
                                <td colspan="3" style="padding-left:5px;"><label><?php echo $customerDetails['first_name']." ".$customerDetails['midle_name']." ".$customerDetails['last_name']; ?></label></td>
                                
                            </tr>
                            <tr>
                                <td style="width: 20%;padding-left:5px"><label><b>Contact Number</b></label></td>
                                <td style="width: 30%;padding-left:5px"><label><?php echo $customerDetails['phone']; ?></label></td>
                                <td style="width: 20%;padding-left:5px"><label><b>Email ID</b></label></td>
                                <td style="width: 30%;padding-left:5px"><label><?php echo $customerDetails->email_address; ?></label></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;"><label><b>Address</b></label></td>
                                <td colspan="3" style="padding-left:5px;"><label><?php echo $address."\n".$addresslandmark;?></label></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-left:5px;"><label><b>No. of Rooms</b></label></td>
                                <td style="padding-left:5px;"><label><b>Square Feet Area</b></label></td>
                                <td style="padding-left:5px;"><label><?php echo $serviceDetails[0]['squarefeets']; ?></label></td>
                            </tr>
                            <tr>
                               <td colspan="4"><table style="width:100%" cellpadding="0" cellspacing="0">
                                            <td style="border-right:1px solid #000;width: 8%;padding-left:5px"><label><b>Living Room(s)</b> </label> </td>
                                            <td style="border-right:1px solid #000;width: 2%;padding-left:5px"><label><?php echo $serviceDetails[0]['total_livingRooms']; ?></label></td>
                                            <td style="border-right:1px solid #000;width: 8%;padding-left:5px"><label><b>Bed Room(s)</b> </label> </td>
                                            <td style="border-right:1px solid #000;width: 2%;padding-left:5px"><label><?php echo $serviceDetails[0]['total_bedRooms']; ?></label></td>
                                            <td style="border-right:1px solid #000;width: 8%;padding-left:5px"><label><b>Bath Room(s)</b> </label> </td>
                                            <td style="border-right:1px solid #000;width: 2%;padding-left:5px"><label><?php echo $serviceDetails[0]['total_bathRooms']; ?></label></td>
                                            <td style="border-right:1px solid #000;width: 8%;padding-left:5px"><label><b>Kitchen</b></label> </td>
                                            <td style="width: 2%;padding-left:5px"><label><?php echo $serviceDetails[0]['total_kitchens']; ?></label></td>
                                        </tr>
                                    </table></td>
                            </tr>
                    </table>
                    <div style="text-align: center; background-color: #e5e5e5;"><center>
                            <label style="padding: 0px;font-weight:bold;font-size: 18px;">Service Schedule</label></center></div>
                    <table border="1" style="width:100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width: 25%;padding-left:5px"><label><b>Service scheduled date</b></label></td>
                                <td style="width: 25%;padding-left:5px"><label><?php echo $serviceDetails[0]['houseservice_start_time']; ?></label></td>
                                <td style="width: 25%;padding-left:5px;"><label><b>Order Number</b></label></td>
                                <td style="width: 25%;padding-left:5px;"><b><?php echo $OrderNumber ?></b></label></td>
                                
                            </tr>
                            <tr>
                                <td style="padding:3px;"><label><b>Service attended date</b></label></td>
                                <td >&nbsp;</td>
                                <td ><label><b>From Time</b></label></td>
                                <td><label><b>To Time</b></label></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;"><label><b>Team members:</b></label></td>
                                <td colspan="3" style="padding-left:5px;">
                                <?php 
                                    for($i=0;$i<sizeof($vendors);$i++)
                                    { 
                                       echo ($i+1).") ".$vendors[$i]['first_name']." ".$vendors[$i]['last_name']." ";
                                    } 
                                ?></td>
                            </tr>
                    </table>
                    <div style="text-align: center; background-color: #e5e5e5;">
                        <center><label style="padding: 0px;font-weight:bold;font-size: 18px;">Service Feedback</label></center></div>
                    <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><b>(1) Did our team arrive on time?</b></label>
                                    <table  cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding-top:4px"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                            <td style="padding-left:5px">Yes</td>
                                            <td style="padding-left:20px;padding-top:4px"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                            <td style="padding-left:5px">No</td>
                                        </tr>
                                    </table>
                                    </td>
                                
                            </tr>
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><b>(2) Did our team members have a professional appearance?</b></label>
                                 <table  cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding-top:4px"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                            <td style="padding-left:5px">Yes</td>
                                            <td style="padding-left:20px;padding-top:4px"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                            <td style="padding-left:5px">No</td>
                                        </tr>
                                    </table>
                            </tr>
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><b>(3) How would you rate us?</b></label></td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"></td>
                                <td style="text-align: center;width: 20%;">Excellent</td>
                                <td style="text-align: center;width: 20%;">Good</td>
                                <td style="text-align: center;width: 20%;">Fair</td>
                                <td style="text-align: center;width: 20%;">Poor</td>
                            </tr>
                            
                            <tr>
                                <td style="width: 20%;padding-left:5px">Office Staff</td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;">Home Service</td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;">Overall Experience</td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><b>(4) How would you rate the quality of the services you have received from Kushghar housemen?</b></label></td>
                            </tr>
                            <tr>
                                <td style="padding-left :5px;"></td>
                                <td style="text-align: center;width: 20%;">Excellent</td>
                                <td style="text-align: center;width: 20%;">Good</td>
                                <td style="text-align: center;width: 20%;">Fair</td>
                                <td style="text-align: center;width: 20%;">Poor</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;"><label>Vacuuming</label></td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;"><label>Dusting</label></td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;"><label>Kitchen</label></td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td style="padding-left:5px;"><label>Bathrooms</label></td>
                                 <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                                <td style="text-align: center;width: 20%;padding:6px 0 0"><span style="border:1px solid #000;display:inline-block;padding:8px;"></span></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><b>(5) Suggestions / Complaints (Your feedback will help us to identify areas we need to improve as well as letting us know what else you expect from us for better service. Your feedback really does count!)</b></label>
                                    <textarea style="width:98%;height: 100px"></textarea></td>
                            </tr>
                            </table>
                    <table border="0" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="5" style="padding-left:5px;"><label><u><b>Disclaimer</b></u><b> :</b></label>
                                I have checked and confirmed that there are no losses / damages during House cleaning done by Kushghar Team.</td>
                            </tr>
                            <tr><td colspan="5" style="text-align: right;padding:60px 15px 0 0;">
                            <b>Customer's Signature</b></td></tr>
                    </table>
                </section>
            </div>
        </div>
        <br><br>
        
    <center><input type="submit" class="btn btn-primary" value="Print" onclick="showReportPrintDivData()"/></center>
    </body>
</html>
<script type="text/javascript">
    function showReportPrintDivData()
    {
        var printContent1 = document.getElementById('print').innerHTML;
        var newWin=window.open('','','width=1000,height=600,left=0,top=0,resize=no,scrollbars=yes,location=no');
        newWin.document.open();
        newWin.document.write('<!DOCTYPE html><html dir="ltr" lang="en-US"><body onload="window.print()" style="background:#fff;border:0px solid #000;margin:0;padding:0;">'+printContent1+'</div></div></body></body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},100000);
    }
</script>