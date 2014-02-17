<?php include 'adminContacts.php' ?>


 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    var gUserId='';var gEmail="";
                    var popupStat=false;
                    var carouselItemId = 0;
 google.load("visualization", "1", {packages:["corechart"]});
      //google.setOnLoadCallback(drawChart);
            </script>
<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
        <div class="paddingleft10 ">

            <div id="admin_contacts_errors" class="alert-info"></div>
            <div id="adminContactslist">
                
                 <div  id="chart_div" class="analyticsChart"></div>
            </div>
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
        $("#adminLayoutTitle").html("<i class='icon-contact48'></i> Sign Up Graph");
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
        ajaxRequest("/admin/chartsAjax", queryString, getContactListHandler);
    }
    function getContactListHandler(data){

           var data1 = data;
         
             var mapData = data1.json;
             alert(mapData.toSource())
        scrollPleaseWaitClose();
      
      
    var mapDataObject = new Array();
    var xyArray =  ['Year', 'Visits','gsr'];
    mapDataObject.push(xyArray);
    $.each( mapData, function( key, value ) {
        var record = new Array(key);
        $.each( value, function( k, v ) {
            record.push(v);
        });
        mapDataObject.push(record);
    });
           
           alert(mapDataObject)
    var data = google.visualization.arrayToDataTable(mapDataObject);

    var options = {
        title: '',
        fontSize:'11',
        pointSize:'4',
        fontName:'museo_slab500'
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    $("#analyticStartDate").val(data1.startDate);
    $("#analyticEndDate").val(data1.endDate);
    setupdate();
    //  userActivityMap();
    $('.selectpicker').selectpicker();
    $("#dashboardTitle").html("<i class='icon-analytics'></i> Traffic")
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