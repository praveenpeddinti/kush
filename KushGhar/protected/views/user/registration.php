<script type="text/javascript">
function samplehandler(data){
    //alert(data.status);
    if(data.status=='success'){
window.location.href='edit';
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



<div class="container">
     <div class="row-fluid">
       <div class="span12">
       	<div class="paddinground">
        <div class="span6">
        	<div class="reg_div">
               <div class="paddinground">
                    <h2 class="reg_title">Registration</h2>
                       

 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'action'=>"/user/registration"
)); ?>

<fieldset>
  <?php echo $form->hiddenField($model,'Id'); ?>



    <label><abbr title="required">*</abbr> <?php echo $form->labelEx($model,'first name'); ?></label>
   <?php echo $form->textField($model,'FirstName', array( 'class'=>'span12','placeholder'=>'First Name…')); ?>
   <?php echo $form->error($model,'FirstName'); ?>


    <label><abbr title="required">*</abbr> <?php echo $form->labelEx($model,'last name'); ?></label>
   <?php echo $form->textField($model,'LastName', array( 'class'=>'span12','placeholder'=>'Last Name…')); ?>
   <?php echo $form->error($model,'LastName'); ?>


    <label><abbr title="required">*</abbr>  <?php echo $form->labelEx($model,'email'); ?></label>
   <?php echo $form->textField($model,'Email', array( 'class'=>'span12','placeholder'=>'Email…')); ?>
     <?php echo $form->error($model,'Email'); ?>


    <label><abbr title="required">*</abbr> <?php echo $form->labelEx($model,'phone'); ?></label>
   <?php echo $form->textField($model, 'Phone', array('id' => 'RegistrationForm_Phone', 'class'=>'span12','placeholder'=>'Phone Number…', 'maxLength'=>10,'onkeypress'=>'return isNumberKey(event);')); ?>

        <?php echo $form->error($model,'Phone'); ?>


    <label><abbr title="required">*</abbr>  <?php echo $form->labelEx($model,'password'); ?></label>
   <?php echo $form->passwordField($model,'Password', array( 'class'=>'span12','placeholder'=>'Password…')); ?>
        <?php echo $form->error($model,'Password'); ?>



    <label><abbr title="required">*</abbr> <?php echo $form->labelEx($model,'Rewrite Password'); ?></label>
   <?php echo $form->passwordField($model,'RewritePassword', array( 'class'=>'span12','placeholder'=>'Repeat Password…')); ?>
        <?php echo $form->error($model,'RewritePassword'); ?>
    <center>
     <div class="row buttons">
		<?php echo CHtml::ajaxButton('Registration',array('user/registration'), array(
            'type' => 'POST',
            'dataType' => 'json',
            'success' => 'function(data,status,xhr) { samplehandler(data,status,xhr);}'), array('class'=>'btn btn-large')); ?>
	</div>
    <!--<button type="submit" class="btn btn-large">Submit</button>-->
    </center>
    
    </fieldset>



<?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
        <div class="span6">
        	<div class="reg_div">
            <div class="paddinground">
                    <h2 class="reg_title">Login</h2>
                        <form>
    <fieldset>

    <label><abbr title="required">*</abbr> User ID</label>
   <input type="text" placeholder="Email / Phone Number…" class="span12">


    <label><abbr title="required">*</abbr> Password</label>
   <input type="password" placeholder="Password…" class="span12">



    <center>
    <button type="submit" class="btn btn-large">Login</button></center>
    <center>
    <button type="submit" class="login_fb"> </button>
    </center>
    </fieldset>
    </form>
                </div>
            </div>
        </div>
        </div>
      </div>
     </div>
   </div>
</section>
<div class="clearfix paddingT10" ></div>