
<?include 'partnerdashboard.php'?>
<?include 'PartnerSignUpPopup.php'?>

<div id="adminmessage">
    
    
</div>

<script type="text/javascript">
    
    var g_pageLength=10;
    var g_page=1;
    var g_pageNumber;
    var g_filterValue;
    var g_searchText;
    var g_startLimit=0;
 
    
    getOnloadMessage(<?php echo $data;?>);
    
    
    
    function getOnloadMessage(data){
        data =data;

        data['lengthVal'] =data.length;
        //$(window).scroll(loadAjax);
        var item = {
            
            'data':data
        };
        $("#adminmessage").html(
            $("#RenderAdminMessagesTmplt").render(item)
        ); 
        
         if(data.total.totalCount==0){
             $("#pagination").hide();
              $("#noRecordsTR").show();
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
            g_startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength));
          getAdminMessages(g_startLimit,g_filterValue,$("#searchTextId").val());
        } });
        
        
        if(data.length==0){
            $("#nomore").html("No Data");
        }  
    $("#filter").val(g_filterValue);
  $('.selectpicker').selectpicker();
  shortDescription(100);
  scrollPleaseWaitClose();
        
    }
    
     function getAdminMessages(startLimit,filterValue,searchText){
     
        scrollPleaseWait();
         g_filterValue=filterValue;
       if(startLimit ==0){
           page=1;
       }
      
           var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength;
       
           ajaxRequest('/admin/getAdminMessages',queryString, getEmployerMessagesHandler);
     }  
    function getEmployerMessagesHandler(data){
        
        pleaseWaitClose();
      getOnloadMessage(data.data)  
    }
    
    function searchadminMessages(event){
        
	var keycode = (event.keyCode ? event.keyCode : event.which);
        
	if(keycode == '13'){
	    pleaseWait();
            if($("#searchTextId").val().trim()!=""){
                var searchText = $("#searchTextId").val();
                g_searchText=searchText;
                getAdminMessages(0,$("#filter").val(),searchText);
            }else{
                g_searchText='';
                getAdminMessages(0,$("#filter").val(),'');
            }
            return false;
            
        }
    }
    

          function filterAdminMessages(value){
        g_filterValue=value;
       if(value=='all') {
           getAdminMessages(0,value,$("#searchTextId").val()); 
       
       }else if(value=='active'){
         getAdminMessages(0,value,$("#searchTextId").val());  
       }
       else if(value=='inactive'){
         getAdminMessages(0,value,$("#searchTextId").val());  
       }
        else if(value=='delete'){
         getAdminMessages(0,value,$("#searchTextId").val());  
       }
    
    }
</script>




 