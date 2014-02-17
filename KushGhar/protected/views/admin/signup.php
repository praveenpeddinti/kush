<?php include_once 'newEmployerPopup.php'; ?>
<?php include_once 'employersScript.php'; ?>

<div class="row-fluid ">
    <div class="span12 paddingBottom15 ">
        <div class="paddingleft10 ">
            
            <div id="signup_errors" class="alert-info"></div>
            <div id="signup_success" class="alert-success" style="padding: 5px;display: none;"></div>
            <div id="signup"></div>
        </div>

    </div>

</div>

<script type="text/javascript">
    var G_userId = "";
    var G_flag = "";
  //  getEmployers(0);
    sessionStorage.pageLength = 10;
       
       $('a[href="#account-menu"]').trigger('customCollapse',['toggle=collapse']);
       
       
       if($("#CommonContactForm_IsEmployer").val()==2)
           { $("#partnerType").hide();
               
             $("#adminLayoutTitle").html("<i class='icon-employer48'></i>Employers");  
               $('a[href="/admin/signup?string=employer"]').addClass('aactive');
           }
           else{
               
            $("#partnerTypView").show();
                $("#adminLayoutTitle").html("<i class='icon-partner48'></i>Providers");
                $('a[href="/admin/signup?string=partner"]').addClass('aactive');
           }
       
       
       
    function newEmployersPopup(){
        $("#CommonContactForm_EmployerId,#CommonContactForm_Logo,#CommonContactForm_UserId,#CommonContactForm_RegistredOn,#CommonContactForm_PrimaryContractId").val("");
        $("#employerResetId").click();
         if($("#CommonContactForm_IsEmployer").val()==2){
             $("#employersPopupTitle").html("New Employer");
         }else{
            $("#employersPopupTitle").html("New Partner"); 
         }
        
        $("#common_employer_error").hide();
        $("#common_employer_error").html("");
        $("#employersPicPreviewId").attr("src","/images/AAAAAA_150.gif");
        $("#CommonContactForm_Email").removeAttr("readonly");
        $("#employerButtonId").val("Save");
        addClass2Body("admin_layout_body", "add");        
        $("#employersPopupId").modal('show');
    }
    function employerDeleteConfirmation(){
        scrollPleaseWait();
        var queryString = "employerId="+G_employerId;
        ajaxRequest("/admin/employerDeleteById", queryString, employerDeleteConfirmationHandler)
    }
    function employerDeleteConfirmationHandler(data){    
        scrollPleaseWaitClose();
        getEmployers(0);
        
        $("#EmployerConfrimDeleteModal").modal('hide');    
        
    }
function getEmployers(startLimit,filterValue,searchText){
        scrollPleaseWait();
        if(filterValue=='' || filterValue==undefined){
            filterValue="all";
        }
        sessionStorage.filterValue=filterValue;
        if(startLimit ==0){
            sessionStorage.pageNumber=1;
        }
        var queryString = "filterValue="+filterValue+"&searchText="+searchText+"&startLimit="+startLimit+"&pageLength="+sessionStorage.pageLength+"&isEmployer="+$("#CommonContactForm_IsEmployer").val();                               
        
        ajaxRequest("/admin/getAllEmployers", queryString, getEmployersHandler);
    }
    
    getEmployersHandler(<?php echo $data;?>)
    
    function getEmployersHandler(data){ 
        
        scrollPleaseWaitClose();
        var item = {
                
            'data':data
        };
       
        $("#notification").hide();
        $("#signup").html(
            $("#employersTmp_render").render(item)
        ); 
            if($("#CommonContactForm_IsEmployer").val()==2){
                for(var i=0; i<data.data.length;i++){
                    $("#partnerTypViewTd_"+data.data[i].eEmployerId).attr("style","display:none");
                }
               $("#partnerTypView").attr("style","display:none");
            }else{
                for(var i=0; i<data.data.length;i++){                   
                    $("#partnerTypViewTd_"+data.data[i].eEmployerId).attr("style","");
                }
               $("#partnerTypView").attr("style","");
            }
            if(sessionStorage.pageNumber==undefined){
                    page=1;
                }else{
                    page = sessionStorage.pageNumber;
                }
                if(sessionStorage.filterValue != undefined){
                    $("#filterEmployerBytype").val(sessionStorage.filterValue);
                }else{
                    sessionStorage.filterValue = "all";
                }
                
            if(data.totalItemsList.totalItems==0){
                    $("#pagination").hide();
                    $("#noRecordsTR").show();
                }
                $("#pagination").pagination({
                    currentPage:page,
                    items: data.totalItemsList.totalItems,
                    itemsOnPage: sessionStorage.pageLength,
                    cssStyle: 'light-theme',
                    onPageClick:function(pageNumber, event){
                        sessionStorage.pageNumber = pageNumber;                        
                        var startLimit = ((parseInt(pageNumber)-1)*parseInt(sessionStorage.pageLength));                        
                        getEmployers(startLimit,$("#filterEmployerBytype").val(),$("#searchEmployerName").val());
                    }
        
                });
                $('.selectpicker').selectpicker();
    }
    $("#newPopup").on('hidden',function(){
    addClass2Body("admin_layout_body", "remove");
    });
</script>




 