<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                	<li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                    <li ><a href="#" ><span class="KGpayment"> </span></a></li>
                    <li ><a href="#" ><span class="KGaccounts"> </span></a></li>
                </ul>

            </div>
            <div class="sub_menu ">
            <div id="accounts" class="collapse in">
            	<div class="selected_tab">Account</div>
            	<ul class="l_menu_sub_menu">
                <?php
                    if((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))){
                        $statusClassForBasic = 'status_info2';
                    }else{
                        $statusClassForBasic = 'status_info1';
                    }
                    if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                        $statusClassForContact = 'status_info2';
                    }else{
                        $statusClassForContact = 'status_info1';
                    }
                    if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year))){
                        $statusClassForPayment = 'status_info2';
                    }else{
                        $statusClassForPayment = 'status_info3';
                    }
                    ?>
                    <li class="active"><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a>
                        <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>
                    </li>
                    <li ><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a>
                        <div class="<?php echo $statusClassForContact;?>"> </div>
                    </li>
                    <li ><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info</a>
                        <div class="<?php echo $statusClassForPayment;?>"> </div>
                    </li>
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
       	<h4>Contact Information</h4>
       <hr>
       <div class="paddinground">
           <div id="contactInfoSpinLoader"></div>
       	  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        //'action'=>"/user/basicinfo"
)); ?>
           <fieldset>
    <?php echo $form->hiddenField($model,'Id'); ?>
    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> email'); ?>
	<?php echo $form->textField($model,'Email',array('value'=>$customerDetails->email_address, 'class'=>'span12')); ?>
	<?php echo $form->error($model,'Email'); ?>
    </div>
    </div>
    <div class="row-fluid">
    <div class=" span12">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> phone'); ?>
        <?php echo $form->textField($model,'Phone',array('value'=>$customerDetails->phone, 'placeholder'=>'Phone Number…', 'class'=>'span12', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'Phone'); ?>
    </div>
    <div class=" span6">
    <?php echo $form->labelEx($model,'alternate Phone'); ?>
        <?php echo $form->textField($model,'AlternatePhone',array('value'=>$customerAddressDetails->alternate_phone,'placeholder'=>'Alternative Phone Number…', 'class'=>'span12', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'AlternatePhone'); ?>
    </div>
    </div>
    </div>


    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> address line1'); ?>
        <?php echo $form->textField($model,'Address1',array('value'=>$customerAddressDetails->address_line1,'placeholder'=>'Address Line 1…', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>

   </div>
    <div class=" span6">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2',array('value'=>$customerAddressDetails->address_line2,'placeholder'=>'Address Line 2…', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    </div>

    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> state'); ?>
        <?php //echo $form->textField($model,'State',array('value'=>$customerAddressDetails->address_state,'class'=>'span12')); ?>
        
        <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($customerAddressDetails->address_state => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $form->error($model,'State'); ?>
   </div>
      <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> city'); ?>
        <?php echo $form->textField($model,'City',array('value'=>$customerAddressDetails->address_city, 'maxLength' => 25, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'City'); ?>
   </div>
   </div>
   <div class="row-fluid">
    <div class=" span12">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> pin code'); ?>
        <?php echo $form->textField($model,'PinCode',array('value'=>$customerAddressDetails->address_pin_code,'placeholder'=>'Pin Code…', 'class'=>'span12', 'maxLength' => 6, 'onkeypress' => 'return isNumberKey(event);')); ?>
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





   <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <?php echo CHtml::ajaxButton('Continue',array('user/contactInfo'), array(
            'type' => 'POST',
            'dataType' => 'json',
            'beforeSend' => 'function(){
                             scrollPleaseWait("contactInfoSpinLoader","contactInfo-form");}',
'success' => 'function(data,status,xhr) { addContactInformationhandler(data,status,xhr);}'), array('class'=>'btn btn-primary')); ?>
		
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
function addContactInformationhandler(data){
    scrollPleaseWaitClose('contactInfoSpinLoader');
    if(data.status=='success'){
     
window.location.href='paymentInfo';
    }else{
        //alert("No");
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
