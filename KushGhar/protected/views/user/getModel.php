<label><abbr title="required">*</abbr> Model</label>
                <select name="<?php echo $RowNo; ?>_Model" id="<?php echo $RowNo; ?>_Model" class="span12">
                    <option value="">Select </option>
                    <?php foreach ($ModelDetails as $modelName) { ?>
                    <option  value="<?php echo $modelName['model_name']; ?>"><?php echo $modelName['model_name']; ?></option>
                    <?php } ?>
                    </select>
                    <div id="<?php echo $RowNo; ?>_Model_em" class="errorMessage" style="display:none"></div>
