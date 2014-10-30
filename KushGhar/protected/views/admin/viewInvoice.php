<?php if ($totalCount <= 0) { ?>
                                        <tr id="noRecordsTR">
                                            <td colspan="7">
                                                <span class="text-error"> <b>No records found</b></span>
                                            </td>
                                        </tr>
                                        <?php
                                        } else {
                                        //if (is_object($abuseWords)) {
                                        foreach ($userDetails as $row) {
                                        ?>
                                        <tr id="row_<?php echo $row['id'];?>" class="odd">
                                            <td><?php if($row['ServiceId']==1){$Type = 'House cleaning';} 
                                                if($row['ServiceId']==2){$Type = 'Car wash';}
                                                if($row['ServiceId']==3){$Type = 'Stewards';}
                                                echo $Type; ?>
                                            </td>
                                            <td><?php echo $row['OrderId']; ?></td>
                                            <td><?php echo $row['InvoiceNumber']; ?></td>
                                            <td><?php echo $row['Amount']; ?></td>
                                            <td id="paid_<?php echo $row['id']; ?>"><?php if($row['Status']==0){$status = 'Open';} 
                                                if($row['Status']==1){$status = 'Paid';} 
                                                if($row['Status']==2){$status = 'FreeService';}
                                                echo $status; ?>
                                            </td>                                
                                            <td id="user_<?php echo $row['id']; ?>">
                                                <?php if ($row['Status'] == 0) { ?>
                                                    <select class="span9 action"  onchange="statusChangeUser(<?php echo $row['id']; ?>,<?php echo $row['Status']; ?>, this);">
                                                        <option <?php if ($row['Status'] == "0") echo "selected=\"selected\""; ?> value="0">Open</option>
                                                        <option <?php if ($row['Status'] == "1") echo "selected=\"selected\""; ?> value="1">Paid</option>
                                                        <option <?php if ($row['Status'] == "2") echo "selected=\"selected\""; ?> value="2">Free Service</option>
                                                    </select>  
                                                <?php } else if ($row['Status'] == 1) { ?>
                                                    <select class="span9 action"  onchange="statusChangeUser(<?php echo $row['id']; ?>,<?php echo $row['Status']; ?>, this);">
                                                        <option <?php if ($row['Status'] == "1") echo "selected=\"selected\""; ?> value="1">Paid</option>
                                                    </select>  
                                                <?php } else if ($row['Status'] == 2) { ?>
                                                    <select class="span9 action"  onchange="statusChangeUser(<?php echo $row['id']; ?>,<?php echo $row['Status']; ?>, this);">
                                                        <option <?php if ($row['Status'] == "2") echo "selected=\"selected\""; ?> value="2">Free Service</option>
                                                    </select>  
                                                <?php } ?>
                                            <i class="i_invoice_icon"><input id="invoice_<?php echo $row['id']; ?>" data-id="<?php echo $row['OrderId']; ?>" cust_id="<?php echo $row['CustId']; ?>" service-id="<?php echo $row['ServiceId']; ?>" alt="Print Invoice" type="button" title="Print Invoice"></i>
                                            </td>
                                           </tr>
                                    <?php }
    //}
} ?>
