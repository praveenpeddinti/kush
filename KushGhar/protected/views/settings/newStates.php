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
        <td id="state_<?php echo $row['Id'];?>"><?php echo $row['StateName']; ?></td>
        <td>            
            <input id="usermodel_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>"  type="button" value=" " class="icon_view" alt="View" title="View Cities"/>
        </td>
    </tr>
<?php }
} ?>