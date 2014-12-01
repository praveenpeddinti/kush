<?php if($totalCount>0){  //$getCarWashServiceDetails

    for($i=0;$i<$totalCount;$i++){?>
<div id="details">
    <div class=" row-fluid">
            <div class="span12 ">
                <h5 class="toggles">#<?php echo $i+1 ?> details</h5>
            </div>    
        </div><hr style="margin: 0;" />
    <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Make</label>
                <select name="<?php echo $i+1; ?>_Make" id="<?php echo $i+1; ?>_Make" class="span12" onchange="ModelChange(this,'<?php echo $i+1; ?>');">
                    <option value="">Select Make </option>
                    <?php foreach ($Make as $make) { ?>
                    <?php 
                    $make_status = isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['make_of_car']:'';
                    $makeselected = $make_status==$make['make_name']?'selected':''; ?>
                    <option  <?php echo $makeselected; ?> value="<?php echo $make['make_name']; ?>"><?php echo $make['make_name']; ?></option>
                    <?php } ?>
                    </select>
                    <div id="<?php echo $i+1; ?>_Make_em" class="errorMessage" style="display:none"></div>
            </div>
           <div class="span4" id="<?php echo $i+1; ?>_modelDev" style="display:block">
                <label><abbr title="required">*</abbr> Model</label>
                <?php $model_select = isset($getCarWashServiceDetails[$i])?'disabled':'';
                
                ?>
                <select <?php echo $model_select; ?> name="<?php echo $i+1; ?>_Model" id="<?php echo $i+1; ?>_Model" class="span12">

                    <option value="">Select Model</option>
                    <?php if(isset($getCarWashServiceDetails[$i])){?>
                    <?php foreach ($Model as $modelName) { ?>
                    <?php 
                    $model_status = isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['model_of_car']:'';
                    $modelselected = $model_status==$modelName['model_name']?'selected':''; ?>
                    
                    <option  <?php echo $modelselected; ?> value="<?php echo $modelName['model_name']; ?>"><?php echo $modelName['model_name']; ?></option>
                    <?php } }?>
                    </select>
                    <div id="<?php echo $i+1; ?>_Model_em" class="errorMessage" style="display:none"></div>
            </div>
            <!--<div class=" span4">
                <label><abbr title="required">*</abbr> Make / Model of the Car</label>
                <input type="text" class="span12" maxLength="25" value="<?php //echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['make_of_car']:''; ?>" id="<?php echo $i+1; ?>_MakeOfCar">
                <div id="<?php //echo $i+1; ?>_MakeOfCar_em" class="errorMessage" style="display:none"></div>
            </div>-->
            <div class=" span4">
                <label> Exterior Color</label>
                <input type="text" class="span12" maxLength="25"  value="<?php echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['exterior_color']:''; ?>" id="<?php echo $i+1; ?>_ExteriorColor">
                <div id="<?php echo $i+1; ?>_ExteriorColor_em" class="errorMessage" style="display:none"></div>
            </div>
        </div>
        <div class="AddressFieldsMultiCarDiv" id="<?php echo $i+1; ?>_AddressFieldsDiv" Style="display:none">
 	<div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> Address Line1</label>
                <input type="text" class="span12" value="<?php echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['address_line1']:''; ?>" id="<?php echo $i+1; ?>_Address1" maxLength="100">
                <div id="<?php echo $i+1; ?>_Address1_em" class="errorMessage" style="display:none"></div>
             </div>
             <div class=" span4">
                <label> Address Line2</label>
                <input type="text" class="span12" value="<?php echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['address_line2']:''; ?>" id="<?php echo $i+1;?>_Address2" maxLength="100">
             </div>
             <div class=" span4">
                <label> Alternate Phone</label><input type="text" value="+91" disabled="disabled" class="span3"/>
                <input type="text" class="span9" value="<?php echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['alternate_phone']:''; ?>" id="<?php echo $i+1; ?>_AlternatePhone" maxLength="10" onkeypress="return isNumberKey(event);">
                <div id="<?php echo $i+1; ?>_AlternatePhone_em" class="errorMessage" style="display:none"></div>
             </div>
        </div>
        <div class="row-fluid">
            <div class=" span4">
                <label><abbr title="required">*</abbr> State</label>
                <select name="<?php echo $i+1; ?>_State" id="<?php echo $i+1; ?>_State" class="span12" onchange = "onChangeState<?php echo $i?>(this.value)">
                    <option value="">Select State</option>
                    <?php foreach ($States as $course) { ?>
                    <?php 
                    $address_state = isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['address_state']:'';
                    $selected = $address_state==$course['Id']?'selected':''; ?>
                    <option <?php echo $selected; ?>  value="<?php echo $course['Id']; ?>"><?php echo $course['StateName']; ?></option>

                    <?php } ?>
                    </select>
                    <div id="<?php echo $i+1; ?>_State_em" class="errorMessage" style="display:none"></div>
             </div>
            <div class=" span4" id="cityDev<?php echo $i ?>" style="display:block">
                <label><abbr title="required">*</abbr> City</label>
                
                <?php $city_select = isset($getCarWashServiceDetails[$i])?'disabled':''; ?>
                <select <?php echo $city_select ?> name="<?php echo $i+1; ?>_City" id="<?php echo $i+1; ?>_City" class="span12" >
                    <option value="">Select City</option>
                    <?php if(isset($getCarWashServiceDetails[$i])){
                     foreach ($cities as $city) { ?>
                    <?php 
                    $city_status = isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['address_city']:'';
                    $cityselected = $city_status==$city['Id']?'selected':''; ?>
                    
                    <option  <?php echo $cityselected; ?> value="<?php echo $city['Id']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php } }?>
                    
            
                    
                    <!--<option <?php //echo $selected1; ?> value="Hyderabad">Hyderabad</option>
                    <option <?php //echo $selected2; ?> value="Secunderabad">Secunderabad</option>-->
                </select>
                <div id="<?php echo $i+1; ?>_City_em" class="errorMessage" style="display:none"></div>
           </div>
            
           <div class=" span4">
               <label><abbr title="required">*</abbr> Pin Code</label>
                <input type="text" class="span12" value="<?php echo isset($getCarWashServiceDetails[$i])?$getCarWashServiceDetails[$i]['address_pin_code']:'';?>" id="<?php echo $i+1; ?>_PinCode" maxLength="6" onkeypress="return isNumberKey(event);">
                <div id="<?php echo $i+1; ?>_PinCode_em" class="errorMessage" style="display:none"></div>
           </div>
           </div>
        </div>
        </div>
     <?php  } }?> 

<script type="text/javascript">
    $(document).ready(function(){
        if($("#1_State").val()=='')
        $("#1_State").val('35');
        
        if($("#2_State").val()=='')
        $("#2_State").val('35');
    });
    
    function ModelChange(obj,rowNo){
        var queryString = 'MakeId=' + obj.value+'&RowNo='+rowNo;
        ajaxRequest('/user/getModel', queryString, getModelhandler);

    }
    
    function getModelhandler(data) {
        if (data.status == 'success') {
            $("#"+data.RowNo+"_modelDev").html(data.html);
            //$('#homeServicesMainDiv').hide();
            //$('#ServiceMainDiv').show();
            //$('#ServiceMainDiv').html(data.data);

        }
    }

    function onChangeState0(val){
    var queryString="stateId="+val+"&dumpcityId=1";
    ajaxRequest('/user/getCitiesCar',queryString,getCityHandler0);
      }
      function getCityHandler0(data){
       if(data.status=='success'){
        $("#cityDev0").html(data.html);
       }
   }      
   function onChangeState1(val){
    var queryString="stateId="+val+"&dumpcityId=2";
    ajaxRequest('/user/getCitiesCar',queryString,getCityHandler1);
      }
   function getCityHandler1(data){
    if(data.status=='success'){
        $("#cityDev1").html(data.html);
    }
  }
</script>