<?php 
 $rescheduleForm=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'reschedule-form',
                                                                'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); 
 echo $rescheduleForm->error($model, 'error',array('value'=>'Hide')); 
 echo $rescheduleForm->hiddenField($model,'ServiceType', array('value'=>$serviceType)); 
 echo $rescheduleForm->hiddenField($model,'OrderNumber', array('value'=>$OrderNumber));
if($serviceType == 3) {?>
    
<div class="row-fluid">
    <div class=" span12">
        <?php $model->Reason=$getserviceDetails['reason'];?>
    <?php echo $rescheduleForm->labelEx($model,'Reason'); ?>
        <?php echo $rescheduleForm->textArea($model,'Reason',array('maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $rescheduleForm->error($model,'Reason'); ?>

   </div>

   </div>
<?php } else if($serviceType==1) { ?>

<div class="row-fluid">
    <div class=" span12">
        <?php $model->Reason=$getserviceDetails['reason'];?>
    <?php echo $rescheduleForm->labelEx($model,'Reason'); ?>
        <?php echo $rescheduleForm->textArea($model,'Reason',array('maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $rescheduleForm->error($model,'Reason'); ?>

   </div>

   </div>
    <?php } else if($serviceType==2){ ?>

<div class="row-fluid">
    <div class=" span12">
        <?php $model->Reason=$getserviceDetails['reason'];?>
    <?php echo $rescheduleForm->labelEx($model,'Reason'); ?>
        <?php echo $rescheduleForm->textArea($model,'Reason',array('maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $rescheduleForm->error($model,'Reason'); ?>

   </div>

   </div>
<?php }
 $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Cancel',array('id' => 'reschedule','class' => 'btn btn-primary','onclick'=>'reschedule();')); ?>
         </div>
<script type="text/javascript">
    function reschedule(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","invite-form")
            var data = $("#reschedule-form").serialize();
            data+= '&Type=' + $("#OrderRescheduleForm_ServiceType").val()+'&OrderNumber='+$("#OrderRescheduleForm_OrderNumber").val();
            ajaxRequest('/user/ordercancelmanage', data, rescheduleHandler)
    }
    }
    function validate(){
           if (($('#OrderRescheduleForm_Reason').val() == '')) {
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter Reason");
                return false;
            }else if ( (!$("#OrderRescheduleForm_Reason").val().match(/[A-Za-z0-9\s\.\,]$/)) ) {
                
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter only alphabets, numbers, dots and space ");
                return false;
           
            }else {
                $("#OrderRescheduleForm_em_").hide();
                return true;
            }
        }
    function rescheduleHandler(data)
    {    
        if(data.status =='success'){
            $("#OrderRescheduleForm_error_em_").show(1000);
                    $("#OrderRescheduleForm_error_em_").removeClass('errorMessage');
                    $("#OrderRescheduleForm_error_em_").addClass('alert alert-success');
                    $("#OrderRescheduleForm_error_em_").text(data.error);
                    $("#OrderRescheduleForm_error_em_").fadeOut(3000);
                    setTimeout(function() {
                        $('#myModalforgot1').modal('hide');
                    }, 3000);   
        }
        if(data.status == 'error'){
            var lengthvalue=data.error.length;
            var msg=data.data;
            var error=[];
            $("#OrderRescheduleForm_error_em_").removeClass('alert alert-success');
            $("#OrderRescheduleForm_error_em_").addClass('errorMessage');
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
    function onChangeTime() {
        
        var StartTimes = $("#OrderRescheduleForm_StartTime").val();
        var EndTimes = $("#OrderRescheduleForm_EndTime").val();
       
        if ((StartTimes != '') && (EndTimes != '')){
        var first=StartTimes.split(" ");
        var STimefirst=first[1].split(":");
        if(STimefirst[1]>0&&STimefirst[1]<30){
            var smdate=first[0]+" "+STimefirst[0]+":30";
            $("#OrderRescheduleForm_StartTime").val(smdate); 
        }
        if(STimefirst[1]>30&&STimefirst[1]<60){
            var snexthr=Number(STimefirst[0])+1;
            if(snexthr==24){snexthr=00;}
            var smdate=first[0]+" "+snexthr+":00";
            $("#OrderRescheduleForm_StartTime").val(smdate); 
        }
        var SDate=first[0].split("-");
        var last=EndTimes.split(" ");
        var eTimeLast=last[1].split(":");
        if(eTimeLast[1]>0&&eTimeLast[1]<30){
            var emdate=last[0]+" "+eTimeLast[0]+":30";
            $("#OrderRescheduleForm_EndTime").val(emdate); 
        }
        if(eTimeLast[1]>30&&eTimeLast[1]<60){
            var enexthr=Number(eTimeLast[0])+1;
            if(enexthr==24){enexthr=00;}
            var emdate=last[0]+" "+enexthr+":00";
            $("#OrderRescheduleForm_EndTime").val(emdate); 
        }
        var EDate=last[0].split("-");
        var sDateFinal=SDate[2]+"/"+SDate[1]+"/"+SDate[0];
        var eDateFinal=EDate[2]+"/"+EDate[1]+"/"+EDate[0];
        var sdate=new Date(sDateFinal);
        var edate=new Date(eDateFinal);
        var scmp=sdate.getTime();
        var ecmp=edate.getTime();
        var f=new Date(SDate[2], SDate[1]-1, SDate[0], STimefirst[0], STimefirst[1], 0, 0);
        var e=new Date(EDate[2], EDate[1]-1, EDate[0], eTimeLast[0], eTimeLast[1], 0, 0);
        if(scmp > ecmp)
        {
            $("#OrderRescheduleForm_EndTime").val(StartTimes); 
            $("#OrderRescheduleForm_DurationHours").val("1");
        }
        else
        {
            var thrs=Math.abs(e - f) / 36e5;
            var thrs1=Math.round(thrs);
            $("#OrderRescheduleForm_DurationHours").val(thrs1);
        }
        if($("#OrderRescheduleForm_DurationHours").val()==0)
            $("#OrderRescheduleForm_DurationHours").val("1");
    }
    }
    $(document).ready(function() {
    $(function () {
       var date=new Date.today();
       var cyear=date.getFullYear();
       var eyear=cyear+1;
       $('#OrderRescheduleForm_ServiceStartTime').datetimepicker({
            step:30,
            format:'d-m-Y',
            minDate:date,
            formatDate:'Y/m/d',
            scrollMonth:false,
            timepicker:false,
            closeOnDateSelect:true,
            yearStart:cyear,
            defaultDate:date,
            yearEnd:eyear
        });
       $('#OrderRescheduleForm_StartTime').datetimepicker({
            format:'d-m-Y H:i',
            step:30,
            minDate:date,
            scrollMonth:false,
            defaultDate:date,
            yearStart:cyear,
            yearEnd:eyear
        });
        $('#OrderRescheduleForm_EndTime').datetimepicker({
            format:'d-m-Y H:i',
            step:30,
            yearStart:cyear,
            yearEnd:eyear,
            defaultDate:date,
            onShow:function( ct ){
                this.setOptions({
                minDate:$('#StewardCleaningForm_StartTime').val()?$('#StewardCleaningForm_StartTime').val():false
                })
            },
            scrollMonth:false,
        });
    });
});
</script>