<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                    <li class="active" title="Account"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                            <li class="" title="Services"><a href="/user/homeservice"  ><span class="KGservices"> </span></a></li>
                            <li class="" title="Payment"><a href="#" ><span class="KGpayment"> </span></a></li>
                    
                </ul>

            </div>
            <div class="sub_menu ">
            <div id="accounts" class="collapse in">
            	<div class="selected_tab">Account</div>
            	<ul class="l_menu_sub_menu">
                <!--<li>
                <div id="progressbar"></div>
                </li>-->
                                <?php
                                 if((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))){
                                     $statusClassForBasic = 'status_info2';
                                     $basicPercent = 35;
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture)) && (empty($customerDetails->birth_date))){
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 15;
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 20;
                                 }else if((empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 25;
                                 }else if((empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                 }else if((empty($customerDetails->found_kushghar_by))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                 }else {
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 10;
                                     
                                 }
                                 if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                                     
                                     $statusClassForContact = 'status_info2';
                                     $contactPercent = 35;
                                 }else if((empty($customerAddressDetails->address_line1))){
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 20;
                                 }else{
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 10;
                                 }
                                 if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year)) && (!empty($customerPaymentDetails->first_name)) && (!empty($customerPaymentDetails->last_name))&& (!empty($customerPaymentDetails->phone)) && (!empty($customerPaymentDetails->address1)) && (!empty($customerPaymentDetails->address2))){
                                     $statusClassForPayment = 'status_info2';
                                     $payPercent = 35;
                                 }else if (empty($customerPaymentDetails->address2)){
                                     $statusClassForPayment = 'status_info1';
                                     $payPercent = 20;
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                     $payPercent = 0;
                                 }
                                 ?>
                               <li><a href="homeService"> <i class="fa fa-wrench"></i> Services</a></li>
                                <li><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="#"> <i class="fa fa-credit-card"></i> Payment Info
<!--                                    <div class="<?php echo $statusClassForPayment;?>"> </div>-->
                                </a></li>
                                <li><a href="basicinfo"> <i class="fa fa-file-text-o"></i> Basic Info
<!--                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </a></li>
                                <li class="active"><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info
<!--                                    <div class="<?php echo $statusClassForContact;?>"> </div>-->
                                </a></li>
                                <li><a href="order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="invitefriends"> <i class="fa fa-users"></i> Invite Friends</a></li>
                    
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
       	<h4 class="paddingL20">Contact Information</h4>
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
          <?php echo $form->error($model, 'error',array('value'=>'Hide')); ?>
           <fieldset>
    <?php echo $form->hiddenField($model,'Id'); ?>
    <div class="row-fluid">
    <div class=" span6">

    <?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'Email',array('value'=>$customerDetails->email_address,'readOnly'=>'true', 'maxLength' => 100, 'class'=>'span12', 'placeholder'=>'Email…' )); ?>
	<?php echo $form->error($model,'Email'); ?>
    </div>
    </div>
    <div class="row-fluid">
    <div class=" span12">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> phone'); ?><input type="text" value="+91" disabled="disabled" class="span2"/>
        <?php echo $form->textField($model,'Phone',array('value'=>$customerDetails->phone, 'class'=>'span10', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'Phone'); ?>
    </div>
    <div class=" span6">
        <?php if(($customerAddressDetails->alternate_phone=='0') || (empty($customerAddressDetails->alternate_phone))){ $alternatePhone ='';}else{$alternatePhone =$customerAddressDetails->alternate_phone;}?>
        <?php echo $form->labelEx($model,'alternate Phone'); ?><input type="text" value="+91" disabled="disabled" class="span2"/>
        <?php echo $form->textField($model,'AlternatePhone',array('value'=>$alternatePhone, 'class'=>'span10', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'AlternatePhone'); ?>
    </div>
    </div>
    </div>


    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> address line1'); ?>
        <?php echo $form->textField($model,'Address1',array('value'=>$customerAddressDetails->address_line1, 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>

   </div>
    <div class=" span6">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2',array('value'=>$customerAddressDetails->address_line2, 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    </div>

    <div class="row-fluid">
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> city'); ?>
        <?php echo $form->dropDownList($model,'City', array(''=>'Select City','Hyderabad' => 'Hyderabad', 'Secunderabad'=>'Secunderabad'), array('class' => 'span12','options' => array($customerAddressDetails->address_city => array('selected' => 'selected'))));?>       
        <?php echo $form->error($model,'City'); ?>
   </div>
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> state'); ?>
        <?php //echo $form->textField($model,'State',array('value'=>$customerAddressDetails->address_state,'class'=>'span12')); ?>
        
        <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($customerAddressDetails->address_state => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $form->error($model,'State'); ?>
   </div>   
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> pin code'); ?>
        <?php echo $form->textField($model,'PinCode',array('value'=>$customerAddressDetails->address_pin_code, 'class'=>'span12', 'maxLength' => 6, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'PinCode'); ?>
   </div>
   </div>

    <div class="row-fluid">
    <div class=" span12">
        <?php $model->Landmark=$customerAddressDetails->address_landmark;?>
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> landmark'); ?>
        <?php echo $form->textArea($model,'Landmark',array('maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'Landmark'); ?>

   </div>

   </div>





   <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <?php echo CHtml::ajaxButton('Save',array('user/contactInfo'), array(
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

    $(document).ready(function() { 
        
        <?php $totalPercent = $basicPercent+$contactPercent+$payPercent;?>
        $( "#progressbar" ).progressbar({value: <?php echo $totalPercent;?>});
   });
    
    $(document).ready(function(){
        if($("#ContactInfoForm_State").val()=='')
        $("#ContactInfoForm_State").val('35');
    });
    
    function addContactInformationhandler(data){
    scrollPleaseWaitClose('contactInfoSpinLoader');
    if(data.status=='success'){
        $("#ContactInfoForm_error_em_").show(1000);
        $("#ContactInfoForm_error_em_").removeClass('errorMessage');
        $("#ContactInfoForm_error_em_").addClass('alert alert-success');
        $("#ContactInfoForm_error_em_").text("Contact Information saved successfully");
        $("#ContactInfoForm_error_em_").fadeOut(2000);
        setTimeout(function() {
            window.location.href = '#';
            //window.location.href='paymentInfo';
        }, 3000);
    }else{
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
