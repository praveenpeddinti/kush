<?php 
if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="6">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
    <?php } else { 
        foreach ($userDetails as $row) {?>
        <tr id="row_<?php echo $row['Id'];?>" class="odd">
        <td><?php echo $row['LocationName']; ?></td>
        <td>
            <input id="userstatus_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>" invite-status="<?php echo $row['Status']; ?>" type="button" value=" " class="<? if ($row['Status'] == '0') echo 'icon_inactive'; if ($row['Status'] == '1') echo 'icon_active';?>" alt="Status" title="Change Status"/>
            <input id="useredit_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>"  type="button" value=" " class="icon_edit" alt="View" title="Edit"/>
        </td>
    </tr>
<?php }
} ?>