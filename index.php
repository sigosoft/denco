<?php

require 'admin/db/config.php';



$query ="SELECT * FROM banner";
$lister= mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<!--[endif]-->

<head>
    <meta charset="utf-8" />
    <title>Denco Dentals | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Denco Dentals" />
    <meta name="keywords" content="Denco Dentals" />
    <meta name="author" content="sigosoft" />
    <meta name="MobileOptimized" content="320" />
    <!-- style -->
   <!--  <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!-- favicon link-->
    <link rel="shortcut icon" type="image/icon" href="images/Iconpic.png" />
</head>

<body>

    <!--top header start-->
    <div class="top_header_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="top_header_add">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us :</span> 0495 2 700 600</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dencodencodentals@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="top_login">
                         <ul>
                                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header menu wrapper-->
    <div class="menu_wrapper header-area hidden-menu-bar stick">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 wow bounceInDown" data-wow-delay="0.6s">
                    <div class="header_logo">
                        <a href="index.php" class="hidden-xs"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="150"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
                    <nav class="navbar hidden-xs">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse respose_nav" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav" id="nav_filter">
                                 <li><a href="index.php"  class="active">Home</a></li>
                                 <li><a href="about.php">about us</a></li>
                                 <li><a href="product.php">Products</a></li>
                                 <li><a href="technologies.php">Technologies</a></li>
                                 <li><a href="gallery.php">Gallery</a></li>
                                 <li><a href="career.php">Career</a></li>
                                 <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                    </nav>
                    <div class="rp_mobail_menu_main_wrapper visible-xs">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="gc_logo logo_hidn">
                                    <h1><a href="#"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="100"></a></h1>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div id="toggle">
                                   <i class="fas fa-align-justify"></i>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar">
                           <h1><a href="#"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="100"></a></h1>
                            <div id="toggle_close">&times;</div>
                            <div id="cssmenu" class="wd_single_index_menu">
                                <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="about.php">about us</a></li>
                                 <li><a href="product.php">Products</a></li>
                                 <li><a href="technologies.php">Technologies</a></li>
                                 <li><a href="gallery.php">Gallery</a></li>
                                 <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header wrapper end-->
    <!--slider wrapper start-->
    <div class="slider_main_wrapper">
        <div class="cc_slider_img_section">
            <div class="owl-carousel owl-theme">


                <?php
                while($rower = $lister->fetch_assoc()) { ?>

                <div class="item cc_main_slide" style="background:url('http://dencodentals.com/uploads/banner/<?php echo $rower['BImage']; ?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="cc_slider_cont1_wrapper">
                                    <div class="cc_slider_cont1">
                                       <!--  <div class="medi">
                                            <h1 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutDown">medical<span>services</span></h1>
                                        </div> -->
                                        <h2 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutDown">For aesthetics trust Denco Dentals.</h2>
                                        <ul>
                                            <li data-animation-in="bounceInLeft" data-animation-out="animate-out bounceOutLeft"><a href="product.php">PRODUCTS</a></li>
                                            <li data-animation-in="bounceInLeft" data-animation-out="animate-out bounceOutLeft"><a href="contact.php">CONTACT US</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php }; ?>
          


            


            </div>
        </div>
    </div>
    <!--slider wrapper end-->
    <!--category wrapper start-->
   <!--  <div class="category_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
                            <img src="images/icon1.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img">
                            <img src="images/icon_11.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Heart Surgery</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
                            <img src="images/icon2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img">
                            <img src="images/icon_2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Emergency Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
                            <img src="images/icon3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img cat_img_3">
                            <img src="images/icon_3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Dental Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--category wrapper end-->
    <!--about us wrapper start-->
    <div class="about_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="abt_img abt_box">
                        <img src="images/abt_img.jpg" alt="img" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 abt_section">
                    <div class="abt_heading_wrapper">
                        <h1 class="med_bottompadder20">about Denco</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder20">
                    </div>
                    <div class="abt_txt">
                        <p>Denco Dentals is a state-of-the-art dental lab which provide you an exclusive array of dental restorations with highly sophisticated materials and methods. At Denco Dentals we are committed to give you optimum care and guarantee the authenticity of scientifically and clinically tested equipments used for treatment and prostheses. Within a short span we at Denco Dentals have established ourselves as one of the top quality dental labs with ISO 9001:2008 Quality Certification.<br>

