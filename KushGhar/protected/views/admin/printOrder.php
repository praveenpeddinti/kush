<?php
//error_log("Customer Details=========".print_r($customerDetails, true));
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
    <body style="padding: 10px">
        
        <div id="print">
            <div class="container">
                <section>
                    <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <h2 align="center">Kushghar Management Services Private Limited</h2>
                            </tr>
                            <tr>
                            <center>
                                <h3>Customer Details</h3></center>
                            </tr>
                            <tr>
                                <td style="width: 20%"><label><b>Customer Name</b></label></td>
                                <td colspan="3"><label><?php echo $customerDetails['first_name']." ".$customerDetails['midle_name']." ".$customerDetails['last_name']; ?></label></td>
                                
                            </tr>
                            <tr>
                                <td style="width: 20%"><label><b>Contact Number</b></label></td>
                                <td style="width: 30%"><label><?php echo $customerDetails['phone']; ?></label></td>
                                <td style="width: 20%"><label><b>Email ID</b></label></td>
                                <td style="width: 30%"><label><?php echo $customerDetails->email_address; ?></label></td>
                            </tr>
                            <tr>
                                <td><label><b>Address</b></label></td>
                                <td colspan="3"><label><?php echo $address."\n".$addresslandmark;?></label></td>
                            </tr>
                            <tr>
                                <td><label><b>No. of Rooms</b></label></td>
                                <td colspan="3"><table border="1" style="width:100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="width: 8%"><label><b>Living Room(s)</b> </label> </td>
                                            <td style="width: 2%"><label><?php echo $serviceDetails[0]['total_livingRooms']; ?></label></td>
                                            <td style="width: 8%"><label><b>Bed Room(s)</b> </label> </td>
                                            <td style="width: 2%"><label><?php echo $serviceDetails[0]['total_bedRooms']; ?></label></td>
                                            <td style="width: 8%"><label><b>Bath Room(s)</b> </label> </td>
                                            <td style="width: 2%"><label><?php echo $serviceDetails[0]['total_bathRooms']; ?></label></td>
                                            <td style="width: 8%"><label><b>Kitchen</b></label> </td>
                                            <td style="width: 2%"><label><?php echo $serviceDetails[0]['total_kitchens']; ?></label></td>
                                            <td style="width: 8%"><label><b>Square Feet Area</b></label> </td>
                                            <td style="width: 2%"><label><?php echo $serviceDetails[0]['squarefeets']; ?></label></td>
                                        </tr>
                                    </table></td>
                            </tr>
                    </table>
                    <center><h3>Service Schedule</h3></center>
                    <table border="1" style="width:100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width: 20%"><label><b>Service scheduled date</b></label></td>
                                <td style="width: 30%"><label><?php echo $serviceDetails[0]['houseservice_start_time']; ?></label></td>
                                <td style="width: 20%"><label><b>Service attended date</b></label></td>
                                <td style="width: 30%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><label><b>From Time</b></label></td>
                                <td>&nbsp;</td>
                                <td><label><b>To Time</b></label></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><label><b>Team members:</b></label></td>
                                <td colspan="3">
                                <?php 
                                    for($i=0;$i<sizeof($vendors);$i++)
                                    { 
                                       echo ($i+1).") ".$vendors[$i]['first_name']."     ";
                                    } 
                                ?></td>
                            </tr>
                    </table>
                    <center><h3>Service Feedback</h3></center>
                    <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="5"><label><b>(1) Did our team arrive on time?</b></label><br>
                                    (tick the box below)<br>
                                <input type="checkbox"> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox"> No</td>
                                
                            </tr>
                            <tr>
                                <td colspan="5"><label><b>(2) Did our team members have a professional appearance?</b></label><br>
                                (tick the box below)<br>
                                    <input type="checkbox"> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox"> No</td>
                            </tr>
                            <tr>
                                <td colspan="5"><label><b>(3) How would you rate us?</b></label></td>
                            </tr>
                            <tr>
                                <td style="width: 20%"></td>
                                <td style="text-align: center;width: 20%">Excellent</td>
                                <td style="text-align: center;width: 20%">Good</td>
                                <td style="text-align: center;width: 20%">Fair</td>
                                <td style="text-align: center;width: 20%">Poor</td>
                            </tr>
                            <tr>
                                <td style="width: 20%"><label>Office Staff</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td><label>Home Service</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td><label>Overall Experience</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td colspan="5"><label><b>(4) How would you rate the quality of the services you have received from Kushghar housemen?</b></label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: center;width: 20%">Excellent</td>
                                <td style="text-align: center;width: 20%">Good</td>
                                <td style="text-align: center;width: 20%">Fair</td>
                                <td style="text-align: center;width: 20%">Poor</td>
                            </tr>
                            <tr>
                                <td><label>Vacuuming</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td><label>Dusting</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td><label>Kitchen</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td><label>Bathrooms</label></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                                <td style="text-align: center;width: 20%"><input type="checkbox"/></td>
                            </tr>
                            <tr>
                                <td colspan="5"><label><b>(5) Suggestions / Complaints (Your feedback will help us to identify areas we need to improve as well as letting us know what else you expect from us for better service. Your feedback really does count!)</b></label>
                                    <br>
                                    <textarea rows="2" cols="100" ></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="5"><label><u><b>Disclaimer :</b></u></label><br>
                                I have checked and confirmed that there are no losses / damages during House cleaning done by Kushghar Team.</td>
                            </tr>
                            <tr><td colspan="5" style="text-align: right"><br>
                            <b>Signature</b></td></tr>
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
        var newWin=window.open('','','width=800,height=600,left=0,top=0,resize=no,scrollbars=yes,location=no');
        newWin.document.open();
        newWin.document.write('<!DOCTYPE html><html dir="ltr" lang="en-US"><body onload="window.print()" style="background:#fff;border:0px solid #000;margin:0;padding:0;">'+printContent1+'</div></div></body></body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},100000);
    }
</script>