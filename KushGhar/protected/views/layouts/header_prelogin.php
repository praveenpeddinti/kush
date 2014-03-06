<?php if (($this->getUniqueId() == 'site') &&(empty($this->session['UserId']))) { ?>
    <header>
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <!--header logo start-->
                    <div class="span3">
                        <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/top_logos.png" alt="logo" class="logo" /></a>
                    </div>
                    <!--header logo end -->
                    <!--h_right start -->
                    <div class="span9">
                        <div class=" mobilerightclear">
                            <div class="header_contact_info pull-right">
                                <ul>
                                    <li class="phone">040 233 52575</li>
                                    <li class="email">helpme@kushghar.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="header_menu_items">
                            <ul role="navigation" class="nav">
                                <li class="mobilemiddle">
                                    <div class="input-append search">
                                        <input class="serachInput" id="appendedInputButton" type="text" placeholder="Search...">
                                        <button class="btn btn-large btn-search" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </li>
                                <li class="dropdown ">
                                    <div class="btn-group">
                                        <button class="btn btn-large dropdown-toggle Login_button" data-toggle="dropdown" onclick="loginpopup();">
                                            Login <span class="caret">&nbsp;</span>
                                        </button>
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
        </div>
    </header>
<?php } else { ?>
    <header class="inner_header">
        <div class="container">
            <div class="row-fluid">

                <div class="pull-left">

                <?php if (!empty($this->session['UserId'])) { ?>
                
                    <a href="/user/basicinfo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                </div>
            
                <div class="pull-right">
                    <ul class=" pull-right header_profile">
                        <li id="welcome" class=" pull-left welcome_text">Welcome <?php echo $this->session['firstName']; ?></li>
                        <li class=" pull-left  header_profile_settings dropdown">
                            <a data-original-title="Register" href="#"  data-placement="bottom"  class=" headeranchor" data-toggle="dropdown" id="drop3">
                                <img src="<?php if ($this->session['LoginPic'] == '') { echo '/images/dummy_pp.jpg';} else {echo $this->session['LoginPic'];} ?>" >
                            </a>
                        <div class="dropdown-menu getStarted_dd_div " role="menu" aria-labelledby="dLabel">
                            <div class="headerpoptitle"><?php echo $this->session['firstName']; ?></div>
                            <ul>
                                <li><a href="account"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-user"></i> Settings</a></li>
                                <li><a href="logout" ><i class="fa fa-power-off"></i> Logout</a></li>

                            </ul>
                        </div>

                    </li>
                </ul>

            </div>
<?php }else{ ?>
                <div class="span3">
                    <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner_top_logo.png" alt="logo" class="logo"></a>
                </div>
                <?php } ?>
        </div>
    </div>

</header>
<?php } ?>
<script type="text/javascript">
    function loginpopup(){
        window.location.href=<?php echo Yii::app()->request->baseUrl; ?>'/user/registration';
    }
</script>