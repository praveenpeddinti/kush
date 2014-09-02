                        <?php if ($totalCount <= 0) { ?>
                        <tr id="noRecordsTR">
                            <td colspan="6">
                                <span class="text-error"> <b>No records found</b></span>
                            </td>
                        </tr>
                        <?php } else {
                              foreach ($getServices as $row) { ?>
                        <tr id="row_<?php echo $row['CustId'];?>" class="odd">
                        <td nowrap><?php echo $row['Name']; ?></td>
                        <td><center><?php if($row['rating']==1){$url="../images/stars2.jpg";}
                            if($row['rating']==2){$url="../images/stars3.jpg";}
                            if($row['rating']==3){$url="../images/stars4.jpg";}
                            if($row['rating']==4){$url="../images/stars5.jpg";}
                            if($row['rating']==5){$url="../images/stars6.jpg";}?>
                            <img src="<?php echo $url; ?>"></center>
                        </td>
                        
                        <td style="word-break: break-all;"><?php echo $row['feedback'];?></td>
                        </tr>
                        <?php } } ?>  
                    