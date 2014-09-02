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
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    </ol>
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item"><a href="/user/registration" style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b1.jpg" ></a></div>
                                        <div class="item"><a href="http://gadgets.ndtv.com/internet/features/kushghar-household-help-is-only-a-click-away-547111" target="_blank"  style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b3.jpg" ></a></div>
                                        <div class="item"><a href="http://gadgets.ndtv.com/internet/news/a-crowdfunding-project-to-make-domestic-chores-simple-and-help-the-underprivileged-543598" target="_blank" style="border:0px; text-decoration:none;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/b2.jpg" ></a></div>
                                        <div class="item" style="height:250px">
                                            <a href="/site/customerFeedback" style="border:0px; text-decoration:none;">
                                            
                                            <table id="userTable" class="table table-hover" style="margin:20px">
                                            <tbody id="abusedWords_tbody">
                                                <tr><th style="text-align: center;color:#F58220">Customer FeedBack</th><tr>
                                                <?php if (sizeof($getServices) <= 0) { ?>
                                            <tr id="noRecordsTR">
                                            <td style="text-align: center">
                                            <span class="text-error"> <b>No records found</b></span>
                                            </td>
                                            </tr>
                                            <?php } else {
                                            foreach ($getServices as $row) { ?>
                                            <tr>
                                            <td style="padding-left: 30px">
                                                <?php $len= strlen($row['feedback']);
                                                if($len>=50){echo substr($row['feedback'],0,50).'...';}else{echo $row['feedback'];}?>
                                            </td>
                                            </tr>
                                            <?php } } ?>  
                                            </tbody>
                                            </table>
                                            </a>
                                        </div>
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
                        <a href="/site/registration" class="steps1"><p>Getting Started</p></a>
                    </div>
                    <div class="span4 ">
                        <a href="/site/registration" class="steps2"><p>Get to know you</p></a>
                    </div>
                    <div class="span4"><a href="/site/registration" class="steps3"><p>Taking care of you and your family</p></a>
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
                            <li><a href="/site/cleaning" class="housecleaning has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li style='float:none'>Kitchen</li><li style='float:none'>Bedroom</li><li style='float:none'>Living room</li><li style='float:none'>Bathroom</li><li style='float:none'>Common areas</li></ul>" data-original-title="House Cleaning" > <span>House <br/>Cleaning</span> </a></li>
                            <li><a href="/site/carwash" class="driver has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li style='float:none'>Brush, vacuum, and clean the interior</li><li style='float:none'>Clean wheels and tires</li><li style='float:none'>Wash exterior</li><li style='float:none'>Apply tire dressing</li><li style='float:none'>Polish wheels</li><li style='float:none'>Rinsing and drying</li></ul>" data-original-title="Car Cleaning" ><span>Car <br/> Cleaning</span></a></li>
                            <li><a href="/site/stewards" class="laundry has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li style='float:none'>Serving food</li><li style='float:none'>Serving beverages</li><li style='float:none'>Assisting in seating the guests</li><li style='float:none'>Refilling of food and beverage</li><li style='float:none'>Garbage emptying</li></ul>" data-original-title="Stewards / Stewardesses" ><span>Stewards/<br/>Stewardesses</span></a></li>
                            <li><a href="/site/moreservices" class="more has-popover" title="" data-toggle="popover" data-placement="top" data-content="<ul><li style='float:none'>Drivers</li><li style='float:none'>Gardener</li><li style='float:none'>Plumber</li><li style='float:none'>Electrician</li><li style='float:none'>Nurse</li><li style='float:none'>Baby sitting</li></ul>" data-original-title="More Services" ></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').carousel({interval:3000});
        });
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
