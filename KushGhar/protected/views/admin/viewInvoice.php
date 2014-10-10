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
                                            <td id="paid_<?php echo $row['id']; ?>"><?php if($row['Status']==1){$status = 'Paid';} 
                                                if($row['Status']==0){$status = 'Open';} 
                                                echo $status; ?>
                                            </td>
                                            <?php if($row['Status']=='0'){?>
                                            <td nowrap>
                                            <input id="user_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" data-status="<?php echo $row['Status']; ?>" type="button" value=" " class="icon_notinvite" alt="Paid" title="Paid"/>
                                            <i class="i_invoice_icon"><input id="invoice_<?php echo $row['id']; ?>" data-id="<?php echo $row['OrderId']; ?>" cust_id="<?php echo $row['CustId']; ?>" service-id="<?php echo $row['ServiceId']; ?>" alt="Print Invoice" type="button" title="Print Invoice"></i>
                                            </td>
                                            <?php }else {?>
                                            <td nowrap>
                                                <i class="i_invoice_icon"><input id="invoice_<?php echo $row['id']; ?>" data-id="<?php echo $row['OrderId']; ?>" cust_id="<?php echo $row['CustId']; ?>" service-id="<?php echo $row['ServiceId']; ?>" alt="Print Invoice" type="button" title="Print Invoice"></i>
                                            </td>
                                           <?php }?>
                                                    </tr>
        <?php }
    //}
} ?>
