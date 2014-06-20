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
                        
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <label>Service name:</label><input type="text" id="serviceType" />
                                <input type="button" class="btn btn-primary" name="Search" value="Serach" onclick="search();"/>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th>Service Name</th><th><center>Order Number</center></th><th>Status</th><th><center>Amount</center></th></tr></thead>
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
    function search(){
        //alert("enter===="+$("#serviceType").val());
        var s = $("#serviceType").val();
        getCollectionDataWithPagination('/admin/newOrder','userDetails', 'abusedWords_tbody',1,5,s, '');
    }
    
    
    $(function(){
        
        getCollectionDataWithPagination('/admin/newOrder','userDetails', 'abusedWords_tbody',1,5,'', '');
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
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,s, callback){
   //alert("URL===="+URL+"==CollectionName==="+CollectionName+"==MainDiv==="+MainDiv+"==CurrentPage==="+CurrentPage+"==PageSize==="+PageSize);
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);
        globalspace[MainDiv+'_serviceType']=Number(s);

        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&serviceType="+globalspace[MainDiv+'_serviceType'];
    var data = "";  
    //alert(newURL);
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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_serviceType'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
    }
</script>