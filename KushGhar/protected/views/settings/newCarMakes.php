<?php 
if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="6">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
    <?php } else { 
        foreach ($userDetails as $row) {?>
        <tr id="row_<?php echo $row['id'];?>" class="odd">
        <td><?php echo $row['make_name']; ?></td>
        <td>
            <input id="userstatus_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" invite-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_inactive'; if ($row['status'] == '1') echo 'icon_active';?>" alt="Status" title="Change Status"/>
            <input id="useredit_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"  type="button" value=" " class="icon_reinvite" alt="View" title="Edit"/>
            <input id="usermodel_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"  type="button" value=" " class="icon_view" alt="View" title="View Models"/>
        </td>
    </tr>
<?php }
} ?>