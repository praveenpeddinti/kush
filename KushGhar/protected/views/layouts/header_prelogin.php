<?php if (($this->getUniqueId() == 'site') &&(empty($this->session['UserId']))) { ?>
    <header>
        <div class="container"><?php //echo "===1====".$this->getUniqueId()."=====".$this->session['Type']."===Id==".$this->session['UserId'];?>
            <div class="row-fluid">
                <div class="span12">
                    <!--header logo start-->
                    <div class="span3">
                        <?php if($this->session['UserType']=='inviteToEmail'){?>
                        <a href="/site/invite"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/top_logos.png" alt="logo" class="logo" /></a>
                        <?php } else if($this->session['UserType']=='inviteToCust'){ ?> 
                        <a href="/site/inviteCust"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/top_logos.png" alt="logo" class="logo" /></a>
                        <?php }else { ?>
                        <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/top_logos.png" alt="logo" class="logo" /></a>
                        <?php } ?>
                    </div>
                    

                    <!--header logo end -->
                    <!--h_right start -->
                    <div class="span9">
                        
                        <div class=" mobilerightclear">
                            <div class="header_contact_info pull-right">
                                <ul>
                                    <li class="phone" style="color:#F58220">1-800-3070-6959</li>
                                    <li class="email" ><a href="mailto:helpme@kushghar.com" style="color:#F58220">helpme@kushghar.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header_menu_items">
                            <ul role="navigation" class="nav">
                                <li class="dropdown "> 
                                    <a class="vendor_b" href="/site/vregistration"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vendor_b.png" class="logo" /></a>
                                </li>
                                <li class="mobilemiddle">
                                    <div class="input-append " style="width:187px">
                                    <script>
                                        (function() {
                                          var cx = '001516148304717743126:d3ggxtr1sve';
                                          var gcse = document.createElement('script');
                                          gcse.type = 'text/javascript';
                                          gcse.async = true;
                                          gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                                              '//www.google.com/cse/cse.js?cx=' + cx;
                                          var s = document.getElementsByTagName('script')[0];
                                          s.parentNode.insertBefore(gcse, s);
                                        })();
                                      </script>
                                      <gcse:search></gcse:search>
                                        <!--<input class="serachInput" id="appendedInputButton" type="text" placeholder="Search...">
                                        <button class="btn btn-large btn-search" type="button"><i class="fa fa-search"></i></button>-->
                                    </div>
                                </li>
                                <li class="dropdown ">
<!--                                    <div class="btn-group">
                                        <button class="btn btn-large dropdown-toggle Login_button" data-toggle="dropdown" onclick="loginpopup();">
                                            Request Invite 
                                            <span class="caret">&nbsp;</span>
                                        </button></div>-->
                                    <div class="btn-group">
                                        <button class="btn btn-large dropdown-toggle Login_button" data-toggle="dropdown" onclick="SignInpopup();">
                                            SignIn 
                                            <span class="caret">&nbsp;</span>
                                        </button></div>
                                        <!--<div class="dropdown-menu Login_dd_div " role="menu" aria-labelledby="dLabel">
                            <form style="margin: 0px" accept-charset="UTF-8" action="/sessions" method="post">
                            <div class="headerpoptitle">Login</div>
                            <div class="logindiv">
                            <div class="row-fluid">
                            <div class="span12">
                              <label>User ID</label>
                           <input  type="text"   class="span12 email " />
                             </div>
                            </div>
                             <div class="row-fluid">
                            <div class="span12">
                               <label>Password</label>
                                    <input  type="password"   class="span12 pwd " />
                               </div>
                            </div>
    <div class="headerbuttonpopup">
        <div class="pull-left padding8top lineheight25">
           <a href="#">forgot your password?</a>
        </div>
        <input class="btn btn-2 btn-2a pull-right" name="commit" type="submit" value="Login" />
    </div>
    </div>
    </form>
                            </div>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--h_right end -->
        <div class="headercontent_links">
<div class="row-fluid">
                <div class="header_links paddingT10">
                    
                        <a href="#" onclick="HomeClick();">Home</a> | <a href="/site/cleaning">Services</a> | <a href="/site/aboutus">About Us</a> | <a href="/site/press">Press</a> | <a href="/site/careers">Careers</a> | <a href="/site/mission">KushGhar's Mission</a> | <a href="/site/termsofService">Terms of Service </a> | <a href="/site/privacyPolicy">Privacy Notice</a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/customerFeedback">Customer Feedback</a>
                    
                </div>
            </div>
</div>
    </header>
<?php } else { ?>
    <header class="inner_header">
        <div class="container">
            <div class="row-fluid">

                <?php if (!empty($this->session['UserId'])) { ?>
                <div class="pull-left">
                    <?php if($this->session['Type']=='Customer'){?>
                    <a href="/user/basicinfo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php }?>
                    <?php if($this->session['Type']=='Vendor'){?>
                    <a href="/vendor/vendorBasicInformation"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php }?>
                    <?php if($this->session['Type']=='Admin'){?>
                    <a href="/admin/dashboard"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php }?>
                    <div class="comesoon">Our services are currently available in Hyderabad. Launching Nationwide soon.</div>
                </div>

                <div class="pull-right">
                    <ul class=" pull-right header_profile">
                        <?php if ($this->session['is_Assumed_By_Admin']==1) { ?><li id="backtoadmin" class=" pull-left back_to_admin">Admin logged in on behalf of <?php echo $this->session['firstName']; ?> <!--<a href="<?php //echo Yii::app()->request->baseUrl; ?>/site/adminlogin">Back to Admin</a>-->
                        <input type="button" value="Back to Admin" class="btn btn_backAdmin" onclick="backToAdmin(1)" /></li><?php }?>
                        <li id="welcome" class=" pull-left welcome_text">Welcome <?php echo $this->session['firstName']; ?></li>
                        <li class=" pull-left  header_profile_settings dropdown">

                             <a data-original-title="Register" href="#"  data-placement="bottom"  class=" headeranchor" data-toggle="dropdown" id="drop3"><i class="fa fa-cog"></i> </a>
                        <div class="dropdown-menu getStarted_dd_div " role="menu" aria-labelledby="dLabel">
                            <div class="headerpoptitle"><img src="<?php if ($this->session['LoginPic'] == '') { echo '/images/dummy_pp.jpg';} else {echo $this->session['LoginPic'];} ?>" ><?php echo $this->session['firstName']; ?></div>
                            <ul>
                                <?php if($this->session['Type']=='Customer'){?>
                                <li><a href="/user/basicinfo"><i class="fa fa-user"></i> Account</a></li>
                                <?php }?>
                                <?php if($this->session['Type']=='Vendor'){?>
                                <li><a href="/vendor/vendorBasicInformation"><i class="fa fa-user"></i> Account</a></li>
                                <?php }?>
                                <?php if($this->session['Type']=='Admin'){?>
                                <li><a href="/admin/dashboard"><i class="fa fa-user"></i> Account</a></li>
                                <?php }?>
                                <!--<li><a href="account"> <i class="fa fa-user"></i> Account</a></li>-->
                                <!--<li><a href="#"><i class="fa fa-user"></i> Settings</a></li>-->
                                <li><a href="/user/logout" ><i class="fa fa-power-off"></i> Logout</a></li>

                            </ul>
                        </div>

                    </li>
                </ul>

            </div>
<?php }else{ ?>
                <div class="pull-left">
                    <?php if($this->session['UserType']=='inviteToEmail'){?>
                    <a href="/site/invite"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php } else if($this->session['UserType']=='inviteToCust'){ ?> 
                    <a href="/site/inviteCust"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php } else {?>
                    <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                    <?php } ?>
                </div>
                <?php } ?>
        </div>
    </div>

</header>
<?php } ?>
<script type="text/javascript">
    
    
//    function loginpopup(){
//        window.location.href='<?php //echo Yii::app()->request->baseUrl; ?>/site/registration';
//        
//        //getCollectionDataWithPagination('/user/inviteRegistration','my', 'modelBodyDiv', '');
//    }
    function adminLoginpopup(){
        window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/admin/login';
    }
    function SignInpopup(){
        window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/site/registration?ClickBy=SignIn';
    }
  
    function backToAdmin(id){
        
        
        var data = "Id="+id;
        
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/site/adminlogin"); ?>',
                data: data,
                
                success: function(data) {
                    
                    window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/admin/order';
                    
                },
                error: function(data) { 
                    
                   alert("Error occured.please try again");

                }
            });
    }
</script>

