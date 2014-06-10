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
                    <?php echo $inviteform->dropDownList($inviteModel,'Location', array(''=>'Select Location','AG Colony'=>'AG Colony','Ameerpet'=>'Ameerpet','Banjara Hills'=>'Banjara Hills','Begumpet'=>'Begumpet','Bharath Nagar'=>'Bharath Nagar','Chikalguda'=>'Chikalguda','Domalguda'=>'Domalguda',
                        'Gachibowli'=>'Gachibowli','Hitech City'=>'Hitech City','JNTU'=>'JNTU','Jubilee Hills'=>'Jubilee Hills','Kalyan Nagar'=>'Kalyan Nagar','Khairatabad'=>'Khairatabad','Kondapur'=>'Kondapur',
                        'KPHB'=>'KPHB','Kukatpally'=>'Kukatpally','Lingampally'=>'Lingampally','Madhapur'=>'Madhapur','Madinaguda'=>'Madinaguda','Malaysian Town Ship'=>'Malaysian Town Ship','Mehdipatnam'=>'Mehdipatnam',
                        'Miyapur'=>'Miyapur','Moosapet'=>'Moosapet','Musheerabad'=>'Musheerabad','Nizampet'=>'Nizampet','Padmarao Nagar'=>'Padmarao Nagar','Panjagutta'=>'Panjagutta','Ram Nagar'=>'Ram Nagar',
                        'Rasoolpura'=>'Rasoolpura','RTC X Roads'=>'RTC X Roads','Sanath Nagar'=>'Sanath Nagar','Tarnaka'=>'Tarnaka','Tolichowki'=>'Tolichowki','Vengal Rao Nagar'=>'Vengal Rao Nagar',
                        'Vivekananda Nagar'=>'Vivekananda Nagar','Warasiguda'=>'Warasiguda','Yousufguda'=>'Yousufguda'), array('options' => '', 'class' => 'span12'));?>
                    <?php echo $inviteform->error($inviteModel,'Location'); ?> 
                 </div>
             </div>
        
         
<?php $this->endWidget(); ?>
         <div style="text-align: right">
             <?php echo CHtml::Button('Request Invite',array('id' => 'inviteButton','class' => 'btn btn-primary','onclick'=>'inviteMail();')); ?>
             <button class='btn btn-primary' onclick='homePage();'>Home</button>
         </div>
         