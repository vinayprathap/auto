<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Autoparts Wolf  | Part Request</title>

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
                          document.getElementById("part").innerHTML = this.responseText;
                        }
                    };
                } else if (e.currentTarget.id == "part")  {
                  xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("year").innerHTML = this.responseText;
                        }
                    };
                } else if (e.currentTarget.id == "year")  {
                  xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("wow").innerHTML = this.responseText;
                        }
                    };
                }
                  if (e.currentTarget.id == "maker")
                    xmlhttp.open("GET", "show.php?maker=" + e.target.value, true);
                  else if (e.currentTarget.id == "model") 
                    xmlhttp.open("GET", "show.php?model=" + e.target.value, true);
                  else if (e.currentTarget.id == "part") 
                    xmlhttp.open("GET", "show.php?part=" + e.target.value+ "&model=" + document.getElementById("model").value, true);
                  else if (e.currentTarget.id == "year") 
                    xmlhttp.open("GET", "show.php?year=" + e.target.value+ "&part=" + document.getElementById("part").value+ "&model=" + document.getElementById("model").value, true);
                  xmlhttp.send();
            }
    </script>
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

        <section class="pagebanner layer-overlay overlay-dark-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="invisible" style="height:70px">height</div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 pagebannerh1">
                    <h1 class="pagebannerh1h1">PART REQUEST <span class="text-blue"></span></h1>
                </div>
            </div>
        </div>

    </section>
    <section class=" mt-3 mb-3" style="background-color: #d8b6f7;">
        <div class="container-fluid">
            <div class="row"> 
            <div class="col-md-2 col-sm-12 d-none d-md-block d-lg-block detads">
                    <div class="ads">
                      
                    </div>
                </div>                      
                                <div class="col-md-8 col-sm-12 det2">
                    <div class="form-block bg-grey overflow-none bt-radius">
                        <div class="form-title2 bt-radius">
                            <h1>Find A Part Now : <small><span id="yr"></span> <span id="mke"></span> <span id="mdl"></span> <span id="prt"></span></small></h1>
                        </div>
                        <form id="qapform" class="form-custompartrequest w-100 float-left bb-radius" method='get' action="finish.php" style="background-color: #d8b6f7;">
                            <div class="col-md-6 col-sm-12 no-pad float-left">
                                <div class="form-group row">
                                    <label for="qap_make" class="col-3 col-form-label">Make <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="maker" id="maker" oninput="myFunction(event)" class="form-control" required>
                                            <option disabled selected value="">Select Maker</option>
                                           <?php
                                              include_once "includes/database.php";

                                              $sql="SELECT maker_name FROM tbl_car_maker ORDER BY maker_name";
                                              $result=$conn->query($sql);
                                              while ($row=$result->fetch_assoc()) {
                                                echo "<option value=\"".$row['maker_name']."\">".$row['maker_name']."</option>";
                                              }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label for="qap_model" class="col-3 col-form-label">Model <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="model" id="model" oninput="myFunction(event)" class="form-control">
                                             <option disabled selected>Select Model</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  
                                    <label for="qap_part" class="col-3 col-form-label">Part <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="part" id="part" oninput="myFunction(event)" class="form-control ">
                                             <option disabled selected>Select Part</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label for="qap_year" class="col-3 col-form-label">Year <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="year" id="year" oninput="myFunction(event)" class="form-control qap_part_class">
                                             <option disabled selected>Select Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="wow">
                                </div>
                                <div class="form-group row opttwo d-none">
                                    
                                    <label for="MainOpt2" class="col-3 col-form-label">Option 2 <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt2" id="MainOpt2" class="form-control">
                                            <option value="">Select Option2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row optthree d-none">
                                 
                                    <label for="opt3" class="col-3 col-form-label">Option 3 <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt3" id="MainOpt3" class="form-control">
                                            <option value="">Select Option2</option>
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optfour">
                                  
                                    <label for="MainOpt4" class="col-3 col-form-label">Option 4<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt4" id="MainOpt4" class="form-control">
                                            <option value="">Select Option4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optfive">
                                   
                                    <label for="MainOpt5" class="col-3 col-form-label">Option 5<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt5" id="MainOpt5" class="form-control">
                                            <option value="">Select Option5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optsix">
                                    
                                    <label for="MainOpt6" class="col-3 col-form-label">Option 6<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt6" id="MainOpt6" class="form-control">
                                            <option value="">Select Option6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optseven">
                                  
                                    <label for="MainOpt7" class="col-3 col-form-label">Option 7<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt7" id="MainOpt7" class="form-control">
                                            <option value="">Select Option7</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none opteight">
                                  
                                    <label for="MainOpt7" class="col-3 col-form-label">Option 8<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt8" id="MainOpt8" class="form-control">
                                            <option value="">Select Option8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optnine">
                                    
                                    <label for="MainOpt9" class="col-3 col-form-label">Option 9<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt9" id="MainOpt9" class="form-control">
                                            <option value="">Select Option9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-none optten">
                                   
                                    <label for="MainOpt10" class="col-3 col-form-label">Option 10<span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <select name="MainOpt10" id="MainOpt10" class="form-control">
                                            <option value="">Select Option10</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 no-pad float-left">
                                <div class="form-group row">
                                    <span class="customername d-none">
                                        
                                    </span>
                                    <label for="customername" class="col-3 col-form-label">Name <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="customername" name="customername"  placeholder="Enter Your Name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="phone d-none">
                                                                           </span>
                                    <label for="phone" class="col-3 col-form-label">Phone <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control" type="tel" id="phone" name="phone" onkeyup="jm_phonemask(this);" onblur="jm_phonemask(this);" placeholder="Enter Your Phone" />
                                    </div>
                                </div>
                                <div style="position: relative;width: 100%;"><div class='col-md-12 pull-left d-none' id='pmsg'></div></div>
                                <div class="form-group row">
                                    <span class="email d-none">
                                        
                                    </span>
                                    <label for="email" class="col-3 col-form-label">Email <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter Your Email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                 
                                    <label for="zip" class="col-3 col-form-label">Zip <span class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="zip" name="zip" pattern="[0-9]{5}" placeholder="Enter Your Zip" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-5 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-custom">Find Part</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>              
              
            </div>
        </div>
    </section>



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