<script type="text/javascript">
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
        
        var data = "Id=" + rowNos + "&status=" + status+ "&email=" + email;
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/inviteStatus"); ?>',
                data: data,
                success: function(data) {
                    
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
        if (status == 1) {
            var statusData = 'Do you want to change Active to Inactive?';
        } else {
            var statusData = 'Do you want to change Inactive to Active?';
        }
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
        } else if (status == 1) {
            $('#usera_' + rowNos).attr('class', 'icon_reinvite');
            $('#usera_' + rowNos).attr('invite-status', '2');
        }else {
            $('#usera_' + rowNos).attr('class', 'icon_reinvite');
            $('#usera_' + rowNos).attr('invite-status', '2');
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

                                <li><a href="/admin/dashboard"> <i class="fa fa-user"></i> Invite Friends</a>

                                </li>
                                <li  class="active"><a href="/admin/manage"> <i class="fa fa-phone"></i> Invite Management</a>

                                </li>

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
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <table id="userTable" class="table table-hover">

                                    <thead><tr><th>Email Address</th><th>Status</th><th>Actions</th></tr></thead>
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
    var globalspace = new Object();
    $(document).ready(function() {
        $('#userTable tr td input').live('click', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var id2 = $(this).attr('invite-id');
            var inviteStatus = $(this).attr('invite-status');
            var inviteEmail = $(this).attr('invite-email');
           
        
            if(id>0){alert("delte");
                statusChangeUser(Number(id), Number(status));
            }
            if(id2>0){alert("invite");
                inviteUser(Number(id2), Number(inviteStatus), inviteEmail);
            }
        });
    });
    
    $(function(){
        getCollectionDataWithPagination('/admin/newManage','userDetails', 'abusedWords_tbody',1,5, '');
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
   //alert("URL===="+URL+"==CollectionName==="+CollectionName+"==MainDiv==="+MainDiv+"==CurrentPage==="+CurrentPage+"==PageSize==="+PageSize);
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
        globalspace[MainDiv+'_pageSize']=Number(PageSize);

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
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
    }
</script>