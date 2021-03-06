<script type="text/javascript">
    function bulkuploadhandler(data){
        scrollPleaseWaitClose('inviteFriendsSpinLoader');
        if(data.status=='success'){
            $("#BulkForm_error_em_").show();
            $("#BulkForm_error_em_").removeClass('errorMessage');
            $("#BulkForm_error_em_").addClass('alert alert-success');
            $("#BulkForm_error_em_").text('Invitation(s) sent successfully.');
            $("#BulkForm_error_em_").fadeOut(6000);
            
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
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/invoice"> <i class="fa fa-list-alt"></i> Invoice Management</a></li>
                                <li><a href="/admin/payments"> <i class="fa fa-file"></i> Payments</a></li>
                                <li><a href="/settings/settingsDashboard"> <i class="fa fa-cog"></i> Settings</a></li>
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
                                
                                <div id="inviteSpinLoader"></div>
                                <div id="singleInvite">
                                <?php $inviteFriends=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'invite-friends',
                                                                'enableClientValidation'=>true,
                                                                //'action'=>Yii::app()->createUrl('user/invite'),
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                )); ?>
                                <?php echo $inviteFriends->hiddenField($inviteModel, 'City'); ?>
                                <?php echo $inviteFriends->hiddenField($inviteModel, 'Location'); ?>                        
                                <?php echo $inviteFriends->error($inviteModel, 'error'); ?>
                                <?php echo $inviteFriends->hiddenField($inviteModel,'InviteType', array('value'=>'0')); ?>
                                <?php echo $inviteFriends->hiddenField($inviteModel,'Referrer',array('value'=>$this->session['email'])); ?>
                                <div class='row-fluid'>
                                    <div class='span6'>
                                        <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> First Name'); ?>
                                        <?php echo $inviteFriends->textField($inviteModel,'FirstName', array( 'class'=>'span12', 'maxLength' => 50)); ?>
                                        <?php echo $inviteFriends->error($inviteModel,'FirstName'); ?>
                                    </div>
                                    <div class='span6'>
                                        <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> Last Name'); ?>
                                        <?php echo $inviteFriends->textField($inviteModel,'LastName', array( 'class'=>'span12', 'maxLength' => 50)); ?>
                                        <?php echo $inviteFriends->error($inviteModel,'LastName'); ?>
                                    </div>                                    
                                </div>
                                <div class='row-fluid'>
                                    <div class=" span6">
                                        <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> phone'); ?>
                                        <input type="text" value="+91" disabled="disabled" style="width:40px" class="span2" />&nbsp;<?php echo $inviteFriends->textField($inviteModel,'Phone',array('class'=>'span9', 'maxLength' => 10, 'onkeypress' => 'return isNumberKey(event);')); ?>
                                        <?php echo $inviteFriends->error($inviteModel,'Phone'); ?>
                                    </div>
                                    <div class='span6'>
                                        <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> Email'); ?>
                                        <?php echo $inviteFriends->textField($inviteModel,'Email', array( 'class'=>'span12', 'maxLength' => 100)); ?>
                                        <?php echo $inviteFriends->error($inviteModel,'Email'); ?>
                                    </div>
                                </div>
                                <div class="row-fluid">    
                                    <div class=" span4">
                      <?php echo $inviteFriends->labelEx($inviteModel,'<abbr title="required">*</abbr> State'); ?>
                      <?php echo $inviteFriends->dropDownList($inviteModel, 'State', CHtml::listData($States, 'Id', 'StateName'), array('prompt'=>'Select State', 'class' => 'span12','onchange' => 'javascript:onChangeState(this.value);')); ?>
                      <?php echo $inviteFriends->error($inviteModel,'State'); ?>
                  </div>                              
                  <div class="span4" id="cityDev" style="display:block">
                      <label><abbr title="required">*</abbr> City</label>
                      <select name="City" id="City" class="span12" onchange="onChangeCity(this.value);">
                          <option value="">Select City</option>
                      </select>
                      <div id="City_em" class="errorMessage" style="display:none"></div>
                  </div>
                  <div class="span4" id="locationDev" style="display:block">
                      <label>Location</label>
                      <select name="Location" id="Location" class="span12" onchange="locationChange(this.value);">
                          <option value="">Select Location</option>
                      </select>
                      <div id="Location_em" class="errorMessage" style="display:none"></div>
                  </div>
                                </div>
                                <?php $this->endWidget(); ?>
                                <div style="text-align: right">
                                    <?php echo CHtml::Button('Invite',array('id' => 'inviteButton','class' => 'btn btn-primary','onclick'=>'inviteClick();')); ?>
                                </div>
                           </div>  
                                <div id="multiple" style="display:none;">
