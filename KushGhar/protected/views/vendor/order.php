<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class=""><a href="/vendor/vendorBasicinformation" ><span class="KGaccounts"> </span></a></li>
                            <li class=""><a href="/site/cleaning"  ><span class="KGservices"> </span></a></li>
<!--                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>-->                          
                        </ul>
                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            <ul class="l_menu_sub_menu">
                                <?php
                                 if((!empty($getVendorDetailsType1->first_name)) && (!empty($getVendorDetailsType1->middle_name)) && (!empty($getVendorDetailsType1->last_name)) && (!empty($getVendorDetailsType1->birth_date)) && (!empty($getVendorDetailsType1->profilePicture)) && (!empty($getVendorDetailsType1->found_kushghar_by)) && (!empty($getVendorDetailsType1->website)) && (!empty($getVendorDetailsType1->pan_card)) && (!empty($getVendorDetailsType1->tin_number))){
                                     $statusClassForBasic = 'status_info2';
                                 }else{
                                     $statusClassForBasic = 'status_info1';
                                 }
                                 if((!empty($getVendorDetailsType1->email_address)) && (!empty($getVendorDetailsType1->phone)) && ($getVendorAddress->alternate_phone!=0) && (!empty($getVendorAddress->address_line1)) && (!empty($getVendorAddress->address_line2)) && (!empty($getVendorAddress->address_state)) && (!empty($getVendorAddress->address_city)) && (!empty($getVendorAddress->address_pin_code)) && (!empty($getVendorAddress->address_landmark))){
                                     
                                     $statusClassForContact = 'status_info2';
                                 }else{                                    
                                     $statusClassForContact = 'status_info1';
                                 }
                                 /*if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year))){
                                     $statusClassForPayment = 'status_info2';
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                 }*/
                                 ?>
                                <li ><a href="vendorBasicInformation"> <i class="fa fa-user"></i> Basic Info</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </li>
                                <li ><a href="vendorContactInformation"> <i class="fa fa-phone"></i> Contact Info</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForContact.'"' ?>></div>-->
                                   
                                </li>
                                <li class="active"><a href="order"> <i class="fa fa-phone"></i> Orders</a>
<!--                                    <div class=<?php // echo '"'.$statusClassForContact.'"' ?>></div>-->
                                   
                                </li>
<!--                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a>
                                   <div class="status_info3"></div>
                                </li>-->
                            </ul>
                        </div>
<!--                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> </li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> </li>
                            </ul>
                        </div>-->
                        <div id="services" class="collapse">
                            <div class="selected_tab">services</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> </li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a></li>
<!--                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <h4 class="paddingL20">Vendor Order Details</h4>
                        <hr>
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th nowrap>Order #</th><th nowrap>Service</th><th>Status</th><th nowrap>Service Date</th><th>Amount</th><th>Actions</th></tr></thead>
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
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
    $('#userTable tr td input').live('click', function() {
           var id1=$(this).attr('id');
            var id = $(this).attr('data-id');
            var ServiceId = $(this).attr('service-id');
            var CustId = $(this).attr('cust_id');
            var status=$(this).attr('status-id');
            var vendors = $(this).attr('vendors');
            var rowNos=$(this).attr('row-id');
            var Type ="orders";
            if(id1.indexOf("userview") > -1){
                statusChangeUser(Number(id), Number(ServiceId), vendors,Type,status);
            }
            else if(id1.indexOf("orderClose")>-1){
               closeOrder(rowNos,status,"Close");
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
     $(function(){
        
        getCollectionDataWithPagination('/vendor/newOrder','userDetails', 'abusedWords_tbody',1,5,'','', '');
    });   
    function statusChangeUser(rowNos, ServiceId, vendors,Type,Status) {
         var data = "Id=" + rowNos + "&ServiceId=" + ServiceId+ "&Vendors=" + vendors+ "&Type=" + Type+"&status="+Status;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/vendor/vendorData"); ?>',
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
    function closeOrder(rowNos,status,value){
     var data = "Id=" + rowNos + "&status=" + status+"&value="+value;
     $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/vendor/orderCloseDetails"); ?>',
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
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,s,orderNo, callback){
   globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);
        globalspace[MainDiv+'_serviceType']=Number(s);
        globalspace[MainDiv+'_orderNo']=Number(orderNo);       
        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&serviceType="+globalspace[MainDiv+'_serviceType']+"&orderNo="+globalspace[MainDiv+'_orderNo'];
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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_serviceType'],globalspace[MainDiv+'_orderNo'], callback)
                    }
                });
                if(callback!=''){
                    callback();
                }
    }   
    function reSchedule(id){
         var data = "Id=" + id;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/user/orderreschedule"); ?>',
                data: data,
                success: function(data) {
                    $("#myModalforgot1").modal({ backdrop: 'static', keyboard: false,show:false });
                    $("#modelBodyDiv1").html(data.html);
                    $('#myModalforgot1').modal('show');
                },
                error: function(data) { 
                   alert("Error occured.please try again");
                }
            });
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