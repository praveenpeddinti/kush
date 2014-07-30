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
?>
    <div class="row-fluid">
        <div class=" span2">
            <?php echo $reviewForm->label($model, ' Rating'); ?></div>
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
    <div class="row-fluid">
        <div class=" span12">
            <?php echo $reviewForm->label($model, '<abbr title="required">*</abbr> Feedback/Suggestion'); ?>
            <?php echo $reviewForm->textArea($model,'Feedback',array('maxlength' => 250, 'class' => 'span12')); ?>
            <?php echo $reviewForm->error($model, 'Feedback'); ?>
        </div>
    </div>
 <?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Save',array('id' => 'save','class' => 'btn btn-primary','onclick'=>'save();')); ?>
         </div>
<script type="text/javascript">
    function save(){
        if(validate()){
         scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#review-form").serialize();
         data+= '&Rating=' + $("#OrderReviewForm_Rating").val()+'&OrderNumber='+$("#OrderReviewForm_OrderNumber").val();
         ajaxRequest('/user/orderreviewsave', data, reviewHandler)
            //alert("Save==============="+data);
        }
    }
    function reviewHandler(data)
    { 
        if(data.status =='success'){
            $("#OrderReviewForm_error_em_").show(1000);
                    $("#OrderReviewForm_error_em_").removeClass('errorMessage');
                    $("#OrderReviewForm_error_em_").addClass('alert alert-success');
                    $("#OrderReviewForm_error_em_").text(data.error);
                    $("#OrderReviewForm_error_em_").fadeOut(20000, "");
                    window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/user/order';
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
        if (($('#OrderReviewForm_Feedback').val() == '')) {
            $("#OrderReviewForm_Feedback_em_").show();
            $("#OrderReviewForm_Feedback_em_").addClass('errorMessage');
            $("#OrderReviewForm_Feedback_em_").text("Please Enter your feedback or suggestion");
            if($("#OrderReviewForm_Rating").val()==''){
                $("#OrderReviewForm_Rating").val("1");
            }
                return false;
        }
        else
        {
            if($("#OrderReviewForm_Rating").val()==''){
                $("#OrderReviewForm_Rating").val("1");
            }
            $("#OrderReviewForm_Feedback_em_").hide();
            return true;
        }
    }
    $(document).ready(function() { 
        $('#Rating1').barrating({ 
            showSelectedRating:false,
            initialRating:null,
            onSelect:function (value){
                $("#OrderReviewForm_Rating").val(value);
            }
        });
    });
    
</script>