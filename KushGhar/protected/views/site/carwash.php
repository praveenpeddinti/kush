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
                       <div id="services" class="collapse in">
                            <div class="selected_tab">Services</div>
                            <ul class="l_menu_sub_menu">
                                <li><a href="/site/cleaning"> Cleaning</a></li>
                                <li class="active"><a href="/site/carwash"> Car Wash</a> </li>
                                <li><a href="/site/stewards">  Stewards / Stewardesses</a> </li>
                                <li><a href="/site/moreservices">  More ...</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <input type="hidden" id="VV" value="<?php echo $this->session['UserType'];?>" >
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/service_banner2.jpg" class="service_banner" />
                        <div class="paddinground">
                            <h2>What services Kushghar Offer ?</h2>
                            <div class="static_page_heading"></div>
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="paddingL20">
                                        <h3>Car cleaning service</h3>
                                        <p>This service includes a very well trained professional cleaning crew and also includes car interior cleaning and exterior washing, washing wheels, rinsing and dying vehicle and we use organic free chemicals which remove contaminants.</p>
                                        <ul>
                                            <li>Brush, vacuum, and clean the interior</li>
                                            <li>Clean wheels and tires</li>
                                            <li>Wash exterior</li>
                                            <li>Apply tire dressing</li>
                                            <li>Polish wheels</li>
                                            <li>Rinsing and drying</li>
                                        </ul>   
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="dontOffer">
                                        
                                    <div class=" paddingL20">
                                        <p><i>Exclusions:</i></p>
                                        <ul>
                                            <li>Our crew will not be doing polishing & waxing of vehicle and will not do interior seats shampooing.</li>
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