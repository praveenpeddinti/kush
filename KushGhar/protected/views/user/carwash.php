<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'carwash-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));?>        
<?php echo $form->hiddenField($model, 'HouseCleaning', array('value' => $HouseCleaning)); ?>
<?php echo $form->hiddenField($model, 'CarCleaning', array('value' => $CarCleaning)); ?>
<?php echo $form->hiddenField($model, 'StewardCleaning', array('value' => $StewardCleaning)); ?>
<fieldset>
    <div class="row-fluid">
        <div class=" span12">
            Car Service
        </div>
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <label>Number of Cars</label>
            <?php echo $form->textField($model, 'TotalCars', array('maxLength' => 3, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'TotalCars'); ?>
        </div>
        <div class=" span6">
            <label>&nbsp;</label>
            <a href="/site/carwash" target="_blank">Car Service Details</a>
        </div>
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <label>Company Name</label>
            <?php echo $form->textField($model, 'CompanyName', array('maxLength' => 50, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'CompanyName'); ?>
        </div>
        <div class=" span6">
            <label>License Plate Number</label>
            <?php echo $form->textField($model, 'LicenseNumber', array('maxLength' => 25, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'LicenseNumber'); ?>
        </div>                
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <label>Make of the Car</label>
            <?php echo $form->textField($model, 'MakeOfCar', array('maxLength' => 25, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'MakeOfCar'); ?>
        </div>
        <div class=" span6">
            <label>Model of the Car</label>
            <?php echo $form->textField($model, 'ModelOfCar', array('maxLength' => 25, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'ModelOfCar'); ?>
        </div>        
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <?php echo $form->label($model, 'CallMe'); ?>
            <div class="switch switch-large" id="CallMe" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'CallMe', array('id' => 'CarWashForm_CallMe')); ?>
            </div>
        </div>
        <div class=" span6">
            <?php echo $form->label($model, 'DifferentNumber'); ?>
            <div class="switch switch-large" id="DifferentNumber" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'DifferentNumber', array('id' => 'CarWashForm_DifferentNumber')); ?>
            </div>
        </div>          
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <?php echo $form->label($model, 'InteriorCleaning'); ?>
            <div class="switch switch-large" id="InteriorCleaning" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'InteriorCleaning', array('id' => 'CarWashForm_InteriorCleaning')); ?>
            </div>
        </div>
        <div class=" span6">
            <?php echo $form->label($model, 'InteriorColor'); ?>
            <?php echo $form->textField($model, 'InteriorColor', array('maxLength' => 25, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'InteriorColor'); ?>
        </div>          
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <?php echo $form->label($model, 'ExteriorCleaning'); ?>
            <div class="switch switch-large" id="ExteriorCleaning" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'ExteriorCleaning', array('id' => 'CarWashForm_ExteriorCleaning')); ?>
            </div>
        </div>
        <div class=" span6">
            <?php echo $form->label($model, 'ExteriorColor'); ?>
            <?php echo $form->textField($model, 'ExteriorColor', array('maxLength' => 25, 'class' => 'span8', 'placeholder' => '')); ?>
            <?php echo $form->error($model, 'ExteriorColor'); ?>
        </div>          
    </div>
    <div class="row-fluid">
        <div class=" span6">
            <?php echo $form->label($model, 'WaxCar'); ?>
            <div class="switch switch-large" id="WaxCar" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'WaxCar', array('id' => 'CarWashForm_WaxCar')); ?>
            </div>
        </div>
        <div class=" span6">
            <?php echo $form->label($model, 'ShampooSeats'); ?>
            <div class="switch switch-large" id="ShampooSeats" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'ShampooSeats', array('id' => 'CarWashForm_ShampooSeats')); ?>
            </div>
        </div>          
    </div>
    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> address line1'); ?>
        <?php echo $form->textField($model,'Address1',array('placeholder'=>'Address Line 1…', 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>

   </div>
    <div class=" span6">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2',array('placeholder'=>'Address Line 2…', 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    </div>

    <div class="row-fluid">
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> state'); ?>
        <?php //echo $form->textField($model,'State',array('value'=>$customerAddressDetails->address_state,'class'=>'span12')); ?>
        
        <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State', 'class' => 'span12')); ?>
        <?php echo $form->error($model,'State'); ?>
   </div>
      <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> city'); ?>
        <?php echo $form->textField($model,'City',array('maxLength' => 25, 'class'=>'span12', 'placeholder'=>'City…')); ?>
        <?php echo $form->error($model,'City'); ?>
   </div>
   <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> pin code'); ?>
        <?php echo $form->textField($model,'PinCode',array('placeholder'=>'Pin Code…', 'class'=>'span12', 'maxLength' => 6, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'PinCode'); ?>
   </div>
   </div>
   
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
                <input type="button" value="Previous" id="CarWashCleaningPrevious" class="btn btn-primary" onclick="buttonCarWashCleaningPrevious()" />
                <input type="button" value="Next" id="CarWashCleaningSubmit" class="btn btn-primary" onclick="submitCarWashCleaning()" />
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#CallMe').bootstrapSwitch();
        $('#DifferentNumber').bootstrapSwitch();
        $('#InteriorCleaning').bootstrapSwitch();
        $('#ExteriorCleaning').bootstrapSwitch();
        $('#WaxCar').bootstrapSwitch();
        $('#ShampooSeats').bootstrapSwitch();
        //$('#PostDinner').bootstrapSwitch();
        
    });
</script>