<script type="text/javascript">
    function bulkuploadhandler(data){
        scrollPleaseWaitClose('inviteFriendsSpinLoader');
        if(data.status=='success'){
            $("#BulkForm_error_em_").show();
            $("#BulkForm_error_em_").removeClass('errorMessage');
            $("#BulkForm_error_em_").addClass('alert alert-success');
            $("#BulkForm_error_em_").text('Invitation(s) sent Successfully.');
            $("#BulkForm_error_em_").fadeOut(6000, "");
            
            //window.location.href='contactInfo';
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

</script>
<div class="container">
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <!--<li ><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>-->
                            <li class="active" title="Account"><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>
                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">
                                <li class="active"><a href="/admin/dashboard"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                <li><a href="/admin/manage"> <i class="fa fa-users"></i> Invite Management</a></li>
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/usermanagement"><i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"><i class="fa fa-user"></i> Vendor Management</a></li>
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
                                <table style="width:40%">
                                    <tr style="width:100%">
                                        <td style="width:50%">
                                          <input type="radio" name="inviteType" checked="checked" value="single" onchange="onSelectType(this.value);"> Single
                                        </td>
                                        <td style="width:50%">
                                           <input type="radio" name="inviteType" value="multiple" onchange="onSelectType(this.value);"> Multiple
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                
                                <div id="inviteFriendsSpinLoader"></div>
                                <div id="singleInvite">
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
                                        <input type="text" value="+91" disabled="disabled" style="width:40px" class="span2" />&nbsp;<?php echo $inviteFriends->textField($inviteModel,'Phone',array('class'=>'span9', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
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
                                <div id="multiple" style="display:none;">
                                    <label>
                                        Multiple Invite needs a CSV file and the functionality will be implemented as soon as possible
                                    </label>
                                </div>
                                </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>
<script type="text/javascript">
    function onSelectType(type)
    {
        if(type=='single')
        {
            document.getElementById('multiple').style.display='none';
            document.getElementById('singleInvite').style.display='block';
        }
        else if(type=='multiple')
        {
            document.getElementById('multiple').style.display='block';
            document.getElementById('singleInvite').style.display='none';
        }
    }
    function inviteClick() {
        scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#invite-friends").serialize();
         ajaxRequest('/admin/dashboard', data,inviteMailHandler)
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
