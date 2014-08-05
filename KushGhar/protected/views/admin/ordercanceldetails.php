<?php 
 $form=$this->beginWidget('CActiveForm', array(
     'id'=>'ordercanceldetails-form',
     'enableClientValidation'=>true,
     'clientOptions'=>array('validateOnSubmit'=>true,)
     )); 
 echo $form->error($model, 'error',array('value'=>'Hide')); 
 echo $form->hiddenField($model,'OrderNo', array('value'=>$OrderNumber));
 $months = array();
    for( $i = 1; $i <= 20; ++$i )
    $months[ $i ] = $i;
 ?>
    <div class="row-fluid">
    <div class=" span4">
        <?php echo $form->label($model, '<abbr title="required">*</abbr> Total Service Hours'); ?>
        <?php echo $form->dropDownList($model,'TotalServiceHours', array(''=>'Select','1' => '1', '1.5' => '1.5','2' => '2', '2.5' => '2.5','3' => '3', '3.5' => '3.5','4' => '4', '4.5' => '4.5','5' => '5', '5.5' => '5.5','6' => '6', '6.5' => '6.5'
            ,'7' => '7', '7.5' => '7.5','8' => '8', '8.5' => '8.5','9' => '9', '9.5' => '9.5','10' => '10', '10.5' => '10.5','11' => '11', '11.5' => '11.5','12' => '12'), array('class' => 'span8'));?>
        <?php echo $form->error($model,'TotalServiceHours'); ?>
        
    </div>
        <div class=" span5">
        <?php echo $form->label($model, '<abbr title="required">*</abbr> Total Service People'); ?>
        <?php echo $form->dropDownList($model,'TotalServicePeople',$months, array('prompt'=>'Select','class' => 'span8'));?>
        
        <?php echo $form->error($model,'TotalServicePeople'); ?>
        
    </div>
    </div>
<?php $this->endWidget(); ?>
    <div style="text-align: right">
             <?php echo CHtml::Button('Close Order',array('id' => 'orderCancel','class' => 'btn btn-primary','onclick'=>'orderClose();')); ?>
         </div>

<script type="text/javascript">
    function orderClose(){
        var queryString = $("#ordercanceldetails-form").serialize();
       
        if(orderValidate()){
         queryString+= '&OrderNumber='+$("#OrderForm_OrderNo").val();
         ajaxRequest('/admin/ordercancelstatus', queryString, orderCancelWithHoursHandler)
    }
    }
    function orderValidate(){
        
        if (($('#OrderForm_TotalServiceHours').val() == '')) {
            $("#OrderForm_TotalServiceHours_em_").show();
            $("#OrderForm_TotalServiceHours_em_").addClass('errorMessage');
            $("#OrderForm_TotalServiceHours_em_").text("Select Total Service Hours");
                return false;
        }else if (($('#OrderForm_TotalServicePeople').val() == '')) {
            $("#OrderForm_TotalServiceHours_em_").hide();
            $("#OrderForm_TotalServicePeople_em_").show();
            $("#OrderForm_TotalServicePeople_em_").addClass('errorMessage');
            $("#OrderForm_TotalServicePeople_em_").text("Select Total Service People");
                return false;
       }else {
            $("#OrderForm_TotalServiceHours_em_").hide();
            $("#OrderForm_TotalServicePeople_em_").hide();
            return true;
        }
    }
    
    function orderCancelWithHoursHandler(data)
    { 
        if(data.status =='success'){
            $("#OrderForm_error_em_").show();
            $("#OrderForm_error_em_").removeClass('errorMessage');
            $("#OrderForm_error_em_").addClass('alert alert-success');
            $("#OrderForm_error_em_").text(data.error);
            $("#OrderForm_error_em_").fadeOut(60000, "");
            //$("#OrderForm_error_em_").hide();
            window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/admin/order';
        }
    } 
    
</script>