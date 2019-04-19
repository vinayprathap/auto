<?php
        function ifExists($conn, $inv_id, $year_id) {
        $sql = "SELECT opt_id FROM tbl_part_details WHERE inv_id=\"".$inv_id."\" AND year_id=\"".$year_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

    function ifOptExists($conn, $inv_id, $opt_id, $year_id) {
        $sql = "SELECT opt_id FROM tbl_part_details WHERE inv_id=\"".$inv_id."\" AND opt_id=\"".$opt_id."\" AND year_id=\"".$year_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

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

    function extractOptId($conn, $item) {
        $sql = "SELECT opt_id FROM tbl_part_options WHERE opt_name=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['opt_id'];
            }
            else {
                return 0;
            }
        }
    }

    function extractYearId($conn, $item) {
        $sql = "SELECT year_id FROM tbl_year WHERE year=\"".$item."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['year_id'];
            }
            else {
                return 0;
            }
        }
    }

    function checkInventory($conn, $part_id, $model_id) {
        $sql = "SELECT inv_id FROM tbl_inventory WHERE part_id=\"".$part_id."\" AND model_id=\"".$model_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                return 1;
            }
            else {
                return 0;
            }
        }
    }

    function extractInvId($conn, $part_id, $model_id) {
        $sql = "SELECT inv_id FROM tbl_inventory WHERE part_id=\"".$part_id."\" AND model_id=\"".$model_id."\"";
        $result = $conn->query($sql);
        if($result) {
            if (mysqli_num_rows($result)>0) {
                $row = $result->fetch_assoc();
                return $row['inv_id'];
            }
            else {
                return 0;
            }
        }
    }

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
    <title>Wolf Autoparts</title>

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

        <style type="text/css">

html{overflow-x:hidden;}
        </style>

        <script type="text/javascript">
            function validateCheckBox() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
                if (checkedOne===true) {
                    alert("wow");
                    window.location.href = <?php echo "\"finish.php?maker=".$_GET["maker"]."&model=".$_GET["model"]."&part=".$_GET["part"]."&year=".$_GET["year"]."\""; ?>;
                } else {
                    alert("Select Option");
                    window.location.href = <?php echo "\"final.php?maker=".$_GET["maker"]."&model=".$_GET["model"]."&part=".$_GET["part"]."&year=".$_GET["year"]."\""; ?>;
                }
            }           
        </script>
</head>

