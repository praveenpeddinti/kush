<?php if ($totalCount <= 0) { ?>
                                        <tr id="noRecordsTR">
                                            <td colspan="2">
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
                                        <td><?php echo 'Open'?></td>
                                        <td><center><?php echo $row['amount'];?></center></td>
                                            
                                                    </tr>
        <?php }
    //}
} ?>                                               
                                                    