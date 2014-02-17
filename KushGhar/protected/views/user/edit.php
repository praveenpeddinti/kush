<h1>Sample Form</h1>
<div class="flash-success">
	<?php if(isset($mess)) echo $mess; ?>
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
    <table cellpadding="5" border="2"><tr><th>Sno</th><th>SName</th><th>CName</th><th>Address</th><th>Actions</th></tr>
    <?php foreach($details as $row){?>
        <tr>
            <td>
                <?php echo $row['Sno'];?>
            </td>
            <td>
                <?php echo $row['sname'];?>
            </td>
            <td>
                <?php echo $row['cname'];?>
            </td>
            <td>
                <?php echo $row['Address'];?>
            </td>
            
            <td>
                <a href="/user/editById?id=<?php echo $row['Id'];?>" onclick="menuactive('dashboard');">Edit user</a>
            </td>
        </tr>
<?}?>
    </table>

    

<?php $this->endWidget(); ?>

</div>