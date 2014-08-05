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
                                            $serviceName='';
                                        ?>
                                        <tr id="row_<?php echo $row['id'];?>" class="odd">
                                            <td nowrap>
                                            <?php if($row['ServiceId']=='1'){$serviceName='House Cleaning';}
                                            if($row['ServiceId']=='2'){$serviceName='Car Wash';}
                                            if($row['ServiceId']=='3'){$serviceName='Stewards Services';}
                                            echo $serviceName;
                                           ?>
                                        </td>
                                        <td ><center><?php echo $row['order_number'];?></center></td>
                                        <td id="status_<?php echo $row['id']; ?>">
                                                <?php 
                                                if($row['status']==0){$status = 'Open';} 
                                                if($row['status']==1){$status = 'Schedule';} 
                                                if($row['status']==2){$status = 'Cancel';}
                                                if($row['status']==3){$status = 'Close';}
                                            echo $status; ?></td>
                                        <td><?php  $datee = explode(" ",$row['service_date']);echo $datee[0]; ?></td>
                                        <td><center><?php echo $row['amount'];?></center></td>
                                         <td>
                                            <?php if(($row['status']==0)||($row['status']==2)) {?>
                                            <input id="reschedule_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>"  type="button" value=" " class="<? echo 'icon_reinvite';?>" alt="Re-Schedule" title="Re-Schedule"/>
                                            
                                            <input id="cancel_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>" type="button" value=" " class="<? echo 'icon_inactive'; ?>" alt="Cancel" title="Cancel"/>
                                         <?php } ?> 
                                            <?php if($row['status']==3) {?>
                                            <input id="review_<?php echo $row['id']; ?>" data-id="<?php echo $row['order_number']; ?>"  type="button" value=" " class="<? echo 'icon_reinvite';?>" alt="Review / Feedback" title="Review / Feedback"/>
                                         <?php } ?> 
                                         </td>
                                            
                                                    </tr>
        <?php }
    //}
} ?>                                               
                                                    