<div class="container">
<section>
	<div class="container minHeight">
    <aside>
    	<div class="asideBG">
        	<div class="left_nav">
            	<ul class="main">
                	<li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                    <li><a href="#" ><span class="KGpayment"> </span></a></li>
                    <li ><a href="#" ><span class="KGaccounts"> </span></a></li>
                </ul>

            </div>
            <div class="sub_menu ">
            <div id="accounts" class="collapse in">
            	<div class="selected_tab">Account</div>
            	<ul class="l_menu_sub_menu">
                	<li class=""><a href="basicinfo"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info2"> </div></li>
                    <li ><a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                    <li class="active"><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
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
       	<h4>Payment Information</h4>
        <hr>
        <div class="paddinground">
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
    </div>
    <div class="row-fluid">
    <div class=" span6">
    <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Card Holder Name'); ?>
	<?php echo $form->textField($model,'cardHolderName',array('value'=>$customerPaymentDetails->card_holder_name, 'placeholder'=>'Card Holder Name…','class'=>'span12')); ?>
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
        
  
 <div class="row-fluid">
    
     <div class=" span3">
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
     <div class=" span3">
         <label><abbr title="required">&nbsp;&nbsp;</abbr></label>
        <?php echo $form->dropDownList($model,'expiryYear', $years,
              array('prompt'=>'Select Year','options' => array($customerPaymentDetails->card_expiry_year => array('selected' => 'selected')), 'class' => 'span12'));?>
        <?php echo $form->error($model,'expiryYear'); ?>
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

       </div>
      </div>
     </div>
    </article>
   </div>
</section>
</div>


<script type="text/javascript">
function paymenthandler(data){
    scrollPleaseWaitClose('paymentInsfoSpinLoader');
    if(data.status=='success'){
      //alert("Successfully registration")
      $("#PaymentInfoForm_error_em_").show();
            $("#PaymentInfoForm_error_em_").removeClass('errorMessage');
            $("#PaymentInfoForm_error_em_").addClass('alert alert-success');
            $("#PaymentInfoForm_error_em_").text('Profile updated successfully');
            $("#PaymentInfoForm_error_em_").fadeOut(6000, "");
      //document.getElementById('cc').innerHTML="<div style='height:460px;'><center><h1>Profile updated successfully </h1></center></div>";
      window.location.href='basicinfo';
      //window.location.href='customerDetails';
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
