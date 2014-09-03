<link href="../../../css/jRating.jquery.css" rel="stylesheet" type="text/css"/>
<script src="../../../js/jRating.jquery.js" type="text/javascript"></script>
<?php 
 $reviewForm=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'review-form',
                                                                'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); 
 echo $reviewForm->error($model, 'error',array('value'=>'Hide')); 
 echo $reviewForm->hiddenField($model,'Rating');
 echo $reviewForm->hiddenField($model,'OrderNumber', array('value'=>$OrderNumber));
 echo $reviewForm->hiddenField($model,'ServiceType',array('value'=>$ServiceType));
 echo $reviewForm->hiddenField($model,'CustID',array('value'=>$CustId));
?>
<div class="row-fluid" id="ques1">
    <div class="span12">
        <label><abbr title="required">*</abbr><b>Did our team arrive on time ? </b></label>
        <input type="radio" value="1" name="arrive_on_time" /> Yes
        <input type="radio" value="0" name="arrive_on_time"/> No
        <?php echo $reviewForm->error($model, 'arrive_on_time'); ?>
    </div>
</div><br>
<div class="row-fluid" id="ques2">
    <div class="span12">
        <label><abbr title="required">*</abbr><b>Did our team members have professional appearance ?</b></label>
        <input type="radio" value="1" name="professional_appearance" /> Yes
        <input type="radio" value="0" name="professional_appearance" /> No
        <?php echo $reviewForm->error($model, 'professional_appearance'); ?>
    </div>
</div><br>
<div class="row-fluid" id="ques3">
    <div class="span12">
        <label><abbr title="required">*</abbr><b>How would you rate us ?</b></label>
        <table class="table_feedback">
            <tr><th></th><th>Excellent</th><th>Good</th><th>Fair</th><th>Poor</th></tr>
            <tr><td style="text-align: left;">Office Staff</td><td><input type="radio" value="Excellent" name="officeStaff"/></td><td><input type="radio" value="Good" name="officeStaff"/></td><td><input type="radio" value="Fair" name="officeStaff"/></td><td><input type="radio" value="Poor" name="officeStaff"/></td></tr>
            <tr><td style="text-align: left;">Home Service</td><td><input type="radio" value="Excellent" name="homeService"/></td><td><input type="radio" value="Good" name="homeService"/></td><td><input type="radio" value="Fair" name="homeService"/></td><td><input type="radio" value="Poor" name="homeService"/></td></tr>
            <tr><td style="text-align: left;">Overall Experience</td><td><input type="radio" value="Excellent" name="overAllExp"/></td><td><input type="radio" value="Good" name="overAllExp"/></td><td><input type="radio" value="Fair" name="overAllExp"/></td><td><input type="radio" value="Poor" name="overAllExp"/></td></tr>
        </table>
        <?php echo $reviewForm->error($model, 'rate_us'); ?>
    </div>
</div><br>
<?php if($ServiceType==1){?>
<div class="row-fluid" id="Hc_ques4">
    <div class="span12">
        <label><abbr title="required">*</abbr><b>How would you rate the quality of the service you have received from KushGhar housemen ? </b></label>
        <table class="table_feedback">
            <tr><th></th><th>Excellent</th><th>Good</th><th>Fair</th><th>Poor</th></tr>
            <tr><td style="text-align: left;">Vacuuming</td><td><input type="radio" value="Excellent" name="vaccuming"/></td><td><input type="radio" value="Good" name="vaccuming"/></td><td><input type="radio" value="Fair" name="vaccuming"/></td><td><input type="radio" value="Poor" name="vaccuming"/></td></tr>
            <tr><td style="text-align: left;">Dusting</td><td><input type="radio" value="Excellent" name="dusting"/></td><td><input type="radio" value="Good" name="dusting"/></td><td><input type="radio" value="Fair" name="dusting"/></td><td><input type="radio" value="Poor" name="dusting"/></td></tr>
            <tr><td style="text-align: left;">Moping</td><td><input type="radio" value="Excellent" name="moping"/></td><td><input type="radio" value="Good" name="moping"/></td><td><input type="radio" value="Fair" name="moping"/></td><td><input type="radio" value="Poor" name="moping"/></td></tr>
            <tr><td style="text-align: left;">Trash Disposal</td><td><input type="radio" value="Excellent" name="trash"/></td><td><input type="radio" value="Good" name="trash"/></td><td><input type="radio" value="Fair" name="trash"/></td><td><input type="radio" value="Poor" name="trash"/></td></tr>
            <tr><td style="text-align: left;">Additional services(If Any)</td><td><input type="radio" value="Excellent" name="aservices"/></td><td><input type="radio" value="Good" name="aservices"/></td><td><input type="radio" value="Fair" name="aservices"/></td><td><input type="radio" value="Poor" name="aservices"/></td></tr>
        </table>
        <?php echo $reviewForm->error($model, 'quality_of_service'); ?>
    </div>
</div>
<?php }?>
<br>
    <div class="row-fluid" id="ques5">
        <div class=" span2">
            <?php echo $reviewForm->label($model, '<b> Rating</b>'); ?></div>
        <div class="span6">
            <div class="input select rating-f">
            <select id="Rating1" name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
            <?php // echo $reviewForm->error($model, 'Rating'); ?>
        </div>
    </div>
