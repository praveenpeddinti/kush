<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="paddinground" style="height:380px">
                <h2>Customer FeedBack</h2>
                <table id="userTable" class="table table-hover">
                    <thead><tr><th nowrap>Customer Name</th><th nowrap><center>Rating</center></th><th>Comments</th></tr></thead>
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
<script type="text/javascript">
    
       
    $(function(){
        getCollectionDataWithPagination('/site/customerFeedback1','getServices', 'abusedWords_tbody',1,2,'');
    });
    
    
    function getCollectionDataWithPagination(URL,CollectionName, MainDiv, CurrentPage, PageSize,callback){
    globalspace[MainDiv+'_page'] = Number(CurrentPage);
    globalspace[MainDiv+'_pageSize']=Number(PageSize);
    var newURL =  URL+"?"+CollectionName+"_page="+globalspace[MainDiv+'_page']+"&pageSize="+globalspace[MainDiv+'_pageSize'];
    var data = ""; 
    ajaxRequest(newURL,data,function(data){getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback)});
}
function getCollectionDataWithPaginationHandler(data,URL,CollectionName,MainDiv,callback){
      if(data.html==0)
      {
         $("#"+MainDiv).html("No data found");  
      }else
      {
        $("#"+MainDiv).html(data.html);
        $("#pagination").pagination({
                    currentPage: globalspace[MainDiv+'_page'],
                    items: data.totalCount,
                    itemsOnPage: globalspace[MainDiv+'_pageSize'],
                    cssStyle: 'light-theme',
                    onPageClick: function(pageNumber, event) {
                        globalspace[MainDiv+'_page'] = pageNumber;
                        pageno=pageNumber;
                        getCollectionDataWithPagination(URL,CollectionName, MainDiv, globalspace[MainDiv+'_page'], globalspace[MainDiv+'_pageSize'], callback)
                    }

                });
                if(callback!=''){
                    callback();
                }
            }
    }
    
    </script>