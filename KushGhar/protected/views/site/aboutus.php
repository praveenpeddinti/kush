<div class="row-fluid ">
   	  <div class="span11 paddingBottom15 ">
              <h4>About Us</h4>
        <?php echo $aboutus; ?>
    
          </div>
</div>


<div class="row-fluid ">
   	  <div class="span11 paddingBottom15 ">
              <h4>About Us</h4>
              <!--<div class="thumbnail" style="width: 150px; height: 150px;margin-bottom:10px"><img style="width:150px;height:150px" src="/images/profilebig.png"  id="profilePicPreviewId"/></div>-->

             <?php foreach($details as $row){ ?>
              <div><h1>
                  <?php echo $row['Name'].' - '.$row['Type'];?></h1>

              </div>
              <div>
                  <?php echo $row['Description'];?>
              </div>

             <?php } ?>
             <?php //echo $details['Type']; ?>
              <?php //echo $details['Description']; ?>

          </div>
</div>