<br>
    <div class="row-fluid" id="ques6">
        <div class=" span12">
            <label><abbr title="required">*</abbr><b> Suggestions / Complaints (Your feedback will help us to identify areas we need to improve as well as letting us know what else you expect from us for better service. Your feedback really does count!)</b></label>
            <?php echo $reviewForm->textArea($model,'Feedback',array('maxlength' => 250, 'class' => 'span12')); ?>
            <?php echo $reviewForm->error($model, 'Feedback'); ?>
        </div>
    </div>
<div class="row-fluid" id="ques7">
        <div class=" span12">
            <input type="checkbox" id="chkDisclaimer">&nbsp;&nbsp;&nbsp;<u><b>Disclaimer </b></u><b>:</b>
            I have checked and confirmed that there are no losses / damages during House cleaning done by KushGhar Team.
            <?php echo $reviewForm->error($model, 'Disclaimer'); ?>
            
        </div>
    </div>
 <?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'save','class' => 'btn btn-primary','onclick'=>'save();')); ?>
         </div>
<script type="text/javascript">
    var value1=-1;var value2=-1;var value3a=-1;var value3b=-1;var value3c=-1;
    var value4a=-1;var value4b=-1;var value4c=-1;var value4d=-1;var value4e=-1;
    function save(){
        if(validate()){
         scrollPleaseWait("inviteSpinLoader","invite-form");
         var data = $("#review-form").serialize();
         ajaxRequest('/user/orderreviewsave', data, reviewHandler)
        }
    }
    function reviewHandler(data)
    { 
        var sess= '<?php echo $this->session['Type']; ?>';
        if(data.status =='success'){
            $("#OrderReviewForm_error_em_").show(1000);
                    $("#OrderReviewForm_error_em_").removeClass('errorMessage');
                    $("#OrderReviewForm_error_em_").addClass('alert alert-success');
                    $("#OrderReviewForm_error_em_").text(data.error);
                    $("#OrderReviewForm_error_em_").fadeOut(3000);
                    setTimeout(function() {
                        if(sess=='Customer')
                            window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/user/order';
                        else if(sess=='Admin'){
                            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/admin/order';
                    }
                    }, 3000);  
                    
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#OrderReviewForm_error_em_").removeClass('alert alert-success');
            $("#OrderReviewForm_error_em_").addClass('errorMessage');
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
    function validate(){
    var type='<?php echo $ServiceType ?>';
    
        var ques1 = $('input[name="arrive_on_time"]');
        for (var i = 0; i < ques1.length; i++) {
            if (ques1[i].checked == true) 
                  value1=ques1[i].value;
        }
        if(value1==-1){
            $("#OrderReviewForm_arrive_on_time_em_").show();
            $("#OrderReviewForm_arrive_on_time_em_").addClass('errorMessage');
            $("#OrderReviewForm_arrive_on_time_em_").text("Please enter your feedback for the above question");
            return false;
        }
        var ques2=$('input[name="professional_appearance"]');
        for (var i = 0; i < ques2.length; i++) {
            if (ques2[i].checked == true) 
                  value2=ques2[i].value;
        }
        if(value2==-1){
            $("#OrderReviewForm_arrive_on_time_em_").hide();
            $("#OrderReviewForm_professional_appearance_em_").show();
            $("#OrderReviewForm_professional_appearance_em_").addClass('errorMessage');
            $("#OrderReviewForm_professional_appearance_em_").text("Please enter your feedback for the above question");
            return false;
        }
        var ques3a=$('input[name="officeStaff"]');
        for (var i = 0; i < ques3a.length; i++) {
            if (ques3a[i].checked == true) 
                  value3a=ques3a[i].value;
        }
        if(value3a==-1){
            $("#OrderReviewForm_professional_appearance_em_").hide();
            $("#OrderReviewForm_rate_us_em_").show();
            $("#OrderReviewForm_rate_us_em_").addClass('errorMessage');
            $("#OrderReviewForm_rate_us_em_").text("Please enter your rating for the Office Staff");
            return false;
        } 
        var ques3b=$('input[name="homeService"]');
        for (var i = 0; i < ques3b.length; i++) {
            if (ques3b[i].checked == true) 
                  value3b=ques3b[i].value;
        }
        if(value3b==-1){
            $("#OrderReviewForm_professional_appearance_em_").hide();
            $("#OrderReviewForm_rate_us_em_").show();
            $("#OrderReviewForm_rate_us_em_").addClass('errorMessage');
            $("#OrderReviewForm_rate_us_em_").text("Please enter your rating for the Home Service");
            return false;
        } 
        var ques3c=$('input[name="overAllExp"]');
        for (var i = 0; i < ques3c.length; i++) {
            if (ques3c[i].checked == true) 
                  value3c=ques3c[i].value;
        }
        if(value3c==-1){
            $("#OrderReviewForm_professional_appearance_em_").hide();
            $("#OrderReviewForm_rate_us_em_").show();
            $("#OrderReviewForm_rate_us_em_").addClass('errorMessage');
            $("#OrderReviewForm_rate_us_em_").text("Please enter your rating for the Overall Experience");
            return false;
        } 
       if(type==1){
        var ques4a=$('input[name="vaccuming"]');
        for (var i = 0; i < ques4a.length; i++) {
            if (ques4a[i].checked == true) 
                  value4a=ques4a[i].value;
        }
        if(value4a==-1){
            $("#OrderReviewForm_rate_us_em_").hide();
            $("#OrderReviewForm_quality_of_service_em_").show();
            $("#OrderReviewForm_quality_of_service_em_").addClass('errorMessage');
            $("#OrderReviewForm_quality_of_service_em_").text("Please enter your rating for the Vaccuming");
            return false;
        } 
        var ques4b=$('input[name="dusting"]');
        for (var i = 0; i < ques4b.length; i++) {
            if (ques4b[i].checked == true) 
                  value4b=ques4b[i].value;
        }
        if(value4b==-1){
            $("#OrderReviewForm_rate_us_em_").hide();
            $("#OrderReviewForm_quality_of_service_em_").show();
            $("#OrderReviewForm_quality_of_service_em_").addClass('errorMessage');
            $("#OrderReviewForm_quality_of_service_em_").text("Please enter your rating for the Dusting");
            return false;
        } 
        var ques4c=$('input[name="moping"]');
        for (var i = 0; i < ques4c.length; i++) {
            if (ques4c[i].checked == true) 
                  value4c=ques4c[i].value;
        }
        if(value4c==-1){
            $("#OrderReviewForm_rate_us_em_").hide();
            $("#OrderReviewForm_quality_of_service_em_").show();
            $("#OrderReviewForm_quality_of_service_em_").addClass('errorMessage');
            $("#OrderReviewForm_quality_of_service_em_").text("Please enter your rating for the Moping");
            return false;
        } 
        var ques4d=$('input[name="trash"]');
        for (var i = 0; i < ques4d.length; i++) {
            if (ques4d[i].checked == true) 
                  value4d=ques4d[i].value;
        }
        var ques4e=$('input[name="aservices"]');
        for (var i = 0; i < ques4e.length; i++) {
            if (ques4e[i].checked == true) 
                  value4e=ques4e[i].value;
        }
        if(value4d==-1){
            $("#OrderReviewForm_rate_us_em_").hide();
            $("#OrderReviewForm_quality_of_service_em_").show();
            $("#OrderReviewForm_quality_of_service_em_").addClass('errorMessage');
            $("#OrderReviewForm_quality_of_service_em_").text("Please enter your rating for the Trash Disposal");
            return false;
        } }
        if (($('#OrderReviewForm_Feedback').val() == '')) {
            $("#OrderReviewForm_quality_of_service_em_").hide();
            $("#OrderReviewForm_rate_us_em_").hide();
            $("#OrderReviewForm_Feedback_em_").show();
            $("#OrderReviewForm_Feedback_em_").addClass('errorMessage');
            $("#OrderReviewForm_Feedback_em_").text("Please enter your Comments or Suggestions");
            if($("#OrderReviewForm_Rating").val()==''){
                $("#OrderReviewForm_Rating").val("3");
            }
            return false;
        }
        if($("#chkDisclaimer").is(':checked')!=true){
            $("#OrderReviewForm_Feedback_em_").hide();
            $("#OrderReviewForm_Disclaimer_em_").show();
            $("#OrderReviewForm_Disclaimer_em_").addClass('errorMessage');
            $("#OrderReviewForm_Disclaimer_em_").text("Please accept the Disclaimer"); 
            return false;
        }
        else
        {
            if($("#OrderReviewForm_Rating").val()==''){
                $("#OrderReviewForm_Rating").val("3");
            }
            $("#OrderReviewForm_Disclaimer_em_").hide();
            return true;
        }
    }
    $(document).ready(function() { 
        $('#Rating1').barrating({ 
            showSelectedRating:false,
            onSelect:function (value){
                $("#OrderReviewForm_Rating").val(value);
            }
        });
    });
    
</script>