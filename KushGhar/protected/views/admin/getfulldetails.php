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
    <tr>
        <td width="80%">
            <table>
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
        </td>
        <td>
            <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px">
                <img style="width:150px;height:150px" src="<?php echo $userAllDetails['profilePicture'];  ?>" /></div>
        </td>
    </tr>
</table>
<table>
    <?php if($UserType=='Vendor') {?>
    <tr>
        <td>
            <label>Identity Proof</label>
            <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px">
                    <img style="width:150px;height:150px" src="<?php echo isset ($userAllDetails['proof_image_file_location'])?$userAllDetails['proof_image_file_location']:'/images/profile/none.jpg';  ?>" title="<?php echo isset ($userAllDetails['proof_image_file_location'])?$userAllDetails['proof_image_file_location']:'/images/profile/none.jpg';  ?>" onclick="popUpImageForCompound('<?php echo isset ($userAllDetails['proof_image_file_location'])?$userAllDetails['proof_image_file_location']:'/images/profile/none.jpg';  ?>')" /></div>
        </td>
        <td>
            <label>Address Proof</label>
            <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px">
                <img style="width:150px;height:150px" src="<?php echo isset ($userAllDetails['address_image_file_location'])?$userAllDetails['address_image_file_location']:'/images/profile/none.jpg';  ?>" title="<?php echo isset ($userAllDetails['address_image_file_location'])?$userAllDetails['address_image_file_location']:'/images/profile/none.jpg';  ?>" onclick="popUpImageForCompound('<?php echo isset ($userAllDetails['address_image_file_location'])?$userAllDetails['address_image_file_location']:'/images/profile/none.jpg';  ?>')" /></div>
        </td>
        <td>
            <label>Clearance Proof</label>
            <div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px">
                <img style="width:150px;height:150px" src="<?php echo isset($userAllDetails['clearance_image_file_location'])?$userAllDetails['clearance_image_file_location']:'/images/profile/none.jpg';  ?>" title="<?php echo isset ($userAllDetails['clearance_image_file_location'])?$userAllDetails['clearance_image_file_location']:'/images/profile/none.jpg';  ?>" onclick="popUpImageForCompound('<?php echo isset ($userAllDetails['clearance_image_file_location'])?$userAllDetails['clearance_image_file_location']:'/images/profile/none.jpg';  ?>')" /></div>
        </td>
    </tr>
    <?php }?>
    </table>
<div id="overlay_content_for_ImagePopup" style="position: absolute; z-index: 999999; display: none; left: -230px; top: -85px;">
    <div style="position: relative" class="overlay_maindiv" id="overlay_maindiv">
        <div class="overlay_close" style="right:-20px;top:0px"><img src="../images/overlayclose.png" alt="Close" border="0" onclick="closeoverlay_for_ImageCompound()"></div>
        <div class="popupcontentstyle">
            <div class="search_div2">
                <center><img id="overlayImage" src="" ></center>
            </div>
 
        </div>
    </div>
</div>
<script type="text/javascript">
    function popUpImageForCompound(source){
        document.getElementById('overlayImage').src=source;
        document.getElementById('overlay_content_for_ImagePopup').style.display='block';
    }
    function closeoverlay_for_ImageCompound(){
        document.getElementById('overlay_content_for_ImagePopup').style.display='none';
    }
</script> 