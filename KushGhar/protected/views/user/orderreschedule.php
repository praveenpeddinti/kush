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
            <?php echo $rescheduleForm->textField($model, 'StartTime', array('onchange' => 'javascript:onChangeTime();', 'class' => 'span10','readonly'=>'true')); ?>
            <?php echo $rescheduleForm->error($model, 'StartTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $rescheduleForm->label($model, '<abbr title="required">*</abbr> Event End Time'); ?>
            <?php echo $rescheduleForm->textField($model, 'EndTime', array('onchange' => 'javascript:onChangeTime();','class' => 'span10','readonly'=>'true')); ?>
            <?php echo $rescheduleForm->error($model, 'EndTime'); ?>
        </div>
        <div class=" span4">
            <?php echo $rescheduleForm->label($model, 'DurationHour(s)'); ?>
            <?php echo $rescheduleForm->textField($model, 'DurationHours', array('class' => 'span4', 'readonly'=>'true')); ?>

        </div> 
        
    </div>
<?php } else { ?>
<div class="row-fluid">
    <div class="span10">
    <label><abbr title="required">*</abbr> Service Date</label>
    <?php  echo $rescheduleForm->textField($model, 'ServiceStartTime', array('class' => 'span4','readOnly'=>'true')); ?>
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
        validate();
        scrollPleaseWait("inviteSpinLoader","invite-form")
         var data = $("#reschedule-form").serialize();
         data+= '&Type=' + $("#OrderRescheduleForm_ServiceType").val()+'&OrderNumber='+$("#OrderRescheduleForm_OrderNumber").val();
         //alert("type"+data);
         ajaxRequest('/user/orderrescheduledate', data, rescheduleHandler)
    }
    function validate(){
        if($("#OrderRescheduleForm_ServiceType").val()==1||$("#OrderRescheduleForm_ServiceType").val()==2)
        {
        if (($('#OrderRescheduleForm_ServiceStartTime').val() == '')) {
            $("#OrderRescheduleForm_ServiceStartTime_em_").show();
            $("#OrderRescheduleForm_ServiceStartTime_em_").addClass('errorMessage');
            $("#OrderRescheduleForm_ServiceStartTime_em_").text("Please Select Service Time");
            return false;
        }
        else
        {
            $("#OrderRescheduleForm_ServiceStartTime_em_").hide();
            return true;
        }
    }
    else if($("#OrderRescheduleForm_ServiceType").val()==3)
    {
       if (($('#OrderRescheduleForm_StartTime').val() == '')) {
            $("#OrderRescheduleForm_StartTime_em_").show();
            $("#OrderRescheduleForm_StartTime_em_").addClass('errorMessage');
            $("#OrderRescheduleForm_StartTime_em_").text("Please Select start Time");
            return false;
        }
        if (($('#OrderRescheduleForm_EndTime').val() == '')) {
            $("#OrderRescheduleForm_StartTime_em_").hide();
            $("#OrderRescheduleForm_EndTime_em_").show();
            $("#OrderRescheduleForm_EndTime_em_").addClass('errorMessage');
            $("#OrderRescheduleForm_EndTime_em_").text("Please Select End Time");
            return false;
        }
        else
        {
            $("#OrderRescheduleForm_EndTime_em_").hide();
            $("#OrderRescheduleForm_StartTime_em_").hide();
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
                    $("#OrderRescheduleForm_error_em_").fadeOut(20000, "");
                    window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/user/order';
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
        var SDate=first[0].split("-");
        var last=EndTimes.split(" ");
        var eTimeLast=last[1].split(":");
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