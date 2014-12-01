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
                                <li><a href="/admin/payments"> <i class="fa fa-file"></i> Payments</a></li>
                                <li class="active"><a href="/settings/settingsDashboard"> <i class="fa fa-cog"></i> Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">States</h4><hr>
                        <div id="TC" style="display:none"></div>                       
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
<!--                                <input type="button" id="btnNewCity" class="btn btn-primary" value="New State" onclick="newState()"/>-->
                                <div class="table-responsive"> <table id="userTable" class="table table-hover usermanagement_table">

                                    <thead><tr><th>Name</th><th>Actions</th></tr></thead>
                                    <tbody id="abusedWords_tbody">

                                    </tbody>
                                </table>
                               </div>
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
    var pageno;
    $(function(){
        getCollectionDataWithPagination('/settings/newStates','userDetails', 'abusedWords_tbody',1,5,'');
    });
    function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,callback){
        globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);
        pageno=Number(CurrentPage);
        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize'];
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
                        pageno=pageNumber;
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'], callback)
                    }
                });
            if(callback!=''){
                callback();
        }
    }
    $(document).ready(function() { 
        $('#userTable tr td input').live('click', function() {
            var id1=$(this).attr('id');
            var id = $(this).attr('data-id');
            var status=$(this).attr('invite-status');
            if(id1.indexOf("status") > -1)
                statusChange(Number(id),status);
            else if(id1.indexOf("model")> -1)
                viewCities(Number(id));
        });
});
    function viewCities(id){
        window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/settings/cities?StateId='+id;
    }
</script>