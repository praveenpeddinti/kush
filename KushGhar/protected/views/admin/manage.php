<script type="text/javascript">
    var pageno;
    function adminloginhandler(data) {
        if (data.status == 'success') {
            //alert("sucesss===========");
            window.location.href = 'dashboard';
        } else {
            var error = [];

            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $('#error').show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }

    function isNumberKey(evt)
    {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;

        if (charCode > 31 && (charCode < 45 || charCode > 57))
            return false;
        if (e.shiftKey)
            return false;
        return true;
    }
    function inviteUser(rowNos, status,email) {
        //scrollPleaseWait("InviteInfoSpinLoader","contactInfo-form");
        
        var data = "Id=" + rowNos + "&status=" + status+ "&email=" + email;
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/inviteStatus"); ?>',
                data: data,
                success: function(data) {
                    //scrollPleaseWaitClose('InviteInfoSpinLoader');
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Invitation sent Successfully.');
                    $("#message").fadeOut(6000, "");
                    //$('#usera_' + rowNos).remove();
                    activeFormHandler2(data, status, rowNos);
                    
                },
                error: function(data) { // if error occured
                    

                }
            });
    }

    function statusChangeUser(rowNos, status) {
        //alert(status);
        var uname = $("#userName").val();
        var phone = $("#phone").val();
        var status1 = $("#status").val();
        if (status == 1) {
            var statusData = 'Do you want to Delete?';
        } 
        /*else {
            var statusData = 'Do you want to change Inactive to Active?';
        }*/
        var r = confirm(statusData);
        if (r == true) {
            var data = "Id=" + rowNos + "&status=" + status;
            //alert(data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/manageStatus"); ?>',
                data: data,
                success: function(data) {
                    //activeFormHandler(data, status, rowNos);
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    $("#message").text('Delete user Successfully.');
                    $("#message").fadeOut(6000, "");
                    $('#row_' + rowNos).remove();
                    getCollectionDataWithPagination('/admin/newManage','userDetails', 'abusedWords_tbody',pageno,5,uname,phone,status1, '');
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
                            <!--<li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>-->
                            <li class="active"><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">
                                <li><a href="/admin/dashboard"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                <li class="active"><a href="/admin/manage"> <i class="fa fa-users"></i> Invite Management</a></li>
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                                <li><a href="/settings/carMakes"> <i class="fa fa-cog"></i> Settings</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">Invitation Management</h4>
                        
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>User Name</label>
                                        <input type="text" id="userName" class="span12" maxlength="50"/>
                                    </div>
                                    <div class="span3">
                                        <label>Phone</label>
                                        <input type="text" id="phone" class="span12" maxlength="10" onkeypress = "return isNumberKey(event);"/>
                                    </div>
                                    <div class="span3">
                                        <label>Status</label>
                                        <select id="status" class="span12">
                                            <option value="20">All</option>
                                            <option value="1">Invited</option>
                                            <option value="0">Not Invited</option>
                                            <option value="2">Re-Invited</option>
                                        </select>
                                    </div>
                                    <div class="span2">
                                        <label>&nbsp;</label>
                                        <input type="button" class="btn btn-primary" name="Search" value="Search" onclick="search();"/>
                                    </div>
                                </div>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th>Name</th><th>Email Address</th><th>Phone</th><th>Location</th><th nowrap>Invited Date</th><th>Status</th><th>Actions</th></tr></thead>
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
            var id2 = $(this).attr('invite-id');
            var inviteStatus = $(this).attr('invite-status');
            var inviteEmail = $(this).attr('invite-email');
           
        
            if(id>0){
                statusChangeUser(Number(id), Number(status));
            }
            if(id2>0){
                inviteUser(Number(id2), Number(inviteStatus), inviteEmail);
            }
        });
    });
    
    $(function(){
        getCollectionDataWithPagination('/admin/newManage','userDetails', 'abusedWords_tbody',1,5,'','','20', '');
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
function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,uname,phone,status, callback){
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
    globalspace[MainDiv+'_pageSize']=Number(PageSize);
    globalspace[MainDiv+'_uname']=uname;
    globalspace[MainDiv+'_phone']=phone;
    globalspace[MainDiv+'_status']=Number(status);
    var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize']+"&uname="+globalspace[MainDiv+'_uname']+"&phone="+globalspace[MainDiv+'_phone']+"&status="+globalspace[MainDiv+'_status'];
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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],globalspace[MainDiv+'_uname'],globalspace[MainDiv+'_phone'],globalspace[MainDiv+'_status'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
            }
    }
    function search(){
       // alert("enter===="+$("#orderNo").val());
        var uname = $("#userName").val();
        var phone = $("#phone").val();
        var status = $("#status").val();
        getCollectionDataWithPagination('/admin/newManage','userDetails', 'abusedWords_tbody',1,5,uname,phone,status,'');
   
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
       if(textData.length>=15){
           document.getElementById(divId).style.display='block';
           document.getElementById(divId).innerHTML=dumpdata;
       }else{document.getElementById(divId).style.display='none';}
    }
    function showTooltipdown(id){
       divId=id.replace(/view/i, "div");
       document.getElementById(divId).style.display='none';
    }
</script>