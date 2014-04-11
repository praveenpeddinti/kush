<script type="text/javascript">
    function bulkuploadhandler(data){
        if(data.status=='success'){
            $("#BulkForm_error_em_").show();
            $("#BulkForm_error_em_").removeClass('errorMessage');
            $("#BulkForm_error_em_").addClass('alert alert-success');
            $("#BulkForm_error_em_").text('Sending mails');
            $("#BulkForm_error_em_").fadeOut(6000, "");
            
            //window.location.href='contactInfo';
        }else{
            //alert("No");
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

</script>




<div class="container">
    
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <!--<li ><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>-->
                            <li class="active"><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">
                               
                                <li class="active"><a href="/admin/dashboard"> <i class="fa fa-user"></i> Invite Friends</a>
                                    
                                </li>
                                <li><a href="/admin/manage"> <i class="fa fa-phone"></i> Invite Management</a>
                                    
                                </li>
                                
                            </ul>
                        </div>
                        
                       
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <h4>Invite Friends</h4>
                        <hr>
                        <div class="paddinground">
                       
    <?php $form = $this->beginWidget('CActiveForm', array(
                                  'id' => 'Bulk-form',
                                  'enableClientValidation' => true,
                                  'clientOptions' => array(
                                  'validateOnSubmit' => true,
                                  )
                            ));?>
                            
                            <?php echo $form->error($model, 'error'); ?>
                            <?php echo $form->hiddenField($model,'InviteType', array('value'=>'1')); ?>
                            <fieldset>
                            <div class="row-fluid">    
                            <div class=" span8">
    
        <?php echo $form->labelEx($model,'<abbr title="required">*</abbr> Email Ids'); ?>
        <?php echo $form->textArea($model,'EmailIds',array('placeholder'=>'Email Ids…', 'maxlength' => 200, 'cols'=>10, 'rows'=>10, 'class' => 'span12')); ?>
        <?php echo $form->error($model,'EmailIds'); ?>
                                
   </div>
                                <div class=" span4">
                                        <div  class=" paddingT30">
                                       <?php echo CHtml::ajaxButton('Invite', array('admin/dashboard'), array(
                                            'type' => 'POST',
                                            'dataType' => 'json',
                                            
                                            'success' => 'function(data,status,xhr) { bulkuploadhandler(data,status,xhr);}'), array('class' => 'btn btn-primary', 'type' => 'submit'));
                                    ?></div>
                                    </div>
</div>
                                


                                    </fieldset>
                            <?php $this->endWidget(); ?>
                                
   </div>    
                            


                                
                        </div>
                    </div>
                </article>
                </div>
            
        
    </section>
</div>

