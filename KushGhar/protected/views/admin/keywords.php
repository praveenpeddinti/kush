
<? include 'keywordsRender.php' ?>
<? include 'keywordsPopup.php' ?>


<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
        <div class="paddingleft10 ">

            <div id="admin_errors" class="alert-info"></div>
            <div id="adminmessage"></div>
        </div>

    </div>

</div>

<script type="text/javascript">
    
    var g_pageLength=10;
    var g_page=1;
    var g_pageNumber;
    var g_filterValue;
    var g_searchText;
    var g_startLimit=0;
 
    
    getOnloadKeywords(<?php echo $data; ?>);
    $('a[href="#messages-menu"]').trigger('customCollapse',['toggle=collapse']);
    $('a[href="/admin/keywords"]').addClass('aactive');
   

    function getOnloadKeywords(data){  
        data =data;
        data['lengthVal'] =data.length;
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
                getKeywords(g_startLimit,g_filterValue,$("#searchTextId").val());
            } });
        
        
        if(data.length==0){
            $("#nomore").html("No Data");
        }  
        $("#filter").val(g_filterValue);
        $('.selectpicker').selectpicker();
        shortDescription(100);
  
        $("#adminLayoutTitle").html("<i class='icon-messages48'></i>Literacy Topics");
        scrollPleaseWaitClose();
        
    }
    
    function getKeywords(startLimit,filterValue,searchText){
     
        scrollPleaseWait();
        g_filterValue=filterValue;
        if(startLimit ==0){
            page=1;
        }
      
        var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength;
       
        ajaxRequest('/admin/getKeyWords',queryString, getKeywordsHandler);
    }  
    function getKeywordsHandler(data){
       
        pleaseWaitClose();
        getOnloadKeywords(data.data)  
    }
    
    function searchKeywords(event){
        
        var keycode = (event.keyCode ? event.keyCode : event.which);
        
        if(keycode == '13'){
            pleaseWait();
            if($("#searchTextId").val().trim()!=""){
                var searchText = $("#searchTextId").val();
                g_searchText=searchText;
                getKeywords(0,$("#filter").val(),searchText);
            }else{
                g_searchText='';
                getKeywords(0,$("#filter").val(),'');
            }
            return false;
            
        }
    }
    

    function filterKeywords(value){
        g_filterValue=value;
        if(value=='all') {
            getKeywords(0,value,$("#searchTextId").val()); 
       
        }else if(value=='active'){
            getKeywords(0,value,$("#searchTextId").val());  
        }
        else if(value=='inactive'){
            getKeywords(0,value,$("#searchTextId").val());  
        }
        else if(value=='delete'){
            getKeywords(0,value,$("#searchTextId").val());  
        }
    
    }
  



</script>




