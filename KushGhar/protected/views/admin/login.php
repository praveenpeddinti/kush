<script type="text/javascript">
    function adminloginhandler(data) {
        if (data.status == 'success') {//alert("sucesss===========");
            window.location.href = 'dashboard';
        } else {
            var error = [];

            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $('#error').show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }

    function isNumberKey(evt)
    {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;

        if (charCode > 31 && (charCode < 45 || charCode > 57))
            return false;
        if (e.shiftKey)
            return false;
        return true;
    }

</script>

<div class="container">
    <div class="row-fluid" style="height:480px">
        <div class="span12">
            <div class="paddinground">
                <div class="span6 paddingB20">
                    <div class="reg_div ">
                        <div class="paddinground">
                            <h2 class="reg_title">Adminstrator Login</h2>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'login-form',
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                )
                            ));
                            ?>
                            <?php echo $form->error($adminLogin, 'error', array('class'=>'errorMessageFont')); ?>
                            <fieldset>
                                <?php echo $form->label($adminLogin, '<abbr title="required">*</abbr> user ID'); ?>
                                <?php echo $form->textField($adminLogin, 'UserId', array('class' => 'span12', 'placeholder' => 'Email…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($adminLogin, 'UserId'); ?>
                                <?php echo $form->labelEx($adminLogin, '<abbr title="required">*</abbr> password'); ?>
                                <?php echo $form->passwordField($adminLogin, 'Password', array('class' => 'span12', 'placeholder' => 'Password…', 'maxLength' => 100)); ?>
                                <?php echo $form->error($adminLogin, 'Password'); ?>
                                <center>
                                    <?php
                                    echo CHtml::ajaxButton('Login', array('admin/login'), array(
                                        'type' => 'POST',
                                        'dataType' => 'json',
                                        'success' => 'function(data,status,xhr) { adminloginhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?>
                                </center>
                            </fieldset>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>