<label><abbr title="required">*</abbr>City</label> 
<select name="<?php echo $dumpcityId ?>_City" id="<?php echo $dumpcityId ?>_City" class="span12">
                    <option value="">Select City</option>
                    <?php foreach ($ModelDetails as $CityName) { ?>
                    <option  value="<?php echo $CityName['Id']; ?>"><?php echo $CityName['CityName']; ?></option>
                    <?php } ?>
</select>
<div id="<?php echo $dumpcityId ?>_City_em" class="errorMessage" style="display:none"></div>