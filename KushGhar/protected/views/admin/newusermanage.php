<?php if ($totalCount <= 0) { ?>
                                        <tr id="noRecordsTR">
                                            <td colspan="6">
                                                <span class="text-error"> <b>No records found</b></span>
                                            </td>
                                        </tr>
                                        <?php
                                        } else {
                                        //if (is_object($abuseWords)) {
                                        foreach ($userDetails as $row) {
                                        ?>
                                        <tr id="row_<?php echo $row['cid'];?>" class="odd">
                                            <td><?php echo $row['UserName']; ?></td>
                                            <td>
                                                <span style="display: block;cursor:none" onmouseover="showTooltip(this.id,'<?echo $row['email_address'];?>')" onmouseout="showTooltipdown(this.id)">
                <?php $len= strlen($row['email_address']);
                    if($len>20){echo substr($row['email_address'],0,20).'...';}else{echo $row['email_address'];}?>
            </span><div style="display:none;width:400px" class="table_tooltip" ></div>
                                            </td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['Location']; ?></td>
                                            <td id="status_<?php echo $row['cid']; ?>">
                                                <?php 
                                                if($row['status']==1){$status = 'Active';} 
                                                if($row['status']==0){$status = 'InActive';} 
                                            echo $status; ?></td>
                                            <td>
                                             <input id="usera_<?php echo $row['cid']; ?>" data-id="<?php echo $row['cid']; ?>" invite-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_inactive'; if ($row['status'] == '1') echo 'icon_active';?>" alt="Status" title="Change Status"/>
                                             <input id="userview_<?php echo $row['cid']; ?>" data-id="<?php echo $row['cid']; ?>"  type="button" value=" " class="icon_view" alt="View" title="View"/>
                                        
                                        </td>
                                          </tr>
        <?php }
    //}
} ?>