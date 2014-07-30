<?php if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="6">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
    <?php } else { foreach ($userDetails as $row) { ?>
    <tr id="row_<?php echo $row['id'];?>" class="odd">
        <td><?php echo $row['UserName']; ?></td>
        <td><?php   if($row['ServiceId']==1){$type="House Cleaning";}
                    if($row['ServiceId']==2){$type="Car Wash";}
                    if($row['ServiceId']==3){$type="Stewards Services";}
            echo $type;?></td>
        <td><?php if($row['rating']==1){$url="../images/stars2.jpg";}
                  if($row['rating']==2){$url="../images/stars3.jpg";}
                  if($row['rating']==3){$url="../images/stars4.jpg";}
                  if($row['rating']==4){$url="../images/stars5.jpg";}
                  if($row['rating']==5){$url="../images/stars6.jpg";}?>
            <img src="<?php echo $url; ?>" width="80" height="20"></td>
        <td><?php echo $row['feedback']; ?></td>
    </tr>
<?php } 
 } ?>