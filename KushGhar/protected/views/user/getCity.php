<label><abbr title="required">*</abbr>City</label>
<select name="City" id="City" class="span12" onchange="onChangeCity(this.value);">;
                    <option value="">Select City</option>
                    <?php foreach ($ModelDetails as $CityName) { ?>
                    <option  value="<?php echo $CityName['Id']; ?>"><?php echo $CityName['CityName']; ?></option>
                    <?php } ?>
                    </select>
                    <div id="City_em" class="errorMessage" style="display:none"></div>
