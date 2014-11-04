<div class="container">
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active"  title="Account"><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>
                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">
                               <li><a href="/admin/dashboard"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                <li><a href="/admin/manage"> <i class="fa fa-users"></i> Invite Management</a></li>
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                                <li class="active"><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/invoice"> <i class="fa fa-list-alt"></i> Invoice Management</a></li>
                                <li><a href="/admin/payments"> <i class="fa fa-file"></i> Payments</a></li>
                                <li><a href="/settings/carMakes"> <i class="fa fa-cog"></i> Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Customer Order Details</h4><hr>
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>Service</label>
                                        <select id="serviceType" class="span12">
                                            <option value="">Select Service</option>
                                            <option value="1">House Cleaning</option>
                                            <option value="2">Car Wash</option>
                                            <option value="3">Stewards Services</option>
                                        </select>
                                    </div>
                                    <div class="span3">
                                        <label>Order Number</label>
                                        <input type="text" id="orderNo" class="span6"/>
                                    </div>
                                    <div class="span3">
                                        <label>Status</label>
                                        <select id="status" class="span12">
                                            <option value="20">Select Status</option>
                                            <option value="0">Open</option>
                                            <option value="1">Schedule</option>
                                            <option value="3">Close</option>
                                            <option value="2">Cancel</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="search();"/>
                                    </div>
                                </div>
                                <table id="userTable" class="table table-hover">
                                    <thead><tr><th nowrap>Order #</th><th nowrap>Service</th><th>Status</th><th nowrap>Service Date</th><th><center>Amount</center></th><th>Actions</th></tr></thead>
                                    <tbody id="abusedWords_tbody">
                                    </tbody>
                                </table>
                                <div class="pagination pagination-right">
                                    <div id="pagination"></div>  
                                </div>
                            </div>  
                        </div>
                    </div>    
                </div>
                <div id="myModalOrder" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Order Details</h3>
                            </div>
                            <div class="modal-body" id="myModalOrderDiv" style="padding:15px;">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalOrderSchedule" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel22">Schedule the Order</h3>
                            </div>
                            <div class="modal-body" id="myModalOrderScheduleDiv" style="padding:15px;">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalOrderPrint" class="modal fade" >
                    <div class="modal-dialog" style="width: 1000px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Print the Order</h3>
                            </div>
                            <div class="modal-body" id="myModalOrderPrintDiv" style="padding:15px;">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalInvoicePrint" class="modal fade" >
                    <div class="modal-dialog" style="width: 1000px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Print the Invoice</h3>
                            </div>
                            <div class="modal-body" id="myModalInvoicePrintDiv" style="padding:15px;">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalReview" class="modal fade" >
                    <div class="modal-dialog" style="width: 800px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Customer Feedback Form</h3>
                            </div>
                            <div class="modal-body" id="modalBodyReviewDiv" style="padding: 20px" >
                            
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalUpdateOrder" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Update the Order</h3>
                            </div>
                            <div class="modal-body" id="myModalUpdateOrderDiv" style="padding:15px;">
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </article>
        </div>
    </section>
</div>