Denco Dentals is fully quipped with the latest imported machineries. We have a group of highly trained professionals to understand your requirements . It's our pleasure to receive your suggestions to review our services to meet your needs in all types of quality prostheses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about us wrapper end-->
    <!--choose wrapper start-->
    <div class="choose_wrapper med_toppadder100">
        <div class="choose_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_heading_wrapper">
                        <h1 class="med_bottompadder20">Why Choose Us</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder30">
                    </div>
                    <div class="sidebar_wrapper">
                        <div class="accordionFifteen">
                            <div class="panel-group">
                                <div class="panel-heading2">
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we always consider customer satisfaction as our first priority.</h4>
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we do not compromise on the quality of raw meterials.</h4>
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we believe that there is always scope for innovation.</h4>
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we consider once a customer should remain so for ever.</h4>
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we are always open to new technological advancements.</h4>
                                  <h4><img src="images/icon.png" alt="title">&nbsp; At Denco Dentals we consider oral aesthetics is more of aservice.</h4>
                                </div>
                                <!-- /.panel-default -->
                            </div>
                            <!--end of /.panel-group-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="owl_box">
                        <div class="med_slider_img">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="images/chs_slider_img.jpg" class="img-responsive" alt="story_img" />
                                </div>
                                <div class="item">
                                    <img src="images/chs_slider_img2.jpg" class="img-responsive" alt="story_img" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--choose wrapper end-->
    <!--testimonial wrapper start-->
    <div class="testimonial_wrapper med_toppadder100">
        <div class="test_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="test_heading_wrapper">
                        <h1 class="med_bottompadder20">What our cutomers say about us</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder60">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="test_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="t_icon_wrapper">
                                    <div class="t_client_cont_wrapper2">
                                        <p>“ Denco Dentals is a true professional company. ”</p>
                                        <div class="client_img_abt">
                                            <img class="img-circle" src="images/test_img_1.png" alt="img" style="width:90px;height:90px;">
                                            <h5>- Aditi Suryavanshi</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="t_icon_wrapper">
                                    <div class="t_client_cont_wrapper2">
                                        <p>“ Their service and technical support is excellent. ”</p>
                                        <div class="client_img_abt">
                                            <img class="img-circle" src="images/test_img_1.png" alt="img" style="width:90px;height:90px;">
                                            <h5>- Aditi Suryavanshi</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="t_icon_wrapper">
                                    <div class="t_client_cont_wrapper2">
                                        <p>“ Their aesthetics is the best in industry and no company can match their anteriors. ”</p>
                                        <div class="client_img_abt">
                                            <img class="img-circle" src="images/test_img_1.png" alt="img" style="width:90px;height:90px;">
                                            <h5>- Aditi Suryavanshi</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial wrapper end-->

    <!--partner wrapper start-->
    <div class="partner_wrapper med_bottompadder40 med_toppadder40">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="choose_heading_wrapper">
                        <h1 class="med_bottompadder20">OUR  ASSOCIATES</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder30">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partner_slider_img">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <a target="_blank" href="http://www.lava-elite.com/"><img src="images/a1.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.bredent.com/de/bredent"><img src="images/a2.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.ivoclarvivadent.com/"><img src="images/a3.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.vident.com/"><img src="images/a4.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.renfert.com/"><img src="images/a5.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.rhein83.com/index.php/en/"><img src="images/a6.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--partner wrapper end-->
    <!-- footer wrapper start-->
    <div class="footer_wrapper">
        <div class="container">
            <div class="box_1_wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="address_main">
                             <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Contact Us</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                            <div class="footer_box_add">
                                <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address : </span>-13/496 J K Firdous Building, Vasantha Vihar Complex, Palayam, Calicut -1</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us : </span>0495 2 700 600</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dencodencodentals@gmail.com</a></li>
                                </ul>
                            </div>

                                <div class="footer_btm_icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer_1-->
            <div class="booking_box_div">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_main_wrapper">
                           <div class="col-md-4 gallary_response hidden-sm">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Gallery</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_gallary">
                                    <div class="row">
                                       <ul>
                                            <li><img src="images/footer_1.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_2.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_3.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_4.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="images/footer_5.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="images/footer_6.jpg" alt="img" class="img-responsive"> </li>
                                     </ul> 
                                    </div>
                                </div>
                            </div>
                            <!--footer_2-->
                            <div class="col-md-3 respons_footer_nav hidden-xs">
                                <div class="footer_heading footer_menu">
                                    <h1 class="med_bottompadder10">Userful</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_ul_wrapper">
                                    <ul>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="index.php">home</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="about.php">about us</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="product.php">Products</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="technologies.php">Technologies</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="gallery.php">Gallery</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="contact.php">contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--footer_3-->
                            <div class="col-md-5 contact_last_div">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Opening Hours</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_cnct">
                                    <p>Monday – Friday ------<span>09:00-17:00</span></p>
                                    <p>Saturday -----------------<span>09:30-17:00</span></p>
                                    <p>Sunday -------------------<span>10:30-18:00</span></p>
                                </div>
                            </div>
                            <!--footer_4-->
                        </div>
                    </div>
                </div>
            </div>

                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_botm_wrapper">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="bottom_footer_copy_wrapper">
                                    <span>Copyright © 2018- <a href="#">DENCO</a> Powered by <a href="https://sigosoft.com/">Sigosoft.</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer_5-->
                </div>
        </div>
        <div class="container-fluid">
            <div class="up_wrapper">
                <a href="javascript:" id="return-to-top"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--footer wrapper end-->
    <!--main js files-->
    <script src="js/jquery_min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/new.js"></script>

    <!--js code-->
</body>

</html>