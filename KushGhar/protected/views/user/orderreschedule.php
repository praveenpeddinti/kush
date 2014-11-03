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
 echo $rescheduleForm->hiddenField($model,'OrderNumber', array('value'=>$OrderNumber));?>
 <div id="inviteSpinLoader"></div>
     <?php if($serviceType == 3) {?>
    <div class="row-fluid">
        <div class=" span4">
            <?php echo $rescheduleForm->label($model, '<abbr title="required">*</abbr> Event Start Time'); ?>
            <?php echo $rescheduleForm->textField($model, 'StartTime', array('value'=>$getserviceDetails['start_time'] ,'onchange' => 'javascript:onChangeTime();', 'class' => 'span10','readonly'=>'true')); ?>
            <?php echo $rescheduleForm->error($model, 'StartTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $rescheduleForm->label($model, '<abbr title="required">*</abbr> Event End Time'); ?>
            <?php echo $rescheduleForm->textField($model, 'EndTime', array('value'=>$getserviceDetails['end_time'],'onchange' => 'javascript:onChangeTime();','class' => 'span10','readonly'=>'true')); ?>
            <?php echo $rescheduleForm->error($model, 'EndTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $rescheduleForm->label($model, 'DurationHour(s)'); ?>
            <?php echo $rescheduleForm->textField($model, 'DurationHours', array('value'=>$getserviceDetails['service_hours'],'class' => 'span4', 'readonly'=>'true')); ?>

        </div> 
        
    </div>
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
    <div class="span10">
    <label><abbr title="required">*</abbr> Service Date</label>
    <?php  echo $rescheduleForm->textField($model, 'ServiceStartTime', array('value'=>$getserviceDetails['houseservice_start_time'],'class' => 'span4','readOnly'=>'true')); ?>
    <?php echo $rescheduleForm->error($model, 'ServiceStartTime'); ?>
</div>
    </div>
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
    <div class="span10">
    <label><abbr title="required">*</abbr> Service Date</label>
    <?php  echo $rescheduleForm->textField($model, 'ServiceStartTime', array('value'=>$getserviceDetails['carservice_start_time'],'class' => 'span4','readOnly'=>'true')); ?>
    <?php echo $rescheduleForm->error($model, 'ServiceStartTime'); ?>
</div>
    </div>
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
             <?php echo CHtml::Button('Reschedule',array('id' => 'reschedule','class' => 'btn btn-primary','onclick'=>'reschedule();')); ?>
         </div>
<script type="text/javascript">
    function reschedule(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","reschedule-form");
           // $("#reschedule").attr('disabled','disabled');  
            scrollPleaseWait("inviteSpinLoader","invite-form")
            var data = $("#reschedule-form").serialize();
            data+= '&Type=' + $("#OrderRescheduleForm_ServiceType").val()+'&OrderNumber='+$("#OrderRescheduleForm_OrderNumber").val();
            ajaxRequest('/user/orderrescheduledate', data, rescheduleHandler)
    }
    }
    function validate(){
        var date=new Date;
           if(($("#OrderRescheduleForm_ServiceType").val()==1)||($("#OrderRescheduleForm_ServiceType").val()==2))
        {
            if (($('#OrderRescheduleForm_ServiceStartTime').val() == '')) {
                $("#OrderRescheduleForm_ServiceStartTime_em_").show();
                $("#OrderRescheduleForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_ServiceStartTime_em_").text("Please select Service Date");
                return false;
            }
            if($("#OrderRescheduleForm_ServiceType").val()==1)
                var prev="<?php echo isset($getserviceDetails['houseservice_start_time'])?$getserviceDetails['houseservice_start_time']:''?>";
            else
                var prev="<?php echo isset($getserviceDetails['carservice_start_time'])?$getserviceDetails['carservice_start_time']:''?>";
            var present=$('#OrderRescheduleForm_ServiceStartTime').val();

            if(prev==present){
                $("#OrderRescheduleForm_ServiceStartTime_em_").show();
                $("#OrderRescheduleForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_ServiceStartTime_em_").text("Please change Service Date and then click on Reschedule");
                return false;
            }else if (($('#OrderRescheduleForm_Reason').val() == '')) {
                $("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter Reason");
                return false;
            }
            else if ( (!$("#OrderRescheduleForm_Reason").val().match(/[A-Za-z0-9\s\.\,]$/)) ) {
                $("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter only alphabets, numbers, dots and space ");
                return false;
           
            }
            else
            {
                $("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").hide();
                return true;
            }
            var sdate=$("#OrderRescheduleForm_ServiceStartTime").val();
           var sdatee=sdate.split("-");
            var servicedate=new Date(sdatee[2],sdatee[1]-1,sdatee[0]);
            /*if(servicedate < date)
            {
                $("#OrderRescheduleForm_ServiceStartTime_em_").show();
                $("#OrderRescheduleForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_ServiceStartTime_em_").text("Service Date can only be configured post 2 days from current date ");
                return false;
            }*/
            
        }
        if(($("#OrderRescheduleForm_ServiceType").val()==3))
        {
            if (($('#OrderRescheduleForm_StartTime').val() == '')) {
                $("#OrderRescheduleForm_StartTime_em_").show();
                $("#OrderRescheduleForm_StartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_StartTime_em_").text("Please select Event Start Time");
                return false;
            }
            if (($('#OrderRescheduleForm_EndTime').val() == '')) {
                $("#OrderRescheduleForm_StartTime_em_").hide();
                $("#OrderRescheduleForm_EndTime_em_").show();
                $("#OrderRescheduleForm_EndTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_EndTime_em_").text("Please select Event End Time");
                return false;
            }
            if (($('#OrderRescheduleForm_Reason').val() == '')) {
                //$("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter Reason");
                return false;
            }
            else if ( (!$("#OrderRescheduleForm_Reason").val().match(/[A-Za-z0-9\s\.\,]$/)) ) {
                //$("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                //$("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").show();
                $("#OrderRescheduleForm_Reason_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_Reason_em_").text("Please enter only alphabets, numbers, dots and space ");
                return false;
           
            }
            var stDate = $('#OrderRescheduleForm_StartTime').val();
            var enDate = $('#OrderRescheduleForm_EndTime').val();
            var strtPrev="<?php echo isset($getserviceDetails['start_time'])?$getserviceDetails['start_time']:''?>";
            var endprev="<?php echo isset($getserviceDetails['end_time'])?$getserviceDetails['end_time']:''?>";
             var stDateres1 = stDate.split(" ");
            var enDateres1 = enDate.split(" ");
           var sTime = stDateres1[0].split("-");
            var stDateres = sTime[2]+"/"+sTime[1]+"/"+sTime[0];
            var eTime = enDateres1[0].split("-");
            var enDateres = eTime[2]+"/"+eTime[1]+"/"+eTime[0];
            var stDate1 = new Date(stDateres);
            var enDate1 = new Date(enDateres);

            var compDate = stDate1 - enDate1;
            var startDateValuecmp = stDate1.getTime();
            var endDateValuecmp = enDate1.getTime();
            if((strtPrev==stDate)&&(endprev==enDate)){
                $("#OrderRescheduleForm_error_em_").show();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_error_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_error_em_").text("Please change Service Dates and then click on Reschedule");
                return false;
            }
            if (compDate == 0) {
            var stTimeres = stDateres1[1].split(":");
            var enTimeres = enDateres1[1].split(":");
            if (Math.round(stTimeres[0]) > Math.round(enTimeres[0])) {
                $("#OrderRescheduleForm_error_em_").show();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_error_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_error_em_").text("Event End Time cannot be less than Event Start Time");
                return false;
                }
            }
            if (startDateValuecmp > endDateValuecmp) {
            $("#OrderRescheduleForm_error_em_").show();
            $("#OrderRescheduleForm_Reason_em_").hide();
            $("#OrderRescheduleForm_error_em_").addClass('errorMessage');
            $("#OrderRescheduleForm_error_em_").text("Event End Date cannot be less than Event Start Date");
            return false;
            }
            
            var stDateres1 = stDate.split(" ");
            var enDateres1 = enDate.split(" ");
            var sTime = stDateres1[0].split("-");
            var eTime = enDateres1[0].split("-");
            var stewardservicedate=new Date(sTime[2],sTime[1]-1,sTime[0],stTimeres[0],stTimeres[1],date.getSeconds());
            var serviceEndDate = new Date(eTime[2],eTime[1]-1,eTime[0],enTimeres[0],enTimeres[1],date.getSeconds());
            if(stewardservicedate < date)
            {
                $("#OrderRescheduleForm_StartTime_em_").show();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_StartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_StartTime_em_").text("Event Start Time can be configured only from current date ");
                return false;
            }
            else
            {
                $("#OrderRescheduleForm_error_em_").hide();
                $("#OrderRescheduleForm_StartTime_em_").hide();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_EndTime_em_").hide();
                return true;
            }
            if(serviceEndDate < date)
            {
                $("#OrderRescheduleForm_EndTime_em_").show();
                $("#OrderRescheduleForm_Reason_em_").hide();
                $("#OrderRescheduleForm_EndTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_EndTime_em_").text("Event End Time can be configured only from current date");
                return false;
            }
            
            
            
        }
    }
    function rescheduleHandler(data)
    {  scrollPleaseWaitClose('inviteSpinLoader');
        if(data.status =='success'){
            
            $("#OrderRescheduleForm_error_em_").show(1000);
                    $("#OrderRescheduleForm_error_em_").removeClass('errorMessage');
                    $("#OrderRescheduleForm_error_em_").addClass('alert alert-success');
                    $("#OrderRescheduleForm_error_em_").text(data.error);
                    $("#OrderRescheduleForm_error_em_").fadeOut(3000);
                   // $("#reschedule").removeAttr('disabled');alert("Enabled========");
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