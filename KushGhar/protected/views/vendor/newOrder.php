<?php if ($totalCount <= 0) { ?> 
<tr id="noRecordsTR">
    <td colspan="6">
        <span class="text-error"> <b>No records found</b></span>
    </td>
</tr>
<?php } else {
    //if (is_object($abuseWords)) {
    foreach ($userDetails as $row) {
        $serviceName='';
?>
<tr id="row_<?php echo $row['id'];?>" class="odd">
    <td ><center><?php echo $row['order_number'];?></center></td>
    <td nowrap>
        <?php if($row['ServiceId']=='1'){$serviceName='House Cleaning';}
              if($row['ServiceId']=='2'){$serviceName='Car Wash';}
              if($row['ServiceId']=='3'){$serviceName='Stewards Services';}
              echo $serviceName;
        ?>
    </td>
    <td id="status_<?php echo $row['id']; ?>">
        <?php 
          if($row['status']==0){$status = 'Open';} 
          if($row['status']==1){$status = 'Schedule';} 
          if($row['status']==2){$status = 'Cancel';}
          if($row['status']==3){$status = 'Close';}
          echo $status; ?>
    </td>
    <td><?php  $datee = explode(" ",$row['service_date']);echo $datee[0]; ?></td>
    <td><center><?php echo $row['amount'];?></center></td>
    <td>
        <input id="userview_<?php echo $row['id']; ?>" row-id="<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" service-id="<?php echo $row['ServiceId']; ?>" status-id="<?php echo $row['status']; ?>" vendors="<?php echo $row['assign_vendors']; ?>" type="button" value=" " class="icon_view" alt="View" title="View"/>
        <?php if($row['status']==1) { ?> 
             <input id="orderClose_<?php echo $row['id']; ?>" row-id="<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" service-id="<?php echo $row['ServiceId']; ?>" status-id="<?php echo $row['status']; ?>" vendors="<?php echo $row['assign_vendors']; ?>" type="button" value=" " class="icon_inactive" alt="Close Order" title="Close Order"/>
        <?php }?>
    </td>
</tr>
<?php }
 //}
}?>                   