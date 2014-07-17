<?php
$address;
 if($userAllDetails['address_line1']=='')
     $addressline1="";
 else
     $addressline1=$userAllDetails['address_line1'].", ";
 if($userAllDetails['address_line2']=='')
     $addressline2="";
 else
     $addressline2=$userAllDetails['address_line2'].", ";
 if($userAllDetails['address_city']=='')
 {
     $addresscity="";
 }
 else
     $addresscity=$userAllDetails['address_city'];
 $address=$addressline1.$addressline2.$addresscity;
?>

<table style="padding: 20px; width: 100%; ">
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Name</td><td style="vertical-align: top; width: 5%;">:</td><td style="width:75%;"><?php echo $userAllDetails['UserName']; ?></td></tr>
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Email </td><td style="vertical-align: top; width: 5%;">:</td><td style="width:75%;"><?php echo $userAllDetails['email_address']; ?></td></tr>
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Phone </td><td style="vertical-align: top; width: 5%;">:</td><td style="width:75%;"> <?php echo $userAllDetails['phone']; ?></td></tr>
        <?php if($address!='') { ?>
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Address </td><td style="vertical-align: top; width: 5%;">:</td><td style="width:75%;"> <?php echo $address; ?></td></tr>
        <?php } ?>
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Registered On </td><td style="vertical-align: top; width: 5%;">:</td><td style="width:75%;"><?php $datee = explode(" ",$userAllDetails['create_timestamp']);echo $datee[0]; ?></td></tr>
        <tr style="width:100%;"><td style="vertical-align: super; width: 20%;">Status </td><td style="vertical-align: top; width: 5%;">:</td ><td style="width:75%;">
    <?php 
        if($userAllDetails['status']==1){$status = 'Active';} 
        if($userAllDetails['status']==0){$status = 'InActive';} 
        echo $status; ?></td>
    
    </tr>
    </table>
    