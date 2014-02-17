<?php 
    include 'adminQuizReportsScript.php';
?>
<h4>Quiz Reports</h4>
<div id="quizreport_error" class="alert alert-error" style="display: none;"></div>
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

<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
            <div id="quizReports_content"></div>
    </div>

</div>

<script type="text/javascript">
    var g_pageLength=10;
    var g_page=1;
    var g_pageNumber;
    var g_filterValue='all';
    var g_searchText;
    var g_quizreportCnt=0;
    $("#adminLayoutTitle").html("<i class='icon-analytics48'></i>Reports");
    $('a[href="#analytics-menu"]').trigger('customCollapse',['toggle=collapse']);
    $('a[href="/admin/adminQuizReports"]').addClass('aactive');
    getQuizDetailsHandler(<?php echo $allquizdetails; ?>);
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
                    $("#quizreport_error").show();
                    $("#quizreport_error").html("End Date should be greater than or equals to Start Date");
                    $("#quizreport_error").fadeOut(5000,"");
                    $("#end_date").val("");
                    return false;
                }
            }else{
                $("#quizreport_error").show();
                $("#quizreport_error").html("Please choose Start Date");
                $("#quizreport_error").fadeOut(5000,"");
                $("#end_date").val("");
            }
        }
        
    $("#searchList").click(function(){
        if($("#start_date").val() != "" && $("#end_date").val() != ""){
            getQuizReports(0);            
        }else{
            $("#quizreport_error").show();
            $("#quizreport_error").html("Please choose Start Date and End Date");
            $("#quizreport_error").fadeOut(5000,"");
        }
    });
    function getQuizDetailsHandler(data){
        scrollPleaseWaitClose();
        var item = {
            'data':data
        };
        $("#quizReports_content").html(
        $("#adminQuizReportsScript_render").render(item)
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
                getQuizReports(startLimit,g_filterValue,g_searchText);
            } 
        });
        $('.selectpicker').selectpicker();
         $("[rel=tooltip]").tooltip();
    }
    function getQuizReports(startLimit,filterValue,searchText){
       scrollPleaseWait();
        if(filterValue=='' || filterValue==undefined){
            filterValue="all";
        }else{
            g_filterValue = filterValue;
        }        
        if(startLimit ==0){
            g_pageNumber=1;
        } 
        var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength+"&startDate="+$("#start_date").val()+"&endDate="+$("#end_date").val();
        ajaxRequest("/admin/getQuizReports", queryString, getQuizDetailsHandler);
    }
    function validateForm(){
        if($("#start_date").val() != "" && $("#end_date").val() != ""){
            return true;
        }else{
            return false;
        }
    }
//    function reportsHandler(data){
//        scrollPleaseWaitClose();
//        alert(data.toSource());
//        getQuizDetailsHandler(data);
//    }
    function searchQuizOrEmployeeOrProvider(event){        
        var keycode = (event.keyCode ? event.keyCode : event.which);                
        if(keycode == '13'){
//            $("#programName,#employer").val("");
            scrollPleaseWait();
            if($("#searchTextId").val().trim()!=""){
                var searchText = $("#searchTextId").val();
                g_searchText = searchText;
                getQuizReports(0,'',g_searchText);
            }else{
                g_searchText = "";
                getQuizReports(0);
            }       
            return false;

        }
    }
</script>