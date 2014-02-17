    <?php 
    include 'adminCertificateReports.php';
?>
<h4>Certificate Reports</h4>
<div id="interventionreport_error" class="alert alert-error" style="display: none;"></div>
<div class="row-fluid">
    <div class="span10">        
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
<!-- Certificate reports Start -->
<div class="row-fluid" id="interventionDiv">
    <div class="span12 paddingBottom15 ">
        <div id="interventionReports_content"></div>
        <div id="interventionReportsDetailed_content"></div>
    </div>

</div>

<!-- Certificate reports End -->
<h4>Certificate Stats </h4>
<div class="row-fluid ">
    <div class="span12">
            <div id="certificateStats">
            </div>
    </div>    
</div>
<h4>History of the employee's Certificates </h4>
<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
            <div id="certificate_history"></div>
    </div>    
</div>

<div class="row-fluid" id="exportsoptionDiv">
    <div class="span12">
        <div  style="padding-left:8px;margin-top: 5px;text-align: right;" id="exportsId"><i class="icon-pdf48" style="cursor:pointer;" onclick="exportToType('pdf');" rel="tooltip" data-toggle="tooltip" title="Export to PDF"></i>&nbsp;<i class="icon-xls48" rel="tooltip" data-toggle="tooltip" title="Export to XLS" style="cursor:pointer;" onclick="exportToType('xls');"></i></div>
    </div>
</div>







<script type="text/javascript">
    var g_page,
        g_pageLength = 10,
        g_pageNumber,
        g_startLimit,
        g_filterValue,
        g_searchText;
    var g_page1,
        g_pageLength1 = 10,
        g_pageNumber1,
        g_startLimit1,
        g_filterValue1="all",
        g_searchText1;
    var certCnt = 0;
    var certHistCnt = 0;
        $("#adminLayoutTitle").html("<i class='icon-analytics48'></i>Reports");
    $('a[href="#analytics-menu"]').trigger('customCollapse',['toggle=collapse']);
    $('a[href="/admin/certificateReports"]').addClass('aactive');
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
    certificateStatshandler(<?php echo $certificateStats; ?>);
    certificateHistoryhandler(<?php echo $history; ?>);
    function certificateStatshandler(data){
        scrollPleaseWaitClose();
        var item = {
          'data':data
        };
        
        $("#certificateStats").html(
            $("#RenderAdminCertificateStatsTmplt").render(item)
        );
       
      
      certCnt = data.total.totalCount
      
       if( certCnt == 0){
                $("#pagination").hide();
              $("#noRecordsTR").show();
              $("#exportsoptionDiv").hide();
            }else{
                $("#exportsoptionDiv").show();
            }
            if(g_pageNumber==undefined)  {
               g_page=1;  
            }else{
               g_page=g_pageNumber;  
            }
        $("#pagination").pagination({
            currentPage:g_page,
            items: data.total.totalCount,
            itemsOnPage: g_pageLength,
            cssStyle: 'light-theme',
            onPageClick:function(pageNumber, event){
                g_pageNumber=pageNumber;
                var startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength));
              certificateStats4Admin(startLimit,$("#searchTextId").val());
            } 
    });
        $("[rel=tooltip]").tooltip();       
        $('.selectpicker').selectpicker();
        if(certHistCnt != 0 || certCnt != 0){
             $("#exportsoptionDiv").show();
        }
    }
    function certificateHistoryhandler(data){
        scrollPleaseWaitClose();
        var item = {
          'data':data
        };
        $("#certificate_history").html(
            $("#RenderCertificateHistory_tmpl").render(item)
        );
      
      certHistCnt = data.total.totalCount;
       if(certHistCnt == 0){
                $("#pagination1").hide();
              $("#noRecordsTR2").show();
              $("#exportsoptionDiv").hide();
            }else{
                $("#pagination1").show();
              $("#noRecordsTR2").hide();
                $("#exportsoptionDiv").show();
            }
            
            if(g_pageNumber1==undefined)  {
               g_page1=1;  
            }else{
               g_page1=g_pageNumber1;  
            }
        $("#pagination1").pagination({
            currentPage:g_page1,
            items: data.total.totalCount,
            itemsOnPage: g_pageLength1,
            cssStyle: 'light-theme',
            onPageClick:function(pageNumber, event){
                g_pageNumber1=pageNumber;
                var startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength1));
              employeeCertificateHistory4Admin(startLimit,$("#searchTextId1").val());
            } 
    });
        $("[rel=tooltip]").tooltip();        
        $('.selectpicker').selectpicker();
        if(certHistCnt != 0 || certCnt != 0){
             $("#exportsoptionDiv").show();
        }
    }

    
    
    function certificateStats4Admin(startLimit,searchText){
        scrollPleaseWait();
        if(startLimit ==0){
            g_page=1;
        }
        var dates = $("#start_date").val()+"to"+$("#end_date").val();
        var queryString = "searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength+"&dates="+dates;
        ajaxRequest('/admin/getCertificateStats',queryString, certificateStatshandler);
    } 
 
    function employeeCertificateHistory4Admin(startLimit,searchText){        
        scrollPleaseWait();
        if(startLimit ==0){
            g_page1=1;
        }
         var dates = $("#start_date").val()+"to"+$("#end_date").val();
        var queryString = "searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength+"&dates="+dates;
        ajaxRequest('/admin/getEmployeeCertificateHistory',queryString, certificateHistoryhandler);
    }  
        
     function searchCertificateStats(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);                
        if(keycode == '13'){
            scrollPleaseWaitClose();
            if($.trim($("#searchTextId").val())!=""){
                var searchText = $("#searchTextId").val();
                g_searchText = searchText;
                certificateStats4Admin(0,searchText);
            }else{
                g_searchText="";                
                certificateStats4Admin(0,'');
            }
            return false;
        }
    }
 
    
    
    function searchEmployeeCertificateHistory(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);                
        if(keycode == '13'){
            scrollPleaseWaitClose();
            if($.trim($("#searchTextId1").val())!=""){
                var searchText = $("#searchTextId1").val();
                g_searchText1 = searchText;
                employeeCertificateHistory4Admin(0,searchText);
            }else{
                g_searchText1="";                
                employeeCertificateHistory4Admin(0,'');
            }
            return false;
        }
    }
$("#searchList").click(function(){    
        certificateStats4Admin(0);
        employeeCertificateHistory4Admin(0);
    });
    function exportToType(type){
        var queryString = "searchText="+g_searchText+"&cycleDate="+$("#start_date").val()+"to"+$("#end_date").val()+"&type="+type;
        window.location.href = "/admin/certificateReportsExport?"+queryString;
    }
</script>