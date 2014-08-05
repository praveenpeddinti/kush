<?php if ($totalCount <= 0) { ?>
    <tr id="noRecordsTR">
        <td colspan="6">
            <span class="text-error"> <b>No records found</b></span>
        </td>
    </tr>
    <?php } else { foreach ($userDetails as $row) { ?>
    <tr id="row_<?php echo $row['id'];?>" class="odd">
        <td><?php echo $row['UserName']; ?></td>
        <td><?php   if($row['ServiceId']==1){$type="House Cleaning";}
                    if($row['ServiceId']==2){$type="Car Wash";}
                    if($row['ServiceId']==3){$type="Stewards Services";}
            echo $type;?></td>
        <td><?php if($row['rating']==1){$url="../images/stars2.jpg";}
                  if($row['rating']==2){$url="../images/stars3.jpg";}
                  if($row['rating']==3){$url="../images/stars4.jpg";}
                  if($row['rating']==4){$url="../images/stars5.jpg";}
                  if($row['rating']==5){$url="../images/stars6.jpg";}?>
            <img src="<?php echo $url; ?>" width="80px" height="20px"></td>
        <td>
            <span id="Comments<?echo $row['id'];?>__view"  style="display: block;cursor:none" onmouseover="showTooltip(this.id,'<?echo $row['feedback'];?>')" onmouseout="showTooltipdown(this.id)">
                <?php $len= strlen($row['feedback']);
                    if($len>=20){echo substr($row['feedback'],0,20).'...';}else{echo $row['feedback'];}?>
            </span><div style="display:none;width:400px" id="Comments<?echo $row['id'];?>__div" class="table_tooltip" ></div>
         </td>
         <td><input id="comment_<?php echo $row['id']; ?>" review-id="<?php echo $row['id']; ?>" comment-status="<?php echo $row['is_publish']; ?>" <? if ($row['is_publish'] == '1') echo 'checked';?> type="checkbox" /></td>
    </tr>
<?php } 
 } ?>