  <div id="carouselPopupId" class="modal fade">
      <div class="modal-dialog">
<div  class="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:580px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="carouselPopupTitle" class="popuptitle">New Carousel Item</h3>
    </div>
    <div class="modal-body">
        <div class="form" action="#" id="breathwellstoriesFormDiv">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'carousel-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data',
                ),
                    ));
            ?>
            <div  id="reg_error" class="alert-error" >
                <?php echo $form->error($this->carouselModel, 'error'); ?> 
<?php echo $form->error($this->carouselModel, 'Name', array("inputID" => "CarouselForm_Name", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  
                <?php echo $form->error($this->carouselModel, 'Description', array("inputID" => "CarouselForm_Description", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  

                <?php echo $form->error($this->carouselModel, 'Picture', array("inputID" => "CarouselForm_Picture", "afterValidateAttribute" => 'js:function(form, attribute, data, hasError)
{
//showRegErrorMessage(form, attribute, data, hasError);
}')); ?>  
                
            </div>
            <div id="custom_error" class="alert-error" style="list-style: none;"></div>
            <?php echo $form->hiddenField($this->carouselModel, 'Id', array('id' => 'CarouselForm_Id')); ?>  
             <?php echo $form->hiddenField($this->carouselModel, 'Picture2', array('id' => 'CarouselForm_Picture2')); ?>
                            
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        
                        <div class="control-group" >
                        <div class="thumbnail alignright" style="width: 150px; height: 150px;margin-bottom:10px;"><img style="width:150px;height:150px" src="/images/AAAAAA_150.gif"  id="profilePicPreviewId"/></div>
                    
                            <?
                        $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                            'id' => 'CarouselForm_Picture',
                            'config' => array(
                                'multiple'=>false,
                                'action' => Yii::app()->createUrl('admin/fileUpload'),
                                'allowedExtensions' => array("jpg", "jpeg", "gif", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
    //               'minSizeLimit'=>10*1024,// minimum file size in bytes
                                'onComplete' => "js:function(id, fileName, responseJSON){ 
                                    var data = eval(responseJSON); 
                                    globalProfilePic = '/images/carouselImages/250X250/'+data.filename;
                                     $('#CarouselForm_Picture').val(globalProfilePic);
                                     $('#CarouselForm_Picture2').val(globalProfilePic);
                                    $('#profilePicPreviewId').attr('src',globalProfilePic); 
                                    }
                                    ",
                            //'messages'=>array(
                            //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                            //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                            //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                            //                  'emptyError'=>"{file} is empty, please select files again without it.",
                            //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                            //                 ),
                            'showMessage'=>"js:function(message){ customErrorDiv(message)}"
                            )
                        ));
                        ?>
                        </div>
                    </div>
                        
                    
                    <div class="span8">
                           
            <div class="row-fluid">
                <div class="span12">
                        <div class="control-group">

                        <?php echo $form->label($this->carouselModel,'Name'); ?>                            
                            <?php echo $form->textField($this->carouselModel, 'Name', array('id' => 'CarouselForm_Name', 'maxlength' => 50, 'class' => 'span12')); ?>
                                                  
                    </div>
                    </div></div>
                        <div class="row-fluid">
                <div class="span12">
                        <div class="control-group">

                         <?php echo $form->label($this->carouselModel, 'Description'); ?>                        
                            <?php echo $form->textArea($this->carouselModel, 'Description', array('id' => 'CarouselForm_Description','class'=>'span12 description_height')); ?>                                              
                    </div>
                    </div></div>
                </div>
            </div>

        </div>
        
    </div>  
        </div> 
        <div class="modal-footer">
            <div  class="row-fluid">
                <div class="span12" style="padding:5px;text-align:right">
<!--                                                <input type="button" class="btn btn-success  btn-large btn-block r_login" onclick="clicksub()"/>-->
                    <?php echo CHtml::Button('Save', array('onclick' => 'submitCarouselForm();', 'class' => 'btn btn-warning', 'id' => 'carouselButtonId')); ?> 

                    <?php echo CHtml::resetButton('Clear', array("id" => 'carouselResetId', 'class'=>'btn btn-primary btn-info',"style"=>'display:none;'));  ?>

                </div>	
            </div>	
            <?php $this->endWidget(); ?> 
        </div>




                  



</div>
  </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
    if($("#CarouselForm_Id").val() == "" || $("#CarouselForm_Id").val() == "null" || $("#CarouselForm_Id").val() == undefined){
        $("#carouselResetId").click();         
    }
    
});
        
        function submitCarouselForm(){
            if($("#CarouselForm_Id").val() != ""){
                $('#CarouselForm_Picture').val(globalProfilePic);  
                 $('#CarouselForm_Picture2').val(globalProfilePic);  
            }
            var data=$("#carousel-form").serialize(); 
            $("#CarouselForm_Description_em_,#CarouselForm_Name_em_").text("");
                $("#CarouselForm_Description_em_,#CarouselForm_Name_em_").hide();       
                scrollPleaseWait();
               $.ajax({
                    type: 'POST',
                    url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/saveCarouselItems"); ?>',
                    data:data,
                    success:submitCarouselFormHandler,
                    error: function(data) { // if error occured
                        alert("Error occured.please try again==="+data.toSource());
                        // alert(data.toSource());
                    },

                  dataType:'json'
                }); 
        }

    function submitCarouselFormHandler(data){
    scrollPleaseWaitClose(); 
        if(data.status == "success"){            
            globalProfilePic = "";
            $("#carouselPopupId").modal('hide');    
            $("#carouselResetId").click(); 
            getCarouselItems(0);
//            window.location.href = "/admin/carosal"
        }else{
            $("#carouselButtonId").val("Save");
            var lengthvalue=data.error.length;
            var error=[];
            if(typeof(data.error)=='string'){
                var error=eval("("+data.error.toString()+")");
            }else{
                var error=eval(data.error);
            }
            var j=0;
            var erVal = "";
            
             var errorStr=[];
//            var errorString = [];
            if(typeof(data.pictureError)=='string'){
                var errorStr=eval("("+data.pictureError.toString()+")");
            }else{
                var errorStr=eval(data.pictureError);
            }
            
            $.each(error, function(key, val) {
              //  $("#reg_error").removeClass();
              //  $("#reg_error").addClass("alert alert-danger");
                if($("#"+key+"_em_")){     
                    
//                    $("#reg_error").html("");
                    $("#"+key+"_em_").text(val); 
                    erVal = val;                    
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                    j++;
                }             
               
            }); 
            
            $.each(errorStr, function(key, val) {
                
                if(val != ""){
                    if($("#"+key+"_em_")){ 
                    $("#"+key+"_em_").text(val);                                                    
                    $("#"+key+"_em_").show();
                    $("#"+key).parent().addClass('error');
                
                }
                }else{
                    $("#"+key+"_em_").text("");
                    $("#"+key+"_em_").hide();
                    $("#"+key).parent().removeClass('error');
                }
                
                
            }); 
        }
        
    }
        
    function mediaErrorMsg(msg,id,fileid){
        if($("#BreathWellStoriesForm_id").val() == "")
            $("#breathWellStoryButtonId").val("Save");
        else if($("#BreathWellStoriesForm_id").val() != ""){
            $("#breathWellStoryButtonId").val("Update");
        }
        $("#"+id+"_em_").text(msg); 
        $("#"+id+"_em_").show();
        $("#"+fileid).parent().addClass('error');
        return;
    }
        
    function searchCarouselItem(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            scrollPleaseWait();
            if($.trim($("#carousel_searchTextId").val())!=""){
                var searchText = $("#carousel_searchTextId").val();
                g_searchText=searchText;            
                getCarouselItems(0,$("#filter").val(),searchText);
            }else{
                getCarouselItems(0,$("#filter").val());
            }
            return false;

        }
    }
    
    function filterCarouselByValue(value){
    pleaseWait();
  // sessionStorage.removeItem("searchText");
   // sessionStorage.removeItem("searchType");
    var searchText = $("#carousel_searchTextId").val();
    g_searchText = searchText;
    g_filterValue=value;
   // alert(searchText);
    getCarouselItems(0,g_filterValue,g_searchText);
   
}

// *****************************************Presently Not in Use **********************************************//
function addNewfileItem(){
        var divCont1 = '<div id="fileBrowser"><div class="row-fluid"><div class="span12" style="height:100px"><div class="span10">'+
                        '<div class="control-group" style="position: relative">'+
                            '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                '<div class="fileupload-new thumbnail" style="width: 50px; height: 50px;"><img src="/images/AAAAAA.gif"  id="carouselImagePreviewId1"/></div>'+
                                '<div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;" id=""></div>'+
                                '<span class="btn btn-file" style="overflow:hidden;">'+
                                    '<span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="carouselImageFileType1" name="carouselImageFileType1[]" onchange="Checkfiles(this,\'CarouselForm_Picture_em_\')"/>'+
                                '</span>'+
                                '<span    id="carouselToggleItem1"   rel="tooltip" data-toggle="tooltip" title="add new image" class="minus" onclick="removeNewfileItem(\'fileBrowser\')" style="padding-left: 4px;padding-top:18px;vertical-align: middle">&nbsp;</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+                
                '</div>'
            '</div></div>';
    var totalDiv;
$("#newFileBrowser").show();
if($('#newFileBrowser').html() && $("#fileBrowser").html()){
//    var divCont = '<div id="fileBrowser1"><div class="row-fluid"><div class="span12" style="height:100px"><div class="span10">'+
//                        '<div class="control-group" style="position: relative">'+
//                            '<div class="fileupload fileupload-new" data-provides="fileupload">'+
//                                '<div class="fileupload-new thumbnail" style="width: 50px; height: 50px;"><img src="/images/AAAAAA.gif"  id="carouselImagePreviewId2"/></div>'+
//                                '<div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;" id=""></div>'+
//                                '<span class="btn btn-file">'+
//                                    '<span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="carouselImageFileType2" name="carouselImageFileType2[]" onchange="Checkfiles(this,\'CarouselForm_Picture_em_\')"/>'+
//                                '</span>'+
//                                '<span    id="carouselToggleItem2"   rel="tooltip" data-toggle="tooltip" title="add new image" class="minus" onclick="removeNewfileItem(\'fileBrowser1\')" style="padding-left: 4px;padding-top:18px;vertical-align: middle">&nbsp;</span>'+
//                            '</div>'+
//                        '</div>'+
//                    '</div>'+                
//                '</div>'
//            '</div></div>';
//            $("#carouselToggleItem").removeClass();
//            totalDiv = divCont1+divCont;
//    $("#newFileBrowser").html(totalDiv);
}else{   
    $("#carouselToggleItem").removeClass();
   $("#newFileBrowser").html(divCont1);
}

}

function removeNewfileItem(id){
//    $("#newFileBrowser").html("");
    $('#'+id).remove();
    $("#newFileBrowser").html($("#newFileBrowser").html());
    $("#carouselToggleItem").removeClass();
    $("#carouselToggleItem").addClass('add');
}
// ****************************************************END********************************************************//
</script>
