<?php if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="7">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
    <?php } else { foreach ($userDetails as $row) { ?>
    <tr id="row_<?php echo $row['vid'];?>" class="odd">
        <td><?php echo $row['UserName']; ?></td>
        <td><?php echo $row['email_address']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['Location']; ?></td>
        <td><?php $datee = explode(" ",$row['RegisteredOn']);echo $datee[0];?></td>
        <td id="status_<?php echo $row['vid']; ?>">
            <?php 
                if($row['status']==1){$status = 'Active';} 
                if($row['status']==0){$status = 'InActive';}
                error_log("Status==============".$status);
                echo $status; ?></td>
        <td>
            <input id="usera_<?php echo $row['vid']; ?>" data-id="<?php echo $row['vid']; ?>" invite-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_active'; if ($row['status'] == '1') echo 'icon_inactive';?>" alt="Status" title="Change Status"/>
        </td>
    </tr>
    <?php }
} ?>