<?php include_once "includes/database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Autoparts Wolf | Parts List</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">
            <link href="css2/custom.css" rel="stylesheet">
<link href="css2/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css">
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">

</head>

<body>
    <!-- Preloader -->


    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <?php include_once 'includes/header.php'?>
    <!-- ***** Header Area End ***** -->

    <section class="pagebanner layer-overlay overlay-dark-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="invisible" style="height:70px">height</div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 pagebannerh1">
                    <h1 class="pagebannerh1h1">PART LIST <span class="text-blue"></span></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="bggrey bg-img bg-overlay-9 " style="background-image: url(img/bg-img/hero-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12">
                    <div class="contdivtxt">
                        <p style="color:white;">We carry huge stock <span class="text-red"><strong>Auto Parts</strong></span> in our store.  Auto Body Parts stock comprises of doors, bonnets,  wind shields, shock absorbers, front grills, back cabins, roofs and all other body parts. We have in our stock body parts of all popular models including AMC, Acura, Ford, BMW etc..</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="makes">
    <section class="white-pd50">
        <div class="container" id="make">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <i class="fa fa-search fa-custhead float-left"></i> <div class="reelative  float-left"><div class="subtitle" style="color:#5d25dd">Search by Car Make</div></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="listdiv">
                        <ul>
                            <?php
                              $sql="SELECT maker_name as maker FROM tbl_car_maker ORDER BY maker_name";
                              $result=$conn->query($sql);
                              while ($row=$result->fetch_assoc()) {
                                echo "<li><a href=\"maker.php?maker=".$row["maker"]."\" title=\"".$row["maker"]."\">".$row["maker"]."</a></li>";
                               } 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <div id="models">
    <section class="bggreypl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <i class="fa fa-search fa-custhead float-left"></i> <div class="reelative  float-left"><div class="subtitle">Search by Part Type</div></div>
                </div>
                <div class="col-md-12 col-sm-12" style="color: black;">
                    <div class="listdivpart">
                        <ul style="color: #000000;">
                           <?php
                              $sql="SELECT part_name as part FROM tbl_car_part ORDER BY part_name";
                              $result=$conn->query($sql);
                              while ($row=$result->fetch_assoc()) {
                                if (glob('images/parts/'.strtolower($row["part"]).'.png')) {
                                echo "<li><a href=\"parts.php?part=".$row["part"]."\"  title=\"".$row["part"]."\">".$row["part"]."</a></li>";
                                }
                               } 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>  

    <!-- ***** Features Events Area Start ***** -->
    <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Testimonial Slider from Baamboo Studio modified for The Mentor Group (http://www.mentor-group.com/clients--testimonials.html) -->

                    <!-- TestimonialS Slider - Free Weebly Widget by Baamboo Studio - Style 2 -->
            <!--         <div class="testimonial_slider_2">
                        <input type="radio" name="slider_2" id="slide_2_1" checked />
                        <input type="radio" name="slider_2" id="slide_2_2" />
                        <input type="radio" name="slider_2" id="slide_2_3" />
                        <input type="radio" name="slider_2" id="slide_2_4" />
                        <div class="boo_inner clearfix">
                            <div class="slide_content">
                                <div class="testimonial_2">
                                    <div class="content_2">
                                       <div class="section-heading text-center">
                        <span></span>
                        <h4>Client Testimonials</h4>
                        <p>Editor’s pick</p>
                    </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
                                    </div>
                                    <div class="author_2">
                                        <h3 class="text-red">Daniel Frank, Seo Master</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slide_content">
                                <div class="testimonial_2">
                                    <div class="content_2">
                                        <div class="section-heading text-center">
                        <span></span>
                        <h4>Client Testimonials</h4>
                        <p>Editor’s pick</p>
                    </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
                                    </div>
                                    <div class="author_2">
                                        <h3 class="text-red">Leah Jordan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slide_content">
                                <div class="testimonial_2">
                                    <div class="content_2">
                                        <div class="section-heading text-center">
                        <span></span>
                        <h4>Client Testimonials</h4>
                        <p>Editor’s pick</p>
                    </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
                                    </div>
                                    <div class="author_2">
                                        <h3 class="text-red">Brian McNaught</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slide_content">
                                <div class="testimonial_2">
                                    <div class="content_2">
                                        <div class="section-heading text-center">
                        <span></span>
                        <h4>Client Testimonials</h4>
                        <p>Editor’s pick</p>
                    </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
                                    </div>
                                    <div class="author_2">
                                        <h3 class="text-red">Lee Barker</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="controls">
                            <label for="slide_2_1"></label>
                            <label for="slide_2_2"></label>
                            <label for="slide_2_3"></label>
                            <label for="slide_2_4"></label>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Some of our Clients</h4>
                        <p>Editor’s pick</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-4"><img src="img/client-logo-1.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-4 col-4"><img src="img/client-logo-2.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-4 col-4"><img src="img/client-logo-3.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-4 col-4"><img src="img/client-logo-6.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-4 col-4"><img src="img/client-logo-4.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-4 col-4"><img src="img/client-logo-5.jpg" class="img-fluid" alt=""></div>
                    </div>
                </div>
            </div>
        </div>-->
    </section>
    <!-- ***** Features Events Area End ***** 

    <!-- ***** Clients Area Start ***** -->
   <section class="partnersdiv">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   <div class="regular slider">
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/Ford-logo.png" alt="FORD" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/Chevrolet-logo.png" alt="CHEVROLET" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/volkswagen-logo.jpeg" alt="VOLKSWAGON" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/Toyota-Logo.jpg" alt="TOYOTA" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/audi.png" alt="AUDI" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/dodge-logo.png" alt="DODGE" />
                            </div>
                        </div>
                        <div>
                            <div class="item">
                                <img src="img/partnerslogos/BMW.png" alt="BMW" />
                            </div>
                        </div>
                       
                   </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- ***** Clients Area End ***** -->

    <!-- ****** Footer Area Start ****** -->
    <?php include_once 'includes/footer.php'; ?>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>


  
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
        <script src="slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script></pre>
        <script type="text/javascript">
            new WOW().init();
            $(document).ready(function() {
                
                $(".regular").slick({
                    dots: false,
                    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><i class="fa fa-chevron-left"></i></button>',
                    nextArrow: '<button class="slick-next" aria-label="Next" type="button"><i class="fa fa-chevron-right"></i></button>',
                    speed: 300,
                    infinite: true,
                    autoplay: true,
                    slidesToShow: 6,
                    slidesToScroll: 1,
                     responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 5,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
                });
                $('.responsive').slick({
                  dots: false,
                  infinite: true,
                  speed: 300,
                  autoplay: true,
                  arrows:false,
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
                });
            });  
        </script>


</body>

</html>