<script type="text/javascript">
    function orderAction(ONo,id2,inviteStatus,obj){
        if(obj.value=="Cancel")
            var r=confirm("Are you sure want to cancel the order");
        else 
            r=true;
        if(r==true) {
            inviteUser(Number(id2), Number(inviteStatus),obj.value,Number(ONo));
        }
    }

    $(document).ready(function() {
       $('#userTable tr td input').live('click', function() {
           var id1=$(this).attr('id');
            var id = $(this).attr('data-id');
            var ServiceId = $(this).attr('service-id');
            var CustId = $(this).attr('cust_id');
            var status=$(this).attr('status-id');
            var vendors = $(this).attr('vendors');
            var Type ="orders";
            if(id1.indexOf("userview") > -1){
                statusChangeUser(Number(id), Number(ServiceId), vendors,Type,status);
            }
            else if(id1.indexOf("print") > -1){
           
            print(Number(id),vendors);
            }
            else if(id1.indexOf("Review") > -1){
                review(Number(id));
            }
            else if(id1.indexOf("invoice") > -1){
                invoice(Number(id),CustId,ServiceId);
            }
            else if(id1.indexOf("UpdateOrder") > -1){
                updateOrder(Number(id),vendors,ServiceId, status);
            }
        });
    });
    function updateOrder(OrderNo, Amount, ServiceId, status) {
        var data = "OrderNo=" + OrderNo + "&status=" + status+"&ServiceId="+ServiceId+"&Amount="+Amount;
        $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/updateorderdetails"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $("#myModalUpdateOrder").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalUpdateOrderDiv").html(data.html);
                    $('#myModalUpdateOrder').modal('show');
                    
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                }
            });
          } 
    function invoice(OrderId,CustId,ServiceId){
        var data = "OrderId=" + OrderId+"&CustId="+CustId+"&ServiceId="+ServiceId;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/printInvoice"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalInvoicePrint").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalInvoicePrintDiv").html(data.html);
                    $('#myModalInvoicePrint').modal('show');
                },
                error: function(data) { 
                   alert("Error occured.please try again");

                }
            });
    }
    function print(id,vendors){
        var data = "Id=" + id+"&vendors="+vendors;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/printOrder"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalOrderPrint").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalOrderPrintDiv").html(data.html);
                    $('#myModalOrderPrint').modal('show');
                },
                error: function(data) { 
                   alert("Error occured.please try again");

                }
            });
    }
    function statusChangeUser(rowNos, ServiceId, vendors,Type,Status) {
         var data = "Id=" + rowNos + "&ServiceId=" + ServiceId+ "&Vendors=" + vendors+ "&Type=" + Type+"&status="+Status;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/viewData"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalOrder").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalOrderDiv").html(data.html);
                    $('#myModalOrder').modal('show');
                },
                error: function(data) { 
                   alert("Error occured.please try again");

                }
            });
    }
    function inviteUser(rowNos, status,value,ONo) {
        var data = "Id=" + rowNos + "&status=" + status+"&value="+value+"&ONo="+ONo;
           
          if(value=='Close'){
              $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/ordercanceldetails"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $("#myModalOrderClose").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalOrderCloseBodyDiv").html(data.html);
                    $('#myModalOrderClose').modal('show');
                    
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                }
            });
          }
        else if(value=='Schedule'){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/orderschedule"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $("#myModalOrderSchedule").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalOrderScheduleDiv").html(data.html);
                    $('#myModalOrderSchedule').modal('show');
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                }
            });
        }
        else{alert(data+"===");
              /*$.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php //echo Yii::app()->createAbsoluteUrl("/admin/orderStatus"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Service status is changed successfully.');
                    $("#message").fadeOut(6000);
                    //$('#usera_' + rowNos).remove();
                    activeFormHandler2(data, status, rowNos,value);
                },
                error: function(data) { // if error occured
                }
            });*/
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/orderCancel"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalOrderSchedule").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#myModalOrderScheduleDiv").html(data.html);
                    $("#myModalLabel22").text("Cancel the Order");
                    
                    $('#myModalOrderSchedule').modal('show');
                    
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                }
            });
            }
    
    
    }
    function activeFormHandler2(data, status, rowNos,value) {alert("----enter handler--1--"+data.status+"==2="+status+"==3=="+rowNos+"==4=="+value);
        if (value == 'Schedule') {
            $('#status_' + rowNos).text('Schedule');
        } else if (value == 'Cancel') {
            
            $('#status_' + rowNos).text('Cancel');
        }else if(value=='Close'){
            $('#status_' + rowNos).text('Close');
        }
        else {
            $('#status_' + rowNos).text('Open');
        }
        if (data.status == 'success') {
            //alert("ok");
        } else {
            //alert("else part");
        }
    }
    function search(){
        var sType = $("#serviceType").val();
        var orderNo = $("#orderNo").val();
        var status = $("#status").val();
        getCollectionDataWithPagination('/admin/newOrder','userDetails', 'abusedWords_tbody',1,5,sType,orderNo,status,'');
    }
    $(function(){
        getCollectionDataWithPagination('/admin/newOrder','userDetails', 'abusedWords_tbody',1,5,'','','20','');
    });
    function ajaxRequest(url, queryString,callback,dataType,beforeSendCallback) { 
    var data = queryString;
    if(dataType==null || dataType==undefined){
        dataType = "json";
    }
    $.ajax({
        dataType: dataType,
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function(data) { 
            if(callback!=null && callback!=undefined){
            callback(data);
            }
        },
        error: function(data) {            
        },
         beforeSend: function() {
             if(beforeSendCallback!=null && beforeSendCallback!=undefined){
                   beforeSendCallback();
             }
            }
    });
}
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,sType,orderNo,status,callback){
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);
        globalspace[MainDiv+'_serviceType']=Number(sType);
        globalspace[MainDiv+'_orderNo']=Number(orderNo);
        globalspace[MainDiv+'_status']=Number(status);
        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&serviceType="+globalspace[MainDiv+'_serviceType']+"&orderNo="+globalspace[MainDiv+'_orderNo']+"&status="+globalspace[MainDiv+'_status'];
    var data = "";  
        ajaxRequest(newURL,data,function(data){getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback)});
}
    function getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback){
          //scrollPleaseWaitClose('spinner_admin');
        $("#"+MainDiv).html(data.html);
                //$('#'+MainDiv+'_count').text(data.totalCount);
                $("#pagination").pagination({
                    currentPage: globalspace[MainDiv+'_page'],
                    items: data.totalCount,
                    itemsOnPage: globalspace[MainDiv+'_pageSize'],
                    cssStyle: 'light-theme',
                    onPageClick: function(pageNumber, event) {
                        globalspace[MainDiv+'_page'] = pageNumber;
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_serviceType'],globalspace[MainDiv+'_orderNo'],globalspace[MainDiv+'_status'], callback)
                    }
                });
                if(callback!=''){
                    callback();
                }
    }
    function review(id){
    var data = "Id=" + id;
                $.ajax({
                type: 'POST',
                dataType: 'json', 
                url: '<?php echo Yii::app()->createAbsoluteUrl("/user/orderreview"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalReview").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#modalBodyReviewDiv").html(data.html);
                    $('#myModalReview').modal('show');
                },
                error: function(data) { 
                   alert("Error occured.please try again");

                }
            });
    }
</script>