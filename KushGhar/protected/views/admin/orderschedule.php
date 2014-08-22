<div id="errormessage"></div>
<input type="hidden" value="<?php echo $id ?>" id="rowId">
<table border="0">
    <tr><th colspan="3"><h3 align="left">Customer Details</h3></th></tr>
    <tr>
        <td><label>Customer Name</label></td>
        <td>:</td>
        <td><label><?php echo $customerDetails['first_name']; ?></label></td>
    </tr>
    <tr>
        <td><label>Contact Number</label></td>
        <td>:</td>
        <td><label><?php echo $customerDetails['phone']; ?></label></td>
    </tr>
    <tr>
        <td><label>Email ID</label></td>
        <td>:</td>
        <td><label><?php echo $customerDetails['email_address']; ?></label></td>
    </tr>
    <tr>
        <td><label>Address </label></td>
        <td>:</td>
        <td><label><?php echo $customerAddressDetails['address_line1']." ".$customerAddressDetails['address_line2']." ".$customerAddressDetails['address_city']." ".$customerAddressDetails['address_state']; ?></label></td>
    </tr>
</table>
<table border="0">
    <tr><th colspan="3"><h3 align="left">Service Details</h3></th></tr>
    <tr>
        <td><label>Service Requested date</label></td>
        <td>:</td>
        <td><label><?php echo $OrderDetails['service_date']; ?></label></td>
    </tr>
    <tr>
        <td><label>Order Number</label></td>
        <td>:</td>
        <td><label><?php echo $OrderDetails['order_number']; ?></label></td>
    </tr>
    <tr>
        <td><label>Service Type</label></td>
        <td>:</td>
        <td><label><?php 
        if($OrderDetails['ServiceId']=='1'){$serviceName='House Cleaning';}
        if($OrderDetails['ServiceId']=='2'){$serviceName='Car Wash';}
        if($OrderDetails['ServiceId']=='3'){$serviceName='Stewards Services';}
        echo $serviceName;
        ?></label></td>
    </tr>
</table>
<table border="0" width="100%">
    <tr><th colspan="3"><h3 align="left">Vendor Details</h3></th></tr>
    <tr>
        <td style="width: 20%" ><label>Active Vendors</label></td>
        <td style="width: 5%">:</td>
        <td style="width: 75%">
            <select multiple="multiple" name="Vendors" id="multiple_vendors" style="width: 75%">
            <!--<option value="">Select </option>-->
            <?php foreach ($vendors as $row) { ?>
            <option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['first_name']; ?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="VendorValues">
        </td>
    </tr>
    <tr>
        <td style="width: 20%"><label>Assigned Vendors</label></td>
        <td style="width: 5%">:</td>
        <td style="width: 75%"><textarea id="assignedVendors" style="width: 95%" readonly=""></textarea></td>
    </tr>
</table>
<input type="button" class="btn btn-primary" value="Schedule" onclick="ScheduleClick();">
<script type="text/javascript">
    $(document).ready(function() {
    $('#multiple_vendors').change(function(){
        var skillsSelect = document.getElementById("multiple_vendors");
        var values = [];
        var ids=[];
        for (var i = 0; i < skillsSelect.options.length; i++) {
            if (skillsSelect.options[i].selected) {
                values.push(skillsSelect.options[i].text);
                ids.push(skillsSelect.options[i].value);
            }
        }
        $("#assignedVendors").val(values);
        $("#VendorValues").val(ids);
    });
});
function ScheduleClick(){
    if(validate()){
    var data = "Id=" + $("#rowId").val() + "&vendorVals=" + $("#VendorValues").val();
    $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/orderScheduleStatus"); ?>',
                data: data,
                success: function(data) {
                    window.location.href='order';
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Service Status is changed Successfully.');
                    $("#message").fadeOut(6000);
                    activeFormHandler2(data, $("#rowId").val(),'Schedule');
                },
                error: function(data) { 
                }
            });
            }
    }
    function validate(){
    if($("#assignedVendors").val()==''){
        $("#errormessage").removeClass('alert alert-success');
        $("#errormessage").addClass('errorMessage');
        $("#errormessage").text('Select vendors to assign the order');
            return false;
    }
    else
        return true;
}
function activeFormHandler2(data, rowNos,value) {
        if (value == 'Schedule') {
            $('#status_' + rowNos).text('Schedule');
        } 
    }
</script>