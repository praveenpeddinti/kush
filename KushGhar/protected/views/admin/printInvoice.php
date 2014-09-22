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
        <div id="printInvoice">
            <div class="container">
                <section>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                        <tr>
                            <td valign="top" width="20%" bgcolor="#fffff" align="left" >
                                <img alt="KushGhar" style="float:left" src="<?php echo YII::app()->params['SERVER_URL'] ."/images/color_logo.png";?>"/>
                            </td>
                            <td bgcolor="#fffff" style="padding-left:160px" valign="center" >
                                <h2>INVOICE</h2>
                            </td>
                        </tr>
                    </table>
                    <table border="1" style="width: 100%;" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width: 60%;padding-left:5px">To,<br><?php echo $customerDetails['first_name']." ".$customerDetails['midle_name']." ".$customerDetails['last_name']; ?><br>
                                <?php echo $customerDetails['phone']; ?><br><?php echo $customerDetails->email_address; ?><br>
                                <?php echo $address."<br>".$addresslandmark;?>
                                </td>
                                <td valign="top" style="padding-left:5px;">Invoice No:  <?php echo $InvoiceDetails['InvoiceNumber'];?><br>Invoice Date:  <?php echo date("d-m-Y");?><br>Order No:  <?php echo $InvoiceDetails['OrderId'];?></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;width: 60%;padding-left:5px">
                                    <label>Service Details</label>                        
                                </td>
                                <td valign="top" style="padding-left:5px;"><label>Amount(Rs)</label></td>
                            </tr>
                            <tr style="height:250px">
                                <td valign="top" style="width: 60%;padding-left:5px">
                                    <?php if($InvoiceDetails['ServiceId']=='1'){$serviceName='House Cleaning';}
                                            if($InvoiceDetails['ServiceId']=='2'){$serviceName='Car Wash';}
                                            if($InvoiceDetails['ServiceId']=='3'){$serviceName='Stewards Services';}
                                            echo $serviceName;
                                           ?>
                                </td>
                                <td valign="top" style="padding-left:5px;"><?php echo $InvoiceDetails['Amount'];?></td>
                            </tr>
                            <tr>
                                <td style="width: 60%;padding-left:5px">
                                    <label>Gross Total</label>                        
                                </td>
                                <td valign="top" style="padding-left:5px;"><label><?php echo $InvoiceDetails['Amount'];?></label></td>
                            </tr>
                            <tr>
                                <td style="width: 60%;padding-left:5px">
                                    <label>Service Tax@0%</label>                        
                                </td>
                                <td valign="top" style="padding-left:5px;"><label>0</label></td>
                            </tr>
                            <tr>
                                <td style="text-align:right;width: 60%;padding-left:5px">
                                    <label>Grand Total Rs.</label>                        
                                </td>
                                <td valign="top" style="padding-left:5px;"><label><?php echo $InvoiceDetails['Amount'];?></label></td>
                            </tr>
                    </table>
                    <table border="0" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="5" style="border-left:1px solid #000;border-right:1px solid #000;text-align:right;padding-left:5px;">
                                    <label>for KushGhar India Private Limited.</label></td>
                            </tr>
                            
                    </table>
                    
                    
                    <table border="1" style="width: 100%" cellpadding="0" cellspacing="0">
                            <tr style="height:100px">
                                <td valign="bottom" colspan="5" style="padding-left:5px;"><label><b>*</b>
                                This is a system-generated document that does not require signature..</label></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align:center;padding-left:5px;"><label>
                                Thank you for allowing us to serve you</label></td>
                            </tr>
                            
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
        var printContent1 = document.getElementById('printInvoice').innerHTML;
        var newWin=window.open('','','width=1000,height=600,left=0,top=0,resize=no,scrollbars=yes,location=no');
        newWin.document.open();
        newWin.document.write('<!DOCTYPE html><html dir="ltr" lang="en-US"><body onload="window.print()" style="background:#fff;border:0px solid #000;margin:0;padding:0;">'+printContent1+'</div></div></body></body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},100000);
    }
</script>