<!--                                    <label>
                                        Multiple Invite needs a CSV file and the functionality will be implemented as soon as possible
                                    </label>-->
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'multiple-invite',
                                    'enableClientValidation' => true,
                                    'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    ),
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                ));?><fieldset>
                                    <input type="hidden" id="CsvFileName"></input>
                                  <?php $link = '<div id="schedule_download">Download sample CSV file</div>';
                                    echo CHtml::link($link, array('/admin/downloadCSVFile')); 
                                    ?><br>
                                        <?php
                                   $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                                        'id' => 'csvfile',
                                                        'config' => array(
                                                            'multiple' => false,
                                                            'action' => Yii::app()->createUrl('admin/fileUpload'),
                                                            'allowedExtensions' => array("csv"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                                            'sizeLimit' => 15 * 1024 * 1024, // maximum file size in bytes
//                                                          'minSizeLimit'=>10*1024,// minimum file size in bytes
                                                            'onComplete' => "js:function(id, fileName, responseJSON){
                                    var data = eval(responseJSON);
                                    $('#CsvFileName').val('/sampleDownloadFiles/UploadFiles/'+data.filename);
                                    uploadNow();
                                     }
                                    ",
                                                            'messages'=>array(
                                                                              'typeError'=>"Only '.{extensions}' files are allowed.",
                                                                              'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                                              'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                                              'emptyError'=>"{file} is empty, please select files again without it.",
                                                                              'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                                             ),
                                                            'showMessage' => "js:function(message){
                                                                msg='<label class=errorMessage>'+message+'</label>';
                                                             $('#ErrorMsgDiv').html(msg);
                                                            $('#ErrorMsgDiv').show();
                                                            }"
                                                        )
                                                    ));
                                   
                                                    ?>
                                   
                                    </fieldset>
                                    <div id="ErrorMsgDiv" style="display:none"></div>
                                     <?php $this->endWidget(); ?>
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
    function uploadNow(){
        scrollPleaseWait("inviteSpinLoader","invite-form");
        var data = "filename=" + $('#CsvFileName').val();
        ajaxRequest('/admin/csvUpload', data,BulkinviteMailHandler)
    }
    function BulkinviteMailHandler(data){
        scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status=='success'){
           document.getElementById('ErrorMsgDiv').style.display='block';
            $('#ErrorMsgDiv').html(data.error);
        }
    }
    function inviteClick() {
        scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#invite-friends").serialize();
         ajaxRequest('/admin/dashboard', data,inviteMailHandler)
}
function inviteMailHandler(data)
    { 
        scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status =='success'){
            $("#InviteForm_error_em_").show(1000);
                    $("#InviteForm_error_em_").removeClass('errorMessage');
                    $("#InviteForm_error_em_").addClass('alert alert-success');
                    $("#InviteForm_error_em_").text(data.error);
                    $("#InviteForm_error_em_").fadeOut(3000);
                    setTimeout(function() {
                        window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard';
                    }, 3000);
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
        
function onChangeState(val){
    var queryString="stateId="+val;
    ajaxRequest('/user/getCity',queryString,getCityHandler);
}
function getCityHandler(data){
    if(data.status=='success'){
        $("#cityDev").html(data.html);
    }
}  
function onChangeCity(obj){
    $("#InviteForm_City").val(obj);
    var queryString = 'CityId=' + obj;
    ajaxRequest('/user/getLocation', queryString, getLocationhandler);
}
function getLocationhandler(data) {
    if (data.status == 'success') {
        $("#locationDev").html(data.html);
    }
}
function locationChange(value){
    $("#InviteForm_Location").val(value);
}
</script>