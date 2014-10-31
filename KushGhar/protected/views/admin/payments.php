<script type="text/javascript">
    var pageno;
 </script>

<div class="container">
    <section>    
        <div class="container minHeight">
            <aside>   
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active" title="Account"><a href="#" ><span class="KGaccounts"> </span></a></li>
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
                                <li><a href="/admin/invoice"> <i class="fa fa-list-alt"></i> Invoice Management</a></li>
                                <li class="active"><a href="/admin/payments"> <i class="fa fa-file"></i> Payments</a></li>
                                <li><a href="/settings/carMakes"> <i class="fa fa-cog"></i> Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Payments</h4><hr>
                        <div class="paddingL20">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;">
                                <div style="text-align:right"><label>Grand Total (Rs.): <?php echo $totalCount['amount'];?></label></div>
                                <table id="userTable" class="table table-hover">
                                    <thead><tr><th>Service</th><th>Order #</th><th>InvoiceNumber</th><th nowrap>Amount</th><th>Status</th></tr></thead>
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
    
    $(function(){
        getCollectionDataWithPagination('/admin/viewPayments','userDetails', 'abusedWords_tbody',1,5,'','','20', '');
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
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize, callback){
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
    globalspace[MainDiv+'_pageSize']=Number(PageSize);
    
    var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize'];
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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
            }
    }
    
</script>