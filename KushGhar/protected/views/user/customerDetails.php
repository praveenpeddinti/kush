<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                	<li class="active" title="Services"><a href="#"  ><span class="KGservices"> </span></a></li>
                        <li ><a href="#" title="Payment" ><span class="KGpayment"> </span></a></li>
                        <li ><a href="#" title="Account" ><span class="KGaccounts"> </span></a></li>
                </ul>

            </div>
            <div class="sub_menu ">
            <div id="accounts" class="collapse in">
            	<div class="selected_tab">Account</div>
            	<ul class="l_menu_sub_menu">
                	<li><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                    <li class="active"><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info1"> </div></li>
                    <li ><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                </ul>
            </div>
            <div id="payment" class="collapse">
            	<div class="selected_tab">payment</div>
            	<ul class="l_menu_sub_menu">
                	<li class="active"><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                    <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                    <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                </ul>
            </div>
            <div id="services" class="collapse">
            	<div class="selected_tab">services</div>
            	<ul class="l_menu_sub_menu">
                	<li class="active"><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                    <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                    <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                </ul>
            </div>
            </div>
        </div>
    </aside>
    <article>
     <div class="row-fluid">
       <div class="span12">
       	<h4>Customer Information</h4>
       <hr>
       <div class="paddinground">
       	  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customerDetails-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        //'action'=>"/user/basicinfo"
)); ?><?php echo $form->error($model, 'error'); ?>
           <fieldset>
    <?php //echo $form->hiddenField($model,'Id'); ?>
    <h5>Basic information</h5>
    <div class="row-fluid">
    <div class=" span4">
        <?php echo $form->label($model, '<abbr title="required">*</abbr> first name'); ?>
        <?php echo $form->textField($model, 'FirstName', array('value'=>$customerDetails->first_name, 'class' => 'span12', 'placeholder' => 'First Name…')); ?>
        <?php echo $form->error($model, 'FirstName'); ?>
    </div>
    <div class=" span4">
        <?php echo $form->label($model, 'middle name'); ?>
        <?php echo $form->textField($model, 'MiddleName', array('value'=>$customerDetails->middle_name, 'class' => 'span12', 'placeholder' => 'Middle Name…')); ?>
        <?php echo $form->error($model, 'MiddleName'); ?>
    </div>
    <div class=" span4">
        <?php echo $form->label($model, '<abbr title="required">*</abbr> last name'); ?>
        <?php echo $form->textField($model, 'LastName', array('value'=>$customerDetails->last_name, 'class' => 'span12')); ?>
        <?php echo $form->error($model, 'LastName'); ?>
    </div>
    </div>
    <div class="row-fluid">
    <div class=" span4">
        <?php echo $form->label($model, 'Gender'); ?>
        <div class="switch switch-large" id="Gender" data-on-label="Male" data-off-label="Female">
        <?php echo $form->checkBox($model, 'Gender', array('id' => 'CustomerDetailsForm_Gender')); ?>
        </div>
    </div>
    <?php if(($customerDetails->birth_date=='0000-00-00') || (empty($customerDetails->birth_date))){ $birthdata ='';}else{$birthdata =date('d-m-Y', strtotime($customerDetails->birth_date));}?>
    <div class="span4">
        <?php echo $form->label($model, 'Date of Birth'); ?>
        <?php echo $form->textField($model, 'dateOfBirth', array('value' => $birthdata, 'class' => 'span10')); ?>
        <?php echo $form->error($model, 'dateOfBirth'); ?>
    </div>
    </div>
    <h5>Contact information</h5>
    <div class="row-fluid">
    <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> email'); ?>
	<?php echo $form->textField($model,'Email',array('value'=>$customerDetails->email_address, 'class'=>'span12')); ?>
	<?php echo $form->error($model,'Email'); ?>
    </div>
    <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> phone'); ?>
        <?php echo $form->textField($model,'Phone',array('value'=>$customerDetails->phone, 'placeholder'=>'Phone Number…', 'class'=>'span12', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'Phone'); ?>
    </div>
    <div class=" span4">
        <?php echo $form->labelEx($model,'alternate Phone'); ?>
        <?php echo $form->textField($model,'AlternatePhone',array('value'=>$customerAddressDetails->alternate_phone, 'placeholder'=>'Alternative Phone Number…', 'class'=>'span12', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'AlternatePhone'); ?>
    </div>
    </div>

    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> address line1'); ?>
        <?php echo $form->textField($model,'Address1',array('value'=>$customerAddressDetails->address_line1, 'placeholder'=>'Address Line 1…', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>

   </div>
    <div class=" span6">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2',array('value'=>$customerAddressDetails->address_line2, 'placeholder'=>'Address Line 2…', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    </div>

    <div class="row-fluid">
    <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> state'); ?>
        <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($customerAddressDetails->address_state => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $form->error($model,'State'); ?>
    </div>
    <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> city'); ?>
        <?php echo $form->textField($model,'City',array('value'=>$customerAddressDetails->address_city, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'City'); ?>
   </div>
   <div class=" span4">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> pin code'); ?>
        <?php echo $form->textField($model,'PinCode',array('value'=>$customerAddressDetails->address_pin_code, 'placeholder'=>'Pin Code…', 'class'=>'span12', 'maxLength' => 6, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'PinCode'); ?>
   </div>
   </div>
   <div class="row-fluid">
   <div class=" span12">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> landmark'); ?>
        <?php echo $form->textArea($model,'Landmark',array('value'=>$customerAddressDetails->address_landmark, 'placeholder'=>'Description', 'maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'Landmark'); ?>
   </div>
   </div>
    <h5>Payment information</h5>
   <div class="row-fluid">
   <div class=" span6">
        <?php echo $form->label($model, '<abbr title="required">*</abbr> Card Type'); ?>
        <?php echo $form->dropDownList($model,'cardType', array(''=>'Select Card Type','Visa' => 'Visa', 'Master' => 'Master'), array('options' => array($customerPaymentDetails->card_type => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'cardType'); ?>
        <?php //echo $form->dropDownList($model, 'cardType', CHtml::listData(array('prompt'=>'Select Card Type','options' => ('Visa''Visa', 'Master' => 'Master')), 'Id', 'identifiability'), array('options' => array($customerPaymentDetails->card_type => array('selected' => 'selected')), 'class' => 'span12')); ?>
    </div>
   <div class=" span6">
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Card Holder Name'); ?>
	<?php echo $form->textField($model,'cardHolderName',array('value'=>$customerPaymentDetails->card_holder_name, 'placeholder'=>'Card Holder Name…','class'=>'span12')); ?>
	<?php echo $form->error($model,'cardHolderName'); ?>
    </div>
   </div>
   <div class="row-fluid">
   <div class=" span4">
       <?php
         $string = (strlen($customerPaymentDetails->card_number) == 16) ? 'XXXXXXXXXXXX'.substr($customerPaymentDetails->card_number,12,16) : $customerPaymentDetails->card_number;
         ?>
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Card Number'); ?>
        <?php echo $form->textField($model,'cardNumber',array('value'=>$string, 'placeholder'=>'Card Number…','maxlength'=>16,'onkeypress'=>'return isNumberKey(event);', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'cardNumber'); ?>
    </div>
   <div class=" span4">
        <?php $months = array();
              for( $i = 1; $i <= 12; ++$i )
              $months[ $i ] = $i;

              $current_year = date( 'Y' );
              $end_year = $current_year + 15;
              $years = array();
              for( $i = $current_year; $i <= $end_year; $i++ )
                    $years[ $i ] = $i;
              ?>

        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Expiry Date'); ?>
        <?php echo $form->dropDownList($model,'expiryMonth', $months, array('prompt'=>'Select Month',
             'options' => array($customerPaymentDetails->card_expiry_month => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'expiryMonth'); ?>
    </div>
     <div class=" span4">
         <label><abbr title="required">&nbsp;&nbsp;</abbr></label>
        <?php echo $form->dropDownList($model,'expiryYear', $years,
              array('prompt'=>'Select Year','options' => array($customerPaymentDetails->card_expiry_year => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'expiryYear'); ?>
    </div>
   </div>





   <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <?php echo CHtml::ajaxButton('Submit',array('user/customerDetails'), array(
            'type' => 'POST',
                    'dataType' => 'json',
'success' => 'function(data,status,xhr) { totalCustomerDetailshandler(data,status,xhr);}'), array('class'=>'btn btn-primary')); ?>
		
	</div>
   </div>
   </div>
    </fieldset>
    <?php $this->endWidget(); ?>

       </div>
      </div>
     </div>
    </article>
   </div>
</section>
</div>


<script type="text/javascript">
$(document).ready(function() {
       <?php if($customerDetails->customer_gender == 1){ ?>
        $('#Gender').bootstrapSwitch('setState', true);
    <?php } else {?>
        $('#Gender').bootstrapSwitch('setState', false);
    <?php } ?>
        $.datepicker.setDefaults({
            showOn: "button",
            buttonImage: "/images/calendar.gif",
            buttonImageOnly: true,
            dateFormat:"dd-mm-yy",
            changeMonth:true,
            buttonText: '',
            changeYear: true,
            changeMonth: true
        });
        document.getElementById('CustomerDetailsForm_dateOfBirth').readOnly = true;
        $("#CustomerDetailsForm_dateOfBirth").datepicker({
            yearRange: "-100:-18",
            changeMonth: true,
            changeYear:true
        });
    });

    $(document).ready(function(){
        $('#Gender').on('switch-change', function (e, data) {
            var $el = $(data.el)
            , value = data.value;
            if(value == true)
                $("#CustomerDetailsForm_Gender").val('1');
            else
                $("#CustomerDetailsForm_Gender").val('0');
        });
        $("[rel=tooltip]").tooltip();

    });




function totalCustomerDetailshandler(data){
    
    if(data.status=='success'){
     $("#CustomerDetailsForm_error_em_").show();
     $("#CustomerDetailsForm_error_em_").removeClass('errorMessage');
     $("#CustomerDetailsForm_error_em_").addClass('alert alert-success');
     $("#CustomerDetailsForm_error_em_").text('Customer Information updated successfully');
     $("#CustomerDetailsForm_error_em_").fadeOut(6000, "");
     window.location.href='basicinfo';
    }else{
        alert("No");
         var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }

            $.each(error, function(key, val) {
                if($("#"+key+"_em_")){
                    $("#"+key+"_em_").text(val);
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                }

            }); 
    }
}

function isNumberKey(evt)
  {
    var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 45 || charCode > 57 ) )
    return false;
    if (e.shiftKey) return false;
    return true;
 }



 

</script>
