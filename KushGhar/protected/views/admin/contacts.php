<?php include 'adminContacts.php' ?>

<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
        <div class="paddingleft10 ">

            <div id="admin_contacts_errors" class="alert-info"></div>
            <div id="adminContactslist"></div>
        </div>

    </div>

</div>
<script type="text/javascript">
    $('a[href="#setup-menu"]').trigger('customCollapse',['toggle=collapse']);
     $('a[href="/admin/contact"]').addClass('aactive');
    getContactList(0);
    var startLimit = 0;
    var pageLength;
    var carouselItemId = 0;
    var G_pageNumber,
    G_page,
    G_filter,
    G_searchValue,
    G_pageLength;
            
    var globalProfilePic = "";
    var G_employerId = "";
    $(document).ready(function(){
                
    });
    function getContactList(startLimit,filterValue,searchText){ 
        $("#adminLayoutTitle").html("<i class='icon-contact48'></i> Admin Contacts");
        scrollPleaseWait();
        var queryString = "";
        startLimit = startLimit;
        G_pageLength = 10;
        if(filterValue=='' || filterValue==undefined){
            filterValue="all";
        }else{
            $("#filterBytype").val(G_filter);
        }
        G_filter = filterValue;
        if(startLimit ==0){
            G_pageNumber=1;
        }
        var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+G_pageLength;                
        ajaxRequest("/admin/getContacts", queryString, getContactListHandler);
    }
    function getContactListHandler(data){
        scrollPleaseWaitClose();
        var item = {
            'data':data
        };
        $("#adminContactslist").html(
        $("#contactlistTmp").render(item)
    );
        if(G_pageNumber==undefined){
            page=1;
        }else{
            page = G_pageNumber;
        }
        //                alert(data.totalUsersList.totalUsers)
        if(data.totalUsersList.totalUsers==0){
            $("#pagination").hide();
            $("#noRecordsTR").show();
        }
        $("#pagination").pagination({
            currentPage:page,
            items: data.totalUsersList.totalUsers,
            itemsOnPage: G_pageLength,
            cssStyle: 'light-theme',
            onPageClick:function(pageNumber, event){
                G_pageNumber = pageNumber;
                //alert(sessionStorage.searchType);
                var startLimit = ((parseInt(pageNumber)-1)*parseInt(G_pageLength));
                //alert(startLimit);
                getContactList(startLimit,$("#filterBytype").val(),$("#searchTextId").val());
            }
        
        });
        $('.selectpicker').selectpicker();
    }
    function deleteContactById(id){
        scrollPleaseWait();
        var queryString = "contactId="+id;
        ajaxRequest("/admin/deleteContactById", queryString, deleteContactByIdHandler)
    }
    function deleteContactByIdHandler(data){
        getContactList(0);
    }
</script>