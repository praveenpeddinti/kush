<div class="mainSoon">Our services are currently available in Hyderabad. Launching Nationwide soon.</div>
    <section class="slidersection">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <div class="slider paddingT30">
                        <div class="row-fluid">
                            <div class="span6">
                                <div id="container">
                                </div>
                            </div>
                            <div class="span6">
                                <!-- start -->
                                <div id="myCarousel" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item"><a href="/user/registration" style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b1.jpg" ></a></div>
                                        <div class="item"><a href="http://gadgets.ndtv.com/internet/features/kushghar-household-help-is-only-a-click-away-547111" target="_blank"  style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b3.jpg" ></a></div>
                                        <div class="item"><a href="http://gadgets.ndtv.com/internet/news/a-crowdfunding-project-to-make-domestic-chores-simple-and-help-the-underprivileged-543598" target="_blank" style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b2.jpg" ></a></div>
                                    </div>
                                    <!-- Carousel nav -->
                                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                                </div>
                                <!-- end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row-fluid paddingT30" >
                <div class="span12">
                    <div class="easy_steps">
                        <div class="easy_steps_title">Making your home happier is only 3 easy steps</div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="easy_3_steps">
        <div class="container">

            <div >
                <div class="row-fluid" >
                    <div class="span4">
                        <a href="/user/registration" class="steps1"><p>Getting Started</p></a>
                    </div>
                    <div class="span4 ">
                        <a href="/user/registration" class="steps2"><p>Get to know you</p></a>
                    </div>
                    <div class="span4"><a href="/user/registration" class="steps3"><p>Taking care of you and your family</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="SatisfactionPoints">
        <div class="container">
            <div class="row-fluid paddingT10" >
                <div class="span12">
                    <div class="easy_steps">
                        <div class="services_title">Services</div>
                    </div>

                </div>
            </div>
            <div class="our_services">
                <div class="row-fluid paddingT10" >
                    <div class="services span12 paddingl20p">
                        <ul>
                            <li><a href="/site/cleaning" class="housecleaning has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li>Kitchen room</li><li>Bed room&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Living room&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Bath room&nbsp;&nbsp;&nbsp;</li><li>Common areas</li></ul>" data-original-title="House Cleaning" > <span>House <br/>Cleaning</span> </a></li>
                            <li><a href="/site/carwash" class="driver has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li>Brush, vacuum, and clean the interior</li><li>Clean wheels and tires</li><li>Wash exterior</li><li>Apply tire dressing</li><li>Polish wheels</li><li>Rinsing and drying</li></ul>" data-original-title="Car Wash" ><span>Car <br/> Wash</span></a></li>
                            <li><a href="/site/stewards" class="laundry has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li>Supplies of food</li><li>Supplies of Wine / liquor</li><li>Assisting in seating the Guests</li><li>Re- filling of Food and Liquor</li><li>Garbage emptying</li></ul>" data-original-title="Stewards/Stewardesses" ><span>Stewards/<br/>Stewardesses</span></a></li>
                            <li><a href="/site/moreservices" class="more has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li>Drivers Service</li><li>Gardener&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Plumber&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Electrician&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Nurse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Baby sitting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></ul>" data-original-title="More Services" ></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        $(function() {
            var showPopover = function() {
                $(this).popover('show');
            }
            , hidePopover = function() {
                $(this).popover('hide');
            };

            $('.has-popover').popover({
                html: true,
                //content: 'Test1',
                //title: 'Title',
                trigger: 'manual'
            })


                    .focus(showPopover)
                    .blur(hidePopover)
                    .hover(showPopover, hidePopover);
            //$('#myModalnews').modal('show');
        });



        jwplayer('container').setup({
            file: '/images/KushgharIntro-360p.mp4',
            image: '/images/video_img.png',
            width: '100' + "%"
                    /*aspectratio: '10:3',
                     height:'250'*/

        });
    </script>
