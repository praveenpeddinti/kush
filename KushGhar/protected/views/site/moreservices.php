<div class="container">

    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class=""><a href="#" ><span class="KGaccounts"> </span></a></li>
                            <li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>

                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                        <div id="services" class="collapse in">
                            <div class="selected_tab">Services</div>
                            <ul class="l_menu_sub_menu">
                                <li ><a href="/site/cleaning"> Cleaning</a></li>
                                <li ><a href="/site/carwash"> Car Wash</a> </li>
                                <li ><a href="/site/stewards">  Stewards / Stewardesses</a> </li>
                                <li class="active"><a href="/site/moreservices">  More ...</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <input type="hidden" id="VV" value="<?php echo $this->session['UserType'];?>" >
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/service_banner1.jpg" class="service_banner" />
                        <div class="paddinground">
                            <h2>What services Kushghar Offer ?</h2>
                            <div class="static_page_heading"></div>
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="paddingL20">
                                        <h3>Drivers Service</h3>
                                        <ul>
                                            <li>Drive vehicles locally or out of area as needed</li>
                                            <li>Deliver vehicles to appropriate destination in a safe and courteous manner</li>
                                            <li>Perform miscellaneous job-related duties as assigned</li>
                                            <li>Follw the traffic rules</li> 
                                        </ul>   
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="dontOffer">
                                        <div class=" paddingL20">
                                            <h3 >What services Kushghar don't Offer ?</h3>
                                            <ul>
                                                <li>Lifting items weighing over 15 Kgs (including large furniture)</li>
                                                <li>Cleaning outside of windows</li>
                                                <li>Cleaning pet messes and/or heavily soiled areas</li>
                                                <li>Cleaning of mold and/or biohazardous material</li>
                                                <li>Steam cleaning</li>
                                                <li>Carpet cleaning</li>
                                                <li>Deep stain removal</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-large dropdown-toggle getstarted_button"  onclick="cleaning();">Get Started</button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<!-- Popup block Start -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
        <div class="row-fluid">
            <div class="span12">
                <center><h3>Thank you for your interest in KushGhar.</h3></center>
            </div></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span3">
                    <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/color_logo.png" alt="logo" class="logo" /></a>
                </div>
                <div class="span9">

                    <p class="t_left">In order to meet all our customers needs we are only taking people by invite at this time.We will send you an email that contains a link to register very soon.
                        <br/>If you have a friend who is a member of the KushGhar family, they can invite you today. </p>
                </div>
            </div>

        </div>



    </div>
    <div id="inviteSpinLoader"></div>
    <div class="modal-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'invite-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )
        ));
        ?>

        <?php echo $form->error($inviteModel, 'error'); ?>

        <?php echo $form->hiddenField($inviteModel, 'InviteType', array('value' => '0')); ?>
        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->label($inviteModel, '<abbr title="required">*</abbr> First Name'); ?>
                <?php echo $form->textField($inviteModel, 'FirstName', array('class' => 'span12', 'placeholder' => 'First Name…')); ?>
                <?php echo $form->error($inviteModel, 'FirstName'); ?>
            </div>
            <div class="span6">
                <?php echo $form->label($inviteModel, '<abbr title="required">*</abbr> Last Name'); ?>
                <?php echo $form->textField($inviteModel, 'LastName', array('class' => 'span12', 'placeholder' => 'Last Name…')); ?>
                <?php echo $form->error($inviteModel, 'LastName'); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php echo $form->label($inviteModel, '<abbr title="required">*</abbr> Email'); ?>
                <?php echo $form->textField($inviteModel, 'Email', array('class' => 'span12', 'placeholder' => 'Email…')); ?>
                <?php echo $form->error($inviteModel, 'Email'); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->label($inviteModel, 'Services'); ?>
                <?php echo $form->dropDownList($inviteModel, 'Services', CHtml::listData($getServices, 'Id', 'name'), array('multiple' => 'true', 'prompt' => 'Select Services ', 'options' => ''), array('class' => 'span12')); ?>                                          
                <?php echo $form->error($inviteModel, 'Services'); ?>     
            </div>
            <div class="span6">
                <?php echo $form->label($inviteModel, 'Location'); ?>
                <?php echo $form->dropDownList($inviteModel,'Location', array(''=>'Select Location','Ameerpet' => 'Ameerpet', 'Banjara Hills' => 'Banjara Hills', 'Charminar' => 'Charminar', 'Dilsukhnagar'=>'Dilsukhnagar', 'Jubilee Hills'=>'Jubilee Hills','LBNagar' => 'LBNagar', 'Punjagutta'=>'Punjagutta','SRNagar' => 'SRNagar', 'Uppal' => 'Uppal'), array('options' => '', 'class' => 'span12'));?>
                <?php echo $form->error($inviteModel,'Location'); ?> 
            </div>
        </div>


        <div style="text-align: right">
            <?php
            echo CHtml::ajaxButton('Request Invite', array('user/invite'), array(
                'type' => 'POST',
                'dataType' => 'json',
                'beforeSend' => 'function(){
                             scrollPleaseWait("inviteSpinLoader","invite-form");}',
                'success' => 'function(data,status,xhr) { inviteCustomershandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
            ?>

            <button class="btn btn-primary" onclick="homePage();">Home</button>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div><!-- Popup block End -->
<script type="text/javascript">
            function inviteCustomershandler(data){
            scrollPleaseWaitClose('inviteSpinLoader');
                    if (data.status == 'success'){//alert("success==="+data.error);
            $("#InviteForm_error_em_").show();
                    $("#InviteForm_error_em_").removeClass('errorMessage');
                    $("#InviteForm_error_em_").addClass('alert alert-success');
                    $("#InviteForm_error_em_").text(data.error);
                    $("#InviteForm_error_em_").fadeOut(6000, "");
                    window.location.href = '/';
            } else{//alert("else");alert("error==="+data.error);
            var error = [];
                    $("#InviteForm_error_em_").removeClass('alert alert-success');
                    $("#InviteForm_error_em_").addClass('errorMessage');
                    if (typeof (data.error) == 'string'){
            var error = eval("(" + data.error.toString() + ")");
            } else{
            var error = eval(data.error);
            }
            $.each(error, function(key, val) {
            if ($("#" + key + "_em_")){
            $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $("#" + key).parent().addClass('error');
            }
            });
            }
            }





    function cleaning(type){
    $("#myModal").modal({ backdrop: 'static', keyboard: false, show:false });
            if (document.getElementById('VV').value != 'inviteToEmail')
            $('#myModal').modal('show');
            else
            window.location.href =<?php echo Yii::app()->request->baseUrl; ?>'/user/registration';
    }
    function homePage(){
    window.location.href =<?php echo Yii::app()->request->baseUrl; ?>'/site/index';
    }
</script>