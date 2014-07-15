<?php 
    
    $form = $this->beginWidget('CActiveForm', array(
    'id' => 'carwash-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));?>        
<fieldset>
    <div class=" row-fluid borderB">
        <div class="span12 ">
            <div class="carwash_title">
                Car Wash Service <a class="details has-popover" target="_blank" title="" data-toggle="popover" data-placement="bottom" data-content="<ul><li>Brush, vacuum, and clean the interior</li><li>Clean wheels and tires</li><li>Wash exterior</li><li>Apply tire dressing</li><li>Polish wheels</li><li>Rinsing and drying</li></ul>" data-original-title="Car Wash" href="/site/carwash">(What is included <b>?</b>)</a>
            </div>
        </div>

    </div>
    
    <div class="row-fluid">
        <div class=" span4">
            <label><abbr title="required">*</abbr> # of Cars</label>
            
            <?php echo $form->textField($model, 'TotalCars', array('maxLength' => 3, 'class' => 'span6', 'placeholder' => '','onblur' => 'javascript:onTotalcars(this);')); ?>
            <?php echo $form->error($model, 'TotalCars'); ?>
        </div>
        
        <div class=" span8" id="DifferentLocationDiv" style="display:none">
            <label>Are they at different Address</label>
            <div class="switch switch-large DifferentLocation" id="DifferentLocation" data-on-label="Yes" data-off-label="No">
                <?php echo $form->checkBox($model, 'DifferentLocation'); ?>
            </div>
        </div>
        
    </div>
    <div class="row-fluid">
        <div class="span5" >
             <label><abbr title="required">*</abbr> Select Date</label>
             <?php echo $form->textField($model, 'ServiceStartTime', array('class' => 'span10', 'placeholder' => 'Select Date...')); ?>
             <?php echo $form->error($model, 'ServiceStartTime'); ?>
        </div>
    </div>
    <div class="newcars" id="newcars">
        <?php echo $html;?>
    </div>
    
 	<div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Address Line1</label>
                <input type="text" class="span12" id="11_Address1" value="" maxLength="100" placeholder="Address Line1…">
                <div id="11_Address1_em" class="errorMessage" style="display:none"></div>
             </div>
             <div class=" span4">
                <label> Address Line2</label>
                <input type="text" class="span12" id="11_Address2" value="" maxLength="100" placeholder="Address Line2…">
             </div>
             <div class=" span4">
                <label> Alternate Phone</label><input type="text" value="+91" disabled="disabled" class="span3"/>
                <input type="text" class="span9" id="11_AlternatePhone" value="" maxLength="10" placeholder="Alternate Phone…" onkeypress="return isNumberKey(event);">
                <div id="11_AlternatePhone_em" class="errorMessage" style="display:none"></div>
             </div> 
        </div>
        <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> State</label>
                <select name="11_State" id="11_State" class="span12" >
                    <option value="">Select State</option>
                    <?php foreach ($States as $course) { ?>
                    <option  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>

                    <?php } ?>
                    </select>
                    <div id="11_State_em" class="errorMessage" style="display:none"></div>
             </div>
             <div class=" span4">
                <label><abbr title="required">*</abbr> City</label>
                <input type="text" class="span12" id="11_City" value="" maxLength="25" placeholder="City…">
                <div id="11_City_em" class="errorMessage" style="display:none"></div>
           </div>
           <div class=" span4">
                <label><abbr title="required">*</abbr> Pin Code</label>
                <input type="text" class="span12" id="11_PinCode" value="" maxLength="6" placeholder="Pin Code…">
                <div id="11_PinCode_em" class="errorMessage" style="display:none"></div>
           </div>
           </div>
        
       
    <div class="row-fluid">
        <div class=" span12">
            <div class="pull-right paddingT30">
                <input type="button" value="Previous" id="CarWashCleaningPrevious" class="btn btn-primary" onclick="previousCarWashCleaning()" style="display:none;"/>
                <input type="button" value="Next" id="CarWashCleaningSubmit" class="btn btn-primary" onclick="submitCarWashCleaning()" />
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>


<script type="text/javascript">
    
   $(document).ready(function(){
       
       alert("=============");
       Custom.init();
       $('#CarWashForm_DifferentLocation').bootstrapSwitch();
       var cars = $('#TotalCars').val();
       if(cars > 1)
       {
           document.getElementById('DifferentLocationDiv').style.display = 'none';
       }
       else
       {
           document.getElementById('DifferentLocationDiv').style.display = 'block';
       }
   });

   $(document).ready(function() {
       
var currentDate=new Date.today().addDays(1);
var maxdate=new Date();
maxdate.setFullYear(maxdate.getFullYear()-19);
var mindate=new Date();
mindate.setFullYear(currentDate.getFullYear());
mindate.setMonth(currentDate.getMonth());
mindate.setDate(currentDate.getDate());
$('#CarWashForm_ServiceStartTime').scroller({
preset: 'date',
theme: 'android', // for android set theme:'android'
display: 'modal',
mode: 'scroller',
dateFormat:'dd-mm-yyyy',
dateOrder: 'Md ddyy',
minDate: mindate
});

 });
        
          
        
   
    function onTotalcars(obj){alert("--------------"+obj.value);
        $('#CarWashForm_DifferentLocation').val('0');
        //alert(obj.value);
        
        if(obj.value > 1)
       {
           $("#DifferentLocationDiv").show();
       }
       else
       {
           $("#DifferentLocationDiv").hide();
       }
       /* if(obj.value>=3){
            $("#CarWashForm_TotalCars_em_").show();
                $("#CarWashForm_TotalCars_em_").addClass('errorMessage');
                $("#CarWashForm_TotalCars_em_").text("Only 2 cars serving for each order as of now.");
            return false;
        }
        $("#CarWashForm_TotalCars_em_").hide();*/
        
    }
    
    
    
    $(function () {
    var showPopover = function () {
        $(this).popover('show');
    }
    , hidePopover = function () {
        $(this).popover('hide');
    };


    $('.has-popover').popover({
        html:true,
        //content: 'Test1',
        //title: 'Title',
        trigger: 'manual'
    })


    .focus(showPopover)
    .blur(hidePopover)
    .hover(showPopover, hidePopover);
});

function checkBox(obj){
    alert(obj.toSource());
}
</script>