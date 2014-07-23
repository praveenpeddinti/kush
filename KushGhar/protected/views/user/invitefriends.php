<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active" title="Account"><a href="/user/basicinfo" ><span class="KGaccounts" > </span></a></li>
                            <li class="" title="Services"><a href="/site/cleaning"  ><span class="KGservices" > </span></a></li>
                            <li class="" title="Payment"><a href="/user/paymentinfo" ><span class="KGpayment" > </span></a></li>
                            
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            
                            <ul class="l_menu_sub_menu">
                               <!--<li>
                               <div id="progressbar"></div>
                                </li>-->
                               <a href="homeService"><li> <i class="fa fa-wrench"></i> Services</li></a>
                                <a href="priceQuote"><li> <i class="fa fa-user"></i> Price Quote</li></a>
                                <a href="paymentInfo"><li> <i class="fa fa-credit-card"></i> Payment Info
<!--                                    <div class="<?php //echo $statusClassForPayment;?>"> </div>-->
                                </li></a>
                                <a href="basicinfo"><li> <i class="fa fa-file-text-o"></i> Basic Info
<!--                                    <div class=<?php //echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </li></a>
                                <a href="contactInfo"><li> <i class="fa fa-phone"></i> Contact Info
<!--                                    <div class="<?php //echo $statusClassForContact;?>"> </div>-->
                                </li></a>
                                <a href="order"><li> <i class="fa fa-file-text"></i> Orders</li></a>
                                <a href="invitefriends"><li class="active"> <i class="fa fa-users"></i> Invite Friends</li></a>
                                                                
                            </ul>
                        </div>
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
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
                        <h4 class="paddingL20">Invite Friends</h4>
                        
                        <hr>
                        <div class="paddinground">
                            <div id="inviteSpinLoader"></div>

    <?php $inviteFriends=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'invite-friends',
                                                                'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); ?>
                                                        
                                            <?php echo $inviteFriends->error($inviteModel, 'error'); ?>
            
             <?php echo $inviteFriends->hiddenField($inviteModel,'InviteType', array('value'=>'0')); ?>
             <?php echo $inviteFriends->hiddenField($inviteModel,'Referrer',array('value'=>$this->session['email'])); ?>
             <div class='row-fluid'>
                 <div class='span4'>
                    <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> First Name'); ?>
                    <?php echo $inviteFriends->textField($inviteModel,'FirstName', array( 'class'=>'span12', 'maxLength' => 50)); ?>
                    <?php echo $inviteFriends->error($inviteModel,'FirstName'); ?>
                 </div>
                 <div class='span4'>
                    <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> Last Name'); ?>
                    <?php echo $inviteFriends->textField($inviteModel,'LastName', array( 'class'=>'span12', 'maxLength' => 50)); ?>
                    <?php echo $inviteFriends->error($inviteModel,'LastName'); ?>
                 </div>
                 <div class=" span4">
                    <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> phone'); ?>
                     <input type="text" value="+91" disabled="true" style="width:40px" class="span2" />&nbsp;<?php echo $inviteFriends->textField($inviteModel,'Phone',array('class'=>'span9', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                    <?php echo $inviteFriends->error($inviteModel,'Phone'); ?>
                    </div>
             </div>
              <div class='row-fluid'>
                 <div class='span6'>
                    <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> Email'); ?>
                    <?php echo $inviteFriends->textField($inviteModel,'Email', array( 'class'=>'span12', 'maxLength' => 100)); ?>
                    <?php echo $inviteFriends->error($inviteModel,'Email'); ?>
                 </div>
                  
                  <div class='span6'>
                    <?php echo $inviteFriends->labelEx($inviteModel,'Location'); ?>
                    <?php echo $inviteFriends->dropDownList($inviteModel,'Location', array(''=>'Select Location','AG Colony'=>'AG Colony','Ameerpet'=>'Ameerpet','Banjara Hills'=>'Banjara Hills','Begumpet'=>'Begumpet','Bharath Nagar'=>'Bharath Nagar','Chikalguda'=>'Chikalguda','Domalguda'=>'Domalguda',
                        'Gachibowli'=>'Gachibowli','Hitech City'=>'Hitech City','JNTU'=>'JNTU','Jubilee Hills'=>'Jubilee Hills','Kalyan Nagar'=>'Kalyan Nagar','Khairatabad'=>'Khairatabad','Kondapur'=>'Kondapur',
                        'KPHB'=>'KPHB','Kukatpally'=>'Kukatpally','Lingampally'=>'Lingampally','Madhapur'=>'Madhapur','Madinaguda'=>'Madinaguda','Malaysian Town Ship'=>'Malaysian Town Ship','Mehdipatnam'=>'Mehdipatnam',
                        'Miyapur'=>'Miyapur','Moosapet'=>'Moosapet','Musheerabad'=>'Musheerabad','Nizampet'=>'Nizampet','Padmarao Nagar'=>'Padmarao Nagar','Panjagutta'=>'Panjagutta','Ram Nagar'=>'Ram Nagar',
                        'Rasoolpura'=>'Rasoolpura','RTC X Roads'=>'RTC X Roads','Sanath Nagar'=>'Sanath Nagar','Tarnaka'=>'Tarnaka','Tolichowki'=>'Tolichowki','Vengal Rao Nagar'=>'Vengal Rao Nagar',
                        'Vivekananda Nagar'=>'Vivekananda Nagar','Warasiguda'=>'Warasiguda','Yousufguda'=>'Yousufguda'), array('options' => '', 'class' => 'span12'));?>
                    <?php echo $inviteFriends->error($inviteModel,'Location'); ?> 
                 </div>
              </div>
              
              
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Invite',array('id' => 'inviteButton','class' => 'btn btn-primary','onclick'=>'inviteClick();')); ?>
         </div>
                                
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
    function inviteClick() {
        $("")
        scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#invite-friends").serialize();
         ajaxRequest('/user/invitefriends',  data, inviteMailHandler)
}
function inviteMailHandler(data)
    { scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status =='success'){
            $("#InviteForm_error_em_").show(1000);
                    $("#InviteForm_error_em_").removeClass('errorMessage');
                    $("#InviteForm_error_em_").addClass('alert alert-success');
                    $("#InviteForm_error_em_").text(data.error);
                    $("#InviteForm_error_em_").fadeOut(20000, "");
                   
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#InviteForm_error_em_").removeClass('alert alert-success');
            $("#InviteForm_error_em_").addClass('errorMessage');
            if(typeof(data.error)== 'string') {

                    var error = eval("(" + data.error.toString() + ")");

                } else {

                    var error = eval(data.error);
                }


                $.each(error, function(key, val) {
                    if ($("#" + key + "_em_")) {
                        $("#"+key+"_em_").text(val);
                        $("#"+key+"_em_").show();
                        $("#"+key).parent().addClass('error');
                       
                    }

                });
            }
            
        } 

</script>