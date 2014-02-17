<h1>Contact Information</h1>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contactInfo'); ?>
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
        //'action'=>"/user/basicinfo"
)); ?>

    <?php echo $form->hiddenField($model,'Id'); ?>
    


    <div class="row">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'Email',array('value'=>$customerDetails->email)); ?>
	<?php echo $form->error($model,'Email'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php echo $form->textField($model,'Phone',array('value'=>$customerDetails->phone)); ?>
        <?php echo $form->error($model,'Phone'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'alternate Phone'); ?>
        <?php echo $form->textField($model,'AlternatePhone'); ?>
        <?php echo $form->error($model,'AlternatePhone'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'address line1'); ?>
        <?php echo $form->textField($model,'Address1'); ?>
        <?php echo $form->error($model,'Address1'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'address Line2'); ?>
        <?php echo $form->textField($model,'Address2'); ?>
        <?php echo $form->error($model,'Address2'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'state'); ?>
        <?php echo $form->textField($model,'State'); ?>
        <?php echo $form->error($model,'State'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'city'); ?>
        <?php echo $form->textField($model,'City'); ?>
        <?php echo $form->error($model,'City'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'pin code'); ?>
        <?php echo $form->textField($model,'PinCode'); ?>
        <?php echo $form->error($model,'PinCode'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'landmark'); ?>
        <?php echo $form->textArea($model,'Landmark',array("placeholder"=>"Description", 'maxlength' => 150, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'Landmark'); ?>
    </div>
        
	<div class="row buttons">
		<?php echo CHtml::ajaxButton('Continue',array('user/contactInfo'), array(
            'type' => 'POST',
                    'dataType' => 'json',
'success' => 'function(data,status,xhr) { samplehandler2(data,status,xhr);}')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

<script type="text/javascript">
function samplehandler2(data){
    //alert(data.status);
    if(data.status=='success'){
      alert("Successfully registration")
//window.location.href='contactInfo';
    }else{
        alert("No");
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

function isNumberKey(evt)
  {
    var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 45 || charCode > 57 ) )
    return false;
    if (e.shiftKey) return false;
    return true;
 }



 

</script>