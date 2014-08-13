<?php if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="7">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
<?php } else {foreach ($userDetails as $row) { ?>
    <tr id="row_<?php echo $row['vid'];?>" class="odd">
        <td><?php echo $row['UserName']; ?></td>
        <td>
            <span id="Comments<?echo $row['vid'];?>__view" style="display: block;cursor:none" onmouseover="showTooltip(this.id,'<?echo $row['email_address'];?>')" onmouseout="showTooltipdown(this.id)">
                <?php $len= strlen($row['email_address']);
                    if($len>20){echo substr($row['email_address'],0,20).'...';}else{echo $row['email_address'];}?>
            </span><div style="display:none;width:400px" id="Comments<?echo $row['vid'];?>__div" class="table_tooltip" ></div>
        </td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['Location']; ?></td>
        <td><?php $datee = explode(" ",$row['RegisteredOn']);echo $datee[0];?></td> 
        <td id="status_<?php echo $row['vid']; ?>">
            <?php 
                if($row['status']==1){$status = 'Active';} 
                if($row['status']==0){$status = 'InActive';}
                echo $status; ?></td>
        <td>
            <input id="usera_<?php echo $row['vid']; ?>" data-id="<?php echo $row['vid']; ?>" invite-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_inactive'; if ($row['status'] == '1') echo 'icon_active';?>" alt="Status" title="Change Status"/>
            <input id="userview_<?php echo $row['vid']; ?>" data-id="<?php echo $row['vid']; ?>"  type="button" value=" " class="icon_view" alt="View" title="View"/>
        </td>
     </tr>
   <?php }
} ?>
