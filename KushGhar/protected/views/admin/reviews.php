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
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li class="active"><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4 class="paddingL20">User Review/Feedback</h4>
                        <div id="TC" style="display:none"></div>                       
                        <div class="paddinground">    
                            <div id="InviteInfoSpinLoader"></div>
                            <div id="tablewidget"  style="margin: auto;"><div id="message" style="display:none"></div>
                                <div class="table-responsive"> <table id="userTable" class="table table-hover usermanagement_table">

                                        <thead><tr><th>Name</th><th nowrap>Service Type</th><th>Rating</th><th>Feedback</th><th nowrap>Is publish</th></tr></thead>
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
$(document).ready(function() {
        $('#userTable tr td input').live('click', function() {
            var id = $(this).attr('id');
            var id2 = $(this).attr('review-id');
            var inviteStatus = $(this).attr('comment-status');
            
            var x = document.getElementById(id).checked;
            commentPublish(Number(id2), Number(inviteStatus), x);
            
        });
    });
    $(function(){
        getCollectionDataWithPagination('/admin/newreviews','userDetails', 'abusedWords_tbody',1,5,'');
    });
    function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,callback){
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
                        pageno=pageNumber;
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'],callback)
                    }
                });
            if(callback!=''){
                callback();
        }
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
    
    function commentPublish(rowNos, status,x) {
        var data = "Id=" + rowNos + "&value=" + x;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/feedbackPublish"); ?>',
                data: data,
                success: function(data) {
                    $('#message').show();
                    $("#message").addClass('alert alert-success');
                    if(data.data=='true'){
                        $("#message").text('Customer Feedback is published.');
                    }else{
                        $("#message").text('Customer Feedback is unpublished.');
                    }
                    $("#message").fadeOut(6000, "");
                    },
                error: function(data) { // if error occured
                    //alert("Error occured.please try again");

                }
            });
        
    }
</script>
