<div class="container">
    <!--<div id="instant_notifications" class="instant_notification">Basic Information</div>-->
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">

                            <li class="active" title="Accounts"><a href="/user/basicinfo" ><span class="KGaccounts"> </span></a></li>
                            <li class="" title="Services"><a href="/user/homeservice"  ><span class="KGservices"> </span></a></li>

                            <li class="" title="Payment"><a href="/user/paymentinfo" ><span class="KGpayment"> </span></a></li>
                            
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Account</div>
                            
                            <ul class="l_menu_sub_menu">
                                <!--<li>
                                    
                                    <div id="progressbar"></div>
                                </li>-->
                                <?php
                                 if((!empty($customerDetails->first_name)) && (!empty($customerDetails->middle_name)) && (!empty($customerDetails->last_name)) && (!empty($customerDetails->birth_date)) && (!empty($customerDetails->profilePicture)) && (!empty($customerDetails->found_kushghar_by))){
                                     $statusClassForBasic = 'status_info2';
                                     $basicPercent = 35;
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture)) && (empty($customerDetails->birth_date))){
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 15;
                                 }else if((empty($customerDetails->middle_name)) && (empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 20;
                                 }else if((empty($customerDetails->found_kushghar_by)) && (empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 25;
                                 }else if((empty($customerDetails->profilePicture))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                 }else if((empty($customerDetails->found_kushghar_by))){
                                     
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 30;
                                 }else {
                                     $statusClassForBasic = 'status_info1';
                                     $basicPercent = 10;
                                     
                                 }
                                 if((!empty($customerAddressDetails->alternate_phone)) && (!empty($customerAddressDetails->address_line1)) && (!empty($customerAddressDetails->address_line2)) && (!empty($customerAddressDetails->address_state)) && (!empty($customerAddressDetails->address_city)) && (!empty($customerAddressDetails->address_pin_code)) && (!empty($customerAddressDetails->address_landmark))){
                                     
                                     $statusClassForContact = 'status_info2';
                                     $contactPercent = 35;
                                 }else if((empty($customerAddressDetails->address_line1))){
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 20;
                                 }else{
                                     
                                     $statusClassForContact = 'status_info1';
                                     $contactPercent = 10;
                                 }
                                 if((!empty($customerPaymentDetails->card_type)) && (!empty($customerPaymentDetails->card_holder_name)) && (!empty($customerPaymentDetails->card_number)) && (!empty($customerPaymentDetails->card_expiry_month)) && (!empty($customerPaymentDetails->card_expiry_year)) && (!empty($customerPaymentDetails->first_name)) && (!empty($customerPaymentDetails->last_name))&& (!empty($customerPaymentDetails->phone)) && (!empty($customerPaymentDetails->address1)) && (!empty($customerPaymentDetails->address2))){
                                     $statusClassForPayment = 'status_info2';
                                     $payPercent = 35;
                                 }else if (empty($customerPaymentDetails->address2)){
                                     $statusClassForPayment = 'status_info1';
                                     $payPercent = 20;
                                 }else{
                                     $statusClassForPayment = 'status_info3';
                                     $payPercent = 0;
                                 }
                                 ?>
                                <li><a href="homeService"> <i class="fa fa-wrench"></i> Services</a></li>
                                <li><a href="priceQuote"> <i class="fa fa-user"></i> Price Quote</a></li>
                                <li><a href="paymentInfo"> <i class="fa fa-credit-card"></i> Payment Info
<!--                                    <div class="<?php echo $statusClassForPayment;?>"> </div>-->
                                </a></li>
                                <li><a href="basicinfo"> <i class="fa fa-file-text-o"></i> Basic Info
<!--                                    <div class=<?php echo '"'.$statusClassForBasic.'"' ?>></div>-->
                                </a></li>
                               <li> <a href="contactInfo"> <i class="fa fa-phone"></i> Contact Info
<!--                                    <div class="<?php echo $statusClassForContact;?>"> </div>-->
                                </a></li>
                                <li class="active"><a href="order"> <i class="fa fa-file-text"></i> Orders</a></li>
                               <li> <a href="invitefriends"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                
                            </ul>
                        </div>
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                        <div id="services" class="collapse">
                            <div class="selected_tab">services</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Customer Order Details</h4>
                        
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th nowrap>Service Name</th><th nowrap>Order #</th><th>Status</th><th nowrap>Service Date</th><th>Amount</th><th>Actions</th></tr></thead>
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
                <div id="myModalforgot1" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Re-Schedule Order</h3>
                            </div>
                            <div class="modal-body" id="modelBodyDiv1" style="padding:15px;">
                            
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="myModalReview" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Review/Feedback</h3>
                            </div>
                            <div class="modal-body" id="modalBodyReviewDiv" style="padding:15px;">
                            
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </article>
        </div>
    </section>
</div>

<script type="text/javascript">
    
    
    $(document).ready(function() { 
        alert
        <?php $totalPercent = $basicPercent+$contactPercent+$payPercent; ?>
        $( "#progressbar" ).progressbar({value: <?php echo $totalPercent;?>});
        $("#instant_notifications").fadeOut(6000, "");
        $('#userTable tr td input').live('click', function() {
            var id1=$(this).attr('id');
            var id = $(this).attr('data-id');
            if(id1.indexOf("reschedule") > -1)
                reSchedule(Number(id));
            else if(id1.indexOf("cancel")> -1)
                statusChangeUser(Number(id));
            else if(id1.indexOf("review")> -1)
                review(Number(id));
        });
});


$(function(){
        
        getCollectionDataWithPagination('/user/newOrder','userDetails', 'abusedWords_tbody',1,5,'','', '');
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
    function statusChangeUser(rowNos) {
        var statusData = 'Are you sure want to cancel your order?';
        var r = confirm(statusData);
        if (r == true) {
            var data = "Id=" + rowNos;
            //alert(data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/user/ordercancelmanage"); ?>',
                data: data,
                success: function(data) {
                    //activeFormHandler(data, status, rowNos);
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Order cancelled  Successfully.');
                    $("#message").fadeOut(6000, "");
                    $('#row_' + rowNos).remove();
                    getCollectionDataWithPagination('/user/newOrder','userDetails', 'abusedWords_tbody',1,5,'','', '');
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                }
            });
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