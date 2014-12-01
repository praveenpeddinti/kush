<label>Location</label>
<select name="Location" id="Location" class="span12" onchange="locationChange(this.value)">
                    <option value="">Select Location</option>
                    <?php foreach ($ModelDetails as $LocationName) { ?>
                    <option  value="<?php echo $LocationName['LocationName']; ?>"><?php echo $LocationName['LocationName']; ?></option>
                    <?php } ?>
                    </select>
                    <div id="Location_em" class="errorMessage" style="display:none"></div>