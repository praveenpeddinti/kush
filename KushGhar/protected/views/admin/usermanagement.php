<div class="container">
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
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
                                <li><a href="/admin/order"> <i class="fa fa-phone"></i> Orders</a>
                                </li>
                                <li class="active">
                                    <a href="/admin/usermanagement"><i class="fa fa-user"></i> User Management</a>
                                </li>
                                <li>
                                    <a href="/admin/vendormanagement"><i class="fa fa-user"></i> Vendor Management</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">User Management</h4>
                        <div id="TC" style="display:none"></div>                       
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>User Name</label>
                                        <input type="text" id="userName" class="span12"/>
                                    </div>
                                    <div class="span3">
                                        <label>Location</label>
                                        <input type="text" id="Location" class="span12"/>
                                    </div>
                                    <div class="span3">
                                        <label>Status</label>
                                        <select id="status" class="span12">
                                            <option value="20">All</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="search();"/>
                                    </div>
                                </div>
                               <div class="table-responsive"> <table id="userTable" class="table table-hover usermanagement_table">

                                    <thead><tr><th>Name</th><th>Email-ID</th><th>Phone No.</th><th>Location</th><th>Status</th><th>Actions</th></tr></thead>
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
                <div id="myModalforgot1" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">View Full Details</h3>
                            </div>
                            <div class="modal-body" id="modelBodyDiv1" style="padding:15px;">
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
        $('#userTable tr td input').live('click', function() {
            var id1=$(this).attr('id');
            var id = $(this).attr('data-id');
            var inviteStatus = $(this).attr('invite-status');
            if(id1.indexOf("view") > -1)
                loadDetails(Number(id));
            else
                statusChangeUser(Number(id), Number(inviteStatus));
        });
    });
    var pageno;
    function loadDetails(id) {
            var data = "Id=" + id;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/getfulldetails"); ?>',
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
    function statusChangeUser(rowNos, status) {
        if (status == 1) {
            var statusData = 'Do you want to change Active to Inactive?';
        } else {
            var statusData = 'Do you want to change Inactive to Active?';
        }
        var r = confirm(statusData);
        if (r == true) {
            var data = "Id=" + rowNos + "&status=" + status;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/changeStatus"); ?>',
                data: data,
                success: function(data) {
                    activeFormHandler(data, status, rowNos);
                    getCollectionDataWithPagination('/admin/newusermanage','userDetails', 'abusedWords_tbody',pageno,5, '');
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                }
            });
        } else {
            alert("Cancel!");
        }
    }
    function activeFormHandler(data, status, rowNos) {
        if (status == 1) {
            $('#usera_' + rowNos).attr('class', 'icon_inactive');
            $('#usera_' + rowNos).attr('invite-status', '0');
            $('#status_' + rowNos).text('InActive');
        } else {
            $('#usera_' + rowNos).attr('class', 'icon_active');
            $('#usera_' + rowNos).attr('invite-status', '1');
            $('#status_' + rowNos).text('Active');
        }
        if (data.status == 'success') {
            alert("ok");
        } else {
//            alert("else part");
        }
    }
    $(function(){
        getCollectionDataWithPagination('/admin/newusermanage','userDetails', 'abusedWords_tbody',1,5,'','','20','');
    });
    function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,uname,location,status,callback){
        globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);
        globalspace[MainDiv+'_uname']=uname;
        globalspace[MainDiv+'_location']=location;
        globalspace[MainDiv+'_status']=Number(status);
        var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&uname="+globalspace[MainDiv+'_uname']+"&location="+globalspace[MainDiv+'_location']+"&status="+globalspace[MainDiv+'_status'];
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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_uname'],globalspace[MainDiv+'_location'],globalspace[MainDiv+'_status'], callback)
                    }
                });
            if(callback!=''){
                callback();
        }
    }
    function search(){
       // alert("enter===="+$("#orderNo").val());
        var uname = $("#userName").val();
        var location = $("#Location").val();
        var status = $("#status").val();
        getCollectionDataWithPagination('/admin/newusermanage','userDetails', 'abusedWords_tbody',1,5,uname,location,status,'');
   
    }
</script>

