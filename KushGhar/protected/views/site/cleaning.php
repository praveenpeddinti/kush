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
                                $payment = '<a href="#" ><span class="KGpayment"> </span></a>';
                            }else if(!empty($this->session['UserId']) && ($this->session['Type']=='Customer')){
                                $accout = '<a href="/user/basicinfo" ><span class="KGaccounts"> </span></a>';
                                $payment = '<a href="/user/paymentInfo" ><span class="KGpayment"> </span></a>';
                            }else{
                                $accout = '<span class="KGaccounts"> </span>';
                                $payment = '<span class="KGpayment"> </span>';
                            }
?>
                            <li class="" title="Account" ><?php echo $accout;?></li>
                            <li class="active" title="Services"><a href="#"  ><span class="KGservices"> </span></a></li>
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
                                <li class="active"><a href="/site/cleaning"> House Cleaning</a></li>
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
                                        <p>This service includes a very well trained professional cleaning crew and also includes all the cleaning supplies including vacuum cleaners and air fresheners, and when they leave your home it will look and feel like a brand new model house.</p>
                                        <ul>
                                            
                                            <li>Kitchen room</li>
                                            <li>Bed room</li>
                                            <li>Living room</li>
                                            <li>Bath room</li>
                                            <li>Common areas</li>
                                        </ul>
                                        <p>All of your home will be dusted, vacuumed, cleaned and arranged as a 5 star hotel room is arranged. Satisfaction guaranteed.</p>
                                        <p>We do provide additional service such as cleaning outside windows, steam cleaning, carpet cleaning and deep stain removal. These services are at an additional fee. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class=" paddingL20">
                                        <p><i>Exclusions:</i></p>
                                        <ul>
                                            <li>Our crew will not be lifting items weighing over 15 Kgs (including large furniture) for safety reasons, and will not clean pet messes and/or heavily soiled areas, mold and/or bio hazardous material.</li>
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
        var sess= '<?php echo $this->session['UserId']; ?>';
        if(sess!=0){
            window.location.href =<?php echo Yii::app()->request->baseUrl; ?>'/user/homeService';
        }else{
            window.location.href =<?php echo Yii::app()->request->baseUrl; ?>'/user/registration';
        }
    }
    
</script>