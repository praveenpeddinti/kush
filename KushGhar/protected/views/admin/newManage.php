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
                                        <tr id="row_<?php echo $row['Id'];?>" class="odd">
                                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                            <td><?php echo $row['email_address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php $datee = explode(" ",$row['create_timestamp']);echo $datee[0]; ?></td>
                                            <td id="status_<?php echo $row['Id']; ?>">
                                                <?php 
                                                if($row['invite']==0){$status = 'Not Invited';} 
                                                if($row['invite']==1){$status = 'Invited';} 
                                                if($row['invite']==2){$status = 'Re-Invited';} 
                                            echo $status; ?></td>
                                            <td>
                                            <input id="usera_<?php echo $row['Id']; ?>" invite-id="<?php echo $row['Id']; ?>" invite-status="<?php echo $row['invite']; ?>" invite-email="<?php echo $row['email_address']; ?>" type="button" value=" " class="<? if ($row['invite'] == '0') echo 'icon_invite'; if ($row['invite'] == '1') echo 'icon_reinvite'; if ($row['invite'] == '2') echo 'icon_reinvite';?>" alt="Invite" title="Invite"/>
                                            <input id="user_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>" data-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '1') echo 'icon_delete'; ?>" alt="Delete" title="Delete"/>
                                            </td>
                                                    </tr>
        <?php }
    //}
} ?>
