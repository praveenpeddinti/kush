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
                                <li><a href="/admin/dashboard"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                <li><a href="/admin/manage"> <i class="fa fa-users"></i> Invite Management</a></li>
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li class="active"><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
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
                        <h4 class="paddingL20">Vendor Management</h4>
                        <div id="TC" style="display:none"></div>                       
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="span5">
                                            <label>Vendor Type</label>
                                        <select name="vendortype" onchange="onSelectType(this.value);">
                                            <option value="individual">Individual</option>
                                            <option value="agency">Agency</option>
                                        </select>
                                            </div>
                                    </div>
                                </div>
                                <div id="individualDiv">
                                    <div class="row-fluid">
                                    <div class="span4">
                                        <label>Vendor Name</label>
                                        <input type="text" id="userName" class="span12" maxlength="50"/>
                                    </div>
                                    <div class="span3">
                                        <label>Location</label>
                                        <input type="text" id="location" class="span12" maxlength="20"/>
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
                                <table id="userTable" class="table table-hover"  >
                                    <thead><tr><th>Name</th><th>Email Address</th><th>Phone</th><th>Location</th><th nowrap>Reg# On</th><th>Status</th><th>Actions</th></tr></thead>
                                    <tbody id="abusedWords_tbody">
                                    </tbody>
                                </table>
                                </div>
                                <div style="display:none" id="AgencyDiv">
                                    <div class="row-fluid">
                                    <div class="span4">
                                        <label>Agency Name</label>
                                        <input type="text" id="agencyUserName" class="span12"/>
                                    </div>
                                    <div class="span3">
                                        <label>Location</label>
                                        <input type="text" id="agencyLocation" class="span12"/>
                                    </div>
                                    <div class="span3">
                                        <label>Status</label>
                                        <select id="agencyStatus" class="span12">
                                            <option value="20">All</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="agencySearch();"/>
                                    </div>
                                </div>
                                   <table id="agencyVendor" class="table table-hover">
                                       <thead><tr><th>Name</th><th>Email Address</th><th>Phone</th><th>Location</th><th>Reg# On</th><th>Status</th><th>Action</th></tr></thead>
                                    <tbody id="abusedAgencyWords_tbody">

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
                                <h3 id="myModalLabel">View Details for Vendor</h3>
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
                statusChangevendorUser(Number(id), Number(inviteStatus));
        });
    });
    function loadDetails(id) {
            var data = "Id=" + id;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/getvendorfulldetails"); ?>',
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
    $(document).ready(function() {
        $('#agencyVendor tr td input').live('click', function() {
            var id = $(this).attr('data-id');
            var inviteStatus = $(this).attr('invite-status');
             statusChangeAgencyUser(Number(id), Number(inviteStatus));
        });
    });
    function statusChangevendorUser(rowNos, status) {
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
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/changeVendorStatus"); ?>',
                data: data,
                success: function(data) {
                    activeFormHandler(data, status, rowNos);
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                }
            });
        } else {
//            alert("Cancel!");
        }
    }
    function statusChangeAgencyUser(rowNos, status) {
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
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/changeAgencyStatus"); ?>',
                data: data,
                success: function(data) {
                    activeFormHandler(data, status, rowNos);
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
    function onSelectType(type)
    {
       if(type=="agency")
       {
            document.getElementById('individualDiv').style.display='none';
            document.getElementById('AgencyDiv').style.display='block';
            getCollectionDataWithPagination('/admin/vendoragencymanage','userDetails', 'abusedAgencyWords_tbody',1,5,'','','20', '');
       }
       else if(type=="individual")
       {
            document.getElementById('AgencyDiv').style.display='none';
            document.getElementById('individualDiv').style.display='block';
            getCollectionDataWithPagination('/admin/newvendormanage','userDetails', 'abusedWords_tbody',1,5,'','','20', '');
       }
    }
    $(function(){
        document.getElementById('AgencyDiv').style.display='none';
        document.getElementById('individualDiv').style.display='block';
        getCollectionDataWithPagination('/admin/newvendormanage','userDetails', 'abusedWords_tbody',1,5,'','','20', '');
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
                getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_uname'],globalspace[MainDiv+'_location'],globalspace[MainDiv+'_status'], callback)
            }
        });
        if(callback!=''){
            callback();
        }
    }
    function search(){
        var uname = $("#userName").val();
        var location = $("#location").val();
        var status = $("#status").val();
        getCollectionDataWithPagination('/admin/newvendormanage','userDetails', 'abusedWords_tbody',1,5,uname,location,status, '');
    }
    function agencySearch(){
        var uname=$("#agencyUserName").val();
        var location=$("#agencyLocation").val();
        var status=$("#agencyStatus").val();
        getCollectionDataWithPagination('/admin/vendoragencymanage','userDetails', 'abusedAgencyWords_tbody',1,5,uname,location,status, '');
    }
    var  moveTextToTextbox='';
    var divId='';
    var textData='';
    function showTooltip(id,textData){
       var dumpdata='';
       var textData1 =document.getElementById(id).innerHTML;
       if(textData1.length>=10){
           if(moveTextToTextbox==''){
               dumpdata=textData;}else{dumpdata=moveTextToTextbox;}
           }else{
               dumpdata=textData1;
           }
       divId=id.replace(/view/i, "div");
       if(textData.length>=20){
           document.getElementById(divId).style.display='block';
           document.getElementById(divId).innerHTML=dumpdata;
       }else{document.getElementById(divId).style.display='none';}
    }
    function showTooltipdown(id){
       divId=id.replace(/view/i, "div");
       document.getElementById(divId).style.display='none';
    }
</script>

