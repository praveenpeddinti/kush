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
<?php } else if($serviceType==1) { ?>
<div class="row-fluid">
    <div class="span10">
    <label><abbr title="required">*</abbr> Service Date</label>
    <?php  echo $rescheduleForm->textField($model, 'ServiceStartTime', array('value'=>$getserviceDetails['houseservice_start_time'],'class' => 'span4','readOnly'=>'true')); ?>
    <?php echo $rescheduleForm->error($model, 'ServiceStartTime'); ?>
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
<?php }
 $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Reschedule',array('id' => 'reschedule','class' => 'btn btn-primary','onclick'=>'reschedule();')); ?>
         </div>
<script type="text/javascript">
    function reschedule(){
        if(validate()){
            scrollPleaseWait("inviteSpinLoader","invite-form")
            var data = $("#reschedule-form").serialize();
            data+= '&Type=' + $("#OrderRescheduleForm_ServiceType").val()+'&OrderNumber='+$("#OrderRescheduleForm_OrderNumber").val();
            ajaxRequest('/user/orderrescheduledate', data, rescheduleHandler)
    }
    }
    function validate(){
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
                $("#OrderRescheduleForm_ServiceStartTime_em_").text("Service Date can only be configured post 2 days from current date");
                return false;
            }
            var date=new Date.today().addDays(2);
            var sdate=$("#OrderRescheduleForm_ServiceStartTime").val();
            var sdatee=sdate.split("-");
            var servicedate=new Date(sdatee[2],sdatee[1]-1,sdatee[0]);
            if(servicedate < date)
            {
                $("#OrderRescheduleForm_ServiceStartTime_em_").show();
                $("#OrderRescheduleForm_ServiceStartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_ServiceStartTime_em_").text("Service Date can only be configured post 2 days from current date ");
                return false;
            }
            else
            {
                $("#OrderRescheduleForm_ServiceStartTime_em_").hide();
                return true;
            }
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
            var stDate = $('#OrderRescheduleForm_StartTime').val();
            var enDate = $('#OrderRescheduleForm_EndTime').val();
            var strtPrev="<?php echo isset($getserviceDetails['start_time'])?$getserviceDetails['start_time']:''?>";
            var endprev="<?php echo isset($getserviceDetails['end_time'])?$getserviceDetails['end_time']:''?>"
            if(strtPrev==stDate){
                $("#OrderRescheduleForm_StartTime_em_").show();
                $("#OrderRescheduleForm_StartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_StartTime_em_").text("Event Start Time can only be configured post 2 days from current date");
                return false;
            }
            if(endprev==enDate){
                $("#OrderRescheduleForm_EndTime_em_").show();
                $("#OrderRescheduleForm_EndTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_EndTime_em_").text("Event End Time can only be configured post 2 days from current date");
                return false;
            }
            var stDateres1 = stDate.split(" ");
            var enDateres1 = enDate.split(" ");
            var sTime = stDateres1[0].split("-");
            var eTime = enDateres1[0].split("-");
            var stewardservicedate=new Date(sTime[2],sTime[1]-1,sTime[0]);
            if(stewardservicedate < date)
            {
                $("#OrderRescheduleForm_StartTime_em_").show();
                $("#OrderRescheduleForm_StartTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_StartTime_em_").text("Event Start Time can only be configured post 2 days from current date ");
                return false;
            }
            var serviceEndDate = new Date(eTime[2],eTime[1]-1,eTime[0]);
            if(serviceEndDate < date)
            {
                $("#OrderRescheduleForm_EndTime_em_").show();
                $("#OrderRescheduleForm_EndTime_em_").addClass('errorMessage');
                $("#OrderRescheduleForm_EndTime_em_").text("Event End Time can only be configured post 2 days from current date");
                return false;
            }
            else
            {
                $("#OrderRescheduleForm_StartTime_em_").hide();
                $("#OrderRescheduleForm_EndTime_em_").hide();
                return true;
            }
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
                        window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/user/order';
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
       var date=new Date.today().addDays(2);
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