<div id="inviteSpinLoader"></div>

    <?php $inviteform=$this->beginWidget('CActiveForm', array(
                                                                'id'=>'invite-form',
                                                                'enableClientValidation'=>true,
    //'action'=>Yii::app()->createUrl('user/invite'),
                                                                'clientOptions'=>array(
                                                                        'validateOnSubmit'=>true,
                                                                )
                                                        )); ?>
                                                        
                                            <?php echo $inviteform->error($inviteModel, 'error'); ?>
             
             <?php echo $inviteform->hiddenField($inviteModel,'InviteType', array('value'=>'0')); ?>
             <div class='row-fluid'>
                 <div class='span6'>
                    <?php echo $inviteform->label($inviteModel,'<abbr title="required">*</abbr> First Name'); ?>
                    <?php echo $inviteform->textField($inviteModel,'FirstName', array( 'class'=>'span12','placeholder'=>'First Name…', 'maxLength' => 50)); ?>
                    <?php echo $inviteform->error($inviteModel,'FirstName'); ?>
                 </div>
                 <div class='span6'>
                    <?php echo $inviteform->label($inviteModel,'<abbr title="required">*</abbr> Last Name'); ?>
                    <?php echo $inviteform->textField($inviteModel,'LastName', array( 'class'=>'span12','placeholder'=>'Last Name…', 'maxLength' => 50)); ?>
                    <?php echo $inviteform->error($inviteModel,'LastName'); ?>
                 </div>
             </div>
              <div class='row-fluid'>
                 <div class='span12'>
                    <?php echo $inviteform->label($inviteModel,'<abbr title="required">*</abbr> Email'); ?>
                    <?php echo $inviteform->textField($inviteModel,'Email', array( 'class'=>'span12','placeholder'=>'Email…', 'maxLength' => 100)); ?>
                    <?php echo $inviteform->error($inviteModel,'Email'); ?>
                 </div>
              </div>
             <div class='row-fluid'>
                 <div class='span6'>
                    <?php echo $inviteform->label($inviteModel,'Select Services of Interest'); ?>
                    <?php echo $inviteform->dropDownList($inviteModel, 'Services', CHtml::listData($getServices,'Id','name'), array('multiple'=>'true','options'=>'','class'=>'span12')); ?>                                          
                    <?php echo $inviteform->error($inviteModel,'Services'); ?>     
                 </div>
                 <div class='span6'>
                    <?php echo $inviteform->label($inviteModel,'Location'); ?>
                    <?php echo $inviteform->dropDownList($inviteModel,'Location', array(''=>'Select Location','Ameerpet' => 'Ameerpet', 'Banjara Hills' => 'Banjara Hills', 'Charminar' => 'Charminar', 'Dilsukhnagar'=>'Dilsukhnagar', 'Jubilee Hills'=>'Jubilee Hills','LBNagar' => 'LBNagar', 'Punjagutta'=>'Punjagutta','SRNagar' => 'SRNagar', 'Uppal' => 'Uppal'), array('options' => '', 'class' => 'span12'));?>
                    <?php echo $inviteform->error($inviteModel,'Location'); ?> 
                 </div>
             </div>
        
         
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Request Invite',array('id' => 'inviteButton','class' => 'btn btn-primary','onclick'=>'inviteMail();')); ?>
             <button class='btn btn-primary' onclick='homePage();'>Home</button>
         </div>
         