<body>
    <script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
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
                <div class="col-12 col-md-12 col-sm-12 pagebannerh2">
                    <div class="caption d-none d-md-block d-lg-block">
                            <center><h1 class='captionh5 text-black text-left'><strong>You have selected a <span class='text-red'><strong><?php echo $_GET['year']." ".$_GET['maker']." ".$_GET['model']." ".$_GET['part']; ?></strong></span> Complete the fields to get an Instant Quote </strong></h1></center>
                        </div>
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
            <div class="explore-search-form" style="z-index: 1; margin-top: -113px;">
                <!-- <h6>FIND THE PART NOW</h6> -->
                <!-- Tabs -->
                <!-- Tabs Content -->
                <p style="color:#fff">Please read carefully before making a selection</p>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
            <div class="contact-form">
                <form action="finish.php">
                            <div class="row mt-md-5 mt-0">
                            <?php
                                include_once "includes/database.php";

                                $inv_id = extractInvId($conn, extractId($conn, "part", $_GET['part']), extractId($conn, "model", $_GET['model']));
                                $opt_id = 
                                $year_id = extractYearId($conn, $_GET['year']);

                                if(ifExists($conn, $inv_id, $year_id)&&!ifOptExists($conn, $inv_id, 15, $year_id)
                            ) {                                                                                                                                                                                                                                                                             
                                        $sql = "SELECT o.opt_name as opt FROM tbl_part_details p INNER JOIN tbl_part_options o ON p.opt_id = o.opt_id WHERE inv_id=\"".$inv_id."\" AND year_id=\"".$year_id."\"";
                                        $result = $conn->query($sql);
                                        while ($row=$result->fetch_assoc()) {#fff
                                            echo "<div  class=\"col-12 col-6\">
                                            <label class=\"custom-control custom-checkbox mb-3\">
                                                <input type=\"checkbox\" class=\"custom-control-input\">
                                                <span class=\"custom-control-indicator\"></span>";
                                            echo "<span class=\"custom-control-description\">".$row['opt']."</span>";
                                            echo "</div>";  
                                        }
                                }
                            ?>
                            </label>
                        </div>
                       </div>
                        <div class="contact-form">
                            <div class="row">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                         <div class="col-12">
                            <input type="text" name="phone" pattern="[1-9]{1}[0-9]{9}" class="form-control" placeholder="Phone" required>
                        </div>
                         <div class="col-12">
                            <input type="text" name="zip" pattern="^[0-9]{3}(?:-[0-9]{3})?$" class="form-control"  placeholder="ZIP" required>
                        </div>
                        <input type="hidden" name="maker" id="qap_make" value=<?php echo "\"".$_GET["maker"]."\""?>>
                        <input type="hidden" name="model" id="qap_model" value=<?php echo "\"".$_GET["model"]."\""?>>
                        <input type="hidden" name="part" id="qap_part" value=<?php echo "\"".$_GET["part"]."\""?>>
                        <input type="hidden" name="qap_part_url" id="qap_part_url" value=''>
                        <input type="hidden" name="year" id="qap_year" value=<?php echo "\"".$_GET["year"]."\""?>>
                    </div>
            </div>
                            <button type="button" onclick="validateCheckBox()" class="btn dorne-btn mt-50 bg-white text-dark part2"><i class="fa fa-search pr-2" aria-hidden="true"></i>Get Quote</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Explore Search Result -->
    <div class="explore-search-result">
               
        <section class=" mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="subbannerproduct cstbanner2">
                       <?php
                            if (glob("images/parts/".strtolower($_GET["part"]).".png")) {
                                echo "<img src=\"images/parts/".strtolower($_GET["part"]).".png\">";}
                                ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="makecontent" style="margin-top: 20%">
                        <?php
                            if (glob("images/parts/".strtolower($_GET["part"]).".png")) {

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
                </div>
                <div class="col-md-4 col-sm-12 d-none d-md-block d-lg-block detads">
                    <div class="ads" style="margin-top: -3%">
                        <img src="img/ads1.jpg" alt="Ads">
                    </div>
                </div>
        </div>
    </section>
    <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container" style="text-align: center;">
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="flex: 0 0 100%; max-width: 100%">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Client Testimonials</h4>
                    <p>Editor's pick</p>
                    </div>
                    <div style="overflow: hidden;">
                        <div class="item-1">
                            <div>
                               <p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p> 
                            </div>
                             <div class="author_2"><h3 class="text-red">Daniel Frank, Seo Master</h3></div>
                        </div>

                        <div class="item-2">
                            <div><p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p></div>
                             <div class="author_2"><h3 class="text-red">Leah Jordan</h3></div>
                        </div>
                                                <div class="item-3">
                           <div><p style="color: #fff">Lorem Ipsum is simply dummy text of the printing and typeseto f and typesetting industry. to the Lorem Ipsum has been the industry's printer a galley</p></div>
                             <div class="author_2"><h3 class="text-red">Brian McNaught</h3></div>
                        </div>

                    </div>
                </div>
            </div>
                </div>
        </section>
    </div>
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
        <script type="text/javascript">
$(document).ready(function () {
    $('#submit').click(function() {
      if($("input[type=checkbox]").length>0)  {
      checked = $("input[type=checkbox]:checked").length;
      
      if(!checked) {
    
        return false;
      }
      }

    });
});


</script>


</body>

</html>


