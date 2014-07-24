<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                    <li class="" title="Account"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                    <li class="" title="Services"><a href="/user/homeservice"  ><span class="KGservices"> </span></a></li>
                    <li  class="active" title="Payment"><a href="/user/paymentinfo" ><span class="KGpayment"> </span></a></li>
                    
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
                                 if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                                     
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
                                <li class="active"><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info
<!--                                    <div class="<?php echo $statusClassForPayment;?>"> </div>-->
                                </a></li>
                               <li> <a href="basicinfo"> <i class="fa fa-file-text-o"></i> Basic Info
<!--                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </a></li>
                                <li><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info
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
                	<li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
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
       	<h4 class="paddingL20">Payment Information</h4>
        <hr>
        <div class="paddinground">
        <div class="row-fluid">
            <div class=" span12">
                <h4 class="paddingL20">We will contact you to schedule and complete the payment detail within the next business day.</h4>
            </div>
        </div>  
        </div>
        <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <a href="/user/homeService"><input type="button" value="Next" id="HouseCleaningSubmit" class="btn btn-primary" /></a>
		
	</div>
   </div>
   </div>
        <!--hidden start 1<div class="paddinground">
             <div id="paymentInfoSpinLoader"></div>
       	  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paymentInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        
)); ?><?php echo $form->error($model, 'error'); ?>
           <fieldset>
    
    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->label($model, '<abbr title="required">*</abbr> Card Type'); ?>
        <?php echo $form->dropDownList($model,'cardType', array(''=>'Select Card Type','Visa' => 'Visa', 'Master' => 'Master'), array('options' => array($customerPaymentDetails->card_type => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'cardType'); ?>
        <?php //echo $form->dropDownList($model, 'cardType', CHtml::listData(array('prompt'=>'Select Card Type','options' => ('Visa''Visa', 'Master' => 'Master')), 'Id', 'identifiability'), array('options' => array($customerPaymentDetails->card_type => array('selected' => 'selected')), 'class' => 'span12')); ?>
    </div>
    
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Card Holder Name'); ?>
	<?php echo $form->textField($model,'cardHolderName',array('value'=>$customerPaymentDetails->card_holder_name, 'placeholder'=>'Card Holder Name…', 'maxLength' => 50, 'class'=>'span12')); ?>
	<?php echo $form->error($model,'cardHolderName'); ?>
    </div>
        
    </div>
    <div class="row-fluid">
     <div class=" span6">
         <?php
         $string = (strlen($customerPaymentDetails->card_number) == 16) ? 'XXXXXXXXXXXX'.substr($customerPaymentDetails->card_number,12,16) : $customerPaymentDetails->card_number;
         ?>
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Card Number'); ?>
        <?php echo $form->textField($model,'cardNumber',array('value'=>$string, 'placeholder'=>'Card Number…','maxlength'=>16,'onkeypress'=>'return isNumberKey(event);', 'class'=>'span12')); ?>
        <?php echo $form->error($model,'cardNumber'); ?>
    </div>
    


    <!--<div class="row-fluid">
    <div class=" span3">
    <?php //echo $form->labelEx($model,'<abbr title="required">*</abbr> Expiry Date'); ?>
   <?php //echo $form->textField($model,'expiryMonth',array('value'=>$customerPaymentDetails->card_expiry_month, 'placeholder'=>'MM…', 'maxlength'=>2,'onkeypress'=>'return isNumberKey(event);','class'=>'span5 pull-left')); ?>
   <?php //echo $form->textField($model,'expiryYear',array('value'=>$customerPaymentDetails->card_expiry_year, 'placeholder'=>'YYYY…', 'maxlength'=>4,'onkeypress'=>'return isNumberKey(event);','class'=>'span6 pull-left')); ?>
   <?php //echo $form->error($model,'expiryMonth'); ?><?php //echo $form->error($model,'expiryYear'); ?>
    </div>-->
        
   <!--<div class=" span3">
    <?php //echo $form->labelEx($model,'<abbr title="required">*</abbr> Secure Code'); ?>
    <?php //echo $form->passwordField($model,'secureCode',array('value'=>$customerPaymentDetails->secure_code, 'placeholder'=>'Secure Code…', 'maxlength'=>4,'class'=>'span12')); ?>
    <?php //echo $form->error($model,'secureCode'); ?>
   </div>-->
        
  

    
     <!--hidden start 2<div class=" span3  m_ExpiryDate">
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
     <div class=" span3 m_ExpiryDate">
         <label><abbr title="required">&nbsp;&nbsp;</abbr></label>
        <?php echo $form->dropDownList($model,'expiryYear', $years,
              array('prompt'=>'Select Year','options' => array($customerPaymentDetails->card_expiry_year => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'expiryYear'); ?>
    </div>
 </div>
   
<div class="row-fluid">
     <div class=" span4">
         <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> First Name'); ?>
         <?php echo $form->textField($model,'FirstName',array('value'=>$customerPaymentDetails->first_name, 'placeholder'=>'First Name…','maxlength'=>50, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'FirstName'); ?>
    </div>
    <div class=" span4">
         <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Last Name'); ?>
         <?php echo $form->textField($model,'LastName',array('value'=>$customerPaymentDetails->last_name, 'placeholder'=>'Last Name…','maxlength'=>50, 'class'=>'span12')); ?>
         <?php echo $form->error($model,'LastName'); ?>
    </div>
    <div class=" span4">
         <?php if(($customerPaymentDetails->phone=='0') || (empty($customerPaymentDetails->phone))){ $Phone ='';}else{$Phone =$customerPaymentDetails->phone;}?>
         <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Phone'); ?><input type="text" value="+91" disabled="disabled" class="span2"/>
         <?php echo $form->textField($model,'Phone',array('value'=>$Phone, 'placeholder'=>'Phone…','maxlength'=>10, 'class'=>'span10')); ?>
         <?php echo $form->error($model,'Phone'); ?>
    </div>
    </div>
   <div class="row-fluid">
     <div class=" span6">
         <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Address1'); ?>
         <?php echo $form->textField($model,'Address1',array('value'=>$customerPaymentDetails->address1, 'placeholder'=>'Address1…','maxlength'=>100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>
    </div>
    <div class=" span6">
         <?php echo $form->labelEx($model,' Address2'); ?>
         <?php echo $form->textField($model,'Address2',array('value'=>$customerPaymentDetails->address2, 'placeholder'=>'Address2…','maxlength'=>100, 'class'=>'span12')); ?>
         <?php echo $form->error($model,'Address2'); ?>
    </div>
    
    </div>


   <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <?php echo CHtml::ajaxButton('Submit',array('user/paymentInfo'), array(
            'type' => 'POST',
            'dataType' => 'json',
            'beforeSend' => 'function(){
                             scrollPleaseWait("paymentInfoSpinLoader","paymentInfo-form");}',
'success' => 'function(data,status,xhr) { paymenthandler(data,status,xhr);}'), array('class'=>'btn btn-primary')); ?>
		
	</div>
   </div>
   </div>
    </fieldset>
    <?php $this->endWidget(); ?>

       </div>hidden end-->
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
        
    
function paymenthandler(data){
    scrollPleaseWaitClose('paymentInfoSpinLoader');
    if(data.status=='success'){
      $("#PaymentInfoForm_error_em_").show();
            $("#PaymentInfoForm_error_em_").removeClass('errorMessage');
            $("#PaymentInfoForm_error_em_").addClass('alert alert-success');
            $("#PaymentInfoForm_error_em_").text('Profile updated successfully');
            $("#PaymentInfoForm_error_em_").fadeOut(6000, "");
      //document.getElementById('cc').innerHTML="<div style='height:460px;'><center><h1>Profile updated successfully </h1></center></div>";
      window.location.href='basicinfo';
      //window.location.href='customerDetails';
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
