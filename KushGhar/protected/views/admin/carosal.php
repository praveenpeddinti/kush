
  <?php include 'carouselImages.php'?>
<?include 'addNewCarouselItemPopup.php'?>

<div id="adminContent">
    
    
</div>

<script type="text/javascript">
    var globalProfilePic = "";
    var g_pageLength=10;
    var g_page=1;
    var g_pageNumber;
    var g_filterValue="all";
    var g_searchText;
    var g_startLimit=0;
    $("#carouselPopupId").on('hidden',function(){
         addClass2Body('admin_layout_body','remove');
        var queryString = "fileName="+globalProfilePic;
//        if(globalProfilePic != "")
//        ajaxRequest("/employers/deleteFile", queryString, deleteHandler)
    });
//    function deleteHandler(data){
//        globalProfilePic = "";
//    }
//    $(document).ready(function(){
       $("#adminLayoutTitle").html("<i class='icon-carosal48'></i>Banner Management");
//    });
    getCarouselItemsHandler(<?php echo $data;?>);
    
    
  $('a[href="#setup-menu"]').trigger('customCollapse',['toggle=collapse']);
    $('a[href="/admin/carosal"]').addClass('aactive');

            function getCarouselItems(startLimit,filterValue,searchText){               
                scrollPleaseWait();
                if(filterValue=='' || filterValue==undefined){
                    filterValue="all";
                }
           
                if(startLimit ==0){
                    g_page=1;
                }
                var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+g_pageLength;               
                ajaxRequest("/admin/getCarouselItems", queryString, getCarouselItemsHandler);
            }
           
            function getCarouselItemsHandler(data){  
            
   
                scrollPleaseWaitClose();
                var item = {
               
                    'data':data
                };
                $( "#adminContent" ).html(
                $( "#carouselRenderTmplt").render(item)
            );
                shortDescription(100);
                $("#headerIcons").hide();
              
              
                $('.selectpicker').selectpicker();
                $("#dashboardTitle").html("<i class='icon-analytics'></i> Banner Items")
                $("[rel=tooltip]").tooltip();
                $("#carouselDivId").click(function(){   
                     addClass2Body('admin_layout_body','add');
                    $("#carouselPopupId").modal('show');  
                    $("#carouselResetId").click();
                    $("#custom_error").html("");
                    $("#carouselPopupTitle").html("New Banner Item");          
                    $("#carouselButtonId").val("Save");                   
                    $("#profilePicPreviewId").attr('src','/images/AAAAAA_150.gif');
                });
      if(data.totalItemsList.totalItems==0){
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
        items: data.totalItemsList.totalItems,
        itemsOnPage: g_pageLength,
        cssStyle: 'light-theme',
        onPageClick:function(pageNumber, event){
            g_pageNumber=pageNumber;
            g_startLimit = ((parseInt(pageNumber)-1)*parseInt(g_pageLength));
         
           getCarouselItems(g_startLimit,g_filterValue,$("#carousel_searchTextId").val());
        } });
        
        
        if(data.length==0){
            $("#nomore").html("No Data");
        }  
     

  $('.selectpicker').selectpicker();
  shortDescription(100);
  
    $("#filter").val(g_filterValue);
    $('a#setup-menu').trigger('click');
  scrollPleaseWaitClose();
           
            }
            function carouselItemDelete(carouselItemId){
                var queryString = "id="+carouselItemId;
                scrollPleaseWait();
                ajaxRequest('/admin/deleteById', queryString, carouselItemDeleteHandler)
            }
            function carouselItemDeleteHandler(data){           
                scrollPleaseWaitClose();
                if(data.status == "success"){
        $('#admin_errors').html("<span class='paddingleft10'>Message deleted successfully!!</span>");
     $("#admin_errors").fadeIn().delay(1000).fadeOut();
                    carouselItemId = 0;
                    getCarouselItems(0);
                    $("#confrim2deleteModal").modal('hide');
                }
            }
            $("#confrim2deleteModal").on('hidden',function(){
                addClass2Body("admin_layout_body","remove");
            });
            

  
    $('a#setup-menu').trigger('click');
  

</script>




 