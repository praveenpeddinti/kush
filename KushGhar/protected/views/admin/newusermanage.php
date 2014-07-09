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
                                            <td><?php echo $row['email_address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['Location']; ?></td>
                                            <td id="status_<?php echo $row['cid']; ?>">
                                                <?php 
                                                if($row['status']==1){$status = 'Active';} 
                                                if($row['status']==0){$status = 'InActive';} 
                                            echo $status; ?></td>
                                            <td>
                                             <input id="usera_<?php echo $row['cid']; ?>" data-id="<?php echo $row['cid']; ?>" invite-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_active'; if ($row['status'] == '1') echo 'icon_inactive';?>" alt="Status" title="Change Status"/>
                                             <input id="userview_<?php echo $row['cid']; ?>" data-id="<?php echo $row['cid']; ?>"  type="button" value=" " class="icon_view" alt="View" title="View"/>
                                        
                                        </td>
                                          </tr>
        <?php }
    //}
} ?>