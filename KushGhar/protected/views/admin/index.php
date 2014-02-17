<? include 'admindashboard.php';?>
<div id="adminLayoutContent" class="row-fluid">
    <div id="adminContent">
        
    </div>
</div>

<script  type="text/javascript">
    getOnloadMessage(<?php echo $data ?>);
    function getOnloadMessage(data){
        
        data =data;
        var item = {
            
            'data':data
        };
        
        
        $("#adminContent").html(
        $("#admindashboard_tmpl").render(item)
    );  
     scrollPleaseWaitClose();
        
    }
</script>