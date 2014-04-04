<?php if ($totalCount <= 0) { ?>
                                        <tr id="noRecordsTR" >
                                            <td colspan="2">
                                                <span class="text-error"> <b>No records found</b></span>
                                            </td>
                                        </tr>
                                        <?php
                                        } else {
                                        //if (is_object($abuseWords)) {
                                        foreach ($userDetails as $row) {
                                        ?>
                                        <tr class="odd">
                                            <td><?php echo $row['email_address']; ?></td>
                                            <td><input id="user_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>" data-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '1') echo 'icon_delete'; if ($row['status'] == '0') echo 'icon_inactive'; ?>" alt="Change Status" title="Change Status"/></td>
                                        
                                                    </tr>
        <?php }
    //}
} ?>
