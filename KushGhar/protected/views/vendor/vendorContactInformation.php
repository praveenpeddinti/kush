<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                    <li class="active"><a href="/vendor/vendorBasicinformation" ><span class="KGaccounts"> </span></a></li>
                            <li class=""><a href="/site/cleaning"  ><span class="KGservices"> </span></a></li>
<!--                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>-->
                </ul>

            </div>
            <div class="sub_menu ">
            <div id="accounts" class="collapse in">
            	<div class="selected_tab">Account</div>
            	<ul class="l_menu_sub_menu">
                    <?php
                                 if((!empty($getVendorDetailsType1->first_name)) && (!empty($getVendorDetailsType1->middle_name)) && (!empty($getVendorDetailsType1->last_name)) && (!empty($getVendorDetailsType1->birth_date)) && (!empty($getVendorDetailsType1->profilePicture)) && (!empty($getVendorDetailsType1->found_kushghar_by)) && (!empty($getVendorDetailsType1->website)) && (!empty($getVendorDetailsType1->pan_card)) && (!empty($getVendorDetailsType1->tin_number))){
                                     $statusClassForBasic = 'status_info2';
                                 }else{
                                     $statusClassForBasic = 'status_info1';
                                 }
                                 if((!empty($getVendorDetailsType1->email_address)) && (!empty($getVendorDetailsType1->phone)) && ($getVendorAddress->alternate_phone!=0) && (!empty($getVendorAddress->address_line1)) && (!empty($getVendorAddress->address_line2)) && (!empty($getVendorAddress->address_state)) && (!empty($getVendorAddress->address_city)) && (!empty($getVendorAddress->address_pin_code)) && (!empty($getVendorAddress->address_landmark))){

                                     $statusClassForContact = 'status_info2';
                                 }else{

                                     $statusClassForContact = 'status_info1';
                                 }
                                 /*if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year))){
                                     $statusClassForPayment = 'status_info2';
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                 }*/
                                 ?>
                                <li><a href="vendorBasicInformation"> <i class="fa fa-user"></i> Basic Info</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </li>
                                <li  class="active"><a href="vendorContactInformation"> <i class="fa fa-phone"></i> Contact Info</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForContact.'"' ?>></div>-->
                                </li>
                                <li ><a href="order"> <i class="fa fa-phone"></i> Orders</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForContact.'"' ?>></div>-->
                                   
                                </li>
              
<!--                    <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a>
                        <div class="status_info3"></div>
                    </li>-->
                </ul>
            </div>
<!--            <div id="payment" class="collapse">
            	<div class="selected_tab">payment</div>
            	<ul class="l_menu_sub_menu">
                	<li class="active"><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                    <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                    <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                </ul>
            </div>-->
            <div id="services" class="collapse">
            	<div class="selected_tab">services</div>
            	<ul class="l_menu_sub_menu">
                	<li class="active"><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                    <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
<!--                    <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>-->
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
	'id'=>'vendorContactInformation-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        //'action'=>"/user/basicinfo"
)); ?><?php echo $form->error($model, 'error'); ?>
           <fieldset>
    <?php echo $form->hiddenField($model,'Id'); ?>
    
    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> email'); ?>
	<?php echo $form->textField($model,'Email',array('value'=>$getVendorDetailsType1->email_address, 'maxLength' => 100, 'class'=>'span12')); ?>
	<?php echo $form->error($model,'Email'); ?>
    </div>
    </div>
    <div class="row-fluid">
    <div class=" span12">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> phone'); ?><input type="text" value="+91" disabled="disabled" class="span2"/>
        <?php echo $form->textField($model,'Phone',array('value'=>$getVendorDetailsType1->phone, 'class'=>'span10', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'Phone'); ?>
    </div>
    <div class=" span6">
    <?php if(($getVendorAddress->alternate_phone=='0') || (empty($getVendorAddress->alternate_phone))){ $alternatePhone ='';}else{$alternatePhone =$getVendorAddress->alternate_phone;}?>

    <?php echo $form->labelEx($model,'alternate Phone'); ?><input type="text" value="+91" disabled="disabled" class="span2"/>
    <?php echo $form->textField($model,'AlternatePhone',array('value'=>$alternatePhone, 'class'=>'span10', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
    <?php echo $form->error($model,'AlternatePhone'); ?>
    </div>
    </div>
    </div>


    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> address line1'); ?>
        <?php echo $form->textField($model,'Address1',array('value'=>$getVendorAddress->address_line1, 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address1'); ?>

   </div>
    <div class=" span6">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2',array('value'=>$getVendorAddress->address_line2, 'maxLength' => 100, 'class'=>'span12')); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    </div>
               
    <div class="row-fluid">
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> city'); ?>
        <?php echo $form->dropDownList($model,'City',array(''=>'Select City','Hyderabad' => 'Hyderabad', 'Secunderabad'=>'Secunderabad'), array('class' => 'span12','options' => array($getVendorAddress->address_city => array('selected' => 'selected'))));?>
        <?php echo $form->error($model,'City'); ?>
   </div>
    <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> state'); ?>
        <?php //echo $form->textField($model,'State',array('value'=>$customerAddressDetails->address_state,'class'=>'span12')); ?>
        <?php echo $form->dropDownList($model, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State','options' => array($getVendorAddress->address_state => array('selected' => 'selected')), 'class' => 'span12')); ?>
        <?php echo $form->error($model,'State'); ?>
   </div>
   <div class=" span4">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> pin code'); ?>
        <?php echo $form->textField($model,'PinCode',array('value'=>$getVendorAddress->address_pin_code,'class'=>'span12', 'maxLength' => 6, 'onkeypress' => 'return isNumberKey(event);')); ?>
        <?php echo $form->error($model,'PinCode'); ?>
   </div>
   </div>

    <div class="row-fluid">
    <div class=" span12">
        <?php $model->Landmark=$getVendorAddress->address_landmark;?>
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> landmark'); ?>
        <?php echo $form->textArea($model,'Landmark',array( 'maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'Landmark'); ?>

   </div>

   </div>





   <div class="row-fluid">
   <div class="span12">
    <div class="pull-right">
        <?php echo CHtml::ajaxButton('Continue',array('vendor/vendorContactInformation'), array(
            'type' => 'POST',
            'dataType' => 'json',
            //'beforeSend' => 'function(){
            //                 scrollPleaseWait("contactInfoSpinLoader","vendorContactInformation-form");}',
'success' => 'function(data,status,xhr) { addVendorContactInformationhandler(data,status,xhr);}'), array('class'=>'btn btn-primary')); ?>
		
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
function addVendorContactInformationhandler(data){
    //scrollPleaseWaitClose('contactInfoSpinLoader');
    if(data.status=='success'){
       $("#VendorContactInformationForm_error_em_").show();
            $("#VendorContactInformationForm_error_em_").removeClass('errorMessage');
            $("#VendorContactInformationForm_error_em_").addClass('alert alert-success');
            $("#VendorContactInformationForm_error_em_").text('Vendor profile updated successfully');
            $("#VendorContactInformationForm_error_em_").fadeOut(6000);
            //document.getElementById('cc').innerHTML="<div style='height:460px;'><center><h1>Profile updated successfully </h1></center></div>";
            setTimeout(function() {
	      window.location.href='vendorBasicInformation';
	    }, 3000);  

//window.location.href='paymentInfo';
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
