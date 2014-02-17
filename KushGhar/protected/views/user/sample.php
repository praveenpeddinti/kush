<h1>Sample Form</h1>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('sample'); ?>
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sample-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'action'=>"/user/sample"
)); ?>

    <?php echo $form->hiddenField($model,'Id'); ?>
    <div class="row">
	<?php echo $form->labelEx($model,'no'); ?>
	<?php echo $form->textField($model,'SNo'); ?>
	<?php echo $form->error($model,'SNo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'sname'); ?>
        <?php echo $form->textField($model,'SName'); ?>
        <?php echo $form->error($model,'SName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'cname'); ?>
        <?php echo $form->textField($model,'CName'); ?>
        <?php echo $form->error($model,'CName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textField($model,'Address'); ?>
        <?php echo $form->error($model,'Address'); ?>
    </div>
    <div class="row">
    <?php echo $form->labelEx($model, 'Gender'); ?>
    <?php echo $form->radioButtonList($model,'Sex',array('M'=>'Male','F'=>'Female')); ?>
    <?php echo $form->error($model,'Sex'); ?>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>