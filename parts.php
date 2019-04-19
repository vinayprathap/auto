<?php
    include_once "includes/database.php";
    function extractId($conn, $node, $item) {
        $sql = "SELECT ".$node."_id FROM tbl_car_".$node." WHERE ".$node."_name=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row[$node.'_id'];
            }
            else {
                return 0;
            }
        }
    }
    if (isset($_GET["part"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dorne - Directory &amp; Listing Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">
            <link href="css2/custom.css" rel="stylesheet">
<link href="css2/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="wm-zoom/jquery.wm-zoom-1.0.min.css">

    <link rel="stylesheet" type="text/css" href="slick/slick.css">
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <script type="text/javascript">
        function myFunction(e) {
                var xmlhttp = new XMLHttpRequest();
                if (e.currentTarget.id == "maker") {
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("model").innerHTML = this.responseText;
                        }
                    };
                } else if (e.currentTarget.id == "model") {
                  xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("year").innerHTML = this.responseText;
                        }
                    };
                } else if (e.currentTarget.id == "part")  {
                  xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("year").innerHTML = this.responseText;
                        }
                    };
                }
                  if (e.currentTarget.id == "maker")
                    xmlhttp.open("GET", "show.php?maker=" + e.target.value, true);
                  else if (e.currentTarget.id == "model") 
                    xmlhttp.open("GET", "show.php?model=" + e.target.value + "&part=" + document.getElementById("part").value, true);
                  else if (e.currentTarget.id == "part") 
                    xmlhttp.open("GET", "show.php?part=" + e.target.value + "&model=" + document.getElementById("model").value, true);
                  xmlhttp.send();
            }
    </script>
</head>
<style type="text/css">

html{overflow-x:hidden;}
        </style>

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

      <section class="pagebanner layer-overlay overlay-dark-5" style="background-image: url(images/cars/AMC-Rebel.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="invisible" style="height:70px">height</div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 pagebannerh1">
                    <h1>USED <span class="text-black fnt-big"> amc </span> OEM PARTS</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- Explore Area -->
    <section class="dorne-explore-area d-md-flex">
        <!-- Explore Search Area -->
        <div class="explore-search-area d-md-flex">
            <!-- Explore Search Form -->
            <div class="explore-search-form">
                <h6>FIND THE PART NOW</h6>
                <!-- Tabs -->
                <!-- Tabs Content -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                        <form action="final.php" method="get">
                            <select  name="maker" id="maker" oninput="myFunction(event)" class="custom-select" id="destinations">
                                 <option disabled selected value="">Select Maker</option>
                                    <?php
                                        $sql="SELECT DISTINCT m.maker_name as maker FROM tbl_car_maker m, tbl_car_model mo, tbl_inventory i WHERE m.maker_id=mo.maker_id AND mo.model_id=i.model_id AND i.part_id=\"".extractId($conn,"part",$_GET['part'])."\"";
                                        $result=$conn->query($sql);
                                        while ($row=$result->fetch_assoc()) {
                                            echo "<option value=\"".$row['maker']."\">".$row['maker']."</option>";
                                        }
                                    ?>
                            </select>
                            <select name="model" id="model" oninput="myFunction(event)" class="custom-select" id="catagories">
                               <option disabled selected value="">Select Model</option>
                            </select>
                            <select name="part" id="part" oninput="myFunction(event)" class="custom-select" id="price-range">
                               <option disabled >Select Part</option>
                                <?php
                                    $sql="SELECT part_name as part FROM tbl_car_part ORDER BY part_name";
                                    $result=$conn->query($sql);
                                    while ($row=$result->fetch_assoc()) {
                                        if ($row["part"]==$_GET["part"]) {
                                            echo "<option selected value=\"".$row['part']."\">".$row['part']."</option>";
                                        } else {
                                            echo "<option value=\"".$row['part']."\">".$row['part']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <select name="year" id="year" oninput="myFunction(event)" class="custom-select" id="proximity">
                                <option disabled selected>Year</option>
                            </select>
                            <button type="submit" class="btn dorne-btn mt-50 bg-white text-dark part2"><i class="fa fa-search pr-2" aria-hidden="true"></i>Get Quote</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Explore Search Result -->
            <div class="explore-search-result">
                
 <section class=" mt-5 mb-5">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-sm-12">
                    <div class="reelative"><h1 class='captionh5 text-black text-left'><strong style="color:#000;">You have selected a <span style="color:#5d25dd ;"><strong><?php echo $_GET["part"]; ?></strong></span> Complete the fields to get an Instant Quote </strong></h1></div>
                    <div class="makecontent">
                        <div class="subbannerproduct cstbanner2">
                            <?php
                            if (glob("images/parts/".strtolower($_GET["part"]).".png")) {
                                echo "<img src=\"images/parts/".strtolower($_GET["part"]).".png\">";
                                echo "<p>";
                                $fh = fopen("images/parts/".strtolower($_GET["part"]).".txt",'r');
                                  while (! feof($fh)) {
                                    $s = fgets($fh);
                                    if (("\n" == $s) || ("\r\n" == $s)) {
                                        echo "<br><br>";
                                    }
                                    echo "$s";
                                  }
                                echo "</p>";
                                fclose($fh);
                            }
                            ?>
                    </div>
                        <!-- <p><u>Used AC condenser</u></p>
<p>AC condenser is an system used by cooling a substance gaseous liquid state. In this way, the latent heat is released from the substance and transferred to the environment around it. The condenser is occupied by heat transfer blades from outside to inside the unit through which cooling air can circulate. Condenser made up of copper is good when compared to aluminium.</p>
 -->
                </div>
                <!--#partshidetrow-->
                <!--partshidetrow#-->
            </div>
        </div>
    </section> 
            </div>
        </div>

        </div>
    </section>

    <!-- ****** Footer Area Start ****** -->
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
                    <!-- <div class="testimonial_slider_2">
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
                                      <p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
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
                                       <p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
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
                                       <p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
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
                                       <p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p>
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
        </div> -->
    </section>
    <!-- ***** Features Events Area End ***** -->

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
        </div>
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
        <script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="wm-zoom/jquery.wm-zoom-1.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.my-zoom-1').WMZoom();
                $('.my-zoom-2').WMZoom({
                    config : {
                        inner : true
                    }
                });
            });
        </script>

  
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
      <?php
    } else {
        header("Location: partlist.php");
    }
?>