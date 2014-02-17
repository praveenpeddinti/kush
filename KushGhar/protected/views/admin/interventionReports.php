<?php include "employerInterventionReportsScript.php"; ?>
<h4>Intervention Reports</h4>
<div class="row-fluid">
    <div class="span10">
        <div id="interventionreport_error" class="alert alert-error" style="display: none;"></div>
        <div class="span4">

            <label>Start Date</label>   
            <input type="text" id="start_date" class="span12" value="<?php echo $startDate; ?>"/>   

        </div>
        <div class="span4">

            <label>End Date</label>   
            <input type="text" id="end_date" class="span12" value="<?php echo $endDate; ?>"/>
        </div>
        <div class="span2">
            <label>&nbsp;</label>
            <input type="button" class="btn btn-warning" value="search" name="searchList" id="searchList" />
        </div>
    </div>
</div>
<!-- Intervention reports Start -->
<div class="row-fluid" id="interventionDiv">
    <div class="span12 paddingBottom15 ">
        <div id="interventionReports_content"></div>
        <div id="interventionReportsDetailed_content"></div>
    </div>

</div>

<!-- Intervention reports End -->

<div class="row-fluid" id="exportsoptionDiv">
    <div class="span12">
        <div  style="padding-left:8px;margin-top: 5px;text-align: right;" id="exportsId"><i class="icon-pdf48" style="cursor:pointer;" onclick="exportType('pdf');" rel="tooltip" data-toggle="tooltip" title="Export to PDF"></i>&nbsp;<i class="icon-xls48" rel="tooltip" data-toggle="tooltip" title="Export to XLS" style="cursor:pointer;" onclick="exportType('xls');"></i></div>
    </div>
</div>
<script type="text/javascript">
    var g_pageLength=10;
    var g_page=1;
    var g_pageNumber;
    var g_filterValue='all';
    var g_searchText;
    var g_quizreportCnt=0;
    var g_startLimit=0;
    $("#adminLayoutTitle").html("<i class='icon-analytics48'></i>Reports");
    $('a[href="#analytics-menu"]').trigger('customCollapse',['toggle=collapse']);
    $('a[href="/admin/interventionReports"]').addClass('aactive');
    interventionDetailsHandler(<?php echo $interventionDetails; ?>);
    g_userType = "admin";
    function interventionDetailsHandler(data){
        scrollPleaseWaitClose();
        var item = {
            'data':data
        };
        $("#interventionReports_content").html(
        $("#employerInterventionReportsScript_render").render(item)
    );
            
        var item = {
            'data':data
        };
        $("#interventionReportsDetailed_content").html(
        $("#detailedInterventionReportsScript_render").render(item)
    );
             
        if(data.total.totalCount == 0){
            $("#pagination,#exportsId").hide();
            $("#noRecordsTR").show();
            $("#exportsoptionDiv").hide();
        }else{
            $("#exportsoptionDiv").show();
        }  
        
        if(g_pageNumber==undefined){
            page=1;
        }else{
            page = g_pageNumber;
        }
        $("#pagination").pagination({
            currentPage:page,
            items: data.total.totalCount,
            itemsOnPage: g_pageLength,
            cssStyle: 'light-theme',
            onPageClick:function(pageNumber, event){
                g_pageNumber=pageNumber;
                var startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength));
                interventionResultset4Admin(startLimit,g_filterValue,g_searchText);
            } 
        });
        $('.selectpicker').selectpicker();
        $("[rel=tooltip]").tooltip();
    }
    $(function(){
        //        $('.selectpicker').selectpicker();
        var currentDate=new Date();
        var maxdate=new Date();
        maxdate.setFullYear(maxdate.getFullYear()-19);
        var mindate=new Date();
        mindate.setFullYear(mindate.getFullYear()-100);
        mindate.setMonth(currentDate.getMonth()+2);
        mindate.setDate(currentDate.getDate()+2);
        $('#start_date').scroller({
            preset: 'date',
            timeFormat:'H:i',	
            //            invalid: { daysOfWeek: [0, 6], daysOfMonth: ['5/1', '12/24', '12/25'] },
            theme: 'android', // for android set theme:'android'
            display: 'modal',
            mode: 'scroller',
            dateFormat:'mm/dd/yyyy',
            dateOrder: 'Md ddyy',
            onSelect: function(valueText, inst) {
                // validate range here
               
            }
            //            maxDate:  maxdate,   
            //            minDate:mindate
	
        });
        $('#end_date').scroller({
            preset: 'date',
            timeFormat:'H:i',	
            //            invalid: { daysOfWeek: [0, 6], daysOfMonth: ['5/1', '12/24', '12/25'] },
            theme: 'android', // for android set theme:'android'
            display: 'modal',
            mode: 'scroller',
            dateFormat:'mm/dd/yyyy',
            dateOrder: 'Md ddyy',
            onSelect: function(valueText, inst) {
                // validate range here              
                checkDates();
               
            }
            //            maxDate:  maxdate,   
            //            minDate:mindate
	
        });
        
    });    
    function checkDates(){
        if($("#start_date").val() != ""){
            var nstartDate = $("#start_date").val();
            var nendDate = $("#end_date").val();
            var startdate1Arr = nstartDate.split("/");
            var newDate=startdate1Arr[2]+","+startdate1Arr[0]+","+startdate1Arr[1];
            var newstartDate = new Date(newDate);
            var enddate1Arr = nendDate.split("/");
            var newDate=enddate1Arr[2]+","+enddate1Arr[0]+","+enddate1Arr[1];
            var newendDate = new Date(newDate);
            if(newendDate.getTime() >= newstartDate.getTime()){
                return true;
            }else{
                $("#interventionreport_error").show();
                $("#interventionreport_error").html("End Date should be greater than or equals to Start Date");
                $("#interventionreport_error").fadeOut(5000,"");
                $("#end_date").val("");
                return false;
            }
        }else{
            $("#interventionreport_error").show();
            $("#interventionreport_error").html("Please choose Start Date");
            $("#interventionreport_error").fadeOut(5000,"");
            $("#end_date").val("");
        }
    }
    function interventionResultset4Admin(startLimit,filterValue,searchText){
        scrollPleaseWait();
        if(filterValue=='' || filterValue==undefined){
            filterValue="all";
        }else{
            g_filterValue = filterValue;
        }        
        if(startLimit ==0){        
            g_pageNumber=1;
        }else{
            g_startLimit = startLimit;
        } 
        var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength+"&cycleDate="+$("#start_date").val()+"to"+$("#end_date").val();
        ajaxRequest("/admin/interventionReports4Admin", queryString, interventionDetailsHandler);    
    }
