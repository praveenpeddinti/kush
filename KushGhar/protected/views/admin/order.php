<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
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
                               
                                <li><a href="/admin/dashboard"> <i class="fa fa-user"></i> Invite Friends</a>
                                    
                                </li>
                                <li><a href="/admin/manage"> <i class="fa fa-phone"></i> Invite Management</a>
                                    
                                </li>
                                <li class="active"><a href="/admin/order"> <i class="fa fa-phone"></i> Orders</a>
                                </li>
                                
                            </ul>
                        </div>
                        
                       
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Customer Order Details</h4>
                        
                        <div id="TC" style="display:none"></div>                       
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>Services</label>
                                        <select id="serviceType" class="span12">
                                            <option value="">Select Service</option>
                                            <option value="1">House Cleaning</option>
                                            <option value="2">Car Wash</option>
                                            <option value="3">Stewards</option>
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
                                            <option value="2">Close</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="search();"/>
                                    </div>
                                </div>

                                <!--<label>Service name:</label><input type="text" id="serviceType" />-->
                                
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th>Service Name</th><th><center>Order Number</center></th><th>Status</th><th><center>Amount</center></th><th>Actions</th></tr></thead>
                                    <tbody id="abusedWords_tbody">
                                    <?php //for($i=0;$i<sizeof($orderDetails);$i++){
                                        //$serviceName='';
                                    ?>
                                    <!--<tr>
                                        <td>
                                            <?php //if($orderDetails[$i]['ServiceId']=='1'){$serviceName='House Cleaning';}
                                           // if($orderDetails[$i]['ServiceId']=='2'){$serviceName='Car Wash';}
                                           // if($orderDetails[$i]['ServiceId']=='3'){$serviceName='Stewards Cleaning';}
                                           // echo $serviceName;
                                           ?>
                                        </td>
                                        <td><?php //echo $orderDetails[$i]['order_number'];?></td>
                                        <td><?php //echo 'Open'?></td>
                                        <td><?php //echo $orderDetails[$i]['amount'];?></td>
                                    </tr>-->
                                            
                                    <?php //}?>    
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
            var ServiceId = $(this).attr('service-id');
            var id2 = $(this).attr('invite-id');
            var inviteStatus = $(this).attr('invite-status');
            //var inviteEmail = $(this).attr('invite-email');
           
    //    alert("gggggg===="+id2);
           if(id>0){
                statusChangeUser(Number(id), Number(ServiceId));
            }
            //if(id2>0){
                inviteUser(Number(id2), Number(inviteStatus));
            //}
        });
    });
    function statusChangeUser(rowNos, ServiceId) {
        getCollectionDataWithPagination1('/admin/viewData','userDetails1', 'modelBodyDivuu',rowNos,ServiceId,'');
    }
    
    function getCollectionDataWithPagination1(URL,CollectionName, MainDiv,rowNos,ServiceId, callback){
    globalspace[MainDiv+'_page'] = 1;

        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&rowNos="+rowNos+"&ServiceId="+ServiceId;
    var data = "";  
    
        ajaxRequest(newURL,data,function(data){getCollectionDataWithPaginationHandler1(data,URL,CollectionName,MainDiv,callback)});
}
    function getCollectionDataWithPaginationHandler1(data,URL,CollectionName,MainDiv,rowNos,ServiceId,callback){
        
        
        $("#TC").show();
          //scrollPleaseWaitClose('spinner_admin');
        $("#TC").html(data.html);
        //$("#"+MainDiv).text("praveen");
                
              
                if(callback!=''){
                    callback();
                }
    }
    function addSsServicehandler(data) {
        if (data.status == 'success') {
            $('#myModalView').modal('show');
            
            //$('#modelBodyDiv').html(data.data);

        }
    }
    function inviteUser(rowNos, status) {//alert("enter=====");
        //scrollPleaseWait("InviteInfoSpinLoader","contactInfo-form");
        
        var data = "Id=" + rowNos + "&status=" + status;
  //          alert("fu==="+data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/orderStatus"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Service Status is changed Successfully.');
                    $("#message").fadeOut(6000, "");
                    //$('#usera_' + rowNos).remove();
                    activeFormHandler2(data, status, rowNos);
                    
                },
                error: function(data) { // if error occured
                    

                }
            });
    }

    
    
    function activeFormHandler2(data, status, rowNos) {
        
//alert("order_number---------"+status+"==="+rowNos);
        if (status == 0) {
            $('#usera_' + rowNos).attr('class', 'icon_inactive');
            $('#usera_' + rowNos).attr('invite-status', '1');
            $('#status_' + rowNos).text('Schedule');
        } else if (status == 1) {
            $('#usera_' + rowNos).attr('class', 'icon_delete');
            $('#usera_' + rowNos).attr('invite-status', '2');
            $('#status_' + rowNos).text('Close');
        }else {
            $('#usera_' + rowNos).attr('class', 'icon_delete');
            $('#usera_' + rowNos).attr('invite-status', '2');
            $('#status_' + rowNos).text('Close');
        }

        if (data.status == 'success') {
            //alert("ok");
        } else {

            //alert("else part");

        }
    }

    
    
    function search(){
       // alert("enter===="+$("#orderNo").val());
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
</script>

