<script type="text/javascript">
    
    function statusChangeUser(rowNos, status) {
        var oNumber = $("#orderNumber").val();
        var invoiceNo = $("#invoiceNo").val();
        var status1 = $("#status").val();
        
        //if (status == 1) {
            var statusData = 'Do you want to change status as Paid?';
        //} 
        /*else {
            var statusData = 'Do you want to change Inactive to Active?';
        }*/
        var r = confirm(statusData);
        if (r == true) {
            var data = "Id=" + rowNos + "&status=" + status;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/paidInvoice"); ?>',
                data: data,
                success: function(data) {
                    //activeFormHandler(data, status, rowNos);
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Invoice paid successfully.');
                    $("#message").fadeOut(6000, "");
                    $('#paid_' + rowNos).text('Paid');
                    $('#user_' + rowNos).remove();
                    //$('#user_' + rowNos).hide();
                    getCollectionDataWithPagination('/admin/viewInvoice','userDetails', 'abusedWords_tbody',pageno,5,uname,phone,status1, '');
                },
                error: function(data) { // if error occured
                    //alert("Error occured.please try again");

                }
            });
        } else {
            //alert("Cancel!");
        }
    }



    function activeFormHandler(data, status, rowNos) {
        //alert(data);

        if (status == 1) {
            $('#user_' + rowNos).attr('class', 'icon_inactive');
            $('#user_' + rowNos).attr('data-status', '0');
        } else {
            $('#user_' + rowNos).attr('class', 'icon_delete');
            $('#user_' + rowNos).attr('data-status', '1');
        }

        if (data.status == 'success') {
            //alert("ok");
        } else {

            //alert("else part");

        }
    }
    function activeFormHandler2(data, status, rowNos) {
        

        if (status == 0) {
            $('#usera_' + rowNos).attr('class', 'icon_reinvite');
            $('#usera_' + rowNos).attr('invite-status', '1');
            $('#status_' + rowNos).text('Invited');
        } else if (status == 1) {
            $('#usera_' + rowNos).attr('class', 'icon_reinvite');
            $('#usera_' + rowNos).attr('invite-status', '2');
            $('#status_' + rowNos).text('Re-Invited');
        }else {
            $('#usera_' + rowNos).attr('class', 'icon_reinvite');
            $('#usera_' + rowNos).attr('invite-status', '2');
            $('#status_' + rowNos).text('Re-Invited');
        }

        if (data.status == 'success') {
            //alert("ok");
        } else {

            //alert("else part");

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
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li  class="active"><a href="/admin/invoice"> <i class="fa fa-list-alt"></i> Invoice Management</a></li>
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
                        <h4 class="paddingL20">Invoice Management</h4>
                        <hr>
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>Order Number</label>
                                        <input type="text" id="orderNumber" class="span12" maxlength="50"/>
                                    </div>
                                    <div class="span3">
                                        <label>Invoice Number</label>
                                        <input type="text" id="invoiceNo" class="span12" maxlength="25" />
                                    </div>
                                    <div class="span3">
                                        <label>Status</label>
                                        <select id="status" class="span12">
                                            <option value="20">All</option>
                                            <option value="0">Open</option>
                                            <option value="1">Paid</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="search();"/>
                                    </div>
                                </div>
                                <table id="userTable" class="table table-hover">
                                    <thead><tr><th>Service</th><th>Order #</th><th>InvoiceNumber</th><th nowrap>Amount</th><th>Status</th><th>Actions</th></tr></thead>
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
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
    
    $(document).ready(function() {
        $('#userTable tr td input').live('click', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            //var id2 = $(this).attr('invite-id');
            //var inviteStatus = $(this).attr('invite-status');
            //var inviteEmail = $(this).attr('invite-email');
           
            if(id>0){
                
                statusChangeUser(Number(id), Number(status));
            }
            //if(id2>0){
            //    inviteUser(Number(id2), Number(inviteStatus), inviteEmail);
            //}
        });
    });
    
    $(function(){
        getCollectionDataWithPagination('/admin/viewInvoice','userDetails', 'abusedWords_tbody',1,5,'','','20', '');
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
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,oNumber,invoiceNo,status, callback){
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
    globalspace[MainDiv+'_pageSize']=Number(PageSize);
    globalspace[MainDiv+'_oNumber']=oNumber;
    globalspace[MainDiv+'_invoiceNo']=invoiceNo;
    globalspace[MainDiv+'_status']=Number(status);
    var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&oNumber="+globalspace[MainDiv+'_oNumber']+"&invoiceNo="+globalspace[MainDiv+'_invoiceNo']+"&status="+globalspace[MainDiv+'_status'];
    var data = ""; 
    ajaxRequest(newURL,data,function(data){getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback)});
}
function getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback){
      if(data.html==0)
      {
         $("#"+MainDiv).html("No data found");  
      }else
      {
        $("#"+MainDiv).html(data.html);
        $("#pagination").pagination({
                    currentPage: globalspace[MainDiv+'_page'],
                    items: data.totalCount,
                    itemsOnPage: globalspace[MainDiv+'_pageSize'],
                    cssStyle: 'light-theme',
                    onPageClick: function(pageNumber, event) {
                        globalspace[MainDiv+'_page'] = pageNumber;
                        pageno=pageNumber;
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_oNumber'],globalspace[MainDiv+'_invoiceNo'],globalspace[MainDiv+'_status'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
            }
    }
    function search(){
        var oNumber = $("#orderNumber").val();
        var invoiceNo = $("#invoiceNo").val();
        var status = $("#status").val();
        getCollectionDataWithPagination('/admin/viewInvoice','userDetails', 'abusedWords_tbody',1,5,oNumber,invoiceNo,status,'');
   
    }
    
</script>