<div class="container">

    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <?php 
                            if(!empty($this->session['UserId']) && ($this->session['Type']=='Vendor')){
                                $accout = '<a href="/vendor/vendorBasicinformation" ><span class="KGaccounts"> </span></a>';
                                $service = '<span class="KGservices"> </span>';
                                $payment = '<a href="#" ><span class="KGpayment"> </span></a>';
                            }else if(!empty($this->session['UserId']) && ($this->session['Type']=='Customer')){
                                $accout = '<a href="/user/basicinfo" ><span class="KGaccounts"> </span></a>';
                                $service = '<a href="/user/homeservice" ><span class="KGservices"> </span></a>';
                                $payment = '<a href="#" ><span class="KGpayment"> </span></a>';
                            }else{
                                $accout = '<span class="KGaccounts"> </span>';
                                $service = '<a href="#"><span class="KGservices"> </span></a>';
                                $payment = '<span class="KGpayment"> </span>';
                            }
?>
                            <li class="" title="Account" ><?php echo $accout;?></li>
                            <li class="active" title="Services"><?php echo $service;?></li>
                            <li class="" title="Payment" ><?php echo $payment;?></li>

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
                                <li><a href="/site/cleaning"> House Cleaning</a></li>
                                <li><a href="/site/carwash"> Car Cleaning </a></li>
                                <li class="active"><a href="/site/stewards"> Stewards / Stewardesses </a></li>
                                <li><a href="/site/moreservices">  More ...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid">
                    <div class="span12">
                        <input type="hidden" id="VV" value="<?php echo $this->session['UserType'];?>" >
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/service_banner3.jpg" class="service_banner" />
                        <div class="paddinground">
                            <h2>What services does KushGhar offer?</h2>
                            <div class="static_page_heading"></div>
                            <div class="row-fluid">
                                <div class="span12">

                                    <div class="paddingL20">
                                        <h3>Stewards / Stewardesses service</h3>
                                        <p>Our team of professional stewards / stewardesses will help you serve food, snacks, beverages, desserts as well as take care of the guests / visitors needs during parties and get-togethers.</p>
                                        <ul>
                                            <li>Serving food</li>
                                            <li>Serving beverages</li>
                                            <li>Assisting in seating the guests</li>
                                            <li>Refilling of food and beverage</li>
                                            <li>Garbage emptying</li>
                                        </ul>   
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class=" paddingL20">
                                        <p><i>Exclusions:</i></p>
                                        <ul>
                                            <li>Our crew will not be doing plates / vessels washing or cleaning up or arranging the premises after the party. However, you can book a home cleaning service for this purpose.</li>
                                        </ul>
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
    function cleaning(){
    var sess= '<?php echo $this->session['Type']; ?>';
        if(sess=='Customer'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/user/homeService';
        }
        else if(sess=='Admin'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard';
        }
        else if(sess=='Vendor'){
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/vendor/vendorBasicInformation';
        }
        else{
            window.location.href ='<?php echo Yii::app()->request->baseUrl; ?>/site/registration';
        }
    }
    
    </script>