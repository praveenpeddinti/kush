<?php if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="5">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
<?php
    } else {
    //if (is_object($abuseWords)) {
    foreach ($userDetails as $row) {
        $serviceName='';
    ?>
    <tr id="row_<?php echo $row['id'];?>" class="odd">
        <td><center><?php echo $row['order_number'];?></center></td>
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
                if($row['status']==3){$status='Close';}
                if($row['status']==2){$status = 'Cancel';} 
                echo $status; ?></td>
        <td><?php $datee = explode(" ",$row['service_date']);echo $datee[0];?>
        </td>
        <td style="text-align: center" id="amount_<?php echo $row['order_number']; ?>"><?php echo $row['amount'];?></td>
        <td nowrap>
            
            <?php if($row['status']==0){ ?>
                <select class="span12 action" onchange="orderAction(<?php echo $row['id']; ?>,<?php echo $row['status']; ?>,this);">
                    <option <?php if($row['status']=="0") echo "selected=\"selected\""; ?> value="Open">Open</option>
                    <option <?php if($row['status']=="1") echo "selected=\"selected\""; ?> value="Schedule">Schedule</option>
                    <option <?php if($row['status']=="2") echo "selected=\"selected\""; ?> value="Cancel">Cancel</option>
                </select>  
            <?php } else if($row['status']==1){?>
                <select class="span12 action" onchange="orderAction(<?php echo $row['id']; ?>,<?php echo $row['status']; ?>,this);">
                    <option <?php if($row['status']=="1") echo "selected=\"selected\""; ?> value="Schedule">Schedule</option>
                        <option <?php if($row['status']=="3") echo "selected=\"selected\""; ?> value="Close">Close</option>
                        <option <?php if($row['status']=="2") echo "selected=\"selected\""; ?> value="Cancel">Cancel</option>
                </select>  
            <?php } else if($row['status']==2) {?>
                <select class="span12 action" onchange="orderAction(<?php echo $row['id']; ?>,<?php echo $row['status']; ?>,this);">
                    <option <?php if($row['status']=="0") echo "selected=\"selected\""; ?> value="Open">Open</option>
                    <option <?php if($row['status']=="1") echo "selected=\"selected\""; ?> value="Schedule">Schedule</option>
                    <option <?php if($row['status']=="2") echo "selected=\"selected\""; ?> value="Cancel">Cancel</option>
                </select>  
            <?php } else if($row['status']==3){?>
                <select class="span12 action" onchange="orderAction(<?php echo $row['id']; ?>,<?php echo $row['status']; ?>,this);">
                    <option <?php if($row['status']=="3") echo "selected=\"selected\""; ?> value="Close">Close</option>
                </select> 
            <?php }?>
            <!--<input id="usera_<?php echo $row['id']; ?>" invite-id="<?php echo $row['id']; ?>" invite-status="<?php echo $row['status']; ?>"  type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_active'; if ($row['status'] == '1') echo 'icon_inactive'; if ($row['status'] == '2') echo 'icon_delete';?>" alt="Status" title="Status"/>-->
            <input id="userview_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" service-id="<?php echo $row['ServiceId']; ?>" status-id="<?php echo $row['status']; ?>" vendors="<?php echo $row['assign_vendors']; ?>" type="button" value=" " class="icon_view" alt="View" title="View"/>
            <?php if($row['status']==1 && $row['ServiceId']==1) {?>
            <i class="i_print_icon"><input id="print_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" vendors="<?php echo $row['assign_vendors']; ?>" alt="Print Order" type="button" title="Print Order"></i>
            <?php } ?>
            <?php if($row['status']==1){ ?>
            <i class="i_invoice_icon"><input id="invoice_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" cust_id="<?php echo $row['CustId']; ?>" service-id="<?php echo $row['ServiceId']; ?>" alt="Print Invoice" type="button" title="Print Invoice"></i>
            <?php }?>
            <?php if($row['status']==3) {?>
            <input id="Review_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" vendors="<?php echo $row['assign_vendors']; ?>" class="icon_edit" type="button" title="Write review on behalf of customer">
            <?php } ?>
            <?php if($row['ServiceId']==1) {?>
            <input id="UpdateOrder_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" vendors="<?php echo $row['amount']; ?>" status-id="<?php echo $row['status']; ?>" service-id="<?php echo $row['ServiceId']; ?>" class="icon__order_edit" type="button" title="Edit">
            <?php } ?>
        </td>
    </tr>
<?php }
    //}
} ?>