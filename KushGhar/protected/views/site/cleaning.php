<div class="container">

    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class=""><a href="#" ><span class="KGaccounts"> </span></a></li>
                            <li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>

                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="payment" class="collapse">
                            <div class="selected_tab">payment</div>
                            <ul class="l_menu_sub_menu">
                                <li class=""><a href="#"> <i class="fa fa-user"></i> Basic Info</a> <div class="status_info1"> </div></li>
                                <li ><a href="#"> <i class="fa fa-phone"></i> Contact Info</a> <div class="status_info2"> </div></li>
                                <li ><a href="#"> <i class="fa fa-credit-card"></i> Payment Info</a> <div class="status_info3"> </div></li>
                            </ul>
                        </div>
                        <div id="services" class="collapse in">
                            <div class="selected_tab">Services</div>
                            <ul class="l_menu_sub_menu">
                                <li class="active"><a href="/site/cleaning"> Cleaning</a></li>
                                <li ><a href="/site/carwash"> Car Wash</a> </li>
                                <li ><a href="/site/stewards">  Stewards / Stewardesses</a> </li>
                                <li ><a href="/site/moreservices">  More ...</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <input type="hidden" id="VV" value="<?php echo $this->session['UserType'];?>" >
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/service_banner1.jpg" class="service_banner" />
                        <div class="paddinground">
                            <h2>What services Kushghar Offer ?</h2>
                            <div class="static_page_heading"></div>
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="paddingL20">
                                        <h3>House cleaning Service</h3>
                                        <ul>
                                            
                                            <li>Kitchen room</li>
                                            <li>Bed room</li>
                                            <li>Living room</li>
                                            <li>Bath room</li>
                                            <li>Common areas</li>
                                        </ul>
                                        <p>All of your home will be dusted, vacuumed, cleaned and arranged as a 5 star hotel room is arranged. Satisfaction guaranteed.</p>
                                        <p><b>Please note:-</b> Basic package does not include, Cleaning outside of windows, steam cleaning, carpet cleaning and Deep stain removal. If you need any of these please let us know in advance by contacting our customer service.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="dontOffer">
                                        
                                    <div class=" paddingL20">
                                        <h3>Exclusions:</h3>
                                        <ul>
                                            <li>Our crew will not be lifting items weighing over 15 Kgs (including large furniture) for safety reasons, and will not clean pet messes and/or heavily soiled areas, mold and/or bio hazardous material.</li>
                                        </ul>
                                    </div>
                                        </div>
                                </div>
                            </div>
                            <button class="btn btn-large dropdown-toggle getstarted_button"  onclick="cleaning();">Get Started</button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
   function cleaning(type){
    $("#myModal").modal({ backdrop: 'static', keyboard: false, show:false });
            if (document.getElementById('VV').value != 'inviteToEmail'){
            //$('#myModal').modal('show');
            $("#modelBodyDiv").load("/user/inviteregistration",{},""); 
            $('#myModal').modal('show');
        }else{
            window.location.href =<?php echo Yii::app()->request->baseUrl; ?>'/user/registration';
        }
    }
    
</script>