</script>
<script type="text/javascript">
    $("#searchList").click(function(){        
        interventionResultset4Admin(0);
    });
    function interventionResultsetHandler(data){
        $("#exportsoptionDiv").show();
        scrollPleaseWaitClose();
        var item = {
            'data':data
        };
        $("#interventionReports_content").html(
        $("#employerInterventionReportsScript_render").render(item)
    );
            
        var item = {
            'data':data
        };
        $("#interventionReportsDetailed_content").html(
        $("#detailedInterventionReportsScript_render").render(item)
    );
             
        if(data.total.totalCount == 0){
            $("#pagination,#exportsId").hide();
            $("#noRecordsTR").show();
        }  
        
        if(g_pageNumber==undefined){
            page=1;
        }else{
            page = g_pageNumber;
        }
        $("#pagination").pagination({
            currentPage:page,
            items: data.total.totalCount,
            itemsOnPage: g_pageLength,
            cssStyle: 'light-theme',
            onPageClick:function(pageNumber, event){
                g_pageNumber=pageNumber;
                var startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength));
                interventionResultset4Admin(startLimit,g_filterValue,g_searchText);
            } 
        });
        $('.selectpicker').selectpicker();
        $("[rel=tooltip]").tooltip();
    }    
    function searchInterventionReports(event){        
        var keycode = (event.keyCode ? event.keyCode : event.which);                
        if(keycode == '13'){
            //            $("#programName,#employer").val("");
            scrollPleaseWait();
            if($.trim($("#searchTextId").val())!=""){
                var searchText = $("#searchTextId").val();
                g_searchText = searchText;
                interventionResultset4Admin(0,'',g_searchText);                
            }else{
                g_searchText = "";
                interventionResultset4Admin(0);
            }       
            return false;
        }
    }
    function EmployerInterventionRepotsFilter(value){
        scrollPleaseWait();
        var searchText = $("#searchTextId").val();
        g_searchText = searchText;
        g_filterValue = value;
        interventionResultset4Admin(0,value,searchText);
    }
    function exportType(type){ 
        exportToType(type);
    }
    function exportToType(type){
        var queryString = "filterValue="+g_filterValue+"&searchText="+g_searchText+"&cycleDate="+$("#start_date").val()+"to"+$("#end_date").val()+"&type="+type;
        window.location.href = "/admin/interventionReportsExport?"+queryString;
    }
</script>