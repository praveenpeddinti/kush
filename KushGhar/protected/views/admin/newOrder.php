<?php if ($totalCount <= 0) { ?>
                                        <tr id="noRecordsTR">
                                            <td colspan="4">
                                                <span class="text-error"> <b>No records found</b></span>
                                            </td>
                                        </tr>
                                        <?php
                                        } else {
                                        //if (is_object($abuseWords)) {
                                        foreach ($userDetails as $row) {
                                            $serviceName='';
                                        ?>
                                        <tr id="row_<?php echo $row['id'];?>" class="odd">
                                            <td>
                                            <?php if($row['ServiceId']=='1'){$serviceName='House Cleaning';}
                                            if($row['ServiceId']=='2'){$serviceName='Car Wash';}
                                            if($row['ServiceId']=='3'){$serviceName='Stewards Cleaning';}
                                            echo $serviceName;
                                           ?>
                                        </td>
                                        <td ><center><?php echo $row['order_number'];?></center></td>
                                        <td id="status_<?php echo $row['id']; ?>">
                                                <?php 
                                                if($row['status']==0){$status = 'Open';} 
                                                if($row['status']==1){$status = 'Schedule';} 
                                                if($row['status']==2){$status = 'Close';} 
                                            echo $status; ?></td>
                                        <td><center><?php echo $row['amount'];?></center></td>
                                        <td>
                                        <input id="usera_<?php echo $row['id']; ?>" invite-id="<?php echo $row['id']; ?>" invite-status="<?php echo $row['status']; ?>"  type="button" value=" " class="<? if ($row['status'] == '0') echo 'icon_active'; if ($row['status'] == '1') echo 'icon_inactive'; if ($row['status'] == '2') echo 'icon_delete';?>" alt="Status" title="Status"/>
                                        <!--<input id="user_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" service-id="<?php echo $row['ServiceId']; ?>" type="button" value=" " class="icon_view" alt="View" title="View"/>-->
                                        </td>
                                            
                                                    </tr>
        <?php }
    //}
} ?>                                               
